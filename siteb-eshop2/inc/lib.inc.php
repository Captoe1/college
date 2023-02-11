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
  global $link;
  $result = mysqli_query($link, 'SELECT * FROM catalog');
  if (!$result) {
    echo die('<p style="color:red">' . mysqli_errno($link) . ' - ' . mysqli_error($link) . '</p>');
  }
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  for ($i = 0; $i < count($rows); $i++) {
    $id = $rows[$i]['id'];
    echo '<tr>';
    echo "<td>" . $rows[$i]['title'] . "</td>";
    echo "<td>" . $rows[$i]['author'] . "</td>";
    echo "<td>" . $rows[$i]['pubyear'] . "</td>";
    echo "<td>" . $rows[$i]['price'] . "</td>";
    echo "<td>" . "<button><a href='http://localhost/siteb-eshop/add2basket.php?&id=$id'>В корзину</a></button>";
    echo '</tr>';
  }
  echo "</table>";
}
function saveBasket()
{
  global $basket;
  $basket = base64_encode(serialize($basket));
  setcookie('basket', $basket, 0x7FFFFFFF);
}

function basketInit()
{
  global $basket, $count;
  if (!isset($_COOKIE['basket'])) {
    $basket = ['orderid' => uniqid()];
    saveBasket();
  } else {
    $basket = unserialize(base64_decode($_COOKIE['basket']));
    $count = count($basket) - 1;
  }
}

function add2Basket($id)
{
  global $basket;
  $basket[$id] = 1;
  saveBasket();
}

function myBasket()
{
  global $link, $basket;
  $goods = array_keys($basket);
  array_shift($goods);
  if (!$goods) {
    return false;
  }
  $ids = implode(",", $goods);
  $sql = "SELECT id, title, author, pubyear, price FROM catalog WHERE id IN ($ids)";
  if (!$result = mysqli_query($link, $sql)) {
    return false;
  }
  $items = result2Array($result);
  mysqli_free_result($result);
  return $items;
}

function result2Array($data)
{
  global $basket;
  $arr = [];
  while ($row = mysqli_fetch_assoc($data)) {
    $row['quantity'] = $basket[$row['id']];
    $arr[] = $row;
  }
  return $arr;
}
?>

<?php

function deleteItemFromBasket($id)
{

  if (isset($_COOKIE['basket'])) {

    $basket = json_decode($_COOKIE['basket'], true);
  } else {

    $basket = array();
  }


  foreach ($basket as $key => $item) {
    if ($item['id'] == $id) {

      unset($basket[$key]);
      break;
    }
  }


  setcookie('basket', json_encode($basket), time() + 36000, '/');
}

?>