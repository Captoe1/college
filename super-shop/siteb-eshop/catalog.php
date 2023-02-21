<?php
// подключение библиотек
require "inc/lib.inc.php";
require "inc/config.inc.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Каталог товаров</title>
</head>

<body>
	<p>Товаров в <a href="basket.php">корзине</a>: <?= $count ?></p>
	<table border="1" cellpadding="5" cellspacing="0" width="100%">
		<tr>
			<th>Название</th>
			<th>Автор</th>
			<th>Год издания</th>
			<th>Цена, руб.</th>
			<th>В корзину</th>
		</tr>
		<?php
		$goods = selectAllItems();
		foreach ($goods as $item) {
			echo "<tr><td>" . $item['title'] . "</td><td>" . $item['author'] . "</td><td>" . $item['pubyear'] . "</td><td>" . $item['price'] . "</td><td><a href=add2basket.php?id=" . $item['id'].">Добавить в корзину</a></tr>";
		}
		?>
	</table>
</body>

</html>