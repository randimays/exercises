<?php

$awesomeGrade = 80;

function askName ($message) {
	fwrite(STDOUT, $message);
	$studentName = trim(fgets(STDIN));
	return $studentName;
};

function askSubject ($message) {
	fwrite(STDOUT, $message);
	$subject = trim(fgets(STDIN));
	return $subject;
};

function collectGrades($message) {
	$allGrades = [];
	do {
		fwrite(STDOUT, $message);
		$grade = trim(fgets(STDIN));
		array_push($allGrades, (int)$grade);
		fwrite(STDOUT, "Do you have more grades? Type 'y' or 'n'.\n");
		$moreGrades = trim(fgets(STDIN));
	} while ($moreGrades == "y");
	return $allGrades;
};

function calculateAverage($grades, $subject) {
	$sumGrades = 0;
	$average = 0;
	foreach ($grades as $grade) {
		$sumGrades += (int)$grade;
	}
	$average = $sumGrades / count($grades);
	echo "Your " . $subject . " average is: " . number_format($average, 2) . ".\n";
	return $average;
};

$studentName = askName("What's your name?\n");
$subject = askSubject("What's the name of the subject?\n");
$grades = collectGrades("Enter a grade:\n");
$average = calculateAverage($grades, $subject);

if ($average >= $awesomeGrade) {
	fwrite(STDOUT, "{$studentName}, you're an awesome student!\n");
} else {
	fwrite(STDOUT, "{$studentName}, you should probably study more.\n");
}
