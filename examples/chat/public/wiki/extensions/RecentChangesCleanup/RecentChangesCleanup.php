<?php
# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if (!defined('MEDIAWIKI')) {
        exit( 1 );
}
 
$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Recent Changes Cleanup',
	'author' => 'Anon',
	'url' => 'http://www.mediawiki.org/wiki/Extension:Recent_Changes_Cleanup',
	'descriptionmsg' => 'rc-cleanup-desc',
	'version' => '1.3',
);

$dir = dirname(__FILE__) . '/';
 
$wgAutoloadClasses['RecentChangesCleanup'] = $dir . 'RecentChangesCleanup_body.php'; # Tell MediaWiki to load the extension body.
$wgExtensionMessagesFiles['RecentChangesCleanup'] = $dir . 'RecentChangesCleanup.i18n.php';
$wgSpecialPages['RecentChangesCleanup'] = 'RecentChangesCleanup'; # Let MediaWiki know about your new special page.
$wgSpecialPageGroups['RecentChangesCleanup'] = 'changes';
  
?>