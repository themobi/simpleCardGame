<?php
/**
* FoundationPile derived from the Game class 
* The goal of each Game we write is to fill up 
* the four FoundationPiles , each carrying 13 Cards. 
*/

class FoundationPile extends BasePiles
{
	public $pileSuit;
	
	/**
	* Constructer of the class.
	* Prams: Integer | limit
	*/
	function __construct($limit)
	{
		parent::__construct();
		
		$this->limit = $limit;		#instantiate the class with limit of the card
	}
	
	/**
	* Function to check if card could be added to stack
	* This method is previously mention in parent class
	* Purpose is to extend the functionality of this method.
	* Prams: Object | card, Boolean | circular or not
	*/
	function canTake(BaseCards $cardObj, $circular=false)
	{
		if(!$circular)
		{
			if($this->isEmpty())
			{
				if($cardObj->get_rank() == BaseCards::ACE)
				{
					return true;
				}
				return false;
			}
			else
			{
				$topCard = $this->getTopCard();
				if(sizeof($this->cardPileStack) < $this->limit && ($cardObj->get_suit() == $topCard->get_suit()) && ($cardObj->get_rank() == 1 + $topCard->get_rank()))
					return true;
			}
			return false;
		}
		else
		{
			if($this->isEmpty())
			{				
				if(!in_array($cardObj->get_suit(), BaseCards::$usedSuits))
				{					
					BaseCards::$usedSuits[] = $cardObj->get_suit();
					return true;
				}
				
				return false;
				
			}
			else
			{
				$topCard = $this->getTopCard();
				# Circular card shifting
				$circularRanks = array_merge($cardObj->getRanksArray(),$cardObj->getRanksArray());
				
				if(sizeof($this->cardPileStack) < $this->limit && $cardObj->get_suit() == $topCard->get_suit() && $cardObj->get_rank(true) == $circularRanks[$topCard->get_rank()] )
					return true;
				return false;
			}
		}
				
	}
	
}