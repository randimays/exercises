<?php

// Write a function to remove all the vowels from the following:

$letters = ["a", "b", "c", "d", "e", "f", "g", "h", "i"];
$vowels = ["a", "e", "i", "o", "u"];

function removeVowels($letters, $vowels) {
	$letters = array_diff($letters, $vowels);
	sort($letters);
	print_r($letters);
}

removeVowels($letters, $vowels);

// Alternative solution 1

// function removeVowels(&$vowels) {
// 	foreach ($vowels as $index => $vowel) {
// 		if ($vowel == "a" || $vowel == "e" || $vowel == "i" || $vowel == "o" || $vowel == "u") {
// 			unset($vowels[$index]);
// 		}
// 	}
// 	return $vowels;
// }

// removeVowels($letters);

// print_r($letters);

// Alternative solution 2

// $vowels = ["a", "e", "i", "o", "u"];
// $noVowels = str_replace($vowels, "", implode(",", $letters));
// print_r(str_split($noVowels));

// Alternative solution 3

// $noVowels = preg_replace("/[aeiou]/", "", $letters);
// print_r($noVowels);