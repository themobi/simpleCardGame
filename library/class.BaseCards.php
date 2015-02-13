<?php
/**
* A Card is one of the 52 units used to play card games. There are 4 suits (Hearts, Clubs, Spades, and Diamonds) 
* and 13 ranks (A/1, 2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K) in each suit. From a programming perspective, 
* this is a class which should hold all the data which can distinguish a Card from another. 
* It should also provide methods “comparing” itself to another Card. This comparison is not necessarily the equality or 
* inequality comparison. Other comparisons should also be possible, for example if two Cards have same suit or same rank. 
* A Card may also provide a __toString()method which simply returns a string to facilitate printing this Card . A Card should 
* only be printed when it is facing up. So, perhaps the __toString() method should return a string “down” or something like that if the Card is not up. 
*
*/
class BaseCards
{
	# Define suits
	protected $suits = array(3 => "H", 2 => "C", 4 => "S", 1 => "D");
	protected $suit;
	# Define ranks
	protected $ranks = array(1 => "A", 2 => "2", 3 => "3", 4 => "4", 5 => "5", 6 => "6", 7 => "7", 8 => "8", 9 => "9", 10 => "10", 11 => "J", 12 => "Q", 13 => "K");
	protected $rank;
	# Define suits colors
	protected $suitsColor = array(3 => "1", 1 => "1", 2 => "0", 4 => "0" );
	# Define King & Ace key constants
	const KING = 13;
	const ACE = 1;		
	static $usedSuits =array();
	
	/**
	* Constructer of card class.
	* Prams: {int suit, int rank}
	*/
	
	function __construct($suit, $rank)
	{
		$this->suit = $suit;
		$this->rank = $rank;
	}
	
	/**
	* Fuction to get array of all ranks.
	* Prams: nil
	*/
	function getRanksArray()
	{
		return $this->ranks;
	}
	
	/**
	* Fuction to get suit.
	* Prams: boolean | if true this function
	* 		 will return the element of suit.
	*/
	function get_suit($typeStr=false)
	{
		if(!$typeStr)
			return $this->suit;
		
		return $this->suits[$this->suit];
		
	}
	
	/**
	* Fuction to get rank.
	* Prams: boolean | if true this function
	* 		 will return the element of rank.
	*/
	function get_rank($typeStr=false)
	{
		if(!$typeStr)
			return $this->rank;
		
		return $this->ranks[$this->rank];
	}
	
	/**
	* Fuction to get color of the card.
	* Prams: nil.
	*/
	function get_color()
	{
		return $this->suitsColor[$this->suit];
	}
	
	/**
	* Fuction to get card rank and suit
	* Prams: nil.
	*/
	function __toString()
	{
		return sprintf("%s%s", $this->get_rank(1), $this->get_suit(1));
	}
	
}