<?php
# Load game tableau pile class
require_once(LIBRARYDIR . "/fortyThieves/fortyThievesTableauPiles.php");

/**
* This Game has Four FoundationPiles each of which can hold a maximum of 13 Cards
* all belonging to same suit and building up from A to K. 
* This Game requires that the four FoundationPiles are not circular. 
* That is, they must start from A and end at K upon completion. 
* These Piles are not fanned.
*/
class GamefortyThieves extends BaseGames
{
	protected $langs;					 # Language file wrapper
	public $stockPile;				   # Object contains all remaining Cards
	public $discardPile;		  		 # Object keeps the un-played Cards.
	public $foundationPile1;	  		 # Object accept top Card from another pile
	public $foundationPile2;	  		 # Object accept top Card from another pile
	public $foundationPile3;	  		 # Object accept top Card from another pile
	public $foundationPile4;	  		 # Object accept top Card from another pile
	public $tableauPile1;		 		# Object hold Cards on a temporary basis
	public $tableauPile2;		 		# Object hold Cards on a temporary basis
	public $tableauPile3;		 		# Object hold Cards on a temporary basis
	public $tableauPile4;		 		# Object hold Cards on a temporary basis
	public $tableauPile5;		 		# Object hold Cards on a temporary basis
	public $tableauPile6;		 		# Object hold Cards on a temporary basis
	public $tableauPile7;		 		# Object hold Cards on a temporary basis
	public $tableauPile8;		 		# Object hold Cards on a temporary basis
	public $tableauPile9;		 		# Object hold Cards on a temporary basis
	public $tableauPile10;			   # Object hold Cards on a temporary basis
	public $gameInputKeys;			   # Array of user input keys
	public $gameStockPileNumber;		 # String of stockpile initiate key number
	public $gameDiscardPileNumber;	   # String of discardpile initiate key number
	public $gameTableauPileNumbers;	  # Array of tableaupile initiate key numbers
	public $gameFoundationPileNumber;	# Array of tableaupile initiate key numbers
	public $sourcePile;				  # Object source of a card pile
	public $destinationPile;			 # Object destination of a card pile
	
	/**
	* Constructer of the class.
	* Prams: nil
	*/
	function __construct()
	{
		parent::__construct();
		#load language file
		$this->langs = new lang();
		# define user input keys
		$this->_setInputKeys();
		# Instantiated card piles
		$this->_instantiatedPiles();
		# Distribute cards to piles
		$this->_distributeCards($this->stockPile, 0, 32);
		$this->_distributeCards($this->tableauPile1, 32, 34);
		$this->_distributeCards($this->tableauPile2, 34, 36);
		$this->_distributeCards($this->tableauPile3, 36, 38);
		$this->_distributeCards($this->tableauPile4, 38, 40);
		$this->_distributeCards($this->tableauPile5, 40, 42);
		$this->_distributeCards($this->tableauPile6, 42, 44);
		$this->_distributeCards($this->tableauPile7, 44, 46);
		$this->_distributeCards($this->tableauPile8, 46, 48);
		$this->_distributeCards($this->tableauPile9, 48, 50);
		$this->_distributeCards($this->tableauPile10, 50, 52);
	}
	
