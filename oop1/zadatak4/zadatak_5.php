<?php

class Soba {
    private static $brojac = 1;
    public $brojSobe;
    public $brojKreveta;
    public $cena;
    public $zauzeta;
    
    public function __construct(int $brojKreveta, int $cena)
    {
        $this->brojSobe = self::$brojac;
        $this->brojKreveta = $brojKreveta;
        $this->cena = $cena;
        $this->zauzeta = false;
        self::$brojac++;
    }
}

class Hotel {
    private $sobe = [];
    
    public function dodajSobu(Soba $soba)
    {
        $this->sobe[] = $soba;
        echo "Dodata je soba broj " . $soba->brojSobe . ", " . $soba->brojKreveta . "K, " . $soba->cena . ".<br>";
    }
    
    private function zauzmiSobu(Soba $soba)
    {
        $soba->zauzeta = true;
        echo "Zauzeta je soba broj " . $soba->brojSobe . ".<br>";

        return $soba->brojSobe;
    }
    
    private function sobeSaNajmanjomCenom($n)
    {
        $pronadjene = [];
        // filtriranje slobodnih soba po broju kreveta, koristimo anonymous funkciju: function ($soba) ...
        $sobe = array_filter($this->sobe, function($soba) use ($n) {
            return $n <= $soba->brojKreveta && !$soba->zauzeta;
        });
        // ako ima slobodnih soba sa odgovarajucim brojem kreveta
        if (count($sobe)) {
            // izdvajamo cene soba u poseban niz
            $ceneSoba = array_map(function ($soba) {
                return $soba->cena;
            }, $sobe);
            // trazimo minimalnu cenu iz niza
            $najjeftinija = min($ceneSoba);
            // filtriranje pronadjenih soba, ostavljamo samo one koje imaju minimalnu cenu
            $pronadjene = array_filter($sobe, function($soba) use ($najjeftinija) {
                return $soba->cena === $najjeftinija;
            });   
        }

        return $pronadjene;
    }
    
    private function sobeSaNajmanjimBrojemKreveta($sobe)
    {
        $pronadjene = [];
        $brojeviKreveta = array_map(function($soba) {
            return $soba->brojKreveta;
        }, $sobe);
        $minBrojKreveta = min($brojeviKreveta);
        $pronadjene = array_filter($sobe, function($soba) use ($minBrojKreveta) {
            return $soba->brojKreveta === $minBrojKreveta;
        });
        
        return $pronadjene;
    }
    
    private function sobaSaNajmanjimBrojem($sobe)
    {
        $pronadjene = [];
        $brojeviSoba = array_map(function($soba) {
            return $soba->brojSobe;
        }, $sobe);
        $minBrojSobe = min($brojeviSoba);
        $pronadjene = array_filter($sobe, function($soba) use ($minBrojSobe) {
            return $soba->brojSobe === $minBrojSobe;
        });
        
        return reset($pronadjene);
    }
    
    public function pronadji(int $n): int
    {
        $pronadjene = $this->sobeSaNajmanjomCenom($n);
        
        // ako je poronadjena samo jedna soba
        if (count($pronadjene) === 1) {
            return $this->zauzmiSobu(reset($pronadjene)); // funkcija reset vraca prvi element niza, ne moze se koristiti $pronadjene[0] jer pri filtriranju ostaju originalni indeksi
        } else if (count($pronadjene) > 1) { // ako je pronadjeno vise soba, pretrazujemo po najmanjem borju kreveta
            $pronadjenePoBrojuKreveta = $this->sobeSaNajmanjimBrojemKreveta($pronadjene);
            if (count($pronadjenePoBrojuKreveta) === 1) {
                return $this->zauzmiSobu(reset($pronadjenePoBrojuKreveta));
            } else { // ako ima vise najjeftinijih soba sa istim brojem kreveta, trazimo sobu sa najmanjim brojem sobe
                $sobaSaNajmanjimBrojem = $this->sobaSaNajmanjimBrojem($pronadjenePoBrojuKreveta);
                return $this->zauzmiSobu($sobaSaNajmanjimBrojem);
            }
        } else {
            echo "Nema pronadjenih soba.<br>";
            return -1;
        }
        
    }
    
    public function zarada(int $n): int
    {
        $zarada = 0;
        $brojSoba = 0;
        foreach ($this->sobe as $soba) {
            if ($n === 0) {
                if ($soba->zauzeta) {
                    $zarada += $soba->cena;
                    $brojSoba++;
                }
            } else {
                if ($soba->zauzeta && $soba->brojKreveta === $n) {
                    $zarada += $soba->cena;
                    $brojSoba++;
                }
            }
        }
        
        if ($brojSoba === 0) {
            echo "Nema zauzetih soba po kriterijumu.<br>";
        } else {
            if ($n === 0) {
                echo "Zarada od svih zauzetih soba: " . $zarada . "<br>";
            } else {
                echo "Zarada od zauzetih soba sa " . $n . " kreveta: " . $zarada . "<br>";
            }
        }
        
        return $zarada;
    }
}

$hotel = new Hotel();
$hotel->dodajSobu(new Soba(2, 3000));
$hotel->dodajSobu(new Soba(3, 4000));
$hotel->dodajSobu(new Soba(3, 4000));
$hotel->dodajSobu(new Soba(2, 3700));
$hotel->dodajSobu(new Soba(4, 3000));
$hotel->dodajSobu(new Soba(5, 3000));
$hotel->dodajSobu(new Soba(3, 4500));

$hotel->pronadji(3);
$hotel->pronadji(3);
$hotel->pronadji(3);
$hotel->pronadji(3);
$hotel->pronadji(2);
$hotel->pronadji(6);

$hotel->zarada(3);
$hotel->zarada(0);
?>