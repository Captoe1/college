<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action="" method="post">
    <input name="submit" type="submit">
</form>

<body>
    <?php
    echo "Your Name is: " . $_COOKIE['name'] . "<br>";
    echo "Your Surname is: " . $_COOKIE['surname'] . "<br>";
    echo "Your Age is: " . $_COOKIE['age'] . "<br>";
    echo $_COOKIE['poster'];
    if (isset($_POST["submit"])) {
        $out = $_COOKIE['poster'] . "hub.php" . " > ";
        setcookie('poster', $out, time() + 3600);
        header("Location: http://localhost/lab%20session/name.php");
    }
    ?>
</body>

</html>