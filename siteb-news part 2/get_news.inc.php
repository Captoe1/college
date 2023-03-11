<?php

    require_once 'NewsDB.class.php';
    $news = new NewsDB();
$res = $news->getNews();
    
    if(!$res){
       $errMsg = "Произошла ошибка при выводе новостной ленты";
    }else{
      echo "<br> Kоличество записей: ". count($res). "<br>";
    }

    foreach($res as $new){
        $name = $new['title'];
        $id = $new['id'];
        echo "<a href='show-news.php?id=$id'>$name</a><br>";
    }



?>