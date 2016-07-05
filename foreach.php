<?php

$things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);

foreach ($things as $thing) {
	if (is_array($thing)) {
		echo "Inner array:\n";
		foreach ($thing as $number) {
			echo "$number " . PHP_EOL;
		}
		echo "\n";
	} else {
	echo $thing.PHP_EOL;
	}
}