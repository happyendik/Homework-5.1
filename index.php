<?php
error_reporting(0);
// все классы трейты интерфейсы необходимо разнести по отдельным файлам
// остальное все хорошо
trait backGear
{
    public $znak; // что это за назание переменной?  можеть быть sign ? переименовать
    public function moveBack()
    {
        echo "Едем $this->direction<br>";
        $this->znak = -1;
    }
}

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
            $this->znak = 1;
        } elseif ($this->direction === 'назад') {
            $this->moveBack();
        } else {
            echo 'Непонятно, вперед или назад?<br>';
        }
    }
}

trait TransmissionAuto
{
    use backGear;

    public function chooseGearAuto()
    {
        if ($this->direction === 'вперед') {
            echo "едем $this->direction<br>";
            $this->znak = 1;
        } elseif ($this->direction === 'назад') {
            $this->moveBackAuto();
        } else {
            echo 'Непонятно, вперед или назад?<br>';
        }
    }
}

trait Engine
{
    public $hp = 10;  //лошадиные силы
    public $currentTemperature = 0;

    public function engineStart()
    {
        echo 'Запускаем двигатель<br>';

    }

    public function engineRunning(){
        if ($this->speed <= $this->hp * 2) {
            $m10 = $this->distance / 10; // неполное условие
            for ($i = 1; $i <= $m10; $i++) {
                $i10 = $i * 10;
                echo $i10.' метров -->  ';
                echo 'temperature='.$this->currentTemperature += 5;
                if ($this->currentTemperature >= 90) {
                    $this->engineCooling();
                }
                echo '<br>';
            }
            echo '<b>Текущая позиция относительно точки старта:</b> '.$this->currentPosition += $this->distance * $this->znak;
        } else {
            echo 'Опомнись! Твоя телега столько не выжмет!<br>';
        }
    }

    public function engineCooling()
    {
        $this->currentTemperature -= 10;
        echo ' Система охлаждение понизила Т двигателя на 10 С';
    }

    public function engineStop()
    {
        echo '  Движок выключили. Температура обнулилась  ';
        $this->currentTemperature = 0;
    }
}

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

$niva1 = new Niva('красный', 'offroad', 'auto');

$niva1->drive(200, 10, 'назад');
echo '<br><br><hr>';
$niva2 = new Niva('синий', 'лимузин', 'manual');

$niva2->drive(200, 10, 'вперед');