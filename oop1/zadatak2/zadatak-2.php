<?php

class GeometrijskiObjekat {
   public $povrsina;

   public function __construct($povrsina)
   {
       $this->povrsina = $povrsina;
   }

   public function getPovrsina()
   {
       return $this->povrsina;
   }
}

class Objekat2D extends GeometrijskiObjekat {
   public $obim;

   public function __construct($povrsina, $obim)
   {
       parent::__construct($povrsina);
       $this->obim = $obim;
   }

   public function getObim()
   {
       return $this->obim;
   }
}

class Objekat3D extends GeometrijskiObjekat {
   public $zapremina;

   public function __construct($povrsina, $zapremina)
   {
       parent::__construct($povrsina);
       $this->zapremina = $zapremina;
   }

   public function getZapremina()
   {
       return $this->zapremina;
   }
}

class Pravougaonik extends Objekat2D {
   public $a;
   public $b;

   public function __construct($a, $b)
   {
       parent::__construct($a * $b, 2 * ($a+$b));
       $this->a = $a;
       $this->b = $b;
   }
}

class Kvadrat extends Pravougaonik {
   public function __construct($stranica)
   {
       parent::__construct($stranica, $stranica);
   }
}

class Krug extends Objekat2D {
   public $poluprecnik;

   public function __construct($poluprecnik)
   {
       $povrsina = $poluprecnik * $poluprecnik * 3.14;
       $obim = 2 * $poluprecnik * 3.14;

       parent::__construct($povrsina, $obim);
       $this->poluprecnik = $poluprecnik;
   }
}

class Lopta extends Objekat3D {
   public $poluprecnik;

   public function __construct($poluprecnik)
   {
       $povrsina = 4 * $poluprecnik * $poluprecnik * 3.14;
       $zapremina = (4 / 3) * $poluprecnik  * $poluprecnik * $poluprecnik * 3.14;

       parent::__construct($povrsina, $zapremina);
       $this->poluprecnik = $poluprecnik;
   }
}

class Kocka extends Objekat3D {
   public $stranica;

   public function __construct($stranica)
   {
       parent::__construct(
           6 * $stranica * $stranica,
           $stranica * $stranica * $stranica
       );
       $this->stranica = $stranica;
   }
}

$kv1 = new Kvadrat(5);
echo "Povrsina kvadrata je: " . $kv1->getPovrsina() . "<br/>";
echo "Obim kvadrata je: " . $kv1->getObim() . "<br/>";

$pu1 = new Pravougaonik(4,5);
echo "Povrsina pravougaonika je: " . $pu1->getPovrsina() . "<br/>";
echo "Obim pravougaonika je: " . $pu1->getObim() . "<br/>";

$kc1 = new Kocka(3);
echo "Povrsina kocke je: " . $kc1->getPovrsina() . "<br/>";
echo "Zapremina kocke je: " . $kc1->getZapremina() . "<br/>";
