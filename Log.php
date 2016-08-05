<?php

// Write functions that will determine a filename for the log and call logMessage, info and error within to test the functionality of each.

// Refactor this class to limit visibility of handle and filename properties. Using setters, ensure filename is a string. Ensure users cannot manipulate handle once object is instantiated. In setter for filename, use combination of touch() and is_writable() to ensure you can write to the location.

class Log {
	private $handle;
	private $filename;

	public function __construct($prefix = "log-") {
		$this->handle = fopen($this->setFileName($prefix), "a");
	}

	public function logMessage($level, $message) {
		$formattedMessage = date("Y-m-d H:i:s") . " [$level] $message";
		fwrite($this->handle, $formattedMessage);
	}

	private function setFilename($prefix) {
		$filename = "$prefix" . date("Y-m-d") . ".log";
		if (!touch($filename) || !is_writable($filename)) {
			echo "This file $filename cannot be modified.";
		}
		return $filename;
	}

	public function info($message) {
		$this->logMessage("INFO", $message);
	}

	public function error($message) {
		$this->logMessage("ERROR", $message);
	}

	public function __destruct() {
		fclose($this->handle);
	}

}
