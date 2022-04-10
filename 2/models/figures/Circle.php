<?php

namespace app\models\figures;

class Circle extends Figure
{
    public $name = 'круг';
    public $r;

    public function __construct($r)
    {
        $this->r = $r;
    }

    public function calculateArea()
    {
        $S = 3.14 * pow($this->r, 2);
        echo "Площадь {$this->name}а: {$S} кв.см <br>";
    }

    public function calculatePerimeter()
    {
        $P = 2 * $this->r * 3.14;
        echo "Периметр {$this->name}а: {$P} см <br>";
    }

    public function getSize()
    {
        echo "Радиус: {$this->r} см <br>";
    }
}