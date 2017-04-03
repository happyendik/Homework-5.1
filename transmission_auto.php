<?php
require_once 'backgear.php';

trait TransmissionAuto
{
    use backGear;

    public function chooseGearAuto()
    {
        if ($this->direction === 'вперед') {
            echo "едем $this->direction<br>";
            $this->sign = 1;
        } elseif ($this->direction === 'назад') {
            $this->moveBackAuto();
        } else {
            echo 'Непонятно, вперед или назад?<br>';
        }
    }
}
