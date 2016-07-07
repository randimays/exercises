<?php

function throwErrorMessage($a, $b) {
	if ($b === 0) {
		fwrite(STDOUT, "ERROR: You cannot divide by " . $b . ".\n");
	} elseif (!is_numeric($a)) {
		fwrite(STDOUT, "ERROR: " . $a . " is not a number.\n");
	} elseif (!is_numeric($b)) {
		fwrite(STDOUT, "ERROR: " . $b . " is not a number.\n");
	}
}

function add($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
		return $a + $b;
	} else {
		throwErrorMessage($a, $b);
	}
}

function subtract($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
		return $a - $b;
	} else {
		throwErrorMessage($a, $b);
	}
}

function multiply($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
		return $a * $b;
	} else {
		throwErrorMessage($a, $b);
	}
}

function divide($a, $b) {
	if (is_numeric($a) && is_numeric($b) && $b != 0) {
		return $a / $b;
	} else {
		throwErrorMessage($a, $b);
	}
}

function modulus($a, $b) {
	if (is_numeric($a) && is_numeric($b) && $b != 0) {
		return $a % $b;
	} else {
		throwErrorMessage($a, $b);
	}
}

echo "Addition: " . add(3, 3) . PHP_EOL;

echo "Subtraction: " . subtract(16, 7) . PHP_EOL;

echo "Multiplication: " . multiply(10, 4) . PHP_EOL;

echo "Division: " . divide(25, 0) . PHP_EOL;

echo "Modulus: " . modulus(100, 6) . PHP_EOL;