<?php

$a = 50;
$b = 25;

function add($a, $b) {
    return $a + $b;
}

function subtract($a, $b) {
    return $a - $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    return $a / $b;
}

function modulus($a, $b) {
	return $a % $b;
}

echo add(3, 4) . PHP_EOL;

echo subtract(16, 7) . PHP_EOL;

echo multiply(200, 4) . PHP_EOL;

echo divide(25, 5) . PHP_EOL;

echo modulus(100, 10) . PHP_EOL;