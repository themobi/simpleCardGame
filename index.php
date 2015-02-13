<?php
/*
|---------------------------------------------------------------
| CORE CONFIGURATIONS
|---------------------------------------------------------------
|
| system path, base path.
|
*/

$system_path = 'system';
if (realpath($system_path) !== FALSE)
{
	$system_path = realpath($system_path).'/';
}
// ensure there's a trailing slash
$system_path = rtrim($system_path, '/').'/';

$library_path = 'library';
if (realpath($library_path) !== FALSE)
{
	$library_path = realpath($library_path).'/';
}
// ensure there's a trailing slash
$library_path = rtrim($library_path, '/').'/';

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// The PHP file extension
// this global constant is deprecated.
define('EXT', '.php');

// Path to the system folder
define('BASEPATH', str_replace("\\", "/", $system_path));

// Path to the front controller (this file)
define('APPPATH', str_replace(SELF, '', __FILE__));

// Name of the "system folder"
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));

define('LIBRARYDIR', trim(strrchr(trim(str_replace("\\", "/", $library_path), '/'), '/'), '/'));

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */
require_once SYSDIR.'/coreLoader.php';

/* End of file index.php */
/* Location: ./index.php */