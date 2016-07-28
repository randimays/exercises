 <?php

 // Create a physicists string that lists physicists and contains an 'and' where appropriate. Turn a solution into a function, humanizedList. You should be able to pass the array as the only parameter. Update your code to list the physicists by first name in alphabetical order. Create a second parameter to make alphabetical sorting optional.

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