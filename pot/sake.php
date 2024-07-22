<?php  

// abstract class Animal {
//     public function sleep()
//     {
//         echo "Sleeping.";
//     }

//     abstract public function makeSound();
// }

// class Dog extends Animal {
//     public function makeSound()
//     {
//         echo "Awwwww.";
//     }
// }

// class Cat extends Animal {
//     public function makeSound()
//     {
//         echo "Mjauuu.";
//     }
// }

// $cat1 = new Cat();
// $cat1->sleep();
// $cat1->makeSound();

////////////////////////////////////////////

// interface Animal {
//     public function makeSound();
// }

// class Dog implements Animal {
//     public function makeSound()
//     {
//         echo "Avvvvvv.";
//     }
// }

// class Cat implements Animal {
//     public function makeSound()
//     {
//         echo "Mjauuuuuuu.";
//     }
// }

// $dog1 = new Dog();
// $dog1->makeSound();

////////////////////////////////////////

// abstract class Atm {
//     protected $balance;
//     public function __construct($initialBalance)
//     {
//         $this->balance = $initialBalance;
//     }

//     abstract public function proveriStanje();
//     abstract public function poloziNovac($iznos);
//     abstract public function povuciNovac($iznos);
// }

// class RaiffeisenAtm extends Atm {
//     public function proveriStanje()
//     {
//         echo "Trenutno stanje je " . $this->balance . ".";
//     }
//     public function poloziNovac($iznos)
//     {
//         $this->balance += $iznos;
//         echo "Polozili ste " . $iznos . ".";
//     }
//     public function povuciNovac($iznos)
//     {
//         if ($iznos > $this->balance) {
//             echo "Nemate dovoljno sredstava na racunu.";
//         } else {
//             $this->balance -= $iznos;
//             echo "Podigli ste " . $iznos . ".";
//         }
//     }
// }

// $raiff = new RaiffeisenAtm(20000);
// $raiff->poloziNovac(30000);
// $raiff->proveriStanje();
// $raiff->povuciNovac(45000);
// $raiff->povuciNovac(6000);

/////////////////////////////////////////////////////////
 
// interface Oblik {
//     public function izracunajPovrsinu();
// }

// class Krug implements Oblik {
//     private $poluprecnik;
//     public function __construct($poluprecnik)
//     {
//         $this->poluprecnik = $poluprecnik;
//     }
//     public function izracunajPovrsinu()
//     {
//         return $this->poluprecnik * $this->poluprecnik * 3.14;
//     }
// }

// class Kvadrat implements Oblik {
//     private $a;
//     private $b;
//     public function __construct($a, $b)
//     {
//         $this->a = $a;
//         $this->b = $b;
//     }
//     public function izracunajPovrsinu()
//     {
//         return $this->a * $this->b;
//     }
// }

// $kvadrat = new Kvadrat(6, 8);
// echo $kvadrat->izracunajPovrsinu();

/////////////////////////////////////////////////////




































?>