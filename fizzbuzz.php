<?php

// Create a loop that logs "Fizz" if a number is divisible by 3, "Buzz" if a number is divisible by 5, and "FizzBuzz" if a number is divisible by both.

for ($i = 1; $i <= 100; $i++) {
	if ($i % 15 == 0) {
		fwrite(STDOUT, "FizzBuzz\n");
	} elseif ($i % 3 == 0) {
		fwrite(STDOUT, "Fizz\n");
	} elseif ($i % 5 == 0) {
		fwrite(STDOUT, "Buzz\n");
	} else {
		fwrite(STDOUT, "$i\n");
	}
}