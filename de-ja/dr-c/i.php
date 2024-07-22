<?php   

echo "<pre>";

//1

$string1 = "Otorinolaringologija";

function skipTwo($string1)
{
    $array = str_split($string1);
    $newArray = [];
    for ($index = 0; $index < count($array); $index += 2) {
        $newArray[] = $array[$index];
    }
    return implode("", $newArray);
}

var_dump(skipTwo($string1));

//2

$sentence1 = "Bojan je najgori u svemu.";

function first20($sentence1)
{
    return substr($sentence1, 0, 20);
}

var_dump(first20($sentence1));

//3

$string2 = "otorinolaringologija";

function getPos($string2, $a)
{
    $array = str_split($string2);
    $newArray = [];
    foreach ($array as $index => $el) {
        if ($el === $a) {
            $newArray[] = $index;
        }
    }
    return $newArray;
}

var_dump(getPos($string2, "o"));

//4

$string3 = "anastasija";

function rep($string3) {
    return str_replace("a", "A", $string3);
}

var_dump(rep($string3));

//6

$arrayOfWords = ["bojan", "marko", "danijel", "nikola", "milos"];

function getStr($arrayOfWords) {
    $array = array_slice($arrayOfWords, 0, 3);
    $newArray = [];
    foreach ($array as $el) {
        $newArray[] = ucfirst($el);
    }
    return implode(" ", $newArray);
}

var_dump(getStr($arrayOfWords));

//7

$numbers = [1, 5, 7, -22, -22, 1, 2, 1, -44, -44];

function getAssoc($numbers)
{
    $assArray = [];
    foreach ($numbers as $el) {
        if (array_key_exists($el, $assArray)) {
            $assArray[$el]++;
        } else {
            $assArray[$el] = 1;
        }
    }
    return $assArray;
}

var_dump(getAssoc($numbers));

//8

$numbers = [1, 5, 7, 22, 22, 10, 200, 1, 44];

function getSqrt($el)
{
    return sqrt($el);
}

function modArr($array)
{   
    return array_map("getSqrt", $array);
}

var_dump(modArr($numbers));

//9

$string4 = "Bojan je najgori na svetu";

function getNewArray($string)
{
    $array = explode(" ", $string);
    $newArray = [];
    foreach ($array as $el) {
        $newArray[] = strlen($el);
    }
    return $newArray;
}

var_dump(getNewArray($string4));

//10

$string5 = "otorinnnnnnnnnnolaringologija";

function getMostCommonChar($string)
{
    $mostCommon = $string[0];
    for ($i = 0; $i < strlen($string); $i++) {
        if (substr_count($string, $string[$i]) > substr_count($string, $mostCommon)) {
            $mostCommon = $string[$i];
        }
    }
    return $mostCommon;
}

var_dump(getMostCommonChar($string5));

//11

$ass = [
    "bojan" => 2,
    "nikola" => 3,
    "marko" => 8,
    "njegomir" => 22
];

function getText2($array)
{
    $newArray = array_keys($array);
    $lonKey= $newArray[0];
    foreach ($newArray as $el) {
        if (strlen($el) > strlen($lonKey)) {
            $lonKey = $el;
        }
    }
    $array[$lonKey] = "Ovde je najduzi kljuc";
    return $array;
}

var_dump(getText2($ass));

//13

function getLongestInTwo($array1, $array2)
{
    $array = array_intersect($array1, $array2);
    $theLongest = $array[0]; 
    foreach ($array as $el) {
        if (strlen($el) > strlen($theLongest)) {
            $theLongest = $el;
        }
    }
    return $theLongest;
}

var_dump(getLongestInTwo(["bojan", "marko", "antonijaaaaaa", "anastasija", "zaklina"], ["anastasija", "antonijaaaaaa", "zaklina", "dejo", "mladjo"]));

//14

$ass1 = [
    "bojan" => 2,
    "nikola" => 3,
    "marko" => 8,
    "njegomir" => 22
];

function cb($el) {
    return $el % 2 === 0;
}

function getA($ass1)
{
    $array = array_filter($ass1, "cb");
    return $array;
}

var_dump(getA($ass1));

//15

function callback($key) 
{
    return strlen($key) % 2 === 0;
}

function getAa($ass1)
{
    $array = array_filter($ass1, "callback", ARRAY_FILTER_USE_KEY);
    return $array;
}

var_dump(getAa($ass1));





echo "</pre>";

?>