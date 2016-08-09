<?php

// Given a list of uncapitalized names and a smaller subset of those names, output new list where all the names on the smaller list are capitalized. Use PHP or JavaScript for this exercise.

// output: [arches, Badlands, carlsbad, Denali]

// my PHP solution

$unCaps = ["arches", "badlands", "carlsbad", "denali"];
$toCaps = ["denali", "badlands"];

foreach ($toCaps as $cPark) {
	$cParkKey = array_search($cPark, $unCaps);
	if ($cParkKey) {
		$unCaps[$cParkKey] = ucfirst($cPark);
	}
}

print_r($uncapitalized);

// my JavaScript solution

var uncapitalized = ["arches", "badlands", "carlsbad", "denali"];
var to_capitalize = ["denali", "badlands"];

to_capitalize.forEach(function(park) {
	var park_key = uncapitalized.indexOf(park);
	if (park_key) {
		park = (park.substr(0,1).toUpperCase()) + park.substr(1, park.length); 
		uncapitalized.splice(park_key, 1, park);
	}
})

console.log(uncapitalized);



