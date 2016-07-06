<?php

foreach (range(1, 100) as $i) {
	if ($i % 2 === 1) {
		continue;
	}
		echo $i . "\n";
}
