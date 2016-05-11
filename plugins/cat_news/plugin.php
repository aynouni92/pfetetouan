<?php
/*
*/
// if e107 is not running we won't run this plugin program
if (!defined('e107_INIT')) { exit; }

// determine the plugin directory as a global variable
global $PLUGINS_DIRECTORY;

// use this folder during install
$eplug_folder = "cat_news";

// Get language file (assume that the English language file is always present)
include_lan(e_PLUGIN."cat_news/languages/admin/".e_LANGUAGE.".php");

// Plugin info -------------------------------------------------------------------------------------------------------
$eplug_name = CATNEWS_MENU_TITLE;
$eplug_version = "1.0";
$eplug_author = "Med Anouar Achoukhy";
$eplug_url = "http://naja7host.com";
$eplug_email = "admin@naja7host.com";
$eplug_description = CATNEWS_MENU_DESC;
$eplug_compatible = "e107v0.7+";
$eplug_compliant = TRUE; // indicator if plugin is XHTML compliant, shows icon
$eplug_readme = "readme.txt";

$eplug_menu_name = CATNEWS_MENU_TITLE;
$eplug_conffile = "admin_config.php";
$eplug_icon = $eplug_folder."/images/cat_news_32.png";
$eplug_icon_small = $eplug_folder."/images/cat_news_16.png";
$eplug_caption = CATNEWS_MENU_TITLE;

// List of preferences ---------------------------------------------------------
$eplug_prefs = "";

// List of table names ---------------------------------------------------------
$eplug_table_names = "";

// List of sql requests to create tables ---------------------------------------
$eplug_tables = "";

// Create a link in main menu (yes=TRUE, no=FALSE) -------------------------------------------------------------------
$eplug_link = FALSE;
$eplug_done = CATNEWS_MENU_DONE1." ".$eplug_name." v".$eplug_version." ".CATNEWS_MENU_DONE2;

// upgrading ... //
$upgrade_add_prefs = "";
$upgrade_remove_prefs = "";
//$upgrade_alter_tables = "";

//*
$upgrade_alter_tables = array("","");
    
//*/

$eplug_upgrade_done = CATNEWS_MENU_UPGRADE_DONE." ".$eplug_name." v".$eplug_version.".";
?>