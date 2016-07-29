<?php

$student = [
	'awesomeGrade' => 80,
	'name' => null,
	'subjects' => [],
];

function calculateAverage($subjects) {
	$average = 0;
	foreach ($subjects as $subject) {
		$average += $subject['grade'];
	}
	return $average / count($subjects);
}

function addSubject(&$subjects, $name, $grade) {
	$subject = [
		'name' => $name,
		'grade' => $grade
	];
	$subjects[] = $subject;
}

function isAwesome($subjects, $awesomeGrade) {
	return calculateAverage($subjects) > $awesomeGrade;
}

// Console methods
function prompt($message) {
	alert($message);
	return trim(fgets(STDIN));
}

function confirm($message) {
	return strtolower(prompt($message)) === 'y';
}

function alert($message) {
	fwrite(STDOUT, $message . PHP_EOL);
}

// Input
$student['name'] = prompt("What's your name?");

do {
	$name = prompt("What's the name of the subject?");
	$grade = prompt("What's your grade?");
	addSubject($student['subjects'], $name, $grade);
} while (confirm('Do you want to add another grade?'));

// Process
$average = number_format(calculateAverage($student['subjects']), 2);

// Output
if (isAwesome($student['subjects'], $student['awesomeGrade'])) {
	alert($student['name'] . " you're Awesome!!!! Your average was " . $average);
} else {
	alert($student['name'] . " you need more practice. Your average was " . $average);
}