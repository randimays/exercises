<?php

$names = ["Tina", "Dana", "Mike", "Amy", "Adam"];

$compare = ["Tina", "Dean", "Mel", "Amy", "Michael"];

$search = "Amy";

function inArray ($search, $names) {
	if (array_search($search, $names) === false) {
		echo "FALSE\n";
	} else {
		echo "TRUE\n";
	}
}

inArray($search, $names);
