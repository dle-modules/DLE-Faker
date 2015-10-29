<?php
/*
=============================================================================
DLE-Faker
=============================================================================
Автор:   ПафНутиЙ
URL:     http://pafnuty.name/
twitter: https://twitter.com/pafnuty_name
google+: http://gplus.to/pafnuty
email:   pafnuty10@gmail.com
=============================================================================
 */

if (!defined('DATALIFEENGINE') || !defined('LOGGED_IN')) {
	die('Hacking attempt!');
}

$action = $_REQUEST['action'];

require_once ENGINE_DIR . '/modules/faker/admin/functions.php';

if (!isset($action)) {
	require_once ENGINE_DIR . '/modules/faker/admin/main.php';
}

echofooter();