<?php
/**
* SixteensTableauPiles starts with carrying x Cards each after the initial deal. 
* During the play, each of these can carry a maximum of x Cards
* These Piles are fanned and all Cards are up. 
* These Piles can accept Cards from any other Pile in the Game 
* except from the FoundationPiles as long as they build down 
* alternating on color and . For example, either 4C or 4S can be played on 5H, etc
*/
class SixteenTableauPiles extends BasePiles
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
	function canTake(BaseCards $cardObj, $circular=true)
	{
		if($this->isEmpty())
		{
			return false;
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