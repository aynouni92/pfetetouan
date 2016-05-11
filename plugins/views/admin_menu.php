<?php

if (!defined('e107_INIT')) { exit; }


   $menutitle  = LAN_VIEWS_8;

   $butname[]  = LAN_VIEWS_20;
   $butlink[]  = "admin_config.php";
   $butid[]    = "config";

   $butname[]  = LAN_VIEWS_21;
   $butlink[]  = "admin_config.php?options";
   $butid[]    = "options";
   /*
   $butname[]  = "Count Utils";
   $butlink[]  = "admin_config.php?utils";
   $butid[]    = "utils";
   */
   $butname[]  = LAN_VIEWS_22;
   $butlink[]  = "admin_readme.php";
   $butid[]    = "help";

   global $pageid;
   for ($i=0; $i<count($butname); $i++) {
      $var[$butid[$i]]['text'] = $butname[$i];
      $var[$butid[$i]]['link'] = $butlink[$i];
   };

   show_admin_menu($menutitle, $pageid, $var);


?>