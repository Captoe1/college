<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $f = fopen("text.txt", "a+");
    $lines = [];
    while ($line = fgets($f)) {
        $lines[] = $line;
    }
    if (is_readable("text.txt")) {
        for ($i = 0; $i < count($lines); $i++) {
            $messages = json_decode($lines[$i]);
            echo "<div>" . $messages[0] . "<div>";
            echo "<div>" . $messages[1] . " " . "пишет:" . $messages[2] . "<div>";
        }
    }
    fclose($f);
    ?>
    <form method="post">
        <input name="user"><br>
        <textarea name="textarea"></textarea><br>
        <input type="submit" name="button"><br>
    </form>
    <?php
    $arr = [date('Y h:i:s'), $_POST['user'], $_POST['textarea']];
    $json = json_encode($arr);
    $f = fopen("text.txt", "a+");
    $protect = json_decode($lines[count($lines) - 1]);
    if ($protect[1] === $arr[1] && $protect[2] === $arr[2]) {
    } else {
        fputs($f, $json . "\n");
    }
    fclose($f);
    ?>
</body>

</html>