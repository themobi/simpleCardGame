<?php
/**
* This class contains all remaining Cards which you can use during the play. 
* Cards remaining to be placed onto various Piles are kept by Stockpile .
* This Pile never accepts a Card and it does not allow removal of 
* Cards except when the destination is a DiscardPile.  
*/

class StockPile extends BasePiles
{
	/**
	* Constructer of the class.
	* Prams: nil
	*/
	function __construct()
	{
		parent::__construct();		
	}
	
	/**
	* Method to return size of pile stack
	* Prams: nil
	*/	
	function numberOfCardsFaceDown()
	{
		return count($this->cardPileStack);
	}
	
	/**
	* Method to check if stack is empty
	* Prams: nil
	*/
	function isComplete()
	{
		return ($this->isEmpty());
	}
	
}