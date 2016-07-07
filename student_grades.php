<?php

$student = [
	'awesomeGrade' => 80,
	'name' => null,
	'subjects' => [],
];

// Student's methods
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

// My original solution
// $awesomeGrade = 80;

// function askName ($message) {
// 	fwrite(STDOUT, $message);
// 	$studentName = trim(fgets(STDIN));
// 	return $studentName;
// };

// function askSubject ($message) {
// 	fwrite(STDOUT, $message);
// 	$subject = trim(fgets(STDIN));
// 	return $subject;
// };

// function collectGrades($message) {
// 	$allGrades = [];
// 	do {
// 		fwrite(STDOUT, $message);
// 		$grade = trim(fgets(STDIN));
// 		array_push($allGrades, (int)$grade);
// 		fwrite(STDOUT, "Do you have more grades? Type 'y' or 'n'.\n");
// 		$moreGrades = trim(fgets(STDIN));
// 	} while ($moreGrades == "y");
// 	return $allGrades;
// };

// function calculateAverage($grades, $subject) {
// 	$sumGrades = 0;
// 	$average = 0;
// 	foreach ($grades as $grade) {
// 		$sumGrades += (int)$grade;
// 	}
// 	$average = $sumGrades / count($grades);
// 	echo "Your " . $subject . " average is: " . number_format($average, 2) . ".\n";
// 	return $average;
// };

// $studentName = askName("What's your name?\n");
// $subject = askSubject("What's the name of the subject?\n");
// $grades = collectGrades("Enter a grade:\n");
// $average = calculateAverage($grades, $subject);

// if ($average >= $awesomeGrade) {
// 	fwrite(STDOUT, "{$studentName}, you're an awesome student!\n");
// } else {
// 	fwrite(STDOUT, "{$studentName}, you should probably study more.\n");
// }
