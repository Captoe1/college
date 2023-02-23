<?php
class User
{
    public $name;
    public $login;
    public $password;
    function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }
    function __destruct()
    {
        echo "Человек под логином: $this->login был удален <br>";
    }
    function showInfo()
    {
        echo "Меня зовут $this->name, мой логин: $this->login, и пароль: $this->password <br>";
    }
}
class superUser extends User
{
    public $role;
    function __construct($name, $login, $password, $role)
    {
        parent::__construct($name,$login,$password);
        $this->role = $role;
    }
    function showInfo()
    {
        echo "Меня зовут $this->name, мой логин: $this->login, и пароль: $this->password, моя роль: $this->role <br>";
    }
}
$User1 = new User('Азамат', 'admin', 'admin');
$User2 = new User('Таймас', 'root', 'root');
$User3 = new User('Ерсаин', 'kapi', 'bara');
$User = new superUser('Admin','admin','admin','Admin');
$User1->showInfo();
$User2->showInfo();
$User3->showInfo();
$User->showInfo();
