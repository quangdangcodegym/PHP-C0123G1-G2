<?php

namespace Model;

use PDO;



class DBConnection
{
    private string $dsn;
    private string $user;
    private string $password;
    public function __construct(string $dsn, string $user, string $password)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }
    public function connect(): PDO
    {
        return new PDO($this->dsn, $this->user, $this->password);
    }
}
