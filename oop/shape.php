<?php

abstract class Shape
{
    protected $filled;
    protected $color = "RED";
    public function __constructor($filled, $color)
    {
        $this->filled = $filled;
        $this->color = $color;
    }

    public function getFilled()
    {
        return $this->filled;
    }

    public function setFilled($value)
    {
        $this->filled = $value;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($value)
    {
        $this->color = $value;
    }

    public function draw()
    {
        echo "Shape: {$this->color}";
    }
    public abstract function getArea();
}


class Rectangle extends Shape implements Resizeable
{
    private $width;
    private $height;

    public function __construct($filled, $color, $w, $h)
    {
        parent::__constructor($filled, $color);
        $this->width = $w;
        $this->height = $h;
    }

    public function __toString()
    {
        // return "Rectangle: width: " . $this->width . " height: " . $this->height;
        return "Rectangle: width: {$this->width} height: {$this->height} 
        filled: {$this->filled} color : {$this->color}";
    }

    public function draw()
    {
        echo "Shape: color - {$this->color}, w - {$this->width}, h - {$this->height}";
    }

    public function getArea()
    {
        return $this->width * $this->height;
    }
    public function resize($percent)
    {
        $this->width = $this->width -  $this->width * $percent / 100;
        $this->height = $this->height - $this->height * $percent / 100;
    }
}


class Circle extends Shape implements Resizeable
{
    private $radius;
    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius($value)
    {
        $this->radius = $value;
    }
    public function __construct($filled, $color, $radius)
    {
        parent::__constructor($filled, $color);
        $this->radius = $radius;
    }

    public function getArea()
    {
        return 3.14 * $this->radius * $this->radius;
    }

    public function resize($percent)
    {
        $this->radius = $this->radius - $this->radius * $percent / 100;
    }
}

interface Resizeable
{
    function resize($percent);
}

$r1 = new Rectangle(true, "BLUE", 5, 6);
$r2 = new Rectangle(true, "RED", 6, 6);
$c1 = new Circle(true, "BLACK", 10);

$arr = array($r1, $r2, $c1);

foreach ($arr as $s) {
    $s->resize(50);
    echo  $s->getArea() . "<br>";
}
