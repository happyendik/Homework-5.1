<?php

trait backGear
{
    public $sign; // что это за назание переменной?  можеть быть sign ? переименовать
    public function moveBack()
    {
        echo "Едем $this->direction<br>";
        $this->sign = -1;
    }
}
