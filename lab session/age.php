<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input name="age">
        <input name="submit" type="submit">
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $out = $_COOKIE['poster'] . "age.php" . " > ";
        setcookie('poster', $out, time() + 3600);
        setcookie('age', $_REQUEST["age"], time() + 3600);
        header("Location: http://localhost/lab%20session/hub.php");
    }
    ?>
</body>

</html>