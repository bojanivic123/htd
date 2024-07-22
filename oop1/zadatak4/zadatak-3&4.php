<?php

class Kompanija
{
   public $ime;
   public $sektori = [];

   public function __construct(string $ime)
   {
       $this->ime = $ime;
   }

   public function dodajSektor(Sektor $sektor)
   {
       $this->sektori[] = $sektor;
   }
}

abstract class Sektor
{
   public $ime;
   public $zaposleni = [];

   public function __construct(string $ime)
   {
       $this->ime = $ime;
   }

   public function dodajZaposlenog(Zaposleni $zaposleni)
   {
       $this->zaposleni[] = $zaposleni;
   }
}

class Fabrika extends Sektor implements DefinisanjeStriktnogRadnogVremena
{
   public $radnoVreme = [];
   public $proizvodi = [];

   public function setRadnoVreme(int $od, int $do)
   {
       $this->radnoVreme = [
           'od' => $od,
           'do' => $do
       ];
   }

   public function dodajProizvod(string $proizvod, int $broj = 1)
   {
       if (!isset($this->proizvodi[$proizvod])) {
           $this->proizvodi[$proizvod] = 0;
       }

       $this->proizvodi[$proizvod] += $broj;
   }
}

class ProdajnoMesto extends Sektor implements PravilaOblacenja, DefinisanjeStriktnogRadnogVremena
{
   public $praviloOblacenjaProdajnogMesta;
   public $radnoVreme;
   public $proizvodi = [];

   public function setPraviloOblacenja(string $pravilo)
   {
       $this->praviloOblacenjaProdajnogMesta = $pravilo;
   }

   public function getPraviloOblacenja(): string
   {
       return $this->praviloOblacenjaProdajnogMesta;
   }

   public function setRadnoVreme(int $od, int $do)
   {
       $this->radnoVreme = $od . ' - '. $do;
   }

   public function prodaj(Kupac $kupac, array $proizvodi)
   {
       foreach ($proizvodi as $proizvod) {
           if (!empty($this->proizvodi[$proizvod])) {
               $this->proizvodi[$proizvod]--;
               echo "$proizvod prodat kupcu $kupac->ime <br/>";
           } else {
               echo "$proizvod nema na lageru <br/>";
           }
       }
   }

   public function dodajProizvod(string $proizvod, int $broj = 1)
   {
       if (!isset($this->proizvodi[$proizvod])) {
           $this->proizvodi[$proizvod] = 0;
       }

       $this->proizvodi[$proizvod] += $broj;
   }
}

class OdsekZaNabavke extends Sektor implements ZakazivanjeSastanaka
{
   public $sastanci = [];

   public function zakazatiSastanak(string $datum, string $vreme, string $kontakt)
   {
       $this->sastanci[] = [
           'datum' => $datum,
           'vreme' => $vreme,
           'kontakt' => $kontakt
       ];
   }
}

class OdsekZaMarketing extends Sektor implements PravilaOblacenja, ZakazivanjeSastanaka
{
   public $praviloOblacenja;
   public $sastanci = [];

   public function setPraviloOblacenja(string $pravilo)
   {
       $this->praviloOblacenja = $pravilo;
   }

   public function getPraviloOblacenja(): string
   {
       return $this->praviloOblacenja;
   }

   public function zakazatiSastanak(string $datum, string $vreme, string $kontakt)
   {
       $this->sastanci[] = "$datum $vreme $kontakt";
   }
}

interface PravilaOblacenja
{
   public function setPraviloOblacenja(string $pravilo);
   public function getPraviloOblacenja(): string;
}

interface ZakazivanjeSastanaka
{
   public function zakazatiSastanak(string $datum, string $vreme, string $kontakt);
}

interface DefinisanjeStriktnogRadnogVremena
{
   public function setRadnoVreme(int $od, int $do);
}

class Osoba
{
   public $ime;
   public $prezime;

   public function __construct(string $ime, string $prezime)
   {
       $this->ime = $ime;
       $this->prezime = $prezime;
   }
}

class Zaposleni extends Osoba
{
}

class Kupac extends Osoba
{
}

// Kreirati kompaniju “BenComputers”
$benComputers = new Kompanija('BenComputers');

// Dodati u kompaniju 4 fabrike, 60 prodajnih mesta, 1 odsek za nabavke i 2 odseka za marketing
$fabrike = [];
for ($i = 0; $i < 4; $i++) {
   $fabrike[$i] = new Fabrika('Fabrika ' . $i);
   $benComputers->dodajSektor($fabrike[$i]);
}

$prodajnaMesta = [];
for ($i = 0; $i < 60; $i++) {
   $prodajnaMesta[$i] = new ProdajnoMesto('Prodajna Mesta ' . $i);
   $benComputers->dodajSektor($prodajnaMesta[$i]);
}

$odsekZaNabavke = new OdsekZaNabavke('Odsek Za Nabavke');
$benComputers->dodajSektor($odsekZaNabavke);

$marketing = [];
for ($i = 0; $i < 2; $i++) {
   $marketing[$i] = new OdsekZaMarketing('Odsek Za Marketing ' . $i);
   $benComputers->dodajSektor($marketing[$i]);
}

// U odsecima za marketing postaviti pravilo oblacenja na “poslovno odelo, kravata nije obavezna”
foreach ($marketing as $sektor) {
   $sektor->setPraviloOblacenja('poslovno odelo, kravata nije obavezna');
}

// Zakazati sastanak u odseku za nabavke za 20. 10. 2017. na ime “Mile Teslic”
$odsekZaNabavke->zakazatiSastanak("20. 10. 2017.", "8:00", "Mile Teslic");

// Definisati radno vreme u fabrikama od 8h do 16h
foreach ($fabrike as $sektor) {
   $sektor->setRadnoVreme(8, 16);
}

// Za svako prodajno mesto i fabriku kreirati proizvoljan broj proizvoda na lageru
foreach ($fabrike as $sektor) {
   $sektor->dodajProizvod('tastatura', 50);
   $sektor->dodajProizvod('laptop', 100);
   $sektor->dodajProizvod('monitor', 200);
}

foreach ($prodajnaMesta as $i => $sektor) {
   $sektor->dodajProizvod('tastatura', 5);
   $sektor->dodajProizvod('laptop', 10);
   $sektor->dodajProizvod('monitor', 20);

   // Za svako prodajno mesto dodati po 2 zaposlena
   $sektor->dodajZaposlenog(new Zaposleni('Mile', 'Rajkovic'));
   $sektor->dodajZaposlenog(new Zaposleni('Rajko', 'Milovic'));
}

// Kreirati kupca i simulirati kupovinu latopta i monitora na jednom prodajnom mestu
$kupac = new Kupac('Peca', 'Petrovic');

$prodajnaMesta[0]->prodaj($kupac, ['laptop', 'monitor']);
