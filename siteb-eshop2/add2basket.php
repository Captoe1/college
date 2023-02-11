<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
	if(isset($_GET['id'])){
		$id = intval($_GET['id']);
		$count = 1;
		add2Basket($id, $count);
		header("Location: catalog.php");
		}	
	
?>
