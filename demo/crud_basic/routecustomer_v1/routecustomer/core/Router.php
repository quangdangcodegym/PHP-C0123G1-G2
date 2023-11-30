<?php
require BASE_PATH . '/controller/CustomerController.php';
require BASE_PATH . '/router/Router.php';

use Controller\CustomerController;

class Router
{
    public static function route()
    {
        // require BASE_PATH . '/router/Router.php';
        $request = trim($_SERVER['REQUEST_URI']);       //routecustomer/customer?page=1&id=5
        $parsedUrl = parse_url($request);

        $pathController = $parsedUrl['path'];       //routecustomer/customer

        /*
        if (array_key_exists($pathController, routes)) {
            $arrController = routes[$request];                  // /routecustomer/home, /routecustomer/customer            
            $reqMethod = $_SERVER['REQUEST_METHOD'];            // GET, POST, PUT, DELETE

            if (self::checkExists($pathController, $reqMethod)) {
                $controller = routes[$pathController][$reqMethod][0];
                $method = routes[$pathController][$reqMethod][1];
                $class = new $controller();
                if (method_exists($controller, $method)) {
                    $class->$method();
                    exit;
                }
            }
        }
        */
        $mapping = self::getMapping($_SERVER['REQUEST_METHOD'], $pathController);
        if ($mapping != null) {
            $method = $mapping[1];
            $class = new $mapping[0]();
            $class->$method();
            exit;
        }

        http_response_code(404);
        include BASE_PATH . '/view/not_found.php';
    }
    public static function getMapping($methodRequest, $urlRequest): array|null
    {
        $results = array();
        $routeConfig = new RouterConfig();


        foreach (RouterConfig::$routes as $p) {
            if (strcmp($p->getMethodRequest(), $methodRequest) == 0 && strcmp($p->getPath(), $urlRequest) == 0) {
                $results[] = $p->getClass();
                $results[] = $p->getClassMethod();
                return $results;
            }
        }
        return null;
    }
}
