<?php
// подключение библиотек
require "inc/lib.inc.php";
require "inc/config.inc.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Каталог товаров</title>
</head>

<body>
	<p>Товаров в <a href="basket.php">корзине</a>:
		<?= $count ?>
	</p>
	<table border="1" cellpadding="5" cellspacing="0" width="100%">
		<tr>
			<th>Название</th>
			<th>Автор</th>
			<th>Год издания</th>
			<th>Цена, руб.</th>
			<th>В корзину</th>
		</tr>
		<?php
		function GetData($link)
		{
			$result = mysqli_query($link, 'SELECT * FROM catalog');
			if (!$result) {
				echo die('<p style="color:red">' . mysqli_errno($link) . ' - ' . mysqli_error($link) . '</p>');
			}
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			for ($i = 0; $i < count($rows); $i++) {
				$id = $rows[$i]['id'];
				echo '<tr>';
				echo "<td>" . $rows[$i]['title'] . "</td>";
				echo "<td>" . $rows[$i]['author'] . "</td>";
				echo "<td>" . $rows[$i]['pubyear'] . "</td>";
				echo "<td>" . $rows[$i]['price'] . "</td>";
				echo "<td>" . "<button><a href='http://localhost/siteb-eshop/add2basket.php?&del=$id'>В корзину</a></button>";
				echo '</tr>';
			}
			echo "</table>";
		}
		GetData($link);
		?>
	</table>
</body>

</html>