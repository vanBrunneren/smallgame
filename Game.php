<?php
/**
 *
 *
 * Author:  Pascal Brunner <info@pascalbrunner.ch>
 * Date:    12.06.19
 * Time:    08:45
 */

class Game
{

    public $dice;
    public $players;
    public $colors = array('yellow', 'red', 'green', 'blue', 'orange', 'black');

    public function __construct()
    {
        $this->dice = new Dice();
    }

    public function start()
    {

        $this->players = array(
            new Player('Alice', $this->generateCards()),
            new Player('Bob', $this->generateCards()),
            new Player('Carol', $this->generateCards())
        );

        foreach($this->players as $player) {
            echo "<br>" . $player->name . " hat folgende Karten: <br>";
            foreach($player->cards as $card) {
                echo $card->color . "<br>";
            }
        }

        $play = true;
        $key = 0;

        while($play) {

            $activePlayer = $this->players[$key];

            $activePlayer->roll($this->dice);
            if($activePlayer->getDisabledCards() == 0) {
                $play = false;
                continue;
            }

            if($key == 2) {
                $key = -1;
            }

            $key++;

        }

        echo "<br><br>";
        echo "Der Sieger ist: " . $this->players[$key]->name . "<br>";

        switch($key) {

            case 0:
                $this->players[1]->getDisabledCards();
                $this->players[2]->getDisabledCards();
                break;

            case 1:
                $this->players[0]->getDisabledCards();
                $this->players[2]->getDisabledCards();
                break;

            case 2:
                $this->players[0]->getDisabledCards();
                $this->players[1]->getDisabledCards();
                break;

        }

    }

    public function generateCards()
    {
        $cards = array();
        $key = rand(0, 5);
        $splicedColors = $this->colors;
        unset($splicedColors[$key]);

        foreach($splicedColors as $color) {
            $cards[] = new Card($color);
        }

        return $cards;

    }

}