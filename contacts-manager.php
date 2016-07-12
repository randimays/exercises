<?php

$filename = "contacts.txt";
$mainMenuMsg = "Menu:\n1. View contacts.\n2. Add a new contact.\n3. Search a contact by name.\n4. Delete an existing contact.\n5. Exit.\nEnter an option (1, 2, 3, 4 or 5): ";

function initialMenu($mainMenuMsg, $filename) {
	$contacts = createContactsArray($filename);
	fwrite(STDOUT, $mainMenuMsg);
	$menuChoice = "";
	$menuChoice = trim(fgets(STDIN));
	if ($menuChoice == 1) {
		viewContacts($contacts, $mainMenuMsg, $filename);
	} elseif ($menuChoice == 2) {
		addContact($mainMenuMsg, "Enter the contact's first and last name: \n", $filename);
	} elseif ($menuChoice == 3) {
		$searchResults = searchContact($contacts, "Enter first name of contact:\n");
		printResults($contacts, $searchResults, $mainMenuMsg, $filename);
	} elseif ($menuChoice == 4) {
		$searchResults = searchContact($contacts, "Enter first name of contact:\n");
		deleteContact($contacts, $searchResults, $mainMenuMsg, "Enter first name of contact:\n", $filename);
	} else {
		exit(0);
	}
}

function viewContacts($contacts, $mainMenuMsg, $filename) {
	print_r($contacts);
	initialMenu($mainMenuMsg, $filename);
	// $contacts = (createContactsArray($filename));
	// $contactsTable = [];
	// $longestName = max($contacts);
	// $length = strlen($longestName["name"]);
	// foreach ($contacts as $contact) {
	// 	$contact["name"] = $name;
	// 	$contactRow = str_pad($name, $length, " ", STR_PAD_RIGHT);
	// 	$contactsTable[] = $contactRow;
	// }
	// return $contactsTable;
}

function addContact($mainMenuMsg, $message, $filename) {
	$moreToAdd;
	do {
		fwrite(STDOUT, $message);
		$contactName = trim(fgets(STDIN));
		fwrite(STDOUT, "Enter the contact's 7-10 digit phone number with no spaces (ex. 1234567890): \n");
		$contactNumber = trim(fgets(STDIN));
		fwrite(STDOUT, "Do you have more contacts to add? Type 'y' or 'n'.\n");
		$handle = fopen($filename, "a");
		fwrite($handle, $contactName . "|" . $contactNumber . PHP_EOL);
		$moreToAdd = trim(fgets(STDIN));
	} while($moreToAdd === "y");
	fwrite(STDOUT, "Record created successfully.\n");
	initialMenu($mainMenuMsg, $filename);
}

function searchContact($contacts, $message) {
	fwrite(STDOUT, $message);
	$contactName = trim(fgets(STDIN));
	foreach ($contacts as $key => $contact) {
		foreach ($contact as $info) {
			if (strpos($info, $contactName) !== false) {
				return $key;
			}
		}
	}
}

function printResults($contacts, $results, $mainMenuMsg, $filename) {
	print_r($contacts[$results]);
	initialMenu($mainMenuMsg, $filename);
}

function deleteContact($contacts, $results, $mainMenuMsg, $message, $filename) {
	$userChoice;
	var_dump($contacts[$results]);
	// print_r($contacts[$results]);
	// fwrite(STDOUT, "Confirm this is the entry to delete with 'y'. Type 'n' to enter a different name.\n");
	// $userChoice = trim(fgets(STDIN));
	
	// if ($userChoice === "y") {
	// 	unset($contacts[$results]);
	// } else {
	// 	searchContact($contacts, $message);
	// }

	// $handle = fopen($filename, 'w');
	// $contactsString = implode("\n", $contacts);
	// fwrite($handle, $contactsString);
	// fclose($handle);

	// fwrite(STDOUT, "Record deleted.\n");

	// initialMenu($mainMenuMsg, $filename);
}

function createContactsArray($filename) {
	$contacts = [];
	$handle = fopen($filename, 'r');
	$contents = trim(fread($handle, filesize($filename)));
	fclose($handle);
	$contentsArray = explode("\n", $contents);
	foreach ($contentsArray as $namePhoneString) {
		$contact = [];
		$namePhoneArray = explode("|", $namePhoneString);
		$contact["name"] = $namePhoneArray[0];
		if ((strlen($namePhoneArray[1])) > 7) {
			$contact["number"] = 
				substr($namePhoneArray[1], 0, 3) . "-" .
				substr($namePhoneArray[1], 3, 3) . "-" . 
				substr($namePhoneArray[1], 6);
		} else {
			$contact["number"] =
				substr($namePhoneArray[1], 0, 3) . "-" .
				substr($namePhoneArray[1], 3);
		}
		$contacts[] = $contact;
	}
	return $contacts;
}

initialMenu($mainMenuMsg, $filename);