<?php
require_once 'NewsDB.class.php';
$news = new NewsDB();
$id = (int) $_GET['id'];
if(!$_GET['id']){
    echo $errMsg;
    exit;
}else {
    $arr = $news->showNews($id);
    for ($i = 0; $i < count($arr); $i++) {
        if ($id == $arr[$i]['id']) {
            echo $arr[$i]['title'] . "<br>";
            echo $arr[$i]['category'] . "<br>";
            echo $arr[$i]['description'] . "<br>";
            echo $arr[$i]['source'] . "<br><br>";
        }
    }
}
