<?php  

// class Doctor {
//     public $name;
//     public $speciality;
//     public function __construct($name, $speciality)
//     {
//         $this->name = $name;
//         $this->speciality = $speciality;
//     }
// }

// $doctor1 = new Doctor("Bojan", "hirurg");
// $doctor1->speciality = "ginekoolog";
// var_dump($doctor1);

// abstract class Animal {
//     abstract public function makeSound();

//     public function sleep()
//     {
//         echo "Sleeping";
//     }
// }

// class Dog extends Animal {
//     public function makeSound()
//     {
//         echo "Wow";
//     }
// }

// $dog1 = new Dog();
// $dog1->sleep();
// $dog1->makeSound();

// abstract class Animal {
//     public function sleep()
//     {
//         echo "Sleeping";
//     }

//     abstract public function makeSound();
// }

// class Cat extends Animal {
//     public function makeSound()
//     {
//         echo "Mjauuuu";
//     }
// }

// $cat1 = new Cat();
// $cat1->sleep();
// $cat1->makeSound();

// interface Animal {
//     public function makeSound();
//     public function move();
// }

// class Cat implements Animal {
//     public function makeSound()
//     {
//         echo "Mjauuuu";
//     }
//     public function move()
//     {
//         echo "Run";
//     }
// }

// class Bird implements Animal {
//     public function makeSound()
//     {
//         echo "Cvcvcvvvvv";
//     }
//     public function move()
//     {
//         echo "Fly";
//     }
// }

// $bird1 = new Bird();
// $bird1->makeSound();
// $bird1->move();

// abstract class ATM {
//     protected $balance;
//     public function __construct($initialBalance)
//     {
//         $this->balance = $initialBalance;
//     }

//     abstract protected function proveriStanje();
//     abstract protected function podigniNovac($iznos);
//     abstract protected function poloziNovac($iznos);
// }

// class Nlbatm extends ATM {
//     public function proveriStanje()
//     {   
//         echo "Trenutno stanje na racunu je " . $this->balance . ".";
//     }
//     public function podigniNovac($iznos)
//     {
//         if ($iznos > $this->balance) {
//             echo "Nemate dovoljno sredstava na racunu.";
//         } else {
//             $this->balance -= $iznos;
//             echo "Podigli ste " .  $iznos . ".";
//         }
//     }
//     public function poloziNovac($iznos)
//     {
//         $this->balance += $iznos;
//         echo "Ulozili ste " . $iznos . ".";
//     }
// }

// $nlb = new Nlbatm(10000);
// $nlb->poloziNovac(5000);
// $nlb->podigniNovac(7000);
// $nlb->podigniNovac(17000);


// interface GeometrijskiOblik {
//     public function izracunajPovrsinu();
// }

// class Kvadrat implements GeometrijskiOblik {
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

// class Krug implements GeometrijskiOblik {
//     private $radius;
//     public function __construct($radius)
//     {
//         $this->radius = $radius;
//     }
//     public function izracunajPovrsinu()
//     {
//         return $this->radius * $this->radius * 3.14;
//     }
// }

// $kvadrat1 = new Kvadrat(5, 5);
// echo $kvadrat1->izracunajPovrsinu();

//////////////////////////////////////////////////////////

// interface GenerateReport {
//     public function generate();
// }

// class Pdf implements GenerateReport {
//     public function generate()
//     {
//         echo "Generating of pdf document.";
//     }
// }

// class Excel implements GenerateReport {
//     public function generate()
//     {
//         echo "Generating of excel document.";
//     }
// }

// class ReportMaker {
//     private $report;

//     public function __construct($report)
//     {
//         $this->report = $report;
//     }

//     public function generateReport()
//     {
//         $this->report->generate();
//     }
// }

// $pdf1 = new Pdf();
// $excel1 = new Excel();
// $maker1 = new ReportMaker($pdf1);
// $maker1->generateReport();

////////////////////////////////////////////////

// abstract class Bird {
//     abstract public function move();
// }

// class Sparrow extends Bird {
//     public function move()
//     {
//         echo "Sparrow can fly.";
//     }
// }

// class Penguin extends Bird {
//     public function move()
//     {
//         echo "Penguin can't fly.";
//     }
// }

// function moveBird(Bird $bird)
// {
//     $bird->move();
// }

// $penguin = new Penguin();
// moveBird($penguin);

////////////////////////////////////////////

// interface WorkAble {
//     public function work();
// }

// interface EatAble {
//     public function eat();
// }

// class Worker implements WorkAble, EatAble {
//     public function work()
//     {
//         echo "Worker works.";
//     }
//     public function eat()
//     {
//         echo "Worker eats.";
//     }
// }

// class Robot implements WorkAble {
//     public function work()
//     {
//         echo "Robot works.";
//     }
// }

//////////////////////////////////////////////////////////



































?>