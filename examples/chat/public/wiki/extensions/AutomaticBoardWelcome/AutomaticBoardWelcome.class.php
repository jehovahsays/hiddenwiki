<?php
/**
 * Automatic Board Welcome -- automatically posts a welcome message on new
 * users' user boards on account creation.
 * The message is sent by a randomly-chosen administrator (one who is a member
 * of the 'sysop' group).
 *
 * @file
 * @ingroup Extensions
 * @author Jack Phoenix <jack@countervandalism.net>
 * @license https://en.wikipedia.org/wiki/Public_domain Public domain
 */

class AutomaticBoardWelcome {
	/**
	 * Send the message if the UserBoard class exists (duh!) and the welcome
	 * message has some content.
	 *
	 * @param User $user The new User object being created
	 * @param bool $autocreated True if the account was automatically created
	 * @return bool
	 */
	public static function sendUserBoardMessageOnRegistration( $user, $autocreated ) {
		global $wgAutomaticBoardWelcomeAutowelcomeAutocreated;

		if ( !class_exists( 'UserBoard' ) || !$user instanceof User ) {
			// Not sure what's going on, so abort the mission
			return true;
		}

		$msgObj = wfMessage( 'user-board-welcome-message' )->inContentLanguage();
		if ( $msgObj->isDisabled() ) {
			// We don't have anything to send out? That's disappointing.
			return true;
		}

		// Just quit if we're in read-only mode
		if ( wfReadOnly() ) {
			return true;
		}

		// We don't want to welcome autocreated users but this is an autocreated
		// one we're dealing with here.
		if ( $autocreated && !$wgAutomaticBoardWelcomeAutowelcomeAutocreated ) {
			return true;
		}

		// All good? Alright, let's move on to the actual business!
		$dbr = wfGetDB( DB_SLAVE );
		// Get all users who are in the 'sysop' group and aren't blocked from
		// the database
		$res = $dbr->select(
			array( 'user_groups', 'ipblocks' ),
			array( 'ug_group', 'ug_user' ),
			array( 'ug_group' => 'sysop', 'ipb_user' => null ),
			__METHOD__,
			array(),
			array(
				'ipblocks' => array( 'LEFT JOIN', 'ipb_user = ug_user' )
			)
		);

		$adminUids = array();
		foreach ( $res as $row ) {
			$adminUids[] = $row->ug_user;
		}

		if ( !$adminUids ) {
			// No unblocked sysops?
			return true;
		}

		// Pick one UID from the array of admin user IDs
		$random = array_rand( array_flip( $adminUids ), 1 );
		$sender = User::newFromId( $random );

		$senderUid = $sender->getId();
		$senderName = $sender->getName();

		// Send the message
		$b = new UserBoard();
		$b->sendBoardMessage(
			$senderUid, // sender's UID
			$senderName, // sender's name
			$user->getId(),
			$user->getName(),
			// passing the senderName as an argument here so that we can do
			// stuff like [[User talk:$1|contact me]] or w/e in the message
			$msgObj->params( $senderName )->parse()
			// the final argument is message type: 0 (default) for public
		);

		return true;
	}
}