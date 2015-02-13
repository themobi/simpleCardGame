<?php
/**
* This Deck is a collection of all 52 cards. 
* The constructor of Deck. It initialize the Deck to hold all 52 cards. 
* Shuffle the cards when requested and also provide a getNextCard() method.
*/

class BaseCardsDeck
{
	public $numberOfCards = 52;		 # Number of cards
	public $cardsObject;				# Cards object
	protected $currentCardNumber = 0;  # Current card rank
	
	/**
	* Constructer of card deck class.
	* Prams: nil
	*/
	function __construct()
	{
		#SET CARD OBJECT
		$i=0;
		for($s = 1; $s <= 4; $s++)
		{
			for($r = 1; $r <= 13; $r++)
			{
				$this->cardsObject[$i] = new BaseCards($s, $r);
				$i++;
			}
		}
	}
	
	/**
	* Fuction to get cards rank and suit
	* Prams: nil.
	*/
	function __toString()
	{
		$result = '';
		$i=0;
		for($s = 1; $s <= 4; $s++)
		{
			for($r = 1; $r <= 13; $r++)
			{
				$result .= $this->cardsObject[$i] . " ";
				$i++;
			}
			$result .= "\n";
		}
		return $result;
	}
	
	/**
	* Fuction shuffle the cards
	* Prams: nil.
	*/
	function shuffleCards()
	{
		shuffle($this->cardsObject);
		$this->currentCardNumber = 0;
	}
	
	/**
	* Method provide very next card from the deck
	* Prams: nil.
	*/
	function getNextCard()
	{
		if($this->currentCardNumber < $this->numberOfCards)
			$this->currentCardNumber++;return $this->cardsObject[$this->currentCardNumber];
	}
	
}