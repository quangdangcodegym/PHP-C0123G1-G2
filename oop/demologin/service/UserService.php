<?php

namespace Service;

require_once BASE_PATH  . "/model/User.php";

use Model\User;
use PDO;

class UserService
{
    public function getUserBy(string $username, string $password)
    {
        $conn = new PDO('mysql:host=localhost:3306;dbname=php_b_user', DB_USERNAME, DB_PASSWORD);

        $stmt = $conn->prepare('SELECT id, username, password from users WHERE username = :username and password = :password');

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        //Gán giá trị và thực thi
        $stmt->execute([
            'username' => $username,
            'password' => $password
        ]);
        $row = $stmt->fetch();

        if ($row != null) {
            return new User($row['id'], $row['username'], $row['password']);
        } else {
            return null;
        }
    }
}
