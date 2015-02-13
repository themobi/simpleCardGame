<?php
class mainController
{
	protected $langs;
	function __construct()
	{
		include_once(LIBRARYDIR . "/fortyThieves/gameFortyThieves.php");
		include_once(LIBRARYDIR . "/sixteen/gameSixteen.php");
		include_once(LIBRARYDIR . "/tower/gameTowers.php");
		$this->langs = new lang();
	}
	
	function browse()
	{
		#determine if the current invocation is from CLI or web server?
		if((php_sapi_name() === 'cli'))
		{
			print ($this->langs->line("welcome_text"));
			$input = trim(fgets(STDIN));
			$this->_play($input);
		}
		else
		{
			print nl2br($this->langs->line("wrong_invocation"));
		}
	}
	
	function _play($input)
	{
		switch(strtolower($input))
		{
			case "s":
				$sixteen = new GameSixteen;
				$sixteen->browse();
			break;
			case "f":
				$forty_theives = new GamefortyThieves;
				$forty_theives->browse();
			break;
			case "t":
				$tower = new GameTowers();
				$tower->browse();
			break;
			case "quit":
				break;
			break;
			default:
				print ($this->langs->line("not_a_menu"));
				$this->browse();
			break;
		}
	}
	
}