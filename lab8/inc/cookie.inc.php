<?php
$visitCounter = 0;
if (isset($_COOKIE['visitCounter'])) {
    $visitCounter = $_COOKIE['visitCounter'] + 1;
}
$lastVisit = "";
if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = 0;
    $_COOKIE['lastVisit'] = date('Y-m-d H:i:s');
}
if (date('d-m-Y', $_COOKIE['lastVisit']) != date('d-m-Y')) {
    setcookie('visitCounter', $visitCounter, time() + 36000);
    setcookie('lastVisit', $lastVisit, time() + 36000);
}
?>