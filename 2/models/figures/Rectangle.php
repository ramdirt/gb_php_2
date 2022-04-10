<?php

namespace app\models\figures;

class Rectangle extends Figure
{
    public $name = 'прямоугольник';
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateArea()
    {
        $S = $this->x * $this->y;
        echo "Площадь {$this->name}а: {$S} кв.см <br>";
    }

    public function calculatePerimeter()
    {
        $P = 2 * ($this->x * $this->y);
        echo "Периметр {$this->name}а: {$P} см <br>";
    }

    public function getSize()
    {
        echo "Длина: {$this->x} см <br>Ширина: {$this->y} см <br>";
    }
}