<!DOCTYPE html>
<html>

<head>
  <title>Таблица умножения</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php
  function drawMenu($menu, $vertical)
  {
    $menu = [
      ['link' => 'Домой', 'href' => 'index.php'],
      ['link' => 'О нас', 'href' => 'about.php'],
      ['link' => 'Контакты', 'href' => 'contact.php'],
      ['link' => 'Таблица умножения', 'href' => 'table.php'],
      ['link' => 'Калькулятор', 'href' => 'calc.php']
    ];
    //Инициализация массива
    foreach ($menu as $num => $value) {
      echo "<li><a href=" . $menu[$num]['href'] . ">" . $menu[$num]['link'] . "</a></a></li>";
    }
    if($vertical == true){
      echo "<style> li{ display:inline; } </style>";
    }
  }
  function drawTable($cols, $rows, $color)
  {
    echo "<table border='1' width='300' style = 'background-color: $color' >";
    for ($i = 1; $i <= $cols; $i++) {
      echo "<tr>";
      for ($z = 1; $z <= $rows; $z++) {
        if ($i == 1) {
          echo "<th>" . $z * $i . "</th>";
        } elseif ($z == 1) {
          echo "<th>" . $z * $i . "</th>";
        } else {
          echo "<td>" . $z * $i . "</td>";
        }
      }
      echo "</tr>";
    }
    echo "</table>";
  }
  ?>
  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">приходите к нам учиться</span>
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
    <h1>Таблица умножения</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <form action=''>
      <label>Количество колонок: </label>
      <br />
      <input name='cols' type='text' value="" />
      <br />
      <label>Количество строк: </label>
      <br />
      <input name='rows' type='text' value="" />
      <br />
      <label>Цвет: </label>
      <br />
      <input name='color' type='text' value="" />
      <br />
      <br />
      <input type='submit' value='Создать' />
    </form>
    <!-- Таблица -->
    <?php
    drawTable(7, 6, "red");
    ?>
    <!-- Таблица -->
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <?php
    drawMenu(2,false);
    ?>
    <!-- Меню -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 2021
    <!-- Нижняя часть страницы -->
  </div>
</body>

</html>