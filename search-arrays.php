<?php

// Create a function that returns true or false if an array value is found. Search for Tina and Bob in $names. Create a function to compare 2 arrays that returns the number of values in common between the arrays.

$names = ["Tina", "Dana", "Mike", "Amy", "Adam"];
$compare = ["Tina", "Dean", "Mel", "Amy", "Michael"];

function inArray ($search, $names) {
	if (array_search($search, $names) === false) {
		return false;
	} else {
		return true;
	}
}

var_dump(inArray("Amy", $names));

function compareArrays($array1, $array2) {
	$numInCommon = 0;
	foreach ($array1 as $item) {
		if (array_search($item, $array2, true) !== false) {
			$numInCommon++;
		}
	}
	return $numInCommon;
}

var_dump(compareArrays($names, $compare));

$animals = ["cat", "dog", "mouse", "gorilla", "giraffe", "elephant", "kangaroo", "duck"];
$animals2 = ["mouse", "rat", "penguin", "gorilla", "dog", "koala"];

var_dump(compareArrays($animals, $animals2));