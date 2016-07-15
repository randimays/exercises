<?php

$deleteMsg = "Confirm this is the entry to delete with 'y'. Type 'n' to enter a different name.\n";

function initialMenu() {
	fwrite(STDOUT, "Main Menu\n");
	fwrite(STDOUT, "1. View contacts.\n");
	fwrite(STDOUT, "2. Add a new contact.\n");
	fwrite(STDOUT, "3. Search for a contact by name.\n");
	fwrite(STDOUT, "4. Delete an existing contact.\n");
	fwrite(STDOUT, "5. Exit.\n");
	fwrite(STDOUT, "Enter an option (1, 2, 3, 4 or 5): \n");

	$menuChoice = trim(fgets(STDIN));
	return $menuChoice;
}

function loadContacts($userSearch = "") {
	$contacts = [];
	$longestName = 0;
	$longestNumber = 0;
	$contents = trim(file_get_contents("contacts.txt"));
	$contentsArray = explode("\n", $contents);

	foreach ($contentsArray as $namePhoneString) {
		$contact = [];
		$namePhoneArray = explode("|", $namePhoneString);
		$contact["name"] = $namePhoneArray[0];

		if ((strlen($namePhoneArray[1])) > 7) {
			$contact["formattedNumber"] = 
				substr($namePhoneArray[1], 0, 3) . "-" .
				substr($namePhoneArray[1], 3, 3) . "-" . 
				substr($namePhoneArray[1], 6);
		} else {
			$contact["formattedNumber"] =
				substr($namePhoneArray[1], 0, 3) . "-" .
				substr($namePhoneArray[1], 3);
		}

		if ($userSearch === "" || strpos($contact["name"], $userSearch) !== false) {
			if ($longestName < strlen($contact["name"])) {
				$longestName = strlen($contact["name"]);
			}
			if ($longestNumber < strlen($contact["formattedNumber"])) {
				$longestNumber = strlen($contact["formattedNumber"]);
			}

			$contacts[] = $contact;
		}
	}

	$data = [];
	$data["contacts"] = $contacts;
	$data["longestName"] = $longestName + 2;
	$data["longestNumber"] = $longestNumber + 2;

	return $data;
}

function displayContacts($contacts, $longestName, $longestNumber) {
	fwrite(STDOUT, PHP_EOL);
	fwrite(STDOUT, str_pad("Name", $longestName, " ", STR_PAD_RIGHT) . "|" . str_pad("Phone", $longestNumber, " ", STR_PAD_BOTH) . "|" . PHP_EOL);
	fwrite(STDOUT, str_pad("", $longestName + $longestNumber + 2, "-") . PHP_EOL);

	foreach ($contacts as $contact) {
		fwrite(STDOUT, str_pad($contact["name"], $longestName, " ", STR_PAD_RIGHT) . "|" . str_pad($contact["formattedNumber"], $longestNumber, " ", STR_PAD_BOTH) . "|" . PHP_EOL);
	}

	fwrite(STDOUT, PHP_EOL);
}

function viewContacts() {
	extract(loadContacts());
	displayContacts($contacts, $longestName, $longestNumber);
}

function addContact() {
	fwrite(STDOUT, "Enter the contact's first and last name.\n");
	$name = trim(fgets(STDIN));
	extract(loadContacts($name));

	while ($name == "") {
		fwrite(STDOUT, "Name must not be empty.\n");
		fwrite(STDOUT, "Enter the contact's first and last name.\n");
		$name = trim(fgets(STDIN));
	}

	fwrite(STDOUT, "Enter the contact's 7 or 10 digit phone number with no spaces (ex. 1234567890): \n");
	$number = trim(fgets(STDIN));

	while (!is_numeric($number) || (strlen($number) !== 7) && (strlen($number) !== 10)) {
		fwrite(STDOUT, "Phone numbers can only contain numbers and must be 7 or 10 digits in length.\n");
		fwrite(STDOUT, "Enter the contact's 7 or 10 digit phone number with no spaces (ex. 1234567890): \n");
		$number = trim(fgets(STDIN));
	}

	$handle = fopen("contacts.txt", "a");
	fwrite($handle, $name . "|" . $number . PHP_EOL);
	fclose($handle);
	fwrite(STDOUT, "Record created successfully.\n");
}

function searchForContact() {
	fwrite(STDOUT, "Enter the contact's first and last name.\n");
	$name = trim(fgets(STDIN));
	extract(loadContacts($name));
	displayContacts($contacts, $longestName, $longestNumber);
}

function deleteContact() {
	viewContacts();
	$userChoice = "";
	do {
		fwrite(STDOUT, "Enter the contact's first and last name.\n");
		$name = trim(fgets(STDIN));
		searchRecords($name);
		fwrite(STDOUT, "Are you sure you want to delete this contact? Type 'y' for yes, 'n' for no.\n");
		$userChoice = trim(fgets(STDIN));
	} while ($userChoice === 'n');

	$name = $deleteName;
	
	extract(loadContacts());
	$handle = fopen("contacts.txt", "w");

	foreach ($contacts as $key => $contact) {
		if ($contact["name"] !== $deleteName) {
			fwrite($handle, $contact["name"] . "|" . $contact["number"] . PHP_EOL);
		} else {
			fwrite(STDOUT, "Record deleted.\n");
		}
	}		

	fclose($handle);
}

do {
	$menuChoice = intval(initialMenu());

	switch ($menuChoice) {
		case 1:
			viewContacts();
			break;
		case 2:
			addContact();
			break;
		case 3:
			searchForContact();
			break;
		case 4:
			deleteContact();
			break;
		case 5:
			fwrite(STDOUT, "Exiting app.\n");
			exit(0);
			break;
		default:
			fwrite(STDOUT, "Invalid response.\n");
			break;
	}
} while ($menuChoice !== "5");