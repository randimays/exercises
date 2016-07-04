<?php

$random = mt_rand(1, 100);
$userGuess;
$numberOfGuesses = 0;

do {
	fwrite(STDOUT, "Guess? ");
	$userGuess = fgets(STDIN);
	if ($userGuess > $random) {
		fwrite(STDOUT, "Lower\n");
	} else {
		fwrite(STDOUT, "Higher\n");
	}
	$numberOfGuesses++;
} while ($userGuess != $random);

if ($userGuess == $random) {
	fwrite(STDOUT, "Good Guess! Guesses: $numberOfGuesses\n");
	exit(0);
}





