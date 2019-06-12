<?php
/**
 *
 *
 * Author:  Pascal Brunner <info@pascalbrunner.ch>
 * Date:    12.06.19
 * Time:    08:44
 */

class Player
{

    public $name;
    public $cards = array();

    public function __construct($name, $cards)
    {

        $this->name = $name;
        $this->cards = $cards;

    }

    public function roll($dice)
    {

        echo "<br>" . $this->name . " würfelt <br>";

        $diceColor = $dice->roll();

        echo "Es ist: " . $diceColor . "<br>";

        foreach($this->cards as $card) {
            if($card->hidden && $card->color == $diceColor) {
                $card->toggle();
                echo "Die " . $card->color . " Karte wird umgedreht <br>";
            }
        }

    }

    public function getDisabledCards()
    {
        $cards = 0;
        foreach($this->cards as $card) {

            if($card->hidden) {
                $cards++;
            }

        }

        echo $this->name . " hat noch " . $cards . " verdeckte Karte" . ($cards != 1 ?  "n " : "") .  "<br>";

        return $cards;
    }

}