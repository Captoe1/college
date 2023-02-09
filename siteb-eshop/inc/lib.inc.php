<?php
function addItemToCatalog($title, $author, $pubyear, $price, $link)
{
    $title = mysqli_real_escape_string($link, "$title");
    $author = mysqli_real_escape_string($link, "$author");
    $pubyear = mysqli_real_escape_string($link, "$pubyear");
    $price = mysqli_real_escape_string($link, "$price");
    $sql = "INSERT INTO catalog(title,author,pubyear,price) VALUES('$title','$author',$pubyear,$price)";
    if (!$stmt = mysqli_prepare($link, $sql))
        return false;
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}
function selectAllItems()
{
    
}
?>