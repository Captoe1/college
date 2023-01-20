<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $cols = abs((int) $_POST['cols']);
  $rows = abs((int) $_POST['rows']);
  $color = trim(strip_tags($_POST['color']));
}
$cols = ($cols) ? $cols : 10;
$rows = ($rows) ? $rows : 10;
$color = ($color) ? $color : 'yellow';
?>
<!-- Область основного контента -->
<form action="<?= $_SERVER['REQUEST_URI']?>" method="post">
  <label name="label1">Количество колонок: </label>
  <br />
  <input name='cols' type='text' value="" />
  <br />
  <label name="label2">Количество строк: </label>
  <br />
  <input name='rows' type='text' value="" />
  <br />
  <label name="label3">Цвет: </label>
  <br />
  <input name='color' type='text' value="" />
  <br />
  <br />
  <input type='submit' value='Создать' />
</form>
<!-- Таблица -->
<?php
$label11 = $_COOKIE['label1'];
$label22 = $_COOKIE['label2'];
$label33 = $_COOKIE['label3'];
echo "$label11<br>";
echo "$label22<br>";
echo "$label33<br>";
drawTable($cols, $rows, $color);
setcookie("label1",$cols,time()+36000);
setcookie("label2",$rows,time()+36000);
setcookie("label3",$color,time()+36000);
?>
<!-- Таблица -->
<!-- Область основного контента -->