<!DOCTYPE html>
<html>

<head>
  <title>Сайт нашей школы</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php
  include "inc\lib.inc.php";
  include "inc\data.inc.php";
  $title = 'Сайт нашей школы';
  $header = "$welcome, Гость!";
  $id = strtolower(strip_tags(trim($_GET['id'])));
  switch ($id) {
    case 'about':
      $title = 'О сайте';
      $header = 'О нашем сайте';
      break;
    case 'contact':
      $title = 'Контакты';
      $header = 'Обратная связь';
      break;
    case 'table':
      $title = 'Таблица умножения';
      $header = 'Таблица умножения';
      break;
    case 'calc':
      $title = 'Он-лайн калькулятор';
      $header = 'Калькулятор';
      break;
  }
  ?>
  <div id="header">
    <!-- Верхняя часть страницы -->
    <?php
    include "inc\oop.inc.php";
    ?>
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
    <h1> 
      <?php echo $header ?>
    </h1>
    <!-- Заголовок -->
    <blockquote>
      <?php echo 'Сегодня ', $day, ' число, ', $mon, ' месяц, ', $year, ' год.'; ?>
    </blockquote>
    <!-- Область основного контента -->

    <?php
    switch ($id) {
      case 'about':
        include 'about.php';
        break;
      case 'contact':
        include 'contact.php';
        break;
      case 'table':
        include 'table.php';
        break;
      case 'calc':
        include 'calc.php';
        break;
      default:
        include 'inc\index.inc.php';
    }
    ?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <?php
    drawMenu($leftmenu, false);
    $count = $_COOKIE['pass'] + 1;
    $data = $_COOKIE['time'];
    echo "Количество посещений: $count <br>";
    echo "Последнее посещение: $data";
    setcookie("pass",$count,time()+36000);
    setcookie("time",date("g:i"),time()+36000);
    ?>
    <!-- Навигация -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    <?php
    include "inc\bottom.inc.php";
    ?>
    <!-- Нижняя часть страницы -->
  </div>
</body>

</html>