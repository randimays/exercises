<?php

$random = mt_rand(1, 100);
$guess;
$guessCount = 0;

fwrite(STDOUT, "Guess a number between 1 and 100.\n");

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





