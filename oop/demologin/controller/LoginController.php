<?php
include_once BASE_PATH . "/service/UserService.php";

use Service\UserService;

class LoginController
{
    private UserService $userService;
    public function login()
    {
        $username = null;
        $password = null;
        $errors = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
            }
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            }

            if (isset($username) && isset($password)) {
                if ($this->userService->getUserBy($username, $password) != null) {
                    header('Location: ' . 'https://toidicode.com/');
                } else {
                    $errors = 'Thông tin đăng nhập không hợp lệ';
                }
            }
        }

        include  BASE_PATH . "/view/login.php";
    }
    public function __construct()
    {
        $this->userService = new UserService();
    }
}
