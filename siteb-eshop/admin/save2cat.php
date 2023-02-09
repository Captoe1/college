<?php
// подключение библиотек
require "secure/session.inc.php";
require "C:\ospanel\domains\localhost\siteb-eshop\inc/lib.inc.php";
require "C:\ospanel\domains\localhost\siteb-eshop\inc/config.inc.php";
$title = $_POST['title'];
$author = $_POST['author'];
$pubyear = $_POST['pubyear'];
$price = $_POST['price'];
if (!addItemToCatalog($title, $author, $pubyear, $price, $link)) {
	echo 'Произошла ошибка при добавлении товара в каталог';
} else {
	header("Location: add2cat.php");
	exit;
}
?>