<?php

/**
 *
 */
class Router
{
    public static function route()
    {
        require BASE_PATH . '/router/Router.php';

        $request = trim($_SERVER['REQUEST_URI']);

        echo $_SERVER['REQUEST_URI'];

        if (array_key_exists($request, routes)) {
            $controller = routes[$request][0];
            $method = routes[$request][1];
            if (file_exists(BASE_PATH . '/controller/' . $controller . '.php')) {
                require BASE_PATH . '/controllers/' . $controller . '.php';
                $class = new $controller();
                if (method_exists($controller, $method)) {
                    $class->$method();
                    exit;
                }
            }
        }

        http_response_code(404);
        include BASE_PATH . '/view/not_found.php';
    }
}
