<?php 

abstract class Fajl {
   public $ime;

   public function __construct(string $ime)
   {
       $this->ime = $ime;
   }

   public abstract function getTip();
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

   public function getTip()
   {
       return 'video';
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

   public function getTip()
   {
       return 'slika';
   }
}

class TekstualniFajl extends Fajl {
   public $duzinaTeksta;

   public function __construct(string $ime, int $duzinaTeksta)
   {
       parent::__construct($ime);
       $this->duzinaTeksta = $duzinaTeksta;
   }

   public function getTip()
   {
       return 'tekst';
   }
}
