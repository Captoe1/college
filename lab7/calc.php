<!-- Область основного контента -->
<form action='' method="post">
  <label>Число 1:</label>
  <br />
  <input name='num1' type='text' />
  <br />
  <label>Оператор: </label>
  <br />
  <input name='operator' type='text' />
  <br />
  <label>Число 2: </label>
  <br />
  <input name='num2' type='text' />
  <br />
  <br />
  <input type='submit' value='Считать'>
</form>
<!-- Область основного контента -->
<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operator = $_POST['operator'];
if ($num1 == null || $num2 == null) {
  error_reporting(0);
  echo "Недостаточно данных";
} else {
  switch ($operator) {
    case "+":
      echo $num1 + $num2;
      break;
    case "-":
      echo $num1 - $num2;
      break;
    case "/":
      if ($num2 == 0) {
        error_reporting(0);
        echo "Подумай дважды";
      } else {
        echo $num1 / $num2;
      }
      break;
    case "*":
      echo $num1 * $num2;
      break;
  }
}
?>