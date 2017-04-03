<?php
require_once 'engine.php';
require_once 'transmission_auto.php';
require_once 'transmission_manual.php';

class Car
{
    use Engine;
    use TransmissionManual, TransmissionAuto {
        TransmissionManual::moveBack insteadof TransmissionAuto;
        TransmissionAuto::moveBack as moveBackAuto;
    }

    public $distance;
    public $speed;
    public $direction;
    public $currentPosition = 0;

    public function drive($distance, $speed, $direction)
    {
        $this->distance = $distance;
        $this->direction = $direction;
        $this->speed = $speed;

        //echo 'Start<br>';
        $this->engineStart();
        if ($this->transmission === 'auto'){
            echo 'Используем автоматическую коробку<br>';
            $this->chooseGearAuto();
        } elseif ($this->transmission === 'manual') {
            echo 'Используем ручную коробку<br>';
            $this->chooseGearManual();
        }
        $this->engineRunning();
        $this->engineStop();
    }
}