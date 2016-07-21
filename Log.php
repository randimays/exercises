<?php

class Log {
	public $filename;
	public $handle;

	public function logMessage($level, $message) {
		$handle = fopen($this->filename, "a");
		$formattedMessage = date("Y-m-d H:i:s") . " [$level] $message";
		fwrite($handle, $formattedMessage);
		fclose($handle);
	}

	public function info($message) {
		$this->logMessage("INFO", $message);
	}

	public function error($message) {
		$this->logMessage("ERROR", $message);
	}

}

?>