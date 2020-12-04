<?php
namespace Classes;
use Classes\Carte;
use Classes\Packet;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
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
public  function getCardsFins(){
        
        try {
            // le dossier ou on trouve les templates
            $loader = new \Twig\Loader\FilesystemLoader('../templates');
        
            // initialiser l'environement Twig
            $twig = new \Twig\Environment($loader);
        
            // load template
            $template = $twig->load('cards.html');
              $arrayCouleurs = $this->getColors();
              $arrayValeurs = $this->getValues();
              $this->shuffleCards();
              $CartesNonTriees = $this->tireCards(10);
              $this->sortCards();
              $CartesTriees = $this->tireCards(10);
               asort($CartesTriees);
               $cartetriees = $CartesTriees;
            // set template variables
            // render template
            echo $template->render(array(
                'arrayCouleurs' => $arrayCouleurs,
                'arrayValeurs' => $arrayValeurs,
                'cartesNonTriees' => $CartesNonTriees,
                'carteTriees'=> $cartetriees
            ));
        
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
        }

}