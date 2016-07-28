<?php

// Using a .txt file, complete the function below to output each individual contact as a nicely formatted array.

function parseContacts($filename) {
	$contacts = [];
	$contents = trim(file_get_contents($filename));
	$contentsArray = explode("\n", $contents);
	foreach ($contentsArray as $namePhoneString) {
		$contact = [];
		$namePhoneArray = explode("|", $namePhoneString);
		$contact["name"] = $namePhoneArray[0];
		$contact["number"] = 
				substr($namePhoneArray[1], 0, 3) . "-" .
				substr($namePhoneArray[1], 3, 3) . "-" . 
				substr($namePhoneArray[1], 6);
		$contacts[] = $contact;
	}
	return $contacts;
}

var_dump(parseContacts('contacts.txt'));


