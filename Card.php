<?php
/**
 *
 *
 * Author:  Pascal Brunner <info@pascalbrunner.ch>
 * Date:    12.06.19
 * Time:    08:45
 */

class Card
{

    public $color;
    public $hidden;

    public function __construct($color)
    {
        $this->hidden = true;
        $this->color = $color;
    }

    public function toggle()
    {
        $this->hidden = false;
    }

}