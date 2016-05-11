<?php
require_once("../../class2.php");
define("e_PAGETITLE",$pref['views_menu_caption']) ;
require_once(HEADERF);

global $tp,$e107cache;

// Load Data
if($cacheData = $e107cache->retrieve("mostviewed"))
{
	echo $cacheData;
	return;
}
	unset($text);
	if (empty($pref['views_menu_days']))
		$pref['views_menu_days']  = 365;
		
	$nextWeek = time() - ($pref['views_menu_days'] * 24 * 60 * 60); 


	// $lastweek = date(time(),strtotime('-1 week')) ;
	//$text ="";			
	$query1 = 	"SELECT * 
				FROM #news AS n, #views AS v
				WHERE n.news_id = v.news_id AND n.news_datestamp >= ".$nextWeek."
				ORDER BY v.total_views DESC LIMIT 0, 39" ;
			

    $sql->db_Select_gen($query1);
    while ($news_item = $sql->db_Fetch())
    {
		extract($news_item);
        $text .= " - <a href='" . e_BASE . "news.php?extend." . $top['news_id'] . "' title='".$news_title."' >" . $news_title . "</a> <hr /><br />";

    } 
	ob_start();
	$ns->tablerender($pref['views_menu_caption'], $text);
	$cache_data = ob_get_flush();
	$e107cache->set("mostviewed", $cache_data);

	require_once(FOOTERF);

?>