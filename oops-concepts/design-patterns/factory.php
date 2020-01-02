<?php

interface Shape{
    public function draw();
}

class Position{
    public $x;
    public $y;
}

class Rectangle implements Shape{
    private $position;

    public function __construct(Position $pos) {
        $this->position = $pos;
    }

    public function draw(){
        echo "Drawing a rectangle with position (".$this->position->x .",".$this->position->y.")<br/>";
    }
}

class Circle implements Shape{
    private $position;

    public function __construct(Position $pos) {
        $this->position = $pos;
    }

    public function draw(){
        echo "Drawing a circle with position (".$this->position->x .",".$this->position->y.")<br/>";
    }
}

class Triangle implements Shape{
    private $position;

    public function __construct(Position $pos) {
        $this->position = $pos;
    }

    public function draw(){
        echo "Drawing a triangle with position (".$this->position->x .",".$this->position->y.")<br/>";
    }
}

class ShapeFactory{
    public function create($class, $position)
    {
        return new $class($position);
    }
}

// client code
$pos = new Position;

$shape = new ShapeFactory;

$pos->x = 100;
$pos->y = 20;

// create circle instance
$circle = $shape->create("Circle", $pos);
var_dump($circle);
$circle->draw();

$pos->x = 110;
$pos->y = 50;

// create triangle instance
$triangle = $shape->create("Triangle", $pos);
var_dump($triangle);
$triangle->draw();

