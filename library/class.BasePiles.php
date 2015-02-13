<?php
/**
* A Pile is also a collection of Cards but the 
* number of Cards in a Pile may vary during the play.
* A Game will contain several Piles. 
* Since there can be many types of Piles, 
* this class should behave as the base class from 
* which other Piles are able to derive. 
*/

class BasePiles
{
	protected $cardPileStack;		# References of the cards
	public $limit;				   # Limit number of cards reference
	
	/**
	* Constructer of pile class.
	* Prams: Integer | limit
	*/
	function __construct($limit=0)
	{
		$this->cardPileStack = array();
		$this->limit = $limit;
	}
	
	/**
	* Function to get __toString method
	* Prams: nil
	*/
	function __toString()
	{
		if(count($this->cardPileStack) == 0)
		{
			return false;
		}
		$result = '';
		for($r = 0; $r <count($this->cardPileStack); $r++)
		{
			$result .= $this->cardPileStack[$r] . " ";
		}
		
		return $result;
	}
	
	/**
	* Function to get top card of the pile
	* Prams: nil
	*/
	function getTopCard()
	{
		return current($this->cardPileStack);
	}
	
	/**
	* Function to check pile stack
	* Prams: nil
	*/
	function isEmpty()
	{
		return empty($this->cardPileStack);
	}
	
	/**
	* Function to remove last card reference from stack
	* Prams: nil
	*/
	function pop()
	{
		if ($this->isEmpty())
		{
			throw new RunTimeException('Stack is empty!');
		}
		else
		{
			return array_shift($this->cardPileStack);
		}
	}
	
	/**
	* Function to add card object in pile stack
	* Prams: nil
	*/
	function addCard(BaseCards $cardObj)
	{
		try
		{
			array_unshift($this->cardPileStack, $cardObj);
		}
		catch(Exception $e)
		{
			throw new RunTimeException('Stack is empty!');
		}
	}
	
	/**
	* Function to check if card could be added to stack
	* Prams: Object | card, Boolean | circular or not
	*/
	function canTake(BaseCards $cardObj, $circular=false)
	{
		return false;
	}
	
	/**
	* Function to count pile stack
	* Prams: nil
	*/
	function isComplete()
	{
		return sizeof($this->cardPileStack);
	}
}