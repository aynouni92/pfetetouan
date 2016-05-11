<?php
/*
+ ----------------------------------------------------------------------------+
+----------------------------------------------------------------------------+
*/
	include_lan(e_PLUGIN.'frontpage/languages/'.e_LANGUAGE.'_front.php');
	$totalnews = ($pref['frontpage_news_slider'] + $pref['frontpage_news_rest']);
	if (!$pref['frontpage_news_slider_type']) 
		include(e_PLUGIN.'frontpage/sliders/slider1.php');
	else 
		include(e_PLUGIN.'frontpage/sliders/'.$pref['frontpage_news_slider_type'].'.php');

	if (!$pref['frontpage_news_facebook']) 
		$pref['frontpage_news_facebook'] = LAN_FRONTPAGE_99;
		
	include_lan(e_LANGUAGEDIR.e_LANGUAGE.'/lan_news.php');	
	require_once(e_HANDLER."news_class.php");
	$newsfrom = 0;
	$order = 'news_datestamp';
	$ix = new news;
	$nobody_regexp = "'(^|,)(".str_replace(",", "|", e_UC_NOBODY).")(,|$)'";
	
	$query = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
	LEFT JOIN #user AS u ON n.news_author = u.user_id
	LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
	WHERE n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
	AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")
	AND n.news_render_type<2
	ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",".$totalnews;
	
	$sql->db_Select_gen($query);
	


	if (!$sql->db_Select_gen($query))
	{  // No news items
	  // require_once(HEADERF);
	  echo "<br /><br /><div style='text-align:center'><b>".(strstr(e_QUERY, "month") ? LAN_NEWS_462 : LAN_NEWS_83)."</b></div><br /><br />";
	  //require_once(FOOTERF);
	  //exit;
	} 	
	if (!defined('ITEMVIEW'))
	{
	  define('ITEMVIEW', varset($pref['newsposts'],15));
	}	

	$newsList = $sql->db_getList();
	
	$text = $beginslider ;

	$count = 0;
	// do
	// {
		// 
		foreach($newsList  as $row )
		// while (list($key, $row) = each($newsList)) 
		{	
			$NEWSLISTSTYLE1 = $sliderstyle ;		
			$count++;
			if ($count <= $pref['frontpage_news_slider'])
				$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
			else 
				$text1 .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE, $param);
				// $text1 .= $count;
		}	
	// } while($count < $pref['frontpage_news_slider']); 	
	
	$text .= $endslider ;	
	$ns->tablerender($news_cap, $text);
	if ($pref['frontpage_facebook'])
		$ns->tablerender($pref['frontpage_news_facebook'],$tp->toHTML($pref['frontpage_facebook'])); 
	$ns -> tablerender('', $text1, 'no_caption');

// =========================================================================

?>