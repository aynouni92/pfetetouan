<?php

if (!defined('e107_INIT')) { exit; }


   $menutitle  = LAN_FRONTPAGE_8;

   $butname[]  = LAN_FRONTPAGE_20;
   $butlink[]  = "admin_config.php";
   $butid[]    = "config";

switch ($pref['frontpage_type_page']) {
	case '0':
	$butname[]  = LAN_FRONTPAGE_25;
	$butlink[]  = "admin_config.php?news";
	$butid[]    = "news";

	$butname[]  = LAN_FRONTPAGE_48;
	$butlink[]  = "admin_config.php?sliders";
	$butid[]    = "sliders";	
	break;
	case '1':
	$butname[]  = LAN_FRONTPAGE_26;
	$butlink[]  = "admin_config.php?religion";
	$butid[]    = "religion";
	break;
	case '2':
	$butname[]  = LAN_FRONTPAGE_27;
	$butlink[]  = "admin_config.php?commerce";
	$butid[]    = "commerce";

	$butname[]  = LAN_FRONTPAGE_21;
	$butlink[]  = "admin_config.php?banners";
	$butid[]    = "banners";
	break;
}   
   
   $butname[]  = LAN_FRONTPAGE_22;
   $butlink[]  = "admin_readme.php";
   $butid[]    = "help";

   global $pageid;
   for ($i=0; $i<count($butname); $i++) {
      $var[$butid[$i]]['text'] = $butname[$i];
      $var[$butid[$i]]['link'] = $butlink[$i];
   };

   show_admin_menu($menutitle, $pageid, $var);


?>