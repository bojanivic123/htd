<?php   

echo "<pre>";

//1

$a = "ovo je neki tekst";
$b = 5;
$c = false;

echo $a;
echo $b;
echo $c;

var_dump($a);
var_dump($b);
var_dump($c);

//2

$a = 5;
$b = 10;
$c = $a + $b;
echo $c;

//3

$a = 5;
$b = 10;
$b = $b + 3;
$a = $b;
var_dump($a);

//4

$a = 5;
$b = "5";

var_dump($a);
var_dump($b);
var_dump($a == $b);
var_dump($a === $b);

//5

$a = 5;
$b = 14;
$c = $a / $b;
var_dump($c);

//6

$a = 6;
$b = 10;
$c = 12;
$d = $a * $b * $c;
echo $d;

//7

$a = 6;
$b = 10;
$c = 12;
var_dump(($a + $b + $c) / 3);
echo ($a + $b + $c) / 3;

//8

$a = 6;
$b = 10;
$c = 12;
echo ($a + $b + $c) / 3 / 7;
var_dump(($a + $b + $c) / 3 / 7);

//9

$a = 10;
$a = $a + 7;
echo $a;

//10

$a = 10;
$a *= 5;
echo $a;

//11

$a = 11;
$b = 8;
echo $a - $b;
var_dump($a - $b);

//12

echo "Tomorrow we learn PHP program flow control.";
var_dump("Tomorrow we learn PHP program flow control.");
echo "Every command must end with ;";
var_dump("Every command must end with ;");



echo "</pre>";

?>

