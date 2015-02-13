<?php
/**
* SpecialTableauPiles which are exactly the same as the other Tableau Piles
* except that they are reusable even after they are empty.
* An empty SpecialTableauPile can accept any card. However, 
* the restrictions remain the same as the regular tableau Piles used in this Game
* i.e., no more than 3 Cards and building down alternating in colour.
*/
class SpecialTableauPile extends BasePiles
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
	function canTake(BaseCards $cardObj, $circular=true)
	{
		if($this->isEmpty())
		{
			return true;
		}
		else
		{
			$topCard = $this->getTopCard();
			# Circular card shifting
			$circularRanks = array_merge($cardObj->getRanksArray(),$cardObj->getRanksArray());
			if(sizeof($this->cardPileStack) < $this->limit && $cardObj->get_color() != $topCard->get_color() && $circularRanks[$cardObj->get_rank()] == $topCard->get_rank(true) )
			{
				return true;
			}
			return false;
		}		
	}
}