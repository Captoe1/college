<?php
  /*
   * Получаем текущий час в виде строки от 00 до 23
   * и приводим строку к целому числу от 0 до 23
   */
  $hour = (int) strftime('%H');
  $welcome = ''; // Инициализируем переменную для приветствия
  // Установка локали и выбор значений даты
  setlocale(LC_ALL, "russian");
  $day = strftime('%d');
  $mon = strftime('%m');
  $year = strftime('%Y');
  if ($hour >= 0& $hour < 6) {
    $welcome = 'Доброй ночи';
  } elseif ($hour >= 6& $hour < 12) {
    $welcome = 'Доброе утро';
  } elseif ($hour >= 12& $hour < 18) {
    $welcome = 'Добрый день';
  } elseif ($hour >= 18& $hour < 23) {
    $welcome = 'Добрый вечер';
  } else {
    $welcome = 'Доброй ночи';
  }
  $leftmenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'index.php?id=about'],
    ['link' => 'Контакты', 'href' => 'index.php?id=contact'],
    ['link' => 'Таблица умножения', 'href' => 'index.php?id=table'],
    ['link' => 'Калькулятор', 'href' => 'index.php?id=calc']
  ];
  ?>