<?php
/**
* special TowersPiles After the initial deal any two of these contain one Card each.
* These Cards should be faced up. TowersPiles can accept any Card as long as 
* it is coming from the TowersTableauPiles. These Piles cannot carry more  
* than a single card. 
*/
class SpecialTowerTableauPile extends BasePiles
{
	/**
	* Constructer of the class.
	* Prams: nil
	*/
	function __construct($limit)
	{
		parent::__construct();
		
		$this->limit = $limit;
	}
	
	/**
	* Function to check if card could be added to stack
	* This method is previously mention in parent class
	* Purpose is to extend the functionality of this method.
	* Prams: Object | card
	*/
	function canTake(BaseCards $cardObj)
	{
		if($this->isEmpty())
			return true;
		return false;
	}
}