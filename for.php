<?php

fwrite(STDOUT, "Enter a starting number: \n");
$start = trim(fgets(STDIN));

fwrite(STDOUT, "Enter an ending number: \n");
$end = trim(fgets(STDIN));

fwrite(STDOUT, "Choose an numeric increment: \n");
$increment = trim(fgets(STDIN));

if (is_numeric($increment)){
	for ($i = $start; $i <= $end; $i += $increment) {
		fwrite(STDOUT, "$i\n");
	}
} else {
	fwrite(STDOUT, "You must enter a number for me to count by.");
}