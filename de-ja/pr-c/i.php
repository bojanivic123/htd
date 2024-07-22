<?php  

echo "<pre>"; 

//1

$a = 6;
$b = 0;

if ($a + $b > 10) {
    var_dump($a + $b);
} else {
    var_dump($a - $b);
}

//2

$trenutniMesec = 8;

if ($trenutniMesec >= 1 && $trenutniMesec <= 3) {
    var_dump("Prvi kvartal");
} else if ($trenutniMesec >= 4 && $trenutniMesec <= 6) {
    var_dump("Drugi kvartal");
} else if ($trenutniMesec >= 7 && $trenutniMesec <= 9) {
    var_dump("Treci kvartal");
} else if ($trenutniMesec >= 10 && $trenutniMesec <= 12) {
    var_dump("Cetvrti kvartal");
}

//3

$a = 5;
$b = 7.2;

if (gettype($a) === "integer" && gettype($b) === "integer") {
    var_dump("Promenljive su tipa integer");
} else {
    var_dump("Promenljive nisu tipa integer");
}

//4

$a = 5;
$b = 9 + "4";

if (gettype($a) === "integer" && gettype($b) === "integer") {
    var_dump("Promenljive su integer.");
} else {
    var_dump("Promenljive nisu integer.");
}

//6

$brojBodova = 43;

if ($brojBodova < 55) {
    echo "Ocena 5";
} else if ($brojBodova < 65) {
    echo "Ocena 6";
} else if ($brojBodova < 75) {
    echo "Ocena 7";
} else if ($brojBodova < 85) {
    echo "Ocena 8";
} else if ($brojBodova < 95) {
    echo "Ocena 9";
} else {
    echo "Ocena 10";
}

//7

$n = 10;

if ($n === 0) {
    echo "Neodredjeno";
} else if ($n % 2 === 0) {
    echo "Paran broj";
} else if ($n % 2 !== 0) {
    echo "Neparan broj";
}

//8

$year = 2016;

if ($year % 4 === 0) {
    echo "Godina je prestupna";
} else {
    echo "Godina nije prestupna";
}

//9

$num = -18;

if ($num > -10 && $num < 10) {
    echo "Jednocifren";
} else if ($num > -100 && $num < 100) {
    echo "Dvocifren";
} else if ($num > -1000 && $num < 1000) {
    echo "Trocifren";
}

//10

$i = 20;

while ($i <= 30) {
    var_dump($i);
    $i++;
}

//11

$counter = 0;
$i = 1;

while ($counter < 10) {
    if ($i % 2 !== 0) {
        $counter++;
        var_dump($i);
    }
    $i++;
}

//12

for ($i = 0; $i <= 5; $i++) {
    var_dump($i);
}

//13

for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 === 0) {
        var_dump($i);
    }
}

//14

$sum = 0;

for ($i = 1; $i <= 100; $i++) {
    $sum += $i;
}

var_dump($sum);

//15

$counter = 0;
$sum = 0;
$i = 1;

while ($counter < 20) {
    if ($i % 2 !== 0) {
        $counter++;
        $sum += $i;
    }
    $i++;
}

var_dump($sum);

//16

$a = -77;
$b = 1800; 
$c = 200;

if ($a > $b && $a > $c) {
    if ($b > $c) {
        echo "Najveci broj je " . $a . " a najmanji broj je " . $c;
    } else {
        echo "Najveci broj je " . $a . " a najmanji broj je " . $b;
    }
} else if ($b > $a && $b > $c) {
    if ($a > $c) {
        echo "Najveci broj je " . $b . " a najmanji broj je " . $c;
    } else {
        echo "Najveci broj je " . $b . " a najmanji broj je " . $a;
    }
} else {
    if ($a > $b) {
        echo "Najveci broj je " . $c . " a najmanji broj je " . $b;
    } else {
        echo "Najveci broj je " . $c . " a najmanji broj je " . $a;
    }
}

//17

$a = 77277;
$b = -800; 
$c = 100;

if ($a > $b && $a > $c) {
    if ($b > $c) {
        var_dump($c, $b, $a);
    } else {
        var_dump($b, $c, $a);
    }
} else if ($b > $a && $b > $c) {
    if ($a > $c) {
        var_dump($c, $a, $b);
    } else {
        var_dump($a, $c, $b);
    }
} else {
    if ($a > $b) {
        var_dump($b, $a, $c);
    } else {
        var_dump($a, $b, $c);
    }
}

//1

$a = 4;
$b = 5;
$zp = 0;

for ($i = 1; $i <= $a; $i++) {
    $zp += $b;
}

var_dump($zp);

//2

$a = 2;
$b = 5;
$stepen = 1;

for ($i = 1; $i <= $b; $i++) {
    $stepen *= $a;
}

var_dump($stepen);

//3

$broj = 10;
$factoriel = 1;

for ($i = 1; $i <= $broj; $i++) {
    $factoriel *= $i;
}

var_dump($factoriel);

//4

$a = 8;
$string = "";

for ($i = 1; $i <= 10; $i++) {
    $string .= " " . $a * $i;
}

var_dump($string);

//5

$string = "";

for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        $string .= "$i * $j = " . $i * $j . " ";
    }
}

var_dump($string);





echo "</pre>";

?>

