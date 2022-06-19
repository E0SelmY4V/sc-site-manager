<?php
$dir = dir(getcwd());
$list = array();
while (($file = $dir->read()) !== false) {
	if (!ctype_alpha($file[0]) || !is_dir($file)) continue;
	$intro = $file . '/intro.txt';
	$intro = file_exists($intro) ? file_get_contents($intro) : '';
	$list[$file] = $intro;
}
header('Content-type: application/json');
echo json_encode($list);
