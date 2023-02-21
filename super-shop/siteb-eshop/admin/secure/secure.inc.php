<?
const FILE_NAME = '.htpasswd';
if (isset($_GET['logout'])) {
    logOut();
}
function getHash($password)
{
    $hash = password_hash($password, PASSWORD_BCRYPT);
    return $hash;
}
function checkHash($password, $hash)
{
    return password_verify($password, $hash);
}
function saveUser($login, $hash)
{
    $str = "$login:$hash\n";
    if (file_put_contents(FILE_NAME, $str, FILE_APPEND))
        return true;
    else
        return false;
}
function userExists($login)
{
    if (!is_file(FILE_NAME))
        return false;
    $users = file(FILE_NAME);
    foreach ($users as $user) {
        if (strpos($user, $login . ':') !== false)
            return $user;
    }
    return false;
}
function logOut()
{
    session_destroy();
    header('Location: secure/login.php');
    exit;
}
if (isset($_GET['logout'])) {
    logOut();
}
