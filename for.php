<?php

$increment = 1;

fwrite(STDOUT, "Enter a starting number: \n");
$start = trim(fgets(STDIN));

fwrite(STDOUT, "Enter an ending number: \n");
$end = trim(fgets(STDIN));

fwrite(STDOUT, "Choose an numeric increment: \n");
$userIncrement = trim(fgets(STDIN));

if (is_numeric($userIncrement)){
	$increment = $userIncrement;
} 

for ($i = $start; $i <= $end; $i += $increment) {
	fwrite(STDOUT, "$i\n");
}