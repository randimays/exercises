<?php

class Person {
	public $firstName;
	public $lastName;

	public function __construct($firstName, $lastName) { // upon construction of new object, code is executed
		echo "New Person was constructed!" . PHP_EOL;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	public function fullName() {
		echo $this->firstName . " " . $this->lastName . PHP_EOL;
	}

	public function __destruct() {
		echo "This person died." . PHP_EOL;
	}
}

$person1 = new Person("John", "Doe"); // this triggers the __construct function
$person2 = new Person("Jane", "Doe");

// $person1->firstName = "John";
// $person1->lastName = "Doe";
$person1->fullName();

// $person2->firstName = "Jane";
// $person2->lastName = "Doe";
$person2->fullName();

?>