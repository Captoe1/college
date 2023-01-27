<?php
if (is_file("log/empty.txt")) {
    $f = fopen("log/empty.txt", "r");
    $lines = [];
    while ($line = fgets($f)) {
        $arr = json_decode($line);
        echo "$arr[0] - $arr[1] -> $arr[2]\n";
    }   
    fclose($f);

}
?>