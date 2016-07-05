<?php

$min = 1;
$max = 100;

if ($argc === 3) {
	if (is_numeric($argv[1]) && is_numeric($argv[2])) {
		$min = $argv[1];
		$max = $argv[2];
	} else {
		fwrite(STDERR, "You need to pass 2 numeric values as well.\n");
		exit(1);
	}
}

$random = mt_rand($min, $max);
$guessCount = 0;

fwrite(STDOUT, "Guess a number between $min and $max. Press ctrl + c to quit.\n");

do {
	$guessCount++;
	fwrite(STDOUT, "Guess? ");
	$guess = trim(fgets(STDIN));
	if ($guess > $random) {
		fwrite(STDOUT, "Lower\n");
	} elseif ($guess < $random) {
		fwrite(STDOUT, "Higher\n");
	} else {
		fwrite(STDOUT, "Good Guess! Total Guesses: $guessCount\n");
		exit(0);
	}
} while ($guess != $random);







