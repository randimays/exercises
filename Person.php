<?php

// public keyword defines the item's visibility. always put public before any property or method you define.

class Person {
	public $firstName;
	public $lastName;
	public $fruit = [];

	public function roamCountryside() {
		$distance = mt_rand(1,10);
		return $this->firstName . " walks {$distance} miles west.";
	}

	public function fullName() {
		return $this->firstName . " " . $this->lastName;
	}

	public function addFruit($fruit) {
		$this->fruit[] = $fruit;
	}
}

?>