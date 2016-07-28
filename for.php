<?php

// Prompt user for a starting and ending number and log all of the numbers with a loop. Allow the user to choose the increment. Default increment to 1 if no input is given. Be sure you are only allowing numbers to be entered.

$increment = 1;

fwrite(STDOUT, "Enter a starting number: \n");
$start = trim(fgets(STDIN));

fwrite(STDOUT, "Enter an ending number: \n");
$end = trim(fgets(STDIN));

fwrite(STDOUT, "Choose an numeric increment: \n");
$userIncrement = trim(fgets(STDIN));

if (is_numeric($start) && is_numeric($end) && is_numeric($userIncrement)){
	$increment = $userIncrement;
} else {
	fwrite(STDERR, "You should only be entering numbers.\n");
	exit(1);
}

for ($i = $start; $i <= $end; $i += $increment) {
		fwrite(STDOUT, "$i\n");
	}