<?php    

echo "<pre>";

//1

$colors = ["white", "green", "red"];

foreach ($colors as $color) {
    var_dump($color);
}

//2

$months = ["januar", "februar", "mart", "april", "maj", "jun", "jul", "avgust", "septembar", "oktobar", "novembar", "decembar"];

foreach ($months as $month) {
    var_dump($month);
}

//3

$capitals = [
    "Italy" => "Rome",
    "Serbia" => "Belgrade", 
    "Bosnia" => "Sarajevo",
    "Croatia" => "Zagreb", 
    "Finland" => "Helsinki"
];

foreach ($capitals as $country => $city) {
    var_dump("The capital of " . $country . " is " . $city);
}

//4

$colors = ["white", "green", "red", "blue", "black"];

var_dump("The memory of that scene for me is like a frame of film forever frozen at that moment: the " . $colors[2] . " carpet, the " . $colors[1] . " lawn, the " .  $colors[0] . " house, the leaden sky. The new president and his first lady. - Richard M. Nixon");

//5

$prirodniBrojevi = [];

for ($i = 1; $i <= 100; $i++) {
    array_push($prirodniBrojevi, $i);
}

var_dump($prirodniBrojevi);

//6

$months = [
    "Januar" => 31,
    "Februar" => 28,
    "Mart" => 31,
    "April" => 30,
    "Maj" => 31,
    "Jun" => 30,
    "Jul" => 31,
    "Avgust" => 31,
    "Septembar" => 30,
    "Oktobar" => 31,
    "Novembar" => 30,
    "Decembar" => 31
];

foreach ($months as $month => $days) {
    for ($i = 1; $i <= $days; $i++) {
        var_dump($i . ". " . $month);
    }
}

//7

$a = [];
$b = [];

for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 === 0) {
        array_push($a, $i);
    } else {
        array_push($b, $i);
    }
}

var_dump($a);
var_dump($b);

//8

$b = ["Marko", "Bojan", "Damir", "Tomislav"];
$a = ["Ana", "Mara"];

if (count($a) > count($b)) {
    foreach ($a as $ela) {
        var_dump($ela);
    }
} else {
    foreach ($b as $elb) {
        var_dump($elb);
    }
}

//9

$a = ["Srbija", "Hrvatska", "Bosna", "Crna Gora"];
$b = ["Beograd", "Zagreb", "Sarajevo", "Podgorica"];
$c = [];

for ($index = 0; $index < count($a); $index++) {
    for ($index = 0; $index < count($b); $index++) {
        $c[$a[$index]] = $b[$index];
    }
}

var_dump($c);

//10

$a = ["Srbija", "Hrvatska", "Bosna", "Crna Gora"];
$b = ["Beograd", "Zagreb", "Sarajevo", "Podgorica"];

for ($index = count($b) - 1; $index >= 0; $index--) {
    array_push($a, $b[$index]);
}

var_dump($a);

//11

$a = [3, -8, 3, 1, 21, -58, 3, 1];
$b = [3, 1, -15, 28, 444];
$c = [];

foreach ($a as $ela) {
    foreach ($b as $elb) {
        if ($ela === $elb && !in_array($ela, $c)) {
            array_push($c, $ela);
        }
    }
}

var_dump($c);

foreach ($a as $ela) {
    foreach ($b as $elb) {
        if ($ela === $elb && !in_array($ela, $c)) {
            $c[] = $ela;
        } 
    }
}

var_dump($c);

//1

$array = [1, 32, -11, 0, 54];
$sum = 0;

foreach ($array as $el) {
    $sum += $el;
}

var_dump($sum);

//2

$array = [1, 32, -11, 54];
$proizvod = 1;

foreach ($array as $el) {
    $proizvod *= $el;
}

var_dump($proizvod);

//3

$array = [1, 32, -11, 0, 54];
$sum = 0;

foreach ($array as $el) {
    $sum += $el;
}

var_dump($sum / count($array));

//4

$array = [1, 32, -11, 0, 54];
$najvEl = $array[0];

foreach ($array as $el) {
    if ($el > $najvEl) {
        $najvEl = $el;
    }
}

var_dump($najvEl);

//5

$a = 11;
$b = 32;
$niz = [];

// for ($i = $a; $i <= $b; $i++) {
//     array_push($niz, $i);
// }

// var_dump($niz);

for ($i = $a; $i <= $b; $i++) {
    $niz[] = $i;
}

var_dump($niz);





echo "</pre>";

?>