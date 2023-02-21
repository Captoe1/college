<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
	$id = $_GET['id'];
	deleteItemFromBasket($id);
	header('Location: basket.php');