<?php  

echo "<pre>";

//1

function getString($string)
{
    $array = str_split($string);
    $newArray = [];
    for ($index = 0; $index < count($array); $index += 2) {
        array_push($newArray, $array[$index]);
    }
    return implode("", $newArray);
}

var_dump(getString("otorinolaringologija"));

//2

function get20($string)
{
    return substr($string, 0, 20);
}

var_dump(get20("Bojan je najgori u svemu."));

//3

function getPositions($string, $a)
{
    $newArray = [];
    $array = str_split($string);
    foreach ($array as $index => $el) {
        if ($el === $a) {
            $newArray[] = $index;
        }
    }
    return $newArray;
}

var_dump(getPositions("otorinolaringologija", "o"));

//4

function rep($string)
{
    return str_replace("o", "O", $string);
}

var_dump(rep("otorinolaringologija"));

//6

$arrayOfStrings = ["bojan", "nikola", "anastasija", "magdalena", "mirna"];

function getStr($array)
{
    $array3 = array_slice($array, 0, 3);
    $newArray = [];
    foreach ($array3 as $el) {
        $newArray[] = ucfirst($el);
    }
    return implode(" ", $newArray);
}

var_dump(getStr($arrayOfStrings));

//7

function getAss($array)
{
    $assArr= [];
    foreach ($array as $el) {
        if (array_key_exists($el, $assArr)) {
            $assArr[$el]++;
        } else {
            $assArr[$el] = 1;
        }
    }
    return $assArr;
}

var_dump(getAss([1, 0, -100, 1, 2, 2, 3, 33]));

//8

function getSqrt($el)
{
    return sqrt($el);
}

function modArray($array)
{
    return array_map("getSqrt", $array);
}

var_dump(modArray([2, 36, 8, 17]));

//9

$string2 = "Bojannnnnn je najgori na svetu";

function getA($string)
{
    $array = explode(" ", $string);
    $newArray = [];
    foreach ($array as $el) {
        $newArray[] = strlen($el);
    }
    return $newArray;
}

var_dump(getA($string2));

//10

function getMostCommon($string)
{
    $mostCommon = $string[0];
    for ($index = 0; $index < strlen($string); $index++) {
        if (substr_count($string, $string[$index]) > substr_count($string, $mostCommon)) {
            $mostCommon = $string[$index];
        }
    }
    return $mostCommon;
}

var_dump(getMostCommon($string2));

//11

$assArray = [
    "bojan" => 22,
    "anastasija" => 33,
    "maja" => 34,
    "zaklina" => 55
];

function changeArray($assArray)
{
    $array = array_keys($assArray);
    $longestKey = $array[0];
    foreach ($array as $el) {
        if (strlen($el) > strlen($longestKey)) {
            $longestKey = $el;
        }
    }
    $assArray[$longestKey] = "Ovde je najduzi kljuc";
    return $assArray;
}

var_dump(changeArray($assArray));

//13

function getLongestInter($array1, $array2)
{
    $array = array_intersect($array1, $array2);
    $longest = $array[0];
    foreach ($array as $el) {
        if (strlen($el) > strlen($longest)) {
            $longest = $el;
        }
    }
    return strlen($longest);
}

var_dump(getLongestInter(["nikola", "bojan", "marko", "petar","zaklina"], ["petar", "zaklina", "anastasija"]));

//14

function cb($el)
{
    return $el % 2 === 0;
}

function getNewArray($assArray)
{
    return array_filter($assArray, "cb");
}

var_dump(getNewArray($assArray));

//15

function callback($key)
{
    return strlen($key) % 2 === 0;
}

function getNew($assArray)
{
    return array_filter($assArray, "callback", ARRAY_FILTER_USE_KEY);
}

var_dump(getNew($assArray));



echo "</pre>";

?>