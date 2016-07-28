<?php

// Create a simple CLI interface to display your friends' books, search by name or exit.

$friends = [
	[
		'name' => 'Oliver',
		'books' => [
			'Ansible for DevOps',
			'Servers for hackers',
		]
	],
	[
		'name' => 'Barry',
		'books' => [
			'Working effectively with unit tests',
			'50 quick ideas for your tests',
		],
	],
	[
		'name' => 'Jessica',
		'books' => [
			'Understanding the 4 rules of simple design',
			'Principles of package design',
		],
	],
	[
		'name' => 'Clark',
		'books' => [
			'Selling test driven projects',
		],
	]
];

function searchByName($friends, $name) {
	$filtered = [];
	foreach ($friends as $friend) {
		if (strpos($friend['name'], $name) !== false) {
			$filtered[] = $friend;
		}
	}
	return $filtered;
}

do {
	echo '1. Show friends books', PHP_EOL;
	echo '2. Search by name', PHP_EOL;
	echo '3. Exit', PHP_EOL;
	$option = fgets(STDIN);
	switch ($option) {
		case 1:
			foreach ($friends as $friend) {
				 $name = $friend['name'];
				 $books = implode(", ", $friend['books']);
				 fwrite(STDOUT, $name . "'s books: " . $books . PHP_EOL);
			}
			break;
		case 2:
			echo 'Please enter a name: ';
			$name = trim(fgets(STDIN));
			var_dump(searchByName($friends, $name));
			break;
	}
} while ($option != 3);