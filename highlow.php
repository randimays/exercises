<?php

if ($argc == 3) {

	$random = mt_rand($argv[1], $argv[2]);
	$guessCount = 0;

	fwrite(STDOUT, "Guess a number between {$argv[1]} and {$argv[2]}. Press ctrl + c to quit.\n");

	do {
		$guessCount++;
		fwrite(STDOUT, "Guess? ");
		$guess = trim(fgets(STDIN));
		if ($guess > $random) {
			fwrite(STDOUT, "Lower\n");
		} elseif ($guess < $random) {
			fwrite(STDOUT, "Higher\n");
		} else {
			fwrite(STDOUT, "Good Guess!\n");
		}
	} while ($guess != $random);

	fwrite(STDOUT, "Total Guesses: $guessCount\n");

	exit(0);
}





