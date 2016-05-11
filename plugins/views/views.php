<?php
if (!defined('e107_INIT')) { exit; }

global $tp,$e107cache;

require_once(e_HANDLER."news_class.php");
$ix = new news;

if($cacheData = $e107cache->retrieve("mostviewed_menu"))
{
	echo $cacheData;
	return;
}
	unset($text);
	if (empty($pref['views_menu_days']))
		$pref['views_menu_days']  = 365;
		
	$nextWeek = time() - ($pref['views_menu_days'] * 24 * 60 * 60); 


	$query1 = 	"SELECT * 
				FROM #news AS n, #views AS v
				WHERE n.news_id = v.news_id AND n.news_datestamp >= ".$nextWeek."
				ORDER BY v.total_views DESC LIMIT 0, " .$pref['views_menu_limit'];
			
	$text = "<ul class='views'>";
    $sql->db_Select_gen($query1);
    while ($top = $sql->db_Fetch())
    {
		extract($top);		
		$TITLENEWS = "<li>{NEWSTITLELINK=extend}</li>";		
		$text .= $ix->render_newsitem($top, 'return', '', $TITLENEWS, $param);
    } 
	$text .= "</ul>";
	ob_start();
	$ns->tablerender($pref['views_menu_caption'], $text);
	$cache_data = ob_get_flush();
	$e107cache->set("mostviewed_menu", $cache_data);
	
?>