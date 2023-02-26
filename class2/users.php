<?php
abstract class UserAbstract
{
    abstract public function showInfo();
}
interface ISuperUser
{
    public function getInfo();
}
class User extends UserAbstract
{
    public $name;
    public $login;
    public $password;



    function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$count++;
    }

    public function showInfo()
    {
        echo "Имя: " . $this->name . "<br>";
        echo "Логин: " . $this->login . "<br>";
        echo "Пароль: " . $this->password . "<br>";
    }
    function __destruct()
    {
        echo "Пользователь " . $this->login . " удален <br>";
    }
    static $count = 0;
}
class SuperUser extends User implements ISuperUser, IAuthorizeUser
{
    public $role;
    function __construct($name, $login, $password, $role)
    {
        $this->role = $role;
        parent::__construct($name, $login, $password);
        self::$count++;
    }
    function showInfo()
    {
        parent::showInfo();
        echo "Роль: " . $this->role . "<br>";
    }
    function getInfo()
    {
        return array(
            'name' => $this->name,
            'email' => $this->login,
            'role' => $this->role
        );
    }
    public function auth($login, $password)
    {
        if ($login == $this->login && $password == $this->password) {
            return true;
        } else {
            return false;
        }
    }
    static $count = 0;
}
$user1 = new User("Aliwer", "Tusupkazin", "12345");
$user2 = new User("Daniel", "FelkerD", "67890");
$user3 = new User("Damir", "leadencommen", "147852");
$user4 = new SuperUser("Olzhas", "OLZHIK", "745863", "Помощник");
$user = new User('Aliw', 'Aliwlogin', 'Aliwpassword');
$superuser = new SuperUser('Admin', 'adminlogin', 'adminpassword', 'admin');
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();
$user4->showInfo();
$user->showInfo();
$superuser->getInfo();
interface IAuthorizeUser
{
    public function auth($login, $password);
}

echo "Всего пользователей: " . User::$count . "<br>";
echo "Всего супер-пользователей: " . SuperUser::$count . "<br>";

?>