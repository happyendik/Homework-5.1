<?php
require_once 'car.php';

class Niva extends Car
{
    public $insert;

    function __construct($color, $type, $transmission)
    {
        $this->color = $color;
        $this->type = $type;
        $this->transmission = $transmission;

        if ($this->transmission === 'auto') {
            $this->insert = 'автоматической';
        } elseif ($this->transmission === 'manual'){
            $this->insert = 'механической';
        }

        echo "<h4>С конвейера сошел новый $this->color автомобиль типа: $this->type с $this->insert коробкой передач!</h4>";

    }
}