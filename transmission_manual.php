<?php
require_once 'backgear.php';

trait TransmissionManual
{
    use backGear;

    public function chooseGearManual()
    {
        if ($this->direction === 'вперед') {
            if ($this->speed >= 20) {
                echo 'Включаем вторую передачу<br>';
            } elseif ($this->speed > 0) {
                echo 'Включаем первую передачу<br>';
            } else {
                echo 'Введено что-то не понятное?<br>';
            }
            echo "Едем $this->direction<br>";
            $this->sign = 1;
        } elseif ($this->direction === 'назад') {
            $this->moveBack();
        } else {
            echo 'Непонятно, вперед или назад?<br>';
        }
    }
}