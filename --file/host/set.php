<?php
function diff($bag, $check)
{
	$rs = array();
	foreach ($bag as $key => $value) if (!isset($check[$key]) || array_diff_assoc($value, $check[$key])) $rs[$key] = $value;
	return $rs;
}
file_put_contents('../cfg/host.conf', '
<VirtualHost *:' . PORT . '>
	DocumentRoot ' . ROOT . '
</VirtualHost>
');
$old_list = json_decode(file_get_contents('list.json'), true);
file_put_contents('list.json', $new_list = urldecode($_SERVER['QUERY_STRING']));
$new_list = json_decode($new_list, true);
foreach (diff($old_list, $new_list) as $dmn => $info) unlink("../cfg/host-$dmn.conf");
foreach (diff($new_list, $old_list) as $dmn => $info) {
	$text = '<VirtualHost *:' . PORT . ">\n\tServerName $dmn";
	foreach ($info as $key => $value) $text .= "\n\t$key " . ($key === 'DocumentRoot' ? ROOT : '') . $value;
	$text .= "\n</VirtualHost>";
	file_put_contents("../cfg/host-$dmn.conf", $text);
}
