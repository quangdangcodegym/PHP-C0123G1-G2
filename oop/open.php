<?php

// var_dump(empty(""));
// var_dump(empty([]));
// var_dump(empty(0));
// $a;
// var_dump(empty($a));
// var_dump(empty("0"));

/*
$a = null;
$b;
var_dump(isset($a));
var_dump(isset($b));

*/

$a1 = "";
$a2 = "0";
$a3 = [];
$a4 = false;
var_dump(isset($a1));
var_dump(isset($a2));
var_dump(isset($a3));
var_dump(isset($a4));
