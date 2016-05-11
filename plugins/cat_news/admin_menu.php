<?php

if (!defined('e107_INIT')) { exit; }


   $menutitle  = CATNEWS_MENU_01;

   $butname[]  = CATNEWS_MENU_02;
   $butlink[]  = "admin_config.php";
   $butid[]    = "config";

   $butname[]  = CATNEWS_MENU_03;
   $butlink[]  = "admin_right.php";
   $butid[]    = "options";

   $butname[]  = CATNEWS_MENU_04;
   $butlink[]  = "admin_left.php";
   $butid[]    = "help";

   global $pageid;
   for ($i=0; $i<count($butname); $i++) {
      $var[$butid[$i]]['text'] = $butname[$i];
      $var[$butid[$i]]['link'] = $butlink[$i];
   };

   show_admin_menu($menutitle, $pageid, $var);


?>