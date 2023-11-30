<?php


class User
{
    public $id;
    public $username = "QUANG";
}

$a = "User";
$class = new $a();


echo $class->username;
