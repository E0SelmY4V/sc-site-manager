<?php

// ver: 1.0.20220619-0

require 'cache.php';
require 'url.php';
require 'errpage.php';
require 'config.php';

session_start();

if ($_POST) {
	list($un, $pw) = $_POST;
	if (!isset(USER[$un])) die('un');
	if (USER[$un] !== $pw) die('pw');
	$_SESSION['un'] = $un;
	$_SESSION['pw'] = $pw;
	die('hh');
}

if (
	!isset($_SESSION['un']) ||
	!isset(USER[$_SESSION['un']]) ||
	USER[$_SESSION['un']] !== $_SESSION['pw']
) {
	include('--file/login.html');
	die();
}

list($file, $qry) = ScpoPHP\Url::rewrite_uriget();
$file = '--file/' . $file;
switch (true) {
	case substr_compare($file, '.php', -4, 4) === 0:
		if (!file_exists($file)) ScpoPHP\Errpage::die(404);
		$_SERVER['QUERY_STRING'] = $qry;
		parse_str($qry, $_GET);
		chdir(substr($file, 0, strrpos($file, '/') + 1));
		include($file);
		die();
	case substr_compare($file, '/', -1, 1) === 0:
		$file .= 'index.html';
	default:
		if (!file_exists($file)) ScpoPHP\Errpage::die(404);
}
ScpoPHP\Cache::t_file($file);
include($file);
