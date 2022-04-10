<?php

namespace app\models\figures;

class Triangle extends Figure
{
    public $name = 'Равнобедренный триугольник';
    public $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function calculateArea()
    {
        $S = 0.5 * $this->a * $this->a * sin(deg2rad(60));
        echo "Площадь {$this->name}а: {$S} кв.см <br>";
    }

    public function calculatePerimeter()
    {
        $P = $this->a * 3;
        echo "Периметр {$this->name}а: {$P} см <br>";
    }

    public function getSize()
    {
        echo "Длина всех сторон: {$this->a} см <br>";
    }
}