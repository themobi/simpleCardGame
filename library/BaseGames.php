<?php
/**
* This class implements a card game which can be played with one 
* standard deck of cards. Initial load the cards into base pile.
*
*/
class BaseGames
{
	public $basePiles;				# Object variable of pile
	public $basePilesNumberOfCards;  # Total number of cards in the base pile
	public $filledBase;			   # Total number of cards filled in the sub piles
	public $cardLimit;				# Limit card
	public $initialCards;			 # Number of initial distributed card.
	public $piles;					# Pile
	
	/**
	* Constructer of game class.
	* Prams: nil
	*/
	function __construct()
	{
		#instantiate the card deck
		$this->basePiles = new BaseCardsDeck();
		# shuffle cards
		$this->basePiles->shuffleCards();
		# number of cards
		$this->basePilesNumberOfCards = $this->basePiles->numberOfCards;
		# initially zero
		$this->filledBase = 0;
	}
	
	/**
	* Fuction display the pile object.
	* Prams:  Object - pileObject | Boolean - face up or down
	*/
	function redrawBoard($pileObject, $singleCard=false, $faceUp=true)
	{
		if($singleCard && $faceUp)
		{
			$board = $pileObject->getTopCard();
		}
		else if(!$singleCard && $faceUp)
		{
			$board = $pileObject->__toString();
		}
		else
		{
			$board = $pileObject->numberOfCardsFaceDown();
		}
		
		$board = (!$pileObject->__toString()) ? 'empty' : $board;
		
		return "[%d] %s {$board} %s";
		
	}
	
}