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

//admin status panel

if (!defined('e107_INIT')) { exit; }

include_lan(e_PLUGIN.'views/languages/'.e_LANGUAGE.'.php');
$handle = mysql_query ("SELECT SUM(total_views) AS myvalue FROM ".MPREFIX."views ") ;
// Fetch the row
$row = mysql_fetch_assoc( $handle );
// Grab the data we want out of the row
$views = $row['myvalue'];

$text .= "<div style='padding-bottom: 2px;'>
          <img src='".e_PLUGIN."views/images/views_16.png' style='width: 16px; height: 16px; vertical-align: bottom' alt='' /> ".LAN_VIEWS_5." : ".$views."</div>";
?>