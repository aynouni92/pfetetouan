<?php
/*
+ ----------------------------------------------------------------------------------------------------+
|        e107 website system 
|        Plugin File :  e107_plugins/facecomment/plugin.php
|        Email: support@naja7host.com
|        $Author: Mohamed Anouar Achoukhy $
+----------------------------------------------------------------------------------------------------+
*/
if (!defined('e107_INIT')) { exit; }

$lan_file = e_PLUGIN."facecomment/languages/admin/".e_LANGUAGE.".php";
include_lan($lan_file);

// Plugin info -------------------------------------------------------------------------------------------------------
$eplug_name = FC_LAN_1;
$eplug_version = "1";
$eplug_author = "Mohamed Anouar Achoukhy";
$eplug_url = "http://www.naja7host.com";
$eplug_email = "support@naja7host.com";
$eplug_description = FC_LAN_2;
$eplug_compatible = "e107 v0.77+";
$eplug_readme = "admin_readme.php";       
$eplug_compliant = TRUE;
// Name of the plugin's folder -------------------------------------------------------------------------------------
$eplug_folder = "facecomment";

// Icon image and caption text ------------------------------------------------------------------------------------
$eplug_icon = $eplug_folder."/images/icon.png";
$eplug_icon_small = $eplug_folder."/images/icon_16.png";
$eplug_logo = $eplug_folder."/images/icon.png";

// List of preferences -----------------------------------------------------------------------------------------------
$eplug_prefs = array(
        "facecomment_enabled" => "0",
        "facecomment_displaycount" => "0",
        "facecomment_width" => "500",
        "facecomment_numpost" => "10",
        "facecomment_observation" => FC_LAN_19 ,
		"facecomment_version" => $eplug_version
);


// List of preferences -----------------------------------------------------------------------------------------------
$eplug_module = TRUE;
$eplug_conffile = "admin_config.php";


// Create a link in main menu (yes=TRUE, no=FALSE) -------------------------------------------------------------
$eplug_link = FALSE;

// Text to display after plugin successfully installed ------------------------------------------------------------------
$eplug_done = FC_LAN_3;

$eplug_uninstall_done = "";

// upgrading ... v. < 1.3 compat//

$upgrade_add_prefs = array(

);

$upgrade_remove_prefs = array(

);

$upgrade_alter_tables = "";

$eplug_upgrade_done = FC_LAN_4;
?>