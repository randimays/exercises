<?php

fwrite(STDOUT, "Enter a starting number: \n");
$start = trim(fgets(STDIN));

fwrite(STDOUT, "Enter an ending number: \n");
$end = trim(fgets(STDIN));

for ($i = $start; $i <= $end; $i++) {
	fwrite(STDOUT, "$i\n");
}