<?php
/**
 *
 *
 * Author:  Pascal Brunner <info@pascalbrunner.ch>
 * Date:    12.06.19
 * Time:    08:45
 */

class Dice
{

    public $colors = array('yellow', 'red', 'green', 'blue', 'orange', 'black');

    public function roll()
    {
        return $this->colors[array_rand($this->colors)];
    }

}