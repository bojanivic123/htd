<?php

abstract class Instrument {

    protected static $brojac = 0;
    protected $ime;
    protected $tip;
    protected $zice= false;
    protected $dugmici = false;
    protected $udaraljke = false;
    protected $osnova;

    const OSNOVA_METAL = "metal";
    const OSNOVA_PLASTIKA = "plastika";
    const OSNOVA_DRVO = "drvo";

    public function __construct() 
    {
        self::$brojac++;
    }

    protected function dodatNoviInstrument()
    {
        // ispis koji koristimo nakon dodeljivanja imena novom instrumentu
        echo "Dodat novi instrument " . $this->ime . ". Ukupan broj instrumenata: " . self::$brojac . "<br>";
    }

    public function ispisi()
    {
        echo "<h4>" . get_class($this) . ":</h4>";
        $this->imeInstrumenta();
        $this->tipInstrumenta();
        $this->imaZice();
        $this->imaDugmice();
        $this->imaUdaraljke();
        $this->osnovaOdMetala();
        $this->osnovaOdPlastike();
        $this->osnovaOdDrveta();
    }

    public function imeInstrumenta()
    {
        echo "Naziv: " . $this->ime . "<br>";
    }
    public function tipInstrumenta()
    {
        echo "Tip: " . $this->tip . "<br>";
    }
    public function sviraj()
    {
        echo "Instrument " . $this->ime . " svira.<br>";
    }
    public function nastimujSe()
    {
        echo "Instrument " . $this->ime . " je nastiman.<br>";
    }
    public function imaZice()
    {
        echo "Ima zice: ";
        if ($this->zice) {
            echo "da";
        } else {
            echo "ne";
        }
        echo "<br>";
    }
    public function imaDugmice()
    {
        echo "Ima dugmice: ";
        if ($this->dugmici) {
            echo "da";
        } else {
            echo "ne";
        }
        echo "<br>";
    }
    public function imaUdaraljke()
    {
        echo "Ima udaraljke: ";
        if ($this->udaraljke) {
            echo "da";
        } else {
            echo "ne";
        }
        echo "<br>";
    }
    public function osnovaOdMetala()
    {
        echo "Osnova od metala: ";
        if ($this->osnova === self::OSNOVA_METAL) {
            echo "da";
        } else {
            echo "ne";
        }
        echo "<br>";
    }
    public function osnovaOdPlastike()
    {
        echo "Osnova od plastike: ";
        if ($this->osnova === self::OSNOVA_PLASTIKA) {
            echo "da";
        } else {
            echo "ne";
        }
        echo "<br>";
    }
    public function osnovaOdDrveta()
    {
        echo "Osnova od drveta: ";
        if ($this->osnova === self::OSNOVA_DRVO) {
            echo "da";
        } else {
            echo "ne";
        }
        echo "<br>";
    }
}

abstract class ZicaniInstrument extends Instrument {
    public function __construct()
    {
        parent::__construct();
        $this->zice = true;
        $this->tip = "zicani instrument";
    }
}

abstract class DuvackiInstrument extends Instrument {
    public function __construct()
    {
        parent::__construct();
        $this->dugmici = true;
        $this->tip = "duvacki instrument";
    }
}

abstract class UdarackiInstrument extends Instrument {
    public function __construct()
    {
        parent::__construct();
        $this->udaraljke = true;
        $this->tip = "udaracki instrument";
    }
}

class Violina extends ZicaniInstrument {
    protected static $brojacViolina = 0; // brojaci za kreiranje imena instrumenata, posto su konstruktori bez argumenata
    public function __construct()
    {
        parent::__construct();
        self::$brojacViolina++;
        $this->ime = get_class($this) . self::$brojacViolina;
        $this->osnova = self::OSNOVA_DRVO; // koristimo konstante iz prve apstraktne klase Instrument
        $this->dodatNoviInstrument();
    }
}

class Viola extends ZicaniInstrument {
    protected static $brojacViola = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacViola++;
        $this->ime = get_class($this) . self::$brojacViola;
        $this->osnova = self::OSNOVA_DRVO;
        $this->dodatNoviInstrument();
    }
}

class Violoncelo extends ZicaniInstrument {
    protected static $brojacVioloncela = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacVioloncela++;
        $this->ime = get_class($this) . self::$brojacVioloncela;
        $this->osnova = self::OSNOVA_DRVO;
        $this->dodatNoviInstrument();
    }
}

