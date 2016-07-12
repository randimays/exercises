<?php

date_default_timezone_set("America/Chicago");
$date = date("Y-m-d");
$time = date("H-i-s");

function logMessage($logLevel, $message, $date, $time) {
	$handle = fopen("log-" . $date . ".log", "a");
	fwrite($handle, "{$date} {$time} {$logLevel} {$message}" . PHP_EOL);
	fclose($handle);
}

function logInfo($date, $time) {
	logMessage("INFO", "This is an info message.", $date, $time);
}

function logError($date, $time) {
	logMessage("ERROR", "This is an info message.", $date, $time);
}

logInfo($date, $time);
logError($date, $time);
