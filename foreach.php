<?php

$things = array('Sgt. Pepper', "11", null, [1,2,3], 3.14, "12 + 7", false, (string) 11);

foreach ($things as $thing) {
	if (is_scalar($thing)) {
		echo "{$thing}\n";
	}
}