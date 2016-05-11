<?php
/*
*/
// if e107 is not running we won't run this plugin program
if (!defined('e107_INIT')) { exit; }

// determine the plugin directory as a global variable
global $PLUGINS_DIRECTORY;

// use this folder during install
$eplug_folder = "newscategorylinks_menu";

// Get language file (assume that the English language file is always present)
include_lan(e_PLUGIN."newscategorylinks_menu/languages/".e_LANGUAGE.".php");

// Plugin info -------------------------------------------------------------------------------------------------------
$eplug_name = NEWSCATEGORYLINKSMENU_PLUGIN_01 ;
$eplug_version = "2.0";
$eplug_author = "Naja7Host";
$eplug_url = "http://plugins.e107.org";
$eplug_email = "support@naja7host.com";
$eplug_description = NEWSCATEGORYLINKSMENU_DESC;
$eplug_compatible = "e107 v0.7+";
//$eplug_compliant = TRUE; // indicator if plugin is XHTML compliant, shows icon
$eplug_readme = "readme.txt";

$eplug_menu_name = NEWSCATEGORYLINKSMENU_PLUGIN_01;
$eplug_conffile = "admin_config.php";
$eplug_icon = $eplug_folder."/images/newscategorylinks_menu_32.png";
$eplug_icon_small = $eplug_folder."/images/newscategorylinks_menu_16.png";
$eplug_caption = NEWSCATEGORYLINKSMENU_PLUGIN_02;

// List of preferences ---------------------------------------------------------
$eplug_prefs = array(
	"nclm_all" => 0,
	"nclm_caption" => NEWSCATEGORYLINKSMENU_PLUGIN_00,
	"nclm_cat" => array(1),
	"nclm_mainlink" => 1,	
	"nclm_nclm_render" => 0,
	"nclm_ulclass" => "menu",
	);


// List of table names ---------------------------------------------------------
$eplug_table_names = "";

// List of sql requests to create tables ---------------------------------------
$eplug_tables = "";

// Create a link in main menu (yes=TRUE, no=FALSE) -------------------------------------------------------------------
$eplug_link = FALSE;
$eplug_done = NEWSCATEGORYLINKSMENU_DONE1." ".$eplug_name." v".$eplug_version." ".NEWSCATEGORYLINKSMENU_DONE2;

// upgrading ... //
$upgrade_add_prefs = array(
	"nclm_all" => 0,
	"nclm_caption" => NEWSCATEGORYLINKSMENU_PLUGIN_00,
	"nclm_cat" => array(1),
	"nclm_mainlink" => 1,
	"nclm_nclm_render" => 0,
	);
$upgrade_remove_prefs = "";
//$upgrade_alter_tables = "";

//*
$upgrade_alter_tables = array(

	"",
	
	""
    );
    
//*/

$eplug_upgrade_done = NEWSCATEGORYLINKSMENU_UPGRADE_DONE." ".$eplug_name." v".$eplug_version.".";
?>