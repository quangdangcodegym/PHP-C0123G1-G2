<?php

declare(strict_types=1);
/*
// $a = 5;          // khai báo biến dùng $
$a = 10;         


// var_dump($a);            // in ra kiểu dl và giá trị         
print_r($a);                // in ra giá trị

echo "<h1>HELLO 3AE</h1>", "<a href=''>HELLO 3AE</a>";          // in được nhiều tham số, ko trả về, nhanh
print("HELO");                                                  // in 1 tham số, trả về int, chậm


$a = "Hello";
$b = "Duy";

$c = $a . $b;           // nối chuỗi dùng .
echo $c;

$txt = "W3Schools.com";
echo "I love $txt!";         // string literal       


$x = 5;
function myTest()
{
    global $x;                  // muốn dùng biến toàn cục thì thêm từ khóa global
    echo "<p>Variable x inside function is: $x</p>";
}
myTest();
echo "<p>Variable x outside function is: $x</p>";


$x = 50;
function myTest()
{
    // echo $GLOBALS['x'];      // dùng thông qua mảng $GLOBALS
}

myTest();
echo "<p>Variable x outside function is: $x</p>";


function myTest()
{
    static $x = 0;              // biến cục bộ sẽ vẫn còn lưu giá trị
    echo $x;
    $x++;
}
myTest();
myTest();
myTest();

$a  = "Đặng Văn Quãng";
echo str_word_count($a);            // muốn thao tác thì dùng hàm, 3000 hàm



define("GREETING", "Welcome to codegym.vn!");       // khai báo hằng
echo GREETING;


for ($i = 0; $i < 10; $i++) {
    echo $i;
}


// $arr = [3, 4, 1, 6];             // tạo mảng theo index
$arr1 = array(3, 5, 7);

// var_dump($arr1);
// echo $arr1[0];
// echo $arr1[count($arr1) - 1];


array_push($arr1, 10, 10);
var_dump($arr1);

$ages = [                         // tạo mảng theo assoiated array
    "Quang" => 30,
    "Hải" => 29,
    "Nguyên" => 25
];

foreach ($ages as $key => $value) {
    echo $key . " " . $value . "<br>";
}

foreach ($ages as $v) {
    echo $v . "<br>";
}


$ages = [
    "1" => 30,
    "Hải" => 29,
    1 => 25
];

foreach ($ages as $key => $value) {
    echo $key . " " . $value . "<br>";
}


function addNumbers(float|int $a, float|int $b): int
{
    return (int) $a + $b;
}
echo addNumbers(1.2, 5);

function add_five(&$value)
{
    $value += 5;
}

$num = 2;
add_five($num);
echo $num;

*/

/*
$numbers = array(4, 6, 8, 1);
echo max($numbers);

echo max(5, 11, 7, 1);

*/

$numbers = array(4, 6, 8, 10);
// echo "TRUYEN MANG: " . mymax($numbers);
// echo "TRUYEN NHIEU DOI SO: " . mymax(4, 6, 8, 7);

function myMax($value, ...$values)
{
    $arr = [];
    if (is_array($value)) {
        $arr = $value;
    } else {
        $arr = $values;
        array_unshift($arr, $value);
    }
    var_dump($arr);
}

mymax($numbers);
// myMax(4, 6, 8);
