<?php
define("BASE_PATH", realpath(__DIR__));
define("DB_USERNAME", "root");
define("DB_PASSWORD", "Raisingthebar123!!/");

require_once(dirname(__FILE__) . "/controller/LoginController.php");

$request = trim($_SERVER['REQUEST_URI']);
$parsedUrl = parse_url($request);
$pathController = $parsedUrl['path'];

$controller = null;
if ($pathController == "/login") {
    $controller = new LoginController();

    $controller->login();
}
