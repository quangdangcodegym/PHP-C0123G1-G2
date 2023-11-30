<?php

use Controller\Controller;

class CustomerController extends Controller
{

    public function __construct()
    {
    }
    public function index()
    {
        $this->loadView('list.php');
    }
}
