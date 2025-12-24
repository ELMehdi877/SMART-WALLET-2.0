<?php
class voiture{
    //proprietés (attributes)
    public $marque;
    public $color;
    public $prix;

    //methode
    // public function demarrer(){
    //     echo 'la marque de votre voiture : '.$this->marque.'<br>' .'sont couleur est : '.$this->color.'<br>' .'sont prix est : '.$this->prix;   
    //  }
      public function __construct($mar,$col,$pr){
        $this->marque = $mar;
        $this->color = $col;
        $this->prix = $pr;
        echo 'la marque de votre voiture : '.$this->marque.'<br>' .'sont couleur est : '.$this->color.'<br>' .'sont prix est : '.$this->prix;   
     }
}

$mavoiture = new voiture('BWM','vert',120);
// $mavoiture->marque = 'BMW';
// $mavoiture->color = 'vert';
// $mavoiture->prix = 120;
// $mavoiture->demarrer();
