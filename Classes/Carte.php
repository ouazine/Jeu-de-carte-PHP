<?php
namespace Classes;
class Carte 
{
    private $valeur;
    private $couleur;


    public function __construct(int $couleur , int $valeur) {
            $this->valeur   = $valeur;
            $this->couleur = $couleur;
    }

    public function getColor() : int {
            return $this->couleur;
    }
    public function getValue() : int {
        return $this->valeur;
}



}