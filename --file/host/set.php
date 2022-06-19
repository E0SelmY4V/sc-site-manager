<?php

$PORT = 8081;
$ROOT = '/mnt/';

$list = urldecode($_SERVER['QUERY_STRING']);
$file = fopen('list.json', 'w');
fwrite($file, $list);
fclose($file);

$list = json_decode($list);
$str = "<VirtualHost *:$PORT>\n\tDocumentRoot $ROOT\n</VirtualHost>\n";
foreach ($list as $dmn => $uri) $str .= <<<end
<VirtualHost *:$PORT>
	ServerName $dmn
	DocumentRoot $ROOT$uri
</VirtualHost>

end;
$file = fopen('../host.conf', 'w');
fwrite($file, $str);
fclose($file);
