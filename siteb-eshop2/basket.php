<?php
// подключение библиотек
require "inc/lib.inc.php";
require "inc/config.inc.php";


$products = myBasket();
error_reporting(0);

if (count($products) == 0) {
  echo " Корзина пуста! Вернитесь в <a href='catalog.php'>каталог</a>";
} else {
  echo "Вернуться в <a href='catalog.php'>католог</a>";


  $i = 1;
  $sum = 0;
}

?>
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Корзина пользователя</title>
</head>

<body>
  <h1>Ваша корзина</h1>
  <?php

  ?>
  <table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
      <th>N п/п</th>
      <th>Название</th>
      <th>Автор</th>
      <th>Год издания</th>
      <th>Цена, руб.</th>
      <th>Количество</th>
      <th>Удалить</th>
    </tr>
    <?php
    foreach ($products as $product) {
      echo "<tr>";
      echo "<td>" . $i . "</td>";
      echo "<td>" . $product['title'] . "</td>";
      echo "<td>" . $product['author'] . "</td>";
      echo "<td>" . $product['pubyear'] . "</td>";
      echo "<td>" . $product['price'] . "</td>";
      $product['amount'] = 1;
      echo "<td>" . $product['amount'] . "</td>";
      $total = $product['price'] * $product['amount'];
      echo "<td><a href='delete_from_basket.php?id=" . $product['id'] . "'>Delete</a></td>";
      echo "</tr>";
      $sum += $total;
      $i++;
    }
    echo "</table>";


    echo "Полная стоимость: " . $sum;
    ?>

    <div align="center">
      <input type="button" value="Оформить заказ!" onClick="location.href='orderform.php'" />
    </div>

</body>

</html>