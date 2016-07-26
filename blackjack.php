<?php

// create an array for suits
$suits = ['C', 'H', 'S', 'D'];

// create an array of values
$cards = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

// build a deck (array) of cards
// card values should be "VALUE SUIT". ex: "7 H"
// make sure to shuffle the deck before returning it
function buildDeck($suits, $cards) {
	$deck = [];
	$fullCard = [];
	foreach ($cards as $card) {
		foreach ($suits as $suit) {
			$deck[] = "$card" . "" . "$suit";
		}
	}
	if (shuffle($deck)) {
		return $deck;
	}
}

// return true if a card is an ace, false otherwise
function cardIsAce($card) {
	return strpos($card, "A");
}

// determine the value of an individual card (string)
function getCardValue($card) {
	if (strpos("$card", "A") !== false) {
		return 11;
	} elseif (strpos("$card", "J") !== false || strpos("$card", "Q") !== false  || strpos("$card", "K") !== false) {
		return 10;
	} else {
		return intval($card);
	}
}

// get total value for a hand of cards
function getHandTotal($hand) {
	$handTotal = 0;
	foreach ($hand as $card) {
		$cardValue = getCardValue($card);
		if (count($hand) > 2 && cardIsAce($card)) {
			$cardValue = 1;
		}
		$handTotal += $cardValue;
	}
	return $handTotal;
}


// draw a card from the deck into a hand
// pass by reference (both hand and deck passed in are modified)
function drawCard(&$hand, &$deck, $drawNumber) {
	$hand[] = $deck[array_rand($deck, $drawNumber)];
	$deck = array_diff($deck, $hand);
}

// print out a hand of cards
// name is the name of the player
// hidden is to initially show only first card of hand (for dealer)
// output should look like this:
// Dealer: [4 C] [???] Total: ???
// or:
// Player: [J D] [2 D] Total: 12

function echoHand($hand, $name, $hidden = false) {
	if ($hidden = true) {
		$cardString = "[$hand[0]] [???]";
	} else {
		foreach ($hand as $card) {
			$cardString += "[$card]";
		}
	}
	return "$name: $cardString"; 
}

// build the deck of cards
$deck = buildDeck($suits, $cards);

// initialize a dealer and player hand
$dealer = [];
$player = [];

// dealer and player each draw two cards
$dealer[] = drawCard($dealer, $deck, 2);
$player[] = drawCard($dealer, $deck, 2);

// echo the dealer hand, only showing the first card
echo (echoHand($dealer, "Dealer", true));

// echo the player hand
echo (echoHand($player, "Player"));

// allow player to "(H)it or (S)tay?" till they bust (exceed 21) or stay
while (getHandTotal($player) < 21) {
	fwrite(STDOUT, "(H)it or (S)tay?");
	$response = trim(fgets(STDIN));
	if ($response == "H") {
		drawCard($player, $deck, 1);
	}
}

// show the dealer's hand (all cards)
echo (echoHand($dealer, "Dealer"));

// todo (all comments below)
// at this point, if the player has more than 21, tell them they busted
// otherwise, if they have 21, tell them they won (regardless of dealer hand)
// if neither of the above are true, then the dealer needs to draw more cards
// dealer draws until their hand has a value of at least 17
// show the dealer hand each time they draw a card
// finally, we can check and see who won
// by this point, if dealer has busted, then player automatically wins
// if player and dealer tie, it is a "push"
// if dealer has more than player, dealer wins, otherwise, player wins