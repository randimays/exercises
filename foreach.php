<?php

$things = array('Sgt. Pepper', "11", null, [1,2,3], 3.14, "12 + 7", false, (string) 11);

foreach ($things as $thing) {
	if (is_int($thing)) {
		echo "{$thing} is an int\n";
	} else if (is_array($thing)) {
		echo "{$thing} is an array\n";
	} else if (is_bool($thing)) {
		echo "{$thing} is a boolean\n";
	} else if (is_float($thing)) {
		echo "{$thing} is a floating point number\n";
	} else if (is_null($thing)) {
		echo "{$thing} is null\n";
	} else if (is_string($thing)) {
		echo "{$thing} is a string\n";
	}
}