<?php 
abstract class Packet
{
// Packet des cartes (exemple 52 cartes)
protected $cards; 
protected $listCards;

public function __construct(array $Cards) {
    $this->cards = $Cards;
}
/**
 * Melange les cartes (aléatoirement)
 */
public function shuffleCards(): void {
    shuffle($this->cards);
}

/**
 * cette fonction recupere et supprime la derniere carte de packet
 */
protected function popCard(): Carte{
    //if(!count($this->cards)>=1)
   // throw new Exception('Aucune carte dans le packet');
    return array_pop($this->cards);

    }

/**
 * L'ajout d'une carte à la liste des cartes tirées
 */
private function addCard(Carte $card) : void{
    $this->listCards[] = $card;
    }

    /**
     * get count cards
     */
    public function getCards(){
        return count($this->listCards);
    }


    /** recupere premiere carte */
    public function getFirstCard(){
        return $this->listCards[0];
    }

/**
 * Remplire la liste des cartes (tirer la main)
 */
private function setCards(int $num) :void {
    foreach(range(0,$num-1) as $val) {
        $this->addCard($this->popCard());
    }
}

public function tireCards(int $num) :array {
    $arrayCards = array();
    $this->setCards($num);
    foreach(range(0,$num-1) as $val) {
        $arrayCards[] = [$this->listCards[$val]->getColor(), $this->listCards[$val]->getValue()];
    }
    return $arrayCards;
}

/**
 * Compare deux cartes (Je fais le choix suivant : la valeur est plus importante que la valeur)
 */
private function compareCards(Carte $card1, Carte $card2 ): bool{
    if($card1->getColor() < $card2->getColor())
    return true;
    if($card1->getColor() > $card2->getColor())
    return false;
    return $card1->getValue() < $card2->getValue(); 
    }

/**
 * Trie les cartes tirées
 */
public function sortCards() :void{
    usort($this->listCards, array($this,'compareCards'));
}

}