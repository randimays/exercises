<?php

// Create a shapes test file to use Rectangle and Square classes to create instances of the classes. Calculate the perimeter and area of the classes by passing the appropriate parameters.

require_once "Rectangle.php";
require_once "Square.php";

$rect1 = new Rectangle(4, 5);
$rect2 = new Rectangle(6, 10);
$rect3 = new Rectangle(8, 4);
$square1 = new Square(4);
$square2 = new Square(7);
$square3 = new Square(10);

echo $rect1->area() . PHP_EOL;
// echo $rect2->area() . PHP_EOL;
// echo $rect3->area() . PHP_EOL;
// echo $square1->area() . PHP_EOL;
// echo $square2->area() . PHP_EOL;
// echo $square3->area() . PHP_EOL;
// echo $rect1->perimeter() . PHP_EOL;
// echo $rect2->perimeter() . PHP_EOL;
// echo $rect3->perimeter() . PHP_EOL;
// echo $square1->perimeter() . PHP_EOL;
// echo $square2->perimeter() . PHP_EOL;
// echo $square3->perimeter() . PHP_EOL;