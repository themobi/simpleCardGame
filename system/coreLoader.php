<?php
#Load classes
include_once(APPPATH . '/config/config.php');
include_once(SYSDIR . '/language.php');
require_once(APPPATH . "/languages/" . DefaultLang . "/lang.php");
$languagesText = $lang;
include_once(LIBRARYDIR . "/class.BaseCards.php");
include_once(LIBRARYDIR . "/class.cardsDeck.php");
include_once(LIBRARYDIR . "/class.BasePiles.php");
include_once(LIBRARYDIR . "/BaseGames.php");
include_once(LIBRARYDIR . "/class.FoundationPile.php");
include_once(LIBRARYDIR . "/classStockPile.php");
include_once(LIBRARYDIR . "/classDiscardPile.php");
include_once(APPPATH . "/controllers/mainController.php");
#instantiate the main class
$init = new mainController();
#view the welcome screen
$init->browse();