<?php

namespace Controller;



class Controller
{

    function __construct()
    {
    }

    public function loadView($name = '', $arg = array(), $errors = array())
    {
        $path = BASE_PATH . "/view/{$name}";
        extract($arg);
        extract($errors);


        /*
        foreach ($arg as $key => $value) {
            $data[$key] = $value;
        }
        ob_start();
        include($path);
        $content = ob_get_contents();
        ob_end_clean();

        echo $content;
        */
        include($path);
    }
}
