<?php

// Create a class called Square with a parent of Rectangle. Create a constructor to set a single value (height), a method to calculate area and a method to calculate perimeter.

class Square extends Rectangle {
	public function __construct($height) {
		$this->setWidth($height);
		$this->setHeight($height);
	}

	public function area() {
		return "Area of this square: " . ($this->getHeight()) * ($this->getHeight());
	}

	public function perimeter() {
		return "Perimeter of this square: " . ($this->getHeight()) * 4;
	}
}