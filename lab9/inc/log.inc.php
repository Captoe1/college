<?php
$dt = date('Y-m-d H:i:s');
$page = $_SERVER['REQUEST_URI'];
$ref = $_SERVER['HTTP_REFERER'];
$path = [$dt, $page, $ref];
$json = json_encode($path);
$f = fopen('log/empty.txt', "a+");
fwrite($f, "$json\n");
fclose($f);
?>
