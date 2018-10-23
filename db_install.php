<?php
global $db_prefix, $smcFunc, $sourcedir, $subforum_tree;
global $boardurl, $cookiename, $mbname, $language, $boarddir;

$SSI_INSTALL = false;
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
{
	$SSI_INSTALL = true;
	require_once(dirname(__FILE__) . '/SSI.php');
}
elseif (!defined('SMF')) // If we are outside SMF and can't find SSI.php, then throw an error
	die('<b>Error:</b> Cannot install - please verify you put this file in the same place as SMF\'s SSI.php.');

require_once($sourcedir.'/Subs-Admin.php');
$new = array();
if (!isset($modSettings['log_activation_error']))
	$new['log_activation_error'] = 1;
if (!isset($modSettings['log_incorrect_password_error']))
	$new['log_incorrect_password_error'] = 1;
if (!isset($modSettings['log_is_banned_error']))
	$new['log_is_banned_error'] = 1;
if (!isset($modSettings['log_email_provider_error']))
	$new['log_email_provider_error'] = 1;
updateSettings($new);

// Echo that we are done if necessary:
if ($SSI_INSTALL)
	echo 'DB Changes should be made now...';
?>