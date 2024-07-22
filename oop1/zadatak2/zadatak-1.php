<?php

class Disk {
   public $ime;
   public $memorija;
   public $lista_foldera = [];

   public function __construct($ime, $memorija)
   {
       $this->ime = $ime;
       $this->memorija = $memorija;
   }

   public function dodajFolder($folder)
   {
       $this->lista_foldera[] = $folder;
   }
}

class Folder {
   public $ime;
   public $lista_fajlova = [];

   public function __construct($ime)
   {
       $this->ime = $ime;
   }

   public function dodajFajl($fajl)
   {
       $this->lista_fajlova[] = $fajl;
   }
}

class Fajl {
   public $ime;

   public function __construct($ime)
   {
       $this->ime = $ime;
   }
}

class Video extends Fajl {
   public $format;

   public function __construct($ime, $format)
   {
       parent::__construct($ime);
       $this->format = $format;
   }
}

class Slika extends Fajl {
   public $sirina;
   public $visina;

   public function __construct($ime, $sirina, $visina)
   {
       parent::__construct($ime);
       $this->sirina = $sirina;
       $this->visina = $visina;
   }
}

class TekstualniFajl extends Fajl {
   public $duzinaTeksta;

   public function __construct($ime, $duzinaTeksta)
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
