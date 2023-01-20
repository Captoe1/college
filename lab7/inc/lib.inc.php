<?php
 function drawMenu($menu, $vertical)
 {
   //Инициализация массива
  echo "<ul>";
   foreach ($menu as $num => $value) {
     echo "<li><a href=" . $menu[$num]['href'] . ">" . $menu[$num]['link'] . "</a></a></li>";
   }
  echo "</ul>";
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