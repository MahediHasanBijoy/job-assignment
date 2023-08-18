<?php

// Task 1: Class Inheritance**
// Create classes to represent geometric shapes, including circles and rectangles. Implement methods for area calculation. You can use the provided example code as a reference.

use Illuminate\Auth\Recaller;

// Parent class
class Shapes{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}

// Child class
class Circle extends Shapes{
    public $radius;

    public function __construct($radius)
    {
        // assign values in class properties
        $this->radius = $radius; 

        // sending value for constructor of shape class
        parent::__construct('Circle');  
    }

    public function area(){
        return pi() * $this->radius * $this->radius;
    }
}

// Child class
class Rectangle extends Shapes{
    public $height, $width;

    public function __construct($height, $width)
    {   
        // sending value for constructor of shape class
        parent::__construct('Rectangle');

        // assign values in class properties
        $this->height = $height;
        $this->width = $width;
    }

    public function area(){
        return $this->height * $this->width;
    }
}

// Objects
$circle = new Circle(5);
$rect = new Rectangle(4,8);

// 
echo "Area of ". $circle->getName() . " is ". $circle->area(). PHP_EOL;
echo "Area of " . $rect->getName() . " is " . $rect->area();