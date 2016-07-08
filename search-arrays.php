<?php

$names = ["Tina", "Dana", "Mike", "Amy", "Adam"];

$compare = ["Tina", "Dean", "Mel", "Amy", "Michael"];

$search = "Amy";

// section 1

// function inArray ($search, $names) {
// 	if (array_search($search, $names) === false) {
// 		echo "FALSE\n";
// 	} else {
// 		echo "TRUE\n";
// 	}
// }

// inArray($search, $names);

$animals = ["cat", "dog", "mouse", "gorilla", "giraffe", "elephant", "kangaroo", "duck"];

$animals2 = ["mouse", "rat", "penguin", "gorilla", "dog", "koala"];


function compareArrays ($array1, $array2) {
	$commonValues = [];
	foreach ($array1 as $key) {
		if (array_search($key, $array2, true) !== false) {
			$commonValues[] = $key;
		}
	}
	return "The number of common values is " . count($commonValues) . ".\n";
}

echo compareArrays($names, $compare);
echo compareArrays($animals, $animals2);