<?php
class User
{
    private $username;
    private $password;

    function getUserName()
    {
        return $this->username;
    }
    public function setUserName($username)
    {
        $this->username = $username;
    }
    function __construct($username)
    {
        $this->username = $username;
    }
    function updateUser($password)
    {
        $this->password = $password;
    }
}