class Harfa extends ZicaniInstrument {
    protected static $brojacHarfa = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacHarfa++;
        $this->ime = get_class($this) . self::$brojacHarfa;
        $this->osnova = self::OSNOVA_DRVO;
        $this->dodatNoviInstrument();
    }
}

class Truba extends DuvackiInstrument {
    protected static $brojacTruba = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacTruba++;
        $this->ime = get_class($this) . self::$brojacTruba;
        $this->osnova = self::OSNOVA_METAL;
        $this->dodatNoviInstrument();
    }
}

class Tuba extends DuvackiInstrument {
    protected static $brojacTuba = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacTuba++;
        $this->ime = get_class($this) . self::$brojacTuba;
        $this->osnova = self::OSNOVA_METAL;
        $this->dodatNoviInstrument();
    }
}

class Horna extends DuvackiInstrument {
    protected static $brojacHorna = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacHorna++;
        $this->ime = get_class($this) . self::$brojacHorna;
        $this->osnova = self::OSNOVA_METAL;
        $this->dodatNoviInstrument();
    }
}

class Flauta extends DuvackiInstrument {
    protected static $brojacFlauta = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacFlauta++;
        $this->ime = get_class($this) . self::$brojacFlauta;
        $this->osnova = self::OSNOVA_DRVO;
        $this->dodatNoviInstrument();
    }
}

class Kontrabas extends ZicaniInstrument {
    protected static $brojacKontrabasa = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacKontrabasa++;
        $this->ime = get_class($this) . self::$brojacKontrabasa;
        $this->osnova = self::OSNOVA_DRVO;
        $this->dodatNoviInstrument();
    }
}

class Bubanj extends UdarackiInstrument {
    protected static $brojacBubnjeva = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacBubnjeva++;
        $this->ime = get_class($this) . self::$brojacBubnjeva;
        $this->osnova = self::OSNOVA_PLASTIKA;
        $this->dodatNoviInstrument();
    }
}

class Ksilofon extends UdarackiInstrument {
    protected static $brojacKsilofona = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacKsilofona++;
        $this->ime = get_class($this) . self::$brojacKsilofona;
        $this->osnova = self::OSNOVA_PLASTIKA;
        $this->dodatNoviInstrument();
    }
}

class Saksofon extends DuvackiInstrument {
    protected static $brojacSaksofona = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacSaksofona++;
        $this->ime = get_class($this) . self::$brojacSaksofona;
        $this->osnova = self::OSNOVA_METAL;
        $this->dodatNoviInstrument();
    }
}

class Trombon extends DuvackiInstrument {
    protected static $brojacTrombona = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacTrombona++;
        $this->ime = get_class($this) . self::$brojacTrombona;
        $this->osnova = self::OSNOVA_METAL;
        $this->dodatNoviInstrument();
    }
}

class Timpani extends UdarackiInstrument {
    protected static $brojacTimpana = 0;
    public function __construct()
    {
        parent::__construct();
        self::$brojacTimpana++;
        $this->ime = get_class($this) . self::$brojacTimpana;
        $this->osnova = self::OSNOVA_METAL;
        $this->dodatNoviInstrument();
    }
}

$orkestar = [
    new Violina(), 
    new Truba(), 
    new Bubanj(), 
    new Violina(),
    new Violina(),
    new Violina(),  
    new Truba(), 
    new Ksilofon(), 
    new Ksilofon(),
    new Trombon(),
    new Flauta(),
    new Viola(),
    new Violoncelo(),
    new Flauta(),
    new Kontrabas,
    new Harfa(),
    new Flauta(),
    new Saksofon(),
    new Timpani(),
    new Saksofon(),
    new Tuba(),
    new Timpani(),
    new Horna()
];

function osobine(Instrument $instrument)
{
    $instrument->ispisi();
}

function osobineSvihInstrumenata($orkestar)
{
    echo "<h3>Osobine</h3>";
    foreach ($orkestar as $instrument) {
        osobine($instrument);
    }
}

function nastimujSve($orkestar)
{
    echo "<h3>Stimanje</h3>";
    foreach ($orkestar as $instrument) {
        $instrument->nastimujSe();
    }
}

function svirajSve($orkestar)
{
    echo "<h3>Sviranje</h3>";
    foreach ($orkestar as $instrument) {
        $instrument->sviraj();
    }
}

osobineSvihInstrumenata($orkestar);
nastimujSve($orkestar);
svirajSve($orkestar);

?>