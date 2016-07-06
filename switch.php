 <?php

date_default_timezone_set('America/Chicago');

$dayOfWeek = date('N');

switch($dayOfWeek) {
	case 1:
		echo "Monday\n";
		break;
	case 2:
		echo "Tuesday\n";
		break;
	case 3:
		echo "Wednesday\n";
		break;
	case 4:
		echo "Thursday\n";
		break;
	case 5:
		echo "Friday\n";
		break;
	case 6:
		echo "Saturday\n";
		break;
	default:
		echo "Sunday\n";
}

if ($dayOfWeek == 1) {
	echo "Monday\n";
} elseif ($dayOfWeek == 2) {
	echo "Tuesday\n";
} elseif ($dayOfWeek == 3) {
	echo "Wednesday\n";
} elseif ($dayOfWeek == 4) {
	echo "Thursday\n";
} elseif ($dayOfWeek == 5) {
 	echo "Friday\n";
} elseif ($dayOfWeek == 6) {
 	echo "Saturday\n";
} else {
 	echo "Sunday\n";
}



