<?php

// Create a class called Rectangle with a width and height property, a constructor to set the height/width on instantiation,a method to calculate area and a method to calculate perimeter.

class Rectangle {
	private $width;
	private $height;

	public function __construct ($width, $height) {
		$this->setWidth($width);
		$this->setHeight($height);
	}

	public function getWidth () {
		return $this->width;
	}

	public function getHeight () {
		return $this->height;
	}

	public function setWidth ($width) {
		$this->width = trim($width);
	}

	public function setHeight ($height) {
		$this->height = trim($height);
	}

	public function area() {
		return "Area of this rectangle: " . $this->getWidth() * $this->getHeight();
	}

	public function perimeter() {
		return "Perimeter of this rectangle: " . ($this->getWidth() + $this->getHeight()) * 2;
	}
}