<?php

// Write a function called combineArrays that will take in two array values as parameters and return a new array with values from both. Be sure all values are unique.

$names = ["Tina", "Dana", "Mike", "Amy", "Adam"];
$compare = ["Tina", "Dean", "Mel", "Amy", "Michael"];
$animals = ["cat", "dog", "mouse", "gorilla", "giraffe", "elephant", "kangaroo", "duck"];
$animals2 = ["mouse", "rat", "penguin", "gorilla", "dog", "koala"];

function combineArrays($array1, $array2) {
	$newArray = [];
	foreach ($array1 as $key1 => $name1) {
		if ($name1 === $array2[$key1]) {
			array_push($newArray, $name1);
		} else {
			array_push($newArray, $name1, $array2[$key1]);
		}
	}
	return $newArray;
}

function combineArrays2($array1, $array2) {
	$newArray = [];
	for ($i = 0; $i < count($array1); $i++) {
		if ($array1[$i] === $array2[$i]) {
			array_push($newArray, $array1[$i]);
		} else {
			array_push($newArray, $array1[$i], $array2[$i]);
		}
	}
	return $newArray;
}

// bonus

function combineArrays3($array1, $array2) {
	$bonusArray = array_intersect($array1, $array2);
	foreach ($array1 as $item) {
		if (in_array($item, $bonusArray) !== false) {
			continue;
		} else {
			array_push($bonusArray, $item);
		}
	}
	foreach ($array2 as $item) {
		if (in_array($item, $bonusArray) !== false) {
			continue;
		} else {
			array_push($bonusArray, $item);
		}
	}
	return $bonusArray;
}

print_r(combineArrays($names, $compare));
print_r(combineArrays2($names, $compare));
print_r(combineArrays3($names, $compare));
print_r(combineArrays3($animals, $animals2));