<?php

require "Log.php";

date_default_timezone_set("America/Chicago");

$log = new Log();

$log->info("This is an info message." . PHP_EOL);
$log->error("This is an error message." . PHP_EOL);

?>