<?php

// a)

class GeometrijskiObjekat {
   public $povrsina;
   private static $brojac = 0;

   public function __construct($povrsina)
   {
       $this->povrsina = $povrsina;
       self::$brojac++;
   }

   public function getPovrsina(): float
   {
       return $this->povrsina;
   }

   public static function getBrojac(): int
   {
       return self::$brojac;
   }

}

echo "Broj kreiranih geometrijskih objekata je: " . GeometrijskiObjekat::getBrojac() . "<br/>";

// b)

class Disk {
   public $ime;
   public $memorija;
   public $lista_foldera = [];

   public function __construct(string $ime, int $memorija)
   {
       $this->ime = $ime;
       $this->memorija = $memorija;
   }

   public function dodajFolder(Folder $folder)
   {
       $this->lista_foldera[] = $folder;
   }
}

class Folder {
   public $ime;
   public $lista_fajlova = [];

   public function __construct(string $ime)
   {
       $this->ime = $ime;
   }

   public function dodajFajl(Fajl $fajl)
   {
       $this->lista_fajlova[] = $fajl;
   }
}

class Fajl {
   public $ime;

   public function __construct(string $ime)
   {
       $this->ime = $ime;
   }
}

class Video extends Fajl {
   public $format;
   private static $brojac = 0;

   public function __construct(string $ime, string $format)
   {
       parent::__construct($ime);
       $this->format = $format;
       self::$brojac++;
   }

   public static function getBrojac(): int
   {
       return self::$brojac;
   }
}

class Slika extends Fajl {
   public $sirina;
   public $visina;

   public function __construct(string $ime, int $sirina, int $visina)
   {
       parent::__construct($ime);
       $this->sirina = $sirina;
       $this->visina = $visina;
   }
}

class TekstualniFajl extends Fajl {
   public $duzinaTeksta;

   public function __construct(string $ime, int $duzinaTeksta)
   {
       parent::__construct($ime);
       $this->duzinaTeksta = $duzinaTeksta;
   }
}

$cDisk = new Disk('c', 5000);

$folderSlike = new Folder('Slike');
$folderVideo = new Folder('Video');

$cDisk->dodajFolder($folderSlike);
$cDisk->dodajFolder($folderVideo);

$slika1 = new Slika('Leto 2017', 800, 600);
$slika2 = new Slika('Leto 2016', 800, 600);

$folderSlike->dodajFajl($slika1);
$folderSlike->dodajFajl($slika2);

$video1 = new Video('Utakmica', 'mp4');
$folderVideo->dodajFajl($video1);

var_dump($cDisk);
