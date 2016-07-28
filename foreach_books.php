<?php

// Construct a loop that iterates through each book and it's key/value pairs. Log its values. Update your loop to show books that were written after 1950.

$books = array(
	'The Hobbit' => array(
		'published' => 1937,
		'author' => 'J. R. R. Tolkien',
		'pages' => 310
	),
	'Game of Thrones' => array(
		'published' => 1996,
		'author' => 'George R. R. Martin',
		'pages' => 835
	),
	'The Catcher in the Rye' => array(
		'published' => 1951,
		'author' => 'J. D. Salinger',
		'pages' => 220
	),
	'A Tale of Two Cities' => array(
		'published' => 1859,
		'author' => 'Charles Dickens',
		'pages' => 544
	)
);

foreach ($books as $book => $detail) {
	if ($detail['published'] > 1950) {
	echo "{$book}:\nPublished: {$detail['published']}\nAuthor: {$detail['author']}\nPages: {$detail['pages']}\n\n";
	}
}