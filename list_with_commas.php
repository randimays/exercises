 <?php

$alphaSort = false;

if ($argc === 2) {
	if ($argv[1] == "true") {
		$alphaSort = $argv[1];
	} elseif ($argv[1] == "false") {
		$alphaSort = false;
	} else {
		fwrite(STDERR, "The second argument should be 'true' or 'false'." . PHP_EOL);
		exit(1);
	}
}

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

if ($alphaSort) {
	sort($physicistsArray);
}

// Humanize that list
$famousFakePhysicists = humanizedList($physicistsArray);

// Output sentence
echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}.\n";

 ?>