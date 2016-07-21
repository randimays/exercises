<?php

require "Person.php";

$person = new Person(); // the way to create objects
$person->firstName = "Johnny";
$person->lastName = "Appleseed";
$person->fruit = ["Pink Lady", "Gala", "Fuji"];

$person2 = new Person(); // the way to create objects
$person2->firstName = "Jane";
$person2->lastName = "Appleseed";
$person2->fruit = ["Pink Lady", "Gala", "Fuji"];


foreach ([$person, $person2] as $person) {
	// echo $person->roamCountryside() . PHP_EOL;
	echo $person->fullName() . PHP_EOL;
}

echo $person->addFruit("Arctic");