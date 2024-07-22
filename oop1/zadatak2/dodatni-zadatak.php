<?php

class Osoba {
    protected $ime, $prezime, $datumRodjenja;

    public function __construct($ime, $prezime, $datumRodjenja)
    {
    $this->ime = $ime;
    $this->prezime = $prezime;
    $this->datumRodjenja = $datumRodjenja;
    }
}

class Pacijent extends Osoba {
    private $izabraniDoktor, $recepti = [], $pregledi = [];

    public function __construct($ime, $prezime, $datumRodjenja)
    {
        parent::__construct($ime, $prezime, $datumRodjenja);
    }

    public function izaberiDoktora(Doktor $doktor)
    {
        $doktor->dodajPacijenta($this);
        $this->izabraniDoktor = $doktor;
    }

    public function dodajPregled(Pregled $pregled)
    {
        $this->pregledi[] = $pregled;
    }

    public function dodajRecept(Recept $recept)
    {
        $this->recepti[] = $recept;
    }
}

class Doktor extends Osoba {
    private $specijalizacija, $sestra, $pacijenti = [], $pregledi = [], $recepti = [];

    public function __construct($ime, $prezime, $datumRodjenja, $specijalizacija)
    {
        parent::__construct($ime, $prezime, $datumRodjenja);
        $this->specijalizacija = $specijalizacija;
    }

    public function dodajPacijenta(Pacijent $pacijent)
    {
        $this->pacijenti[] = $pacijent;
    }

    public function dodeliSestru(Sestra $sestra)
    {
        $sestra->dodajDoktora($this);
        $this->sestra = $sestra;
    }

    public function zakaziPregled(Pregled $pregled)
    {
        $this->pregledi[] = $pregled;
        $pregled->odrediVreme($this);
    }

    public function prepisiRecept(Pacijent $pacijent, $lek, $kolicina)
    {
        $noviRecept = new Recept($this, $pacijent, $lek, $kolicina);
        $this->recepti[] = $noviRecept;
        $pacijent->dodajRecept[] = $noviRecept;
    }

}

class Sestra extends Osoba {
    private $doktor;

    public function __construct($ime, $prezime, $datumRodjenja)
    {
        parent::__construct($ime, $prezime, $datumRodjenja);
    }

    public function dodajDoktora(Doktor $doktor)
    {
        $this->doktor = $doktor;
    }
}

class Pregled {
    private $doktor, $ordinacija, $pacijent, $vreme;

    public function __construct(Pacijent $pacijent)
    {
        $this->pacijent = $pacijent;
        $pacijent->dodajPregled($this);
    }

    public function odrediVreme(Doktor $doktor)
    {
        $this->doktor = $doktor;
        $this->vreme = (new DateTime())->format('d.m.Y H:i');
    }

    public function odrediOrdinaciju(Ordinacija $ordinacija)
    {
        $this->ordinacija = $ordinacija;
        $ordinacija->dodajPregled($this);
    }

}

class Recept {
    private $pacijent, $doktor, $lek, $kolicina;

    public function __construct(Doktor $doktor, Pacijent $pacijent, $lek, $kolicina)
    {
        $this->doktor = $doktor;
        $this->pacijent = $pacijent;
        $this->lek = $lek;
        $this->kolicina = $kolicina;
    }
}
class Ordinacija {
    private $grad, $ime, $pregledi = [];

    public function __construct($grad, $ime)
    {
        $this->grad = $grad;
        $this->ime = $ime;
    }

    public function dodajPregled(Pregled $pregled)
    {
        $this->pregledi = $pregled;
    }
}

$ordinacija = new Ordinacija('Novi Sad', 'Poliklinika Boskovic');
$drMarkovic = new Doktor('Dragan',  'Markovic', 1965, 'kardiolog');
$olivera = new Sestra('Olivera', 'Popadic', 1977);
$drMarkovic->dodeliSestru($olivera);

$gosnZeljkovic = new Pacijent('Goran', 'Zeljkovic', 1960);
$gosnZeljkovic->izaberiDoktora($drMarkovic);

$ultrazvukSrca = new Pregled($gosnZeljkovic);
$drMarkovic->zakaziPregled($ultrazvukSrca);
$ultrazvukSrca->odrediOrdinaciju($ordinacija);

$drMarkovic->prepisiRecept($gosnZeljkovic, 'Cardiopirin', '3mg');

function dump($x)
{
    echo '<pre>';
    var_dump($x);
    echo '<pre>';
}
dump($ordinacija);
dump($drMarkovic);
dump($olivera);
dump($gosnZeljkovic);
dump($ultrazvukSrca);