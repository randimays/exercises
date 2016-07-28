<?php

// Create a do-while loop that starts at 2 and displays the result $a * $a while $a is less than 1,000,000.

$a = 2;

do {
	echo "$a\n";
	$a *= $a;
} while ($a <= 1000000);