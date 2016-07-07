<?php

$a = 50;
$b = 25;

function add($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
		return $a + $b;
	} else {
		return "ERROR: Both arguments must be numbers.\n"
	}
}

function subtract($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
		return $a - $b;
	} else {
		return "ERROR: Both arguments must be numbers.\n"
	}
}

function multiply($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
		return $a * $b;
	} else {
		return "ERROR: Both arguments must be numbers.\n"
	}
}

function divide($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
		return $a / $b;
	} else {
		return "ERROR: Both arguments must be numbers.\n"
	}
}

function modulus($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
		return $a % $b;
	} else {
		return "ERROR: Both arguments must be numbers.\n"
	}
}

echo add(3, 4) . PHP_EOL;

echo subtract(16, 7) . PHP_EOL;

echo multiply(200, 4) . PHP_EOL;

echo divide(25, 5) . PHP_EOL;

echo modulus(100, 10) . PHP_EOL;