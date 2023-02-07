<?php
/* Основные настройки */
define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'gbook');
$link = mysqli_connect('localhost', 'root', 'root', 'gbook');
/* Основные настройки */

/* Сохранение записи в БД */
function SetData($link)
{
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $msg = mysqli_real_escape_string($link, $_POST['msg']);
    if (isset($_POST['button'])) {
        $sql = "INSERT INTO msgs(name,email,msg) VALUES('$name','$email','$msg')";
        error_reporting(0);
        $result = mysqli_query($link, $sql);
        header('Location: index.php?id=gbook');
        if (!$result) {
            echo die('<p style="color:red">' . mysqli_errno($link) . ' - ' . mysqli_error($link) . '</p>');
        }
    }
}
SetData($link);
/* Сохранение записи в БД */

/* Удаление записи из БД */
function DelData($link)
{
    if (isset($_GET)) {
        $d = $_GET['del'];
        mysqli_query($link, "DELETE FROM msgs WHERE id = $d");
    }
}
DelData($link);
/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    Имя: <br /><input type="text" name="name" /><br />
    Email: <br /><input type="text" name="email" /><br />
    Сообщение: <br /><textarea name="msg"></textarea><br />

    <br />

    <input type="submit" name="button" value="Отправить!" />
</form>
<style>
    table,
    tr,
    th,
    td {
        border: 1px black solid;
        text-align: center;
    }
</style>
<?php
/* Вывод записей из БД */
function GetData($link)
{
    $result = mysqli_query($link, 'SELECT * FROM msgs');
    if (!$result) {
        echo die('<p style="color:red">' . mysqli_errno($link) . ' - ' . mysqli_error($link) . '</p>');
    }
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo '<form action="" method="get">';
    for ($i = 0; $i < count($rows); $i++) {
        $id = $rows[$i]['id'];
        $name = $rows[$i]['name'];
        $email = $rows[$i]['email'];
        $msg = $rows[$i]['msg'];
        $time = $rows[$i]['datetime'];
        $d = $i + 1;
        echo "<p>
        <a href='mailto:$email'>$name</a> $time
        написал<br />$msg
        </p>
        <p align='right'>
        </p><button name='$i'><a href='http://localhost/siteb2/index.php?id=gbook&del=$id'>Удалить</a></button>";
    }
    echo '</form>';
}
GetData($link);
mysqli_close($link);
/* Вывод записей из БД */
?>