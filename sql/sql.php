<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mysql</title>
    <style>
        table,
        tr,
        th,
        td {
            border: 1px black solid;
        }
    </style>
</head>

<body>
    <form method="post">
        id<input name="id"><br>
        names<input name="names"><br>
        parent_id<input name="parent_id"><br>
        deleted_at<input name="deleted_at"><br>
        <button name="button">Отправить</button><br>
        <button name="but">Удалить запись номер: </button>
        <input name='class'>
    </form>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'lab mysq');
    if (!$link) {
        echo die('<p style="color:red">' . mysqli_connect_errno() . ' - ' . mysqli_connect_error() . '</p>');
    }
    mysqli_query($link, "SET NAMES 'utf8'");
    function GetData($link)
    {
        $result = mysqli_query($link, 'SELECT * FROM categories');
        if (!$result) {
            echo die('<p style="color:red">' . mysqli_errno($link) . ' - ' . mysqli_error($link) . '</p>');
        }
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>names</th>";
        echo "<th>parent_id</th>";
        echo "<th>deleted_at</th>";
        echo "</tr>";
        for ($i = 0; $i < count($rows); $i++) {
            echo "<tr>";
            echo "<td>" . $rows[$i]['id'] . "</td>";
            echo "<td>" . $rows[$i]['names'] . "</td>";
            if ($rows[$i]['parent_id'] == null) {
                $rows[$i]['parent_id'] = 'NULL';
            }
            if ($rows[$i]['deleted_at'] == null) {
                $rows[$i]['deleted_at'] = 'NULL';
            }
            echo "<td>" . $rows[$i]['parent_id'] . "</td>";
            echo "<td>" . $rows[$i]['deleted_at'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    function DelData($link)
    {
        if (isset($_POST['but'])) {
            $d = $_POST['class'];
            mysqli_query($link, "DELETE FROM categories WHERE id = $d");
        }
    }
    GetData($link);
    DelData($link);
    if (isset($_POST['button'])) {
        $id = mysqli_real_escape_string($link, $_POST["id"]);
        $names = mysqli_real_escape_string($link, $_POST["names"]);
        $parent_id = mysqli_real_escape_string($link, $_POST["parent_id"]);
        $deleted_at = mysqli_real_escape_string($link, $_POST["deleted_at"]);
        $sql = "INSERT INTO categories(id,names) VALUES($id,'$names')";
        error_reporting(0);
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo die('<p style="color:red">' . mysqli_errno($link) . ' - ' . mysqli_error($link) . '</p>');
        }
    }
    mysqli_close($link);
    ?>
</body>

</html>