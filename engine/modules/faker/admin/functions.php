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
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (!defined('DATALIFEENGINE') || !defined('LOGGED_IN')) {
	die('Hacking attempt!');
}

/**
 * @param $arr
 * @param $key
 * @return mixed
 */
function findKey($arr, $key) {
	return $arr[$key];
}
/**
 * @param $data
 * @param $fallback
 * @return mixed
 */
function getVal($data, $fallback = false) {

	$keys = explode('.', $data);
	$arr  = $_POST;

	if (isset($arr[$keys[0]])) {
		foreach ($keys as $key) {
			$arr = findKey($arr, $key);
		}
		return $arr;
	} else {
		return $fallback;
	}
}

/**
 * @param $text
 * @param $images
 * @return mixed
 */
function getNewsText($text, $images) {
	$count = count($images);
	if ($count) {
		$chunkSize = mb_strlen($text) / $count;
		$arr       = str_split_unicode($text, $chunkSize);

		$arTmp = array();

		foreach ($arr as $key => $text) {
			$arTmp[] = $images[$key] . ' <br> ' . $text;
		}
		return implode('<br>', $arTmp);
	} else {
		return $text;
	}
}
/**
 * @param $str
 * @param $l
 * @return mixed
 */
function str_split_unicode($str, $l = 0) {
	if ($l > 0) {
		$ret = array();
		$len = mb_strlen($str, "UTF-8");
		for ($i = 0; $i < $len; $i += $l) {
			$ret[] = mb_substr($str, $i, $l, "UTF-8");
		}
		return $ret;
	}
	return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

/**
 * @param $faker
 * @param $type
 * @return mixed
 */
function getAuthor($faker, $type) {
	$user = array();

	if ($type == 'exist') {
		$user = getRandomUser();
	}
	if ($type == 'new') {
		global $db, $config;

		$latsUserId = $db->super_query("SELECT user_id FROM " . USERPREFIX . "_users ORDER BY user_id DESC");

		$dir      = ROOT_DIR . '/uploads/fotos';
		$tmpImage = $faker->image($dir, $faker->numberBetween(80, 100), $faker->numberBetween(60, 100));
		$imgExt   = explode('.', basename($tmpImage));

		$foto = rename($tmpImage, $dir . '/foto_' . ($latsUserId['user_id'] + 1) . '.' . $imgExt[1]);

		$arUserData['email']      = '\'' . $faker->email . '\'';
		$arUserData['password']   = '\'' . md5(md5($faker->password)) . '\'';
		$arUserData['name']       = '\'' . $faker->userName . '\'';
		$arUserData['user_group'] = 4;
		$arUserData['lastdate']   = '\'' . time() . '\'';
		$arUserData['reg_date']   = $arUserData['lastdate'];
		$arUserData['foto']       = '\'' . $config['http_home_url'] . 'uploads/fotos/foto_' . ($latsUserId['user_id'] + 1) . '.' . $imgExt[1] . '\'';
		$arUserData['fullname']   = '\'' . $faker->name() . '\'';
		$arUserData['logged_ip']  = '\'' . $faker->ipv4 . '\'';

		$db->query("INSERT into " . USERPREFIX . "_users (email, password, name, user_group, lastdate, reg_date, foto, fullname, logged_ip) VALUES (" . implode(', ', $arUserData) . ")");

		$userInfo = $db->super_query("SELECT user_id, name FROM " . USERPREFIX . "_users WHERE user_id = " . $db->insert_id());

		$user = $userInfo;

	}

	return $user;

}

/**
 * Генерация хэша - используется для создания пароля нового пользователя))
 * @return пароль
 */

/**
 * Получение информации о пользователе по его имени
 * @param $name        string - Имя пользователя
 * @param $select_list string - Перечень полей с информации или * для всех
 *
 * @return Массив с данными в случае успеха и false если пользователь не найден
 */
function getUserByName($name, $select_list = "*") {
	global $db;
	$name = $db->safesql($name);
	if ($name == '') {
		return false;
	}

	$userinfo = $db->super_query("SELECT " . $select_list . " FROM " . USERPREFIX . "_users WHERE name = '" . $name . "'");
	if (count($userinfo) == 0) {
		return false;
	} else {
		return $userinfo;
	}
}

function getRandomUser($select_list = 'user_id, name') {
	global $db;

	$userInfo = $db->super_query("SELECT " . $select_list . " FROM " . USERPREFIX . "_users ORDER BY rand()");

	return $userInfo;
}
/**
 * Обновление даты последнего посещения пользователя
 * @param  str $user имя пользователя
 *
 * @return -1 провал или 1 успех.
 */
function userUpdateLastdate($user) {
	global $db, $config;
	$now = time() + ($config['date_adjust'] * 60);
	$q   = $db->query("UPDATE " . USERPREFIX . "_users SET lastdate='$now' WHERE name='{$user}'");

	return 1;
}