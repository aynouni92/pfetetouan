<?php
/*
+ ----------------------------------------------------------------------------------------------------+
|        e107 website system 
|        Plugin File :  e107_plugins/facecomment/plugin.php
|        Email: support@naja7host.com
|        $Author: Mohamed Anouar Achoukhy $
+----------------------------------------------------------------------------------------------------+
*/

	$menutitle = FC_LAN_5;//"Menu Title";

	$butname[] = FC_LAN_6;//config
	$butlink[] = "admin_config.php";  
	$butid[] = "config"; 
	
	$butname[] = FC_LAN_7;//help
	$butlink[] = "admin_readme.php";  
	$butid[] = "help"; 

global $pageid;
	for ($i=0; $i<count($butname); $i++) {
        $var[$butid[$i]]['text'] = $butname[$i];
		$var[$butid[$i]]['link'] = $butlink[$i];
	};

    show_admin_menu($menutitle,$pageid, $var);

?>
