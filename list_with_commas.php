 <?php

$alphaSort = false;
$physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';

function humanizedList($physicistsArray, $alphaSort = false) {
	if ($alphaSort) {
		sort($physicistsArray);
	}
	$last = array_pop($physicistsArray);
	array_push($physicistsArray, "and $last");
	return implode(", ", $physicistsArray);
}

// TODO: Convert the string into an array
$physicistsArray = explode(", ", $physicistsString);

// Humanize that list
$famousFakePhysicists = humanizedList($physicistsArray);

// Output sentence
echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}.\n";

 ?>