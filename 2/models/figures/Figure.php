<?php

namespace app\models\figures;

use app\interfaces\IFigure;

abstract class Figure implements IFigure
{
    public function  info()
    {

        echo "Фигура: {$this->name} <br>";
        $this->getSize();
    }
}