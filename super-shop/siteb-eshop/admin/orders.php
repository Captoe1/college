<?php
require "secure/session.inc.php";
require "../inc/lib.inc.php";
require "../inc/config.inc.php";
$orders = getOrders();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Поступившие заказы</title>
	<meta charset="utf-8">
</head>

<body>
	<h1>Поступившие заказы:</h1>
	<?php
	foreach ($orders as $ord) :
	?>
		<hr>
		<h2>Заказ номер: <?= $ord['orderid'] ?></h2>
		<p><b>Заказчик</b>: <?= $ord['name'] ?></p>
		<p><b>Email</b>: <?= $ord['email'] ?></p>
		<p><b>Телефон</b>: <?= $ord['phone'] ?></p>
		<p><b>Адрес доставки</b>: <?= $ord['address'] ?></p>
		<p><b>Дата размещения заказа</b>: <?= date('d-m-y h:i', $ord['date']) ?></p>

		<h3>Купленные товары:</h3>
		<table border="1" cellpadding="5" cellspacing="0" width="90%">
			<tr>
				<th>N п/п</th>
				<th>Название</th>
				<th>Автор</th>
				<th>Год издания</th>
				<th>Цена, руб.</th>
				<th>Количество</th>
			</tr>
			<?php
			$sum = 0;
			for ($i = 0; $i < count($ord['goods']); $i++) :
				$order = $ord['goods'][$i];
				$sum += $order['price'] * $order['quantity'];
			?>
				<tr>
					<td><?= $i + 1 ?></td>
					<td><?= $order['title'] ?></td>
					<td><?= $order['author'] ?></td>
					<td><?= $order['pubyear'] ?></td>
					<td><?= $order['price'] ?></td>
					<td><?= $order['quantity'] ?></td>
				</tr>
			<?php endfor ?>


		</table>
		<p>Всего товаров в заказе на сумму: <?= $sum ?> руб.</p>
	<?php endforeach ?>
</body>

</html>