<?php
/**
* TowersTableauPiles starts with carrying 5 Cards each after the initial deal. 
* During the play, each of these can carry a maximum of 17 Cards
* These Piles are fanned and all Cards are up. 
* These Piles can accept Cards from any other Pile in the Game 
* except from the FoundationPiles as long as they build down 
* on the same suit For example, only 4H can be played on 5H, etc. 
* Once a TowersTableauPile becomes empty, it can only accept a K of any suit.
* These Piles are non-circular meaning that KD cannot be played on 1D/AD.
*/
class TowerTableauPiles extends BasePiles
{
	/**
	* Constructer of the class.
	* Prams: integer | limit number of cards
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
		if($this->isEmpty() && $cardObj->get_rank() == BaseCards::KING)
		{
			return true;
		}
		else
		{
			$topCard = $this->getTopCard();
			if(sizeof($this->cardPileStack) < $this->limit && ($cardObj->get_rank() == $topCard->get_rank() -1))
			{
				return true;
			}
			return false;
		}		
	}
}