	/**
	* Set method | set input keys.
	* Prams: nil
	*/
	function _setInputKeys()
	{
		$this->gameInputKeys = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "quit");
		$this->gameStockPileNumber = $this->gameInputKeys[15];
		$this->gameDiscardPileNumber = $this->gameInputKeys[14];
		$this->gameFoundationPileNumber = array($this->gameInputKeys[0], $this->gameInputKeys[1], $this->gameInputKeys[2], $this->gameInputKeys[3]);
		$this->gameTableauPileNumbers = array(
												$this->gameInputKeys[4], 
												$this->gameInputKeys[5], 
												$this->gameInputKeys[6], 
												$this->gameInputKeys[7],
												$this->gameInputKeys[8],
												$this->gameInputKeys[9], 
												$this->gameInputKeys[10], 
												$this->gameInputKeys[11], 
												$this->gameInputKeys[12],
												$this->gameInputKeys[13]
										);
	}
	
	/**
	* Set method | instantiate the piles.
	* Prams: nil
	*/
	function _instantiatedPiles()
	{
		$this->foundationPile1	= new FoundationPile(13);
		$this->foundationPile2	= new FoundationPile(13);
		$this->foundationPile3	= new FoundationPile(13);
		$this->foundationPile4	= new FoundationPile(13);
		$this->tableauPile1	   = new FortyThievesTableauPiles(14);
		$this->tableauPile2	   = new FortyThievesTableauPiles(14);
		$this->tableauPile3	   = new FortyThievesTableauPiles(14);
		$this->tableauPile4	   = new FortyThievesTableauPiles(14);
		$this->tableauPile5	   = new FortyThievesTableauPiles(14);
		$this->tableauPile6	   = new FortyThievesTableauPiles(14);
		$this->tableauPile7	   = new FortyThievesTableauPiles(14);
		$this->tableauPile8	   = new FortyThievesTableauPiles(14);
		$this->tableauPile9	   = new FortyThievesTableauPiles(14);
		$this->tableauPile10	  = new FortyThievesTableauPiles(14);
		$this->stockPile		  = new StockPile();
		$this->discardPile		= new DiscardPile();
	}
	
	/**
	* Set method | distribute of piles.
	* Prams: pile class object | Number to begin | Number to end
	*/
	function _distributeCards($objectPile, $numberBegin, $numberEnd)
	{
		for($i=$numberBegin;$i<$numberEnd; $i++)
		{
			$objectPile->addCard($this->basePiles->cardsObject[$i]);
		}
		
	}
	
	/**
	* Draw game board
	* Prams: nil
	*/
	function _drawBoard()
	{
		$display  = sprintf($this->redrawBoard($this->foundationPile1, true), $this->gameInputKeys[0], " Foundation:", "\n");
		$display .= sprintf($this->redrawBoard($this->foundationPile2, true), $this->gameInputKeys[1], " Foundation:", "\n");
		$display .= sprintf($this->redrawBoard($this->foundationPile3, true), $this->gameInputKeys[2], " Foundation:", "\n");
		$display .= sprintf($this->redrawBoard($this->foundationPile4, true), $this->gameInputKeys[3], " Foundation:", "\n\n");
		
		$display .= sprintf($this->redrawBoard($this->tableauPile1), $this->gameInputKeys[4], " Tableau:", "\n");
		$display .= sprintf($this->redrawBoard($this->tableauPile2), $this->gameInputKeys[5], " Tableau:", "\n");
		$display .= sprintf($this->redrawBoard($this->tableauPile3), $this->gameInputKeys[6], " Tableau:", "\n");
		$display .= sprintf($this->redrawBoard($this->tableauPile4), $this->gameInputKeys[7], " Tableau:", "\n");
		$display .= sprintf($this->redrawBoard($this->tableauPile5), $this->gameInputKeys[8], " Tableau:", "\n");
		$display .= sprintf($this->redrawBoard($this->tableauPile6), $this->gameInputKeys[9], "Tableau:", "\n");
		$display .= sprintf($this->redrawBoard($this->tableauPile7), $this->gameInputKeys[10], "Tableau:", "\n");
		$display .= sprintf($this->redrawBoard($this->tableauPile8), $this->gameInputKeys[11], "Tableau:", "\n");
		$display .= sprintf($this->redrawBoard($this->tableauPile9), $this->gameInputKeys[12], "Tableau:", "\n");
		$display .= sprintf($this->redrawBoard($this->tableauPile10), $this->gameInputKeys[13], "Tableau:", "\n\n");
		
		$display .= sprintf($this->redrawBoard($this->discardPile, true), $this->gameInputKeys[14], "Discard:", "\n");
		$display .= sprintf($this->redrawBoard($this->stockPile, false, false), $this->gameInputKeys[15], "Stock:", " card(s): Face down\n");
		$display .= "Enter move as src# dst# (or {$this->gameInputKeys[16]} to end the game): ";
		print($display);
	}
	
	/**
	* Sanitize user input
	* Prams: user input
	*/
	function _sanitize($input)
	{
		return trim($input);
	}
	
	/**
	* Validate user input
	* Prams: user input
	*/
	function _validate($input)
	{
		if(strtolower($input) == $this->gameInputKeys[16])
		{
			return true;
		}
		if(preg_match('/\s/',$input))
		{
			$inputExplode = explode(" ", $input);
			if(!in_array($inputExplode[0], $this->gameInputKeys) || !in_array($inputExplode[1], $this->gameInputKeys))
				return false;
			return true;
		}
		return false;
	}
	
	/**
	* Validate user input for source and destination
	* Prams: user input source | user input destination
	*/
	function _validateSourceAndDestination($source, $destination)
	{
		#Set source and destination objects
		$this->_setInputSourceObject($source);$this->_setInputDestinationObject($destination);
		
		if(in_array($source, $this->gameFoundationPileNumber))
			return false;# can not move from foundation piles
						
		if($destination == $this->gameStockPileNumber)
			return false;#can not put @ stock pile
		
		if($source == $this->gameStockPileNumber && $destination != $this->gameDiscardPileNumber)
			return false;#can not put stock pile to other than discard pile
		
		if($source == $this->gameStockPileNumber && $this->stockPile->numberOfCardsFaceDown() == "0")
			return false;#stock is empty - 
		
		if(!$this->destinationPile->canTake($this->sourcePile->getTopCard()))
			return false;# check user can add card
		return true;
	}
	
	/**
	* Set Method | set source pile object
	* Prams: user input source
	*/
	function _setInputSourceObject($source)
	{
		switch($source)
		{
			case $this->gameInputKeys[0]:
				$this->sourcePile = $this->foundationPile1;
			break;
			case $this->gameInputKeys[1]:
				$this->sourcePile = $this->foundationPile2;
			break;
			case $this->gameInputKeys[2]:
				$this->sourcePile = $this->foundationPile3;
			break;
			case $this->gameInputKeys[3]:
				$this->sourcePile = $this->foundationPile4;
			break;
			case $this->gameInputKeys[4]:
				$this->sourcePile = $this->tableauPile1;
			break;
			case $this->gameInputKeys[5]:
				$this->sourcePile = $this->tableauPile2;
			break;
			case $this->gameInputKeys[6]:
				$this->sourcePile = $this->tableauPile3;
			break;
			case $this->gameInputKeys[7]:
				$this->sourcePile = $this->tableauPile4;
			break;
			case $this->gameInputKeys[8]:
				$this->sourcePile = $this->tableauPile5;
			break;
			case $this->gameInputKeys[9]:
				$this->sourcePile = $this->tableauPile6;
			break;
			case $this->gameInputKeys[10]:
				$this->sourcePile = $this->tableauPile7;
			break;
			case $this->gameInputKeys[11]:
				$this->sourcePile = $this->tableauPile8;
			break;
			case $this->gameInputKeys[12]:
				$this->sourcePile = $this->tableauPile9;
			break;
			case $this->gameInputKeys[13]:
				$this->sourcePile = $this->tableauPile10;
			break;
			case $this->gameInputKeys[14]:
				$this->sourcePile = $this->discardPile;
			break;
			case $this->gameInputKeys[15]:
				$this->sourcePile = $this->stockPile;
			break;
		}
	}
	
	/**
	* Set Method | set destination pile object
	* Prams: user input destination
	*/
	function _setInputDestinationObject($destination)
	{
		switch($destination)
		{
			case $this->gameInputKeys[0]:
				$this->destinationPile = $this->foundationPile1;
			break;
			case $this->gameInputKeys[1]:
				$this->destinationPile = $this->foundationPile2;
			break;
			case $this->gameInputKeys[2]:
				$this->destinationPile = $this->foundationPile3;
			break;
			case $this->gameInputKeys[3]:
				$this->destinationPile = $this->foundationPile4;
			break;
			case $this->gameInputKeys[4]:
				$this->destinationPile = $this->tableauPile1;
			break;
			case $this->gameInputKeys[5]:
				$this->destinationPile = $this->tableauPile2;
			break;
			case $this->gameInputKeys[6]:
				$this->destinationPile = $this->tableauPile3;
			break;
			case $this->gameInputKeys[7]:
				$this->destinationPile = $this->tableauPile4;
			break;
			case $this->gameInputKeys[8]:
				$this->destinationPile = $this->tableauPile5;
			break;
			case $this->gameInputKeys[9]:
				$this->destinationPile = $this->tableauPile6;
			break;
			case $this->gameInputKeys[10]:
				$this->destinationPile = $this->tableauPile7;
			break;
			case $this->gameInputKeys[11]:
				$this->destinationPile = $this->tableauPile8;
			break;
			case $this->gameInputKeys[12]:
				$this->destinationPile = $this->tableauPile9;
			break;
			case $this->gameInputKeys[13]:
				$this->destinationPile = $this->tableauPile10;
			break;
			case $this->gameInputKeys[14]:
				$this->destinationPile = $this->discardPile;
			break;
			case $this->gameInputKeys[15]:
				$this->destinationPile = $this->stockPile;
			break;
		}
	}
	
	/**
	* Instantiate the game
	* Prams: nil
	*/
	function browse()
	{
		#loop untill the foundations filled up
		while($this->filledBase < $this->basePilesNumberOfCards)
		{
			#Show game board
			$this->_drawBoard();
			#Get user input here and make it clean
			$user_input = $this->_sanitize(fgets(STDIN));
			#validate user input
			if(! $this->_validate($user_input))
			{
				#Error - invalid input
				print($this->langs->line("illegal_input"));
			}
			else
			{
				#exit if user want to quit from game
				if(strtolower($user_input) == $this->gameInputKeys[16])
				{
					break;
				}
				else
				{
					#break user input into source and destination
					$inputExplode = explode(" ", $user_input);
					$inputSoruceNumber = trim($inputExplode[0]);
					$inputDestinationNumber = trim($inputExplode[1]);
					
					#Validate source and destination
					if(!$this->_validateSourceAndDestination($inputSoruceNumber, $inputDestinationNumber))
					{
						#error
						print ($this->langs->line("illegal_move"));
					}
					else
					{
						# try to add a card
						$this->destinationPile->addCard($this->sourcePile->getTopCard());
						# pop moved card from source
						$this->sourcePile->pop();
						#fill foundation piles
						$this->_hasFilled();
											
					} #end of validated source and destnation
					
				} # end of cards input
			} # end of validated braces
		} # end of while loop
		
		# Asked if user won
		if($this->filledBase == $this->basePilesNumberOfCards)
		{
			#Show game board
			$this->_drawBoard();
			#show success message
			print ($this->langs->line("you_win"));
		}
		else
		{
			print ($this->langs->line("you_loose"));
		}
	} # end of function
	
	
	/**
	* Won Method | sum all foundation pile card
	* Prams: nil
	*/
	function _hasFilled()
	{
		$this->filledBase = $this->foundationPile1->isComplete() + $this->foundationPile2->isComplete() + $this->foundationPile3->isComplete() + $this->foundationPile4->isComplete();
	}
	
}