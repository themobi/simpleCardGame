<?php
/**
* This Pile can only accept Cards from the StockPile and keeps the
* un-played Cards. This Pile has all Cards faced up but is not fanned. 
* This means that only the top Card is visible. 
*/

class DiscardPile extends BasePiles
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
	* Function to check if card could be added to stack
	* This method is previously mention in parent class
	* Purpose is to extend the functionality of this method.
	* Prams: Object | card, Boolean | circular or not
	*/
	function canTake(BaseCards $cardObj, $circular=false)
	{
		return true;
	}
	
}