<?php

class Person {
	// inside of the class, use 'self' to refer to static properties of the class. outside of the class, use the name of the class 'Person' to refer to static properties

	public $firstName;
	public $lastName;
	public static $population = 0; // using static means the property is shared among all objects of the class
	public function __construct($firstName, $lastName) { // upon construction of new object, code is executed
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		self::$population++; // syntax for static; 'self' refers to the name of the class
	}

	public function fullName() {
		echo $this->firstName . " " . $this->lastName . PHP_EOL;
	}

	// public function __destruct() {
	// 	echo "This person died." . PHP_EOL;
	// }
}

$person1 = new Person("John", "Doe"); // this triggers the __construct function
$person2 = new Person("Jane", "Doe");

$person1->fullName();
$person2->fullName();

echo "The population is: " . Person::$population . PHP_EOL;

?>