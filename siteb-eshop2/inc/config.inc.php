<?php
define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'eshop');
define('ORDERS_LOG', 'orders.log');
$basket = [];
$count = 0;
$link = mysqli_connect('localhost', 'root', 'root', 'eshop');
if (!$link) {
    echo mysqli_connect_error();
}

basketInit();


?>