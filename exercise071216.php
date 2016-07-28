<?php 

// Write a function to put the following array in alphabetical order without using any of the predefined sorting functions.

$letters = ["e", "a", "g", "c", "i", "d", "f", "b", "h"];

function alphabetical($array) {
	$count = (count($array)-1);
	for ($i = 0; $i < $count; $i++) {
		for ($j = $i + 1; $j < $count; $j++) {
			if ($array[$i] > $array[$j]) {
				$temp = $array[$i];
				$array[$i] = $array[$j];
				$array[$j] = $temp;
			}
		}
	}
	return $array;
}

print_r(alphabetical($letters));