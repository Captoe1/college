<?php

if (!isset($_POST['title']) || !isset($_POST['category']) || !isset($_POST['description']) || !isset($_POST['source'])) {
    $errMsg = "Заполните все поля формы!";
} else {
   
    $title = trim(strip_tags($_POST['title']));
    $category = trim(strip_tags($_POST['category']));
    $description = trim(strip_tags($_POST['description']));
    $source = trim(strip_tags($_POST['source']));
  
    $result = $news->saveNews($title, $category, $description, $source);

   
    if ($result) {
       
        header('Location: news.php');
        exit();
    } else {
        $errMsg = "Произошла ошибка при добавлении новости";
    }
}





?>