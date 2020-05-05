<?php
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase{

    /** @test */
    public function TestNombreCardsTest(){
    $main = new Main();
    $main->shuffleCards();
    $CartesNonTriees = $main->tireCards(12);
      $this->assertEquals(
        12,
        $main->getCards()
    );
    $this->assertInstanceOf(
      Carte::class,
      $main->getFirstCard()
  );

    } 
}