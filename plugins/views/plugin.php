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

if(file_exists(e_PLUGIN.'views/languages/'.e_LANGUAGE.'.php')) 
	include_lan(e_PLUGIN.'views/languages/'.e_LANGUAGE.'.php');
else 
	include_lan(e_PLUGIN.'views/languages/English.php');



// Plugin info -------------------------------------------------------------------------------------------------------
$eplug_name = LAN_VIEWS_1;
$eplug_version = "3";
$eplug_author = "Mohamed Anouar";
$eplug_url = "http://www.naja7host.com";
$eplug_email = "admin@naja7host.com";
$eplug_description = LAN_VIEWS_2;
$eplug_compatible = "e107v7";
$eplug_readme = "admin_readme.php";        // leave blank if no readme file
//$eplug_latest = TRUE; //Show reported threads in admin (use latest.php)
$eplug_status = TRUE; //Show post count in admin (use status.php)
// Name of the plugin's folder -------------------------------------------------------------------------------------
$eplug_folder = "views";

// Mane of menu item for plugin ----------------------------------------------------------------------------------
$eplug_menu_name = "";  // _menu is no longer required in 0.7.

// Name of the admin configuration file --------------------------------------------------------------------------
$eplug_conffile = "admin_config.php";  // use admin_ for all admin files.

// Icon image and caption text ------------------------------------------------------------------------------------
$eplug_icon = $eplug_folder."/images/logo_32.png";
$eplug_icon_small = $eplug_folder."/images/logo_16.png";
$eplug_caption =  LAN_VIEWS_3;

// List of table names -----------------------------------------------------------------------------------------------
$eplug_table_names = array("views");


// List of sql requests to create tables -----------------------------------------------------------------------------
$eplug_tables = array("
CREATE TABLE ".MPREFIX."views (
  news_id varchar(11) NOT NULL default '',
  total_views int(11) NOT NULL default '0',
  type varchar(11) NOT NULL ,
  PRIMARY KEY (news_id)
) ENGINE=MyISAM;");

$eplug_prefs = array(
	"views_plugin_enable"  =>  true,
	"views_count_news"  =>  true,
	"views_count_page"  =>  false,
	"views_count_news_after" => "{NEWSDATE}",
	"views_count_video"  =>  true,
	"views_menu_limit"  =>  LAN_VIEWS_29,		
	"views_menu_limit"  =>  5,		
  );

// Create a link in main menu (yes=TRUE, no=FALSE) -------------------------------------------------------------
$eplug_link = FALSE;
$eplug_link_name = "Views";
$eplug_link_url = e_PLUGIN."Views";


// Text to display after plugin successfully installed ------------------------------------------------------------------
$eplug_done = LAN_VIEWS_4 ;


// upgrading ... //

$upgrade_add_prefs = array(
	"views_count_video"  =>  true,
	"views_menu_caption"  =>  LAN_VIEWS_29,	
	"views_menu_limit"  =>  5,		

  );
  
$upgrade_remove_prefs = "";
if ($pref['plug_installed']['views'] = 2)
	$upgrade_alter_tables = array("ALTER TABLE ".MPREFIX."views ADD type varchar(11) NOT NULL AFTER total_views;",);
else 
	$upgrade_alter_tables = "";
	
$eplug_upgrade_done = LAN_VIEWS_30;


?>