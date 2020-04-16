<?php
include_once "Packet.php";
include_once "Carte.php";
class Main extends Packet
{      
        /**
         * diamps=> Careaux, hearts=> Coeurs, spades=>, clubs=>Trèfle
         */
        private $couleurs = ['diams', 'hearts', 'spades', 'clubs'];
        /**
         * j=>Valet, q=>Dame, k=>Roi
         */
        private $valeurs = ["As", "2", "3", "4", "5", "6", "7",  "8", "9", "10", "j", "q", "k"];

public function __construct() {
    foreach($this->couleurs as $idColor=>$couleur) {
        foreach ($this->valeurs as $idValue=>$valeur) {
            $cards[] = new Carte($idColor, $idValue);
        }

    }
    parent::__construct($cards);
}

public function getColors(): array{
    return $this->couleurs;
    }
    
public function getValues() : array{
        return $this->valeurs;
    }


}