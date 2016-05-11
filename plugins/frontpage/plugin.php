<?php
/*
+---------------------------------------------------------------+
|        e107 website system
|        News Counter by Naja7Host (www.naja7host.com)
|
|        Released under the terms and conditions of the
|        GNU General Public License (http://gnu.org).
+---------------------------------------------------------------+
*/

if (!defined('e107_INIT')) { exit; }

if(file_exists(e_PLUGIN.'frontpage/languages/'.e_LANGUAGE.'.php')) 
	include_lan(e_PLUGIN.'frontpage/languages/'.e_LANGUAGE.'.php');
else 
	include_lan(e_PLUGIN.'frontpage/languages/English.php');



// Plugin info -------------------------------------------------------------------------------------------------------
$eplug_name = LAN_FRONTPAGE_1;
$eplug_version = "1.0";
$eplug_author = "Mohamed Anouar";
$eplug_url = "http://www.naja7host.com";
$eplug_email = "admin@naja7host.com";
$eplug_description = LAN_FRONTPAGE_2;
$eplug_compatible = "e107v7";
$eplug_readme = "admin_readme.php";        // leave blank if no readme file
//$eplug_latest = TRUE; //Show reported threads in admin (use latest.php)
$eplug_status = TRUE; //Show post count in admin (use status.php)
// Name of the plugin's folder -------------------------------------------------------------------------------------
$eplug_folder = "frontpage";

// Mane of menu item for plugin ----------------------------------------------------------------------------------
$eplug_menu_name = "";  // _menu is no longer required in 0.7.

// Name of the admin configuration file --------------------------------------------------------------------------
$eplug_conffile = "admin_config.php";  // use admin_ for all admin files.

// Icon image and caption text ------------------------------------------------------------------------------------
$eplug_icon = $eplug_folder."/images/logo_32.png";
$eplug_icon_small = $eplug_folder."/images/logo_16.png";
$eplug_caption =  LAN_FRONTPAGE_3;

// List of table names -----------------------------------------------------------------------------------------------
$eplug_table_names = "";


// List of sql requests to create tables -----------------------------------------------------------------------------
$eplug_tables = "";

$eplug_prefs = array(
	"frontpage_plugin_enable"  =>  true,
	"frontpage" => array 
				(
					"all" => "main.php",
				),
  "frontpage_type_page"  =>  0,
  "frontpage_news_style"  =>  "../../plugins/frontpage/style-news/default_config.php",
  "frontpage_news_slider_type" =>  "slider1",
  "frontpage_news_rest" =>  20,
  "frontpage_news_silder1_vit" =>  9000,
  "frontpage_news_slider" =>  16,  
  );

// Create a link in main menu (yes=TRUE, no=FALSE) -------------------------------------------------------------
$eplug_link = FALSE;
$eplug_link_name = "frontpage";
$eplug_link_url = e_PLUGIN."frontpage";


// Text to display after plugin successfully installed ------------------------------------------------------------------
$eplug_done = LAN_FRONTPAGE_4 ;


// upgrading ... //

$upgrade_add_prefs = "";
$upgrade_remove_prefs = "";
$upgrade_alter_tables = "";
$eplug_upgrade_done = "";


?>