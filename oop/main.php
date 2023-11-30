<?php
require './index.php';


class Foo
{
    public static string $my_static = 'foo';
    public static function aStaticMethod()
    {
        echo "HELLO";
    }
}

$f = new Foo();

$f->aStaticMethod();

echo Foo::$my_static;
// Foo::aStaticMethod();
