<?php
require_once BASE_PATH . '/core/Config.php';
/**
 *  define routes with its controllers and actions 
 */
class PathMapping
{

    private string $path;
    private string $methodRequest;
    private string $class;
    private string $classMethod;
    /**
     * Get the value of classMethod
     */
    public function getClassMethod()
    {
        return $this->classMethod;
    }

    /**
     * Set the value of classMethod
     *
     * @return  self
     */
    public function setClassMethod($classMethod)
    {
        $this->classMethod = $classMethod;

        return $this;
    }

    /**
     * Get the value of methodRequest
     */
    public function getMethodRequest()
    {
        return $this->methodRequest;
    }

    /**
     * Set the value of methodRequest
     *
     * @return  self
     */
    public function setMethodRequest($methodRequest)
    {
        $this->methodRequest = $methodRequest;

        return $this;
    }

    /**
     * Get the value of path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of class
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @return  self
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    //new PathMapping(contexPath . "/customer/add", "GET", "Controller\CustomerController", "createCustomer"),
    public function __construct($path, $methodRequest, $class, $classMethod)
    {
        $this->path = $path;
        $this->methodRequest = $methodRequest;
        $this->class = $class;
        $this->classMethod = $classMethod;
    }
}


class RouterConfig
{
    public static $routes;

    public function __construct()
    {
        self::$routes = array(
            new PathMapping(contexPath . "/customer/add", "GET", "Controller\CustomerController", "createCustomer"),
            new PathMapping(contexPath . "/customer/add", "POST", "Controller\CustomerController", "saveCustomer"),
            new PathMapping(contexPath . "/customer/edit", "GET", "Controller\CustomerController", "editCustomer"),
            new PathMapping(contexPath . "/customer/edit", "POST", "Controller\CustomerController", "updateCustomer"),
            new PathMapping(contexPath . "/customer/delete", 'GET', "Controller\CustomerController", "deleteCustomer"),
            new PathMapping(contexPath . "/customer", "GET", "Controller\CustomerController", "index"),

        );
    }
}
