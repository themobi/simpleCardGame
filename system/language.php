<?php
class lang
{
	protected $language;
	function __construct()
	{
		//require_once(APPPATH . "/languages/" . DefaultLang . "/lang.php");
		$this->language = $GLOBALS["languagesText"];
	}
	
	function line($lineKey)
	{
		return $this->language[$lineKey];
	}
}