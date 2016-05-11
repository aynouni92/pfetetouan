<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     Steve Dunstan 2001-2002
|     http://e107.org
|     jalist@e107.org
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $Source: /cvsroot/e107/e107_0.7/e107_plugins/rss_menu/e_meta.php,v $
|     $Revision: 1.7 $
|     $Date: 2007/12/06 20:23:05 $
|     $Author: e107steved $
+----------------------------------------------------------------------------+
*/
if (!defined('e107_INIT')) { exit; }
$ir_path = e_PLUGIN.'frontpage/';
	if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'main.php') == TRUE) 
		switch ($pref['frontpage_type_page']) {
			case '0': // News
				include(e_PLUGIN.'frontpage/sliders/'.$pref['frontpage_news_slider_type'].'_head.php');
			break;
			case '1': // religion
			break;
			case '2': // commerce
			break;
}   	


?>