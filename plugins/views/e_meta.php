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
// global $tp, $class2, $pref;
if ($pref['views_plugin_enable'] == 1) { 
	/* render Views button */
	if ($pref['views_count_news'] == 1) { 
		if (e_PAGE == "news.php" OR e_PAGE == "comment.php") {
				require_once(THEME.'theme.php');
				if($result = preg_match('{VIEWS}', $NEWSSTYLE)){
				$replace = $pref['views_count_news_after'];
				//print_r(explode('{VIEWS}', $NEWSSTYLE));			
				} else { 
				//print_r(explode('{VIEWS}', $NEWSSTYLE));
				$replace = $pref['views_count_news_after'] ." {VIEWS}";	
				}
				$search = $pref['views_count_news_after'];			
				//$replace = "{EMAILICON} {VIEWS}";
				$NEWSSTYLE  = str_replace($search, $replace, $NEWSSTYLE);	
				
				if ( !defined('JQUERY') ) 
				{
					define('JQUERY','<script  type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>');
					echo JQUERY;
				}
				
				echo "<style  type='text/css' >#views { vertical-align: middle;display : inline }</style>";				
		}		
	}

	if ($pref['views_count_video'] == 1) { 
		if (e_PAGE == "ytm.php" ) {
			include_lan(e_PLUGIN."views/languages/".e_LANGUAGE.".php");
			$video_item = $_GET[view]; 
			$query = "SELECT total_views FROM ".MPREFIX."views WHERE news_id = '$video_item'  ";
			$result = mysql_query($query);
			$array = mysql_fetch_assoc($result);
			$totalviews =  $array['total_views'];
			$VIDEOVIEWS ="";
			$sql2 = new db;
			if (empty($totalviews))	
					{
					$sql2->db_Insert("views", "'$video_item', '1', 'video'");
					$VIDEOVIEWS .="<img src='".e_PLUGIN."views/images/views_icon.png' alt='' style='vertical-align: middle;'  alt='".LAN_VIEWS_6."' /> ".LAN_VIEWS_6." (1)";
					}
			else	{
					$u_new = $totalviews + 1;
					$sql2->db_Update("views", "total_views='$u_new' , type='video' WHERE news_id='$video_item' ");
					$VIDEOVIEWS .="<img src='".e_PLUGIN."views/images/views_icon.png' alt='' style='vertical-align: middle;'  alt='".LAN_VIEWS_6."' /> ".LAN_VIEWS_6." (". $u_new .")";
					}
			return $VIDEOVIEWS;
			
			if ( !defined('JQUERY') ) 
			{
				define('JQUERY','<script  type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>');
				echo JQUERY;
			}
			
			echo "<style  type='text/css' >#views { vertical-align: middle;display : inline }</style>";
		}					
	}	

}
?>