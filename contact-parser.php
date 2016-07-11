<?php

function parseContacts($filename) {
	$contacts = [];
	$handle = fopen($filename, "r");
	$contents = trim(fread($handle, filesize($filename)));
	fclose($handle);
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


