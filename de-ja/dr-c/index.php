<?php  

echo "<pre>";

//1

function dajRazliku($a, $b)
{
    return $a - $b;
}

var_dump(dajRazliku(8, 3));

//2

function dajRez($a, $b, $c)
{
    return $a * $b - $c;
}

var_dump(dajRez(5, 3, 7));

//3

function dajRezul($a, $b, $c)
{
    if ($a > 0) {
        return $b + $c;
    } else {
        return $b - $c;
    }
}

var_dump(dajRezul(-2, 5, 5));

//4

function dajNajmanji($array)
{
    $najmanjiEl = $array[0];
    foreach ($array as $el) {
        if ($el < $najmanjiEl) {
            $najmanjiEl = $el;
        }
    }
    return $najmanjiEl;
}

var_dump(dajNajmanji([1, -17, 102, -56]));

//5

function dajSumu($array)
{
    $sum = 0;
    for ($index = 0; $index < count($array); $index++) {
        $sum += $array[$index];
    }
    return $sum;
}

var_dump(dajSumu([1, 2, 3, 4, 5]));

//6

function dajProizvod($array)
{
    $proizvod = 1;
    foreach ($array as $el) {
        $proizvod *= $el;
    }
    return $proizvod;
}

var_dump(dajProizvod([1, 2, 3, 4, 5]));

//7

function dajSrednju($array)
{
    $sum = 0;
    for ($index = 0; $index < count($array); $index++) {
        $sum += $array[$index];
    }
    return $sum / count($array);
}

var_dump(dajSrednju([1, 2, 3, 4, 5]));

//8

function dajNiz($a, $b)
{
    $niz = [];
    for ($i = $a; $i <= $b; $i++) {
        if ($i % 2 !== 0) {
            array_push($niz, $i);
        }
    }
    return $niz;
}

var_dump(dajNiz(11, 32));

//9

function dajInfo($array, $dG, $gG)
{
    $najmanjiEl = $array[0];
    $najveciEl = $array[count($array) - 1];
    return $najmanjiEl >= $dG && $najveciEl <= $gG;
}

var_dump(dajInfo([2, 11, 22], 0, -50));

//10

function dajInfo2($array, $dG, $gG)
{
    foreach ($array as $el) {
        if ($el < $dG || $el > $gG) {
            return false;
        }
    }
    return true;
}

var_dump(dajInfo2([-22, 11, -50, 44, -12], -400, 77));

//11

// function getArray($n)
// {
//     $counter = 0;
//     $array = [];
//     for ($i = $n; $counter < 10; $i++) {
//         if ($i % 2 === 0) {
//             $counter++;
//             array_push($array, $i);
//         }
//     }
//     return $array;
// }

// var_dump(getArray(12));

function getArray1($n)
{
    $counter = 0;
    $array = [];
    $i = $n;
    while ($counter < 10) {
        if ($i % 2 === 0) {
            $counter++;
            array_push($array, $i);
        }
        $i++;
    }
    return $array;
}

var_dump(getArray1(13));

//12

function getCounter($array, $a)
{
    $counter = 0;
    foreach ($array as $el) {
        if ($el === $a) {
            $counter++;
        }
    }
    return $counter;
}

var_dump(getCounter([2, 3, -12, 77, 2, -12, 2, 100, -50], -12));

//13

function getCounter2($array, $a)
{
    $counter = 0;
    foreach ($array as $el) {
        if ($el % $a === 0) {
            $counter++;
        }
    }
    return $counter;
}

var_dump(getCounter2([3, 2, 14, 36, 17, 90], 2));




echo "</pre>";

?>