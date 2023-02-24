<?php
$conn = new mysqli('localhost', 'root', 'root', 'pdo');
require_once "functions.php";



if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $to_del = $_POST['delete_cat'];
    delete_category((int)$to_del);
    $_POST = array();
    header('Location: index.php');
}
echo "категория удалена";