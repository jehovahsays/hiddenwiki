<?php
/**
 * Automatic Board Welcome -- automatically posts a welcome message on new
 * users' user boards on account creation.
 * The message is sent by a randomly-chosen administrator (one who is a member
 * of the 'sysop' group).
 *
 * @file
 * @ingroup Extensions
 * @version 0.4.1
 * @date 14 May 2016
 * @author Jack Phoenix <jack@countervandalism.net>
 * @license http://en.wikipedia.org/wiki/Public_domain Public domain
 */

// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Automatic Board Welcome',
	'version' => '0.4.1',
	'author' => 'Jack Phoenix',
	'descriptionmsg' => 'automaticboardwelcome-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:Automatic_Board_Welcome',
);

$wgAutomaticBoardWelcomeAutowelcomeAutocreated = false;

$wgMessagesDirs['AutomaticBoardWelcome'] = __DIR__ . '/i18n';

$wgAutoloadClasses['AutomaticBoardWelcome'] = __DIR__ . '/AutomaticBoardWelcome.class.php';

$wgHooks['LocalUserCreated'][] = 'AutomaticBoardWelcome::sendUserBoardMessageOnRegistration';