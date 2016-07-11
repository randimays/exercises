 <?php

// Converts array into list n1, n2, ..., and n3
function humanizedList($array) {
	$humanizedArray = [];
	foreach ($array as $key => $name) {
		if ($key === (count($array)) - 1) {
			array_push($humanizedArray, "and " . $name);
		} else {
			array_push($humanizedArray, $name);
		}
	}
	return implode(", ", $humanizedArray);
}

// List of famous peeps
$physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';

// TODO: Convert the string into an array
$physicistsArray = explode(", ", $physicistsString);
sort($physicistsArray);

// Humanize that list
$famousFakePhysicists = humanizedList($physicistsArray);

// Output sentence
echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}.\n";

 ?>