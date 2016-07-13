<?php

$filename = "contacts.txt";
$mainMenuMsg = "Menu:\n1. View contacts.\n2. Add a new contact.\n3. Search a contact by name.\n4. Delete an existing contact.\n5. Exit.\nEnter an option (1, 2, 3, 4 or 5): ";
$contactsArray = createContentsArray($filename);
$searchMsg = "Enter first name of contact:\n";
$deleteMsg = "Confirm this is the entry to delete with 'y'. Type 'n' to enter a different name.\n";

function createContentsArray($filename) {
	$handle = fopen($filename, 'r');
	$contents = trim(fread($handle, filesize($filename)));
	fclose($handle);
	$contactsArray = explode("\n", $contents);
	return $contactsArray;
}

function formatContactsArray($contactsArray) {
	foreach ($contactsArray as $namePhoneString) {
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
		$formattedContacts[] = $contact;
	}
	return $formattedContacts;
}

function initialMenu($mainMenuMsg) {
	fwrite(STDOUT, $mainMenuMsg);
	$menuChoice = "";
	$menuChoice = trim(fgets(STDIN));
	return $menuChoice;
}
	
function routeUser($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename) {
	$menuChoice = initialMenu($mainMenuMsg);
		if ($menuChoice == 1) {
			viewContacts($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);
		} elseif ($menuChoice == 2) {
			addContact($contactsArray, $mainMenuMsg, "Enter the contact's first and last name: \n", $searchMsg, $deleteMsg, $filename);
		} elseif ($menuChoice == 3) {
			printResults($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);
		} elseif ($menuChoice == 4) {
			deleteContact($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);
		} else {
			exit(0);
		}
}

function viewContacts($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename) {
	$formattedContacts = formatContactsArray($contactsArray);
	print_r($formattedContacts);
	// printResults($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);
	routeUser($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);
}

function addContact($contactsArray, $mainMenuMsg, $message, $searchMsg, $deleteMsg, $filename) {
	do {
		$result = searchContact($contactsArray, "Enter the contact's first and last name.\n");
		$moretoAdd = "";

		do {
			fwrite(STDOUT, "There's already a contact with that name.\n");
			$result = searchContact($contactsArray, "Enter the contact's first and last name.\n");
		} while (is_numeric($result));

		fwrite(STDOUT, "Enter the contact's 7 or 10 digit phone number with no spaces (ex. 1234567890): \n");
		$contactNumber = trim(fgets(STDIN));
		$handle = fopen($filename, "a");
		fwrite($handle, $contactName . "|" . $contactNumber . PHP_EOL);
		fclose($handle);
		$contactsArray[] = $contactName . "|" . $contactNumber;
		fwrite(STDOUT, "Do you have more contacts to add? Type 'y' or 'n'.\n");
		$moreToAdd = trim(fgets(STDIN));
	} while($moreToAdd === "y");

	fwrite(STDOUT, "Record created successfully.\n");
	routeUser($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);
}

function searchContact($contactsArray, $searchMsg) {
	fwrite(STDOUT, $searchMsg);
	$contactName = trim(fgets(STDIN));
	$formattedContacts = formatContactsArray($contactsArray);
	$result;
	foreach ($formattedContacts as $entry => $contact) {
		foreach ($contact as $info => $detail) {
			if (strpos($detail, $contactName) !== false) {
				$result = $entry;
				return $result;
			}
		}
	}
}

function printResults($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename) {
	$result = searchContact($contactsArray, $searchMsg);
	if (resultCheck($result, $contactsArray, $searchMsg)) {
		$formattedContacts = formatContactsArray($contactsArray);
		print_r($formattedContacts[$result]);
	}
		routeUser($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);
}

// function printResults($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename) {
// 	$result = searchContact($contactsArray, $searchMsg);
// 	$formattedContacts = formatContactsArray($contactsArray);
// 	$contactsTable = [];
// 	$names = [];
// 	$numbers = [];
// 	if (resultCheck($result, $contactsArray, $searchMsg)) {
// 		foreach ($formattedContacts as $contact) {
// 			$longestName = max($contact);
// 			$length = strlen($longestName);
// 			foreach ($contact as $individual) {
// 				$names[] = $contact["name"];
// 				$numbers[] = $contact["number"];
// 			}
// 		}

// 		foreach ($numbers as $number) {
// 			str_pad($number, 13, " ", STR_PAD_RIGHT);
// 			$contactsTable = [
// 				"number" => $number
// 			];
// 		}

// 		foreach ($names as $name) {
// 			str_pad($name, $length, " ", STR_PAD_RIGHT);
// 			$contactsTable = [
// 				"name" => $name
// 			];
// 		}
// 		var_dump($contactsTable);
// 		print_r($formattedContacts[$result]);
// 	}
// 		routeUser($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);

// 		$contactsTable[] = $contactRow;
// 	}
// 	return $contactsTable;
// 	}
// }

function resultCheck($result, $contactsArray, $searchMsg) {
	if (!(is_numeric($result))) {
		do {
			fwrite(STDOUT, "Contact not found. Please search again.\n");
			searchContact($contactsArray, $searchMsg);
		} while (!(is_numeric($result)));
	} else {
		return true;
	}
}

function deleteContact($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename) {
	do {
		$result = searchContact($contactsArray, $searchMsg);
		if (resultCheck($result, $contactsArray, $searchMsg)) {
			$formattedContacts = formatContactsArray($contactsArray);
			print_r($formattedContacts[$result]);
			fwrite(STDOUT, $deleteMsg);
			$userChoice = trim(fgets(STDIN));
		}
	} while ($userChoice === 'n');
	
	unset($contactsArray[$result]);
	$newContactsString = implode("\n", $contactsArray);

	$handle = fopen($filename, 'w');
	fwrite($handle, $newContactsString);
	fclose($handle);
	fwrite(STDOUT, "Record deleted.\n");
	routeUser($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);
}

routeUser($contactsArray, $mainMenuMsg, $searchMsg, $deleteMsg, $filename);