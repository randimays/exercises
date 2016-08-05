<?php

// Connect the file to the Log class. logtest.php will create an instance of the Log class and test the class by calling it from the command line.

require "Log.php";

date_default_timezone_set("America/Chicago");

$log = new Log();

$log->info("This is an info message." . PHP_EOL);
$log->error("This is an error message." . PHP_EOL);