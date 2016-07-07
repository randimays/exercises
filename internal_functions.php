<?php

// TODO: Create your inspect() function here
function inspect($var) {
	if (is_null($var)) {
		echo "The value is NULL.\n";
	} elseif ((is_array($var)) && empty($var)) {
		echo "The value is an empty array.\n";
	} elseif (is_array($var)) {
		echo "The value is an array.\n";
	} elseif ((is_string($var)) && empty($var)) {
		echo "The string is empty.\n";
	} elseif (is_bool($var) && (boolval($var)) == 1) {
		echo "The boolean is TRUE.\n";
	} elseif (is_bool($var) && (boolval($var)) == 0) {
		echo "The boolean is FALSE.\n";
	} else {
		echo "The " . gettype($var) . " is {$var}.\n";
	}
}

// Do not modify these variables!
$string1 = "I'm a little teapot";
$string2 = '';
$array1 = [];
$array2 = [1, 2, 3];
$bool1 = true;
$bool2 = false;
$num1 = 0;
$num2 = 0.0;
$num3 = 12;
$num4 = 14.4;
$null = NULL;

// TODO: After each echo statement, use inspect() to output the variable's type and its value

echo 'Inspecting $num1: ';
inspect($num1);

echo 'Inspecting $num2: ';
inspect($num2);

echo 'Inspecting $num3: ';
inspect($num3);

echo 'Inspecting $num4: ';
inspect($num4);

echo 'Inspecting $null: ';
inspect($null);

echo 'Inspecting $bool1: ';
inspect($bool1);

echo 'Inspecting $bool2: ';
inspect($bool2);

echo 'Inspecting $string1: ';
inspect($string1);

echo 'Inspecting $string2: ';
inspect($string2);

echo 'Inspecting $array1: ';
inspect($array1);

echo 'Inspecting $array2: ';
inspect($array2);
