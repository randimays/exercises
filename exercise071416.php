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