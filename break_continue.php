<?php

// Create a for loop that shows all even numbers between 1 and 100 using continue. Create another that counts from 1 to 100 but stops after 10 using break.

foreach (range(1, 100) as $i) {
	if ($i % 2 === 1) {
		continue;
	}
		echo $i . "\n";
}

foreach (range(1, 100) as $i) {
	echo $i . "\n";
	if ($i === 10) {
		break;
	}
}