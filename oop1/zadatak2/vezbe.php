<?php

class Vozilo {
   public $tezina;
   public $nosivost;
   public $vrsta_kretanja;

   public function __construct($tezina, $nosivost, $vrsta_kretanja)
   {
       $this->tezina = $tezina;
       $this->nosivost = $nosivost;
       $this->vrsta_kretanja = $vrsta_kretanja;
   }

   public function kreni()
   {
       echo "Vozilo krece <br/>";
   }
}

class MotornoVozilo extends Vozilo {
   public $vrst_goriva;
   public $kubikaza;

   public function __construct($tezina, $nosivost, $vrsta_kretanja, $vrsta_goriva, $kubikaza)
   {
       parent::__construct($tezina, $nosivost, $vrsta_kretanja);
       $this->vrst_goriva = $vrsta_goriva;
       $this->kubikaza = $kubikaza;
   }

   public function kreni()
   {
       echo "Motorno vozilo krece <br/>";
   }
}

class Automobil extends MotornoVozilo {
   public $broj_vrata;

   public function __construct($tezina, $nosivost, $vrsta_kretanja, $vrsta_goriva, $kubikaza, $broj_vrata)
   {
       parent::__construct($tezina, $nosivost, $vrsta_kretanja, $vrsta_goriva, $kubikaza);
       $this->broj_vrata = $broj_vrata;
   }

   public function kreni()
   {
       echo "Automobil krece <br/>";
   }
}

class Autobus extends MotornoVozilo {
   public $broj_sedista;

   public function __construct($tezina, $nosivost, $vrsta_kretanja, $vrsta_goriva, $kubikaza, $broj_sedista)
   {
       parent::__construct($tezina, $nosivost, $vrsta_kretanja, $vrsta_goriva, $kubikaza);
       $this->broj_sedista = $broj_sedista;
   }
}

class Motocikl extends MotornoVozilo {
   public $sirina_guma;

   public function __construct($tezina, $nosivost, $vrsta_kretanja, $vrsta_goriva, $kubikaza, $sirina_guma)
   {
       parent::__construct($tezina, $nosivost, $vrsta_kretanja, $vrsta_goriva, $kubikaza);
       $this->sirina_guma = $sirina_guma;
   }
}

class Limuzina extends Automobil {
   public $duzina_limuzine;

   public function __construct($tezina, $nosivost, $vrsta_kretanja, $vrsta_goriva, $kubikaza, $broj_vrata, $duzina_limuzine)
   {
       parent::__construct($tezina, $nosivost, $vrsta_kretanja, $vrsta_goriva, $kubikaza, $broj_vrata);
       $this->duzina_limuzine = $duzina_limuzine;
   }

   public function kreni()
   {
       echo "Limuzina krece <br/>";
   }
}

class Bicikl extends Vozilo {
   public $broj_siceva;

   public function __construct($tezina, $nosivost, $vrsta_kretanja, $broj_siceva)
   {
       parent::__construct($tezina, $nosivost, $vrsta_kretanja);
       $this->broj_siceva = $broj_siceva;
   }
}

$automobil1 = new Automobil(1000, 3000, 'zemlja', 'benzin', 1900, 5);
$limuzina1 = new Limuzina(2000, 6000, 'zemlja', 'benzin', 2900, 10, 8000);
$bicikl1 = new Bicikl(20, 150, 'zemlja', 2);

$automobil1->kreni();
$limuzina1->kreni();
$bicikl1->kreni();
