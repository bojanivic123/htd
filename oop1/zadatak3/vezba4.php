<?php 

interface Prenosivo {
   public function spakuj();
   public function prenesi($pozicija);
   public function raspakuj();
}

class Racunar implements Prenosivo {

   public function spakuj() {
       return "Racunar spakovan u kutiju <br/>";
   }

   public function prenesi($pozicija) {
       return "Racunar prenesen na poziciju $pozicija<br/>";
   }

   public function raspakuj() {
       return "Racunar raspakovan <br/>";
   }
}

class Krevet implements Prenosivo {

   public function spakuj() {
       return "Krevet rastavljen u delove <br/>";
   }

   public function prenesi($pozicija) {
       return "Delovi kreveta preneseni na poziciju $pozicija<br/>";
   }

   public function raspakuj() {
       return "Krevet sastavljen <br/>";
   }
}

$krevet = new Krevet();
$racunar = new Racunar();

echo $krevet->spakuj();
echo $racunar->spakuj();

echo $krevet->prenesi('Soba 23');
echo $racunar->prenesi('Soba 23');

echo $krevet->raspakuj();
echo $racunar->raspakuj();
