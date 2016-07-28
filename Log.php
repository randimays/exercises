<?php

// Write functions that will determine a filename for the log and call logMessage, info and error within to test the functionality of each.

class Log {
	public $handle;
	public $filename;

	public function __construct($prefix = "log-") {
		$this->filename = "$prefix" . date("Y-m-d") . ".log";
		$this->handle = fopen($this->filename, "a");
	}

	public function logMessage($level, $message) {
		$formattedMessage = date("Y-m-d H:i:s") . " [$level] $message";
		fwrite($this->handle, $formattedMessage);
	}

	public static function info($message) {
		$this->logMessage("INFO", $message);
	}

	public static function error($message) {
		$this->logMessage("ERROR", $message);
	}

	public function __destruct() {
		fclose($this->handle);
	}

}

?>