<?php
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
            echo '<b>Текущая позиция относительно точки старта:</b> '.$this->currentPosition += $this->distance * $this->sign;
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