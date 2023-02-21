<?php 
// подключение библиотек 
require "inc/lib.inc.php"; 
require "inc/config.inc.php"; 
$bskt = myBasket(); 
// var_dump($bskt); 
?> 
<!DOCTYPE html> 
<html> 
 
<head> 
 <meta charset="utf-8"> 
 <title>Корзина пользователя</title> 
</head> 
 
<body> 
 <?php if (!$bskt) : ?> 
  <h1>Корзина пуста! Вернитесь в <a href="catalog.php">каталог</a>.</h1> 
 <?php else : ?> 
  <a href="catalog.php">Вернуться в каталог</a> 
  <h1>Ваша корзина</h1> 
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
   $sum = 0; 
   for ($i=0; $i<count($bskt); $i++) : 
    $sum+=$bskt[$i]['price']*$bskt[$i]['quantity']; 
   ?> 
    <tr> 
     <td><?= $i+1 ?></td> 
     <td><?= $bskt[$i]['title'] ?></td> 
     <td><?= $bskt[$i]['author'] ?></td> 
     <td><?= $bskt[$i]['pubyear'] ?></td> 
     <td><?= $bskt[$i]['price'] ?></td> 
     <td><?= $bskt[$i]['quantity'] ?></td> 
     <td><a href=<?= "delete_from_basket.php?id=".$bskt[$i]['id'] ?>>Удалить</a></td> 
    </tr> 
   <?php 
   endfor 
   ?> 
  </table> 
 
  <p>Всего товаров в корзине на сумму: <?= $sum ?> руб.</p> 
 
  <div align="center"> 
   <input type="button" value="Оформить заказ!" onClick="location.href='orderform.php'" /> 
  </div> 
 <?php endif ?> 
</body> 
 
</html>