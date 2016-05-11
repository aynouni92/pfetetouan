<?php
	include_lan(e_PLUGIN.'frontpage/languages/'.e_LANGUAGE.'_front.php');
	require_once(e_HANDLER."news_class.php");
	$totalnews = $pref['frontpage_news_slider'] ;
	if (!$pref['frontpage_news_slider_type']) 
		include(e_PLUGIN.'frontpage/sliders/slider1.php');
	else 
		include(e_PLUGIN.'frontpage/sliders/'.$pref['frontpage_news_slider_type'].'.php');

	if (!$pref['frontpage_news_facebook']) 
		$pref['frontpage_news_facebook'] = LAN_FRONTPAGE_99;
		
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

	$newsList = $sql->db_getList();
	
	$text = $beginslider ; 

		foreach($newsList  as $row )
		{	
			$NEWSLISTSTYLE1 = $sliderstyle ;	
			$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
		}
	
	$text .= $endslider ;	
	$ns->tablerender($news_cap, $text);
	
	if ($pref['frontpage_facebook'])
		$ns->tablerender($pref['frontpage_news_facebook'],$tp->toHTML($pref['frontpage_facebook'])); 

		
	$text = "<table border='0'  ><tr>";	
	for ($i=1 ; $i<4 ; $i++) {
		if ($pref['frontpage_box_'.$i.''] != 0) 
		{

			$query1 = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE news_category='".$pref['frontpage_box_'.$i.'']."'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")
			ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",".$pref[frontpage_cat_news];
			$sql->db_Select_gen($query1);
				
				$count = 0;
				while($row = $sql -> db_Fetch())
				{
					extract($row);
					if (strlen($news_thumbnail) == 0)
						$news_thumbnail = "no_image.png";
					if ($count == 0) 
					{
						$text .= "<td style='vertical-align: top;text-align:center;width:33%;'  ><table  class='border_box'  ><tr><td class='title_box'>" . $category_name ."</td></tr>";
						$NEWSLISTSTYLE1 = "						
						<tr>
							<td style='width:100%;height:150px;vertical-align: top;' >								
								{NEWSIMAGETHUMB}
								{NEWSTITLELINK=extend}
								</a>
							</td>
						</tr>";							
						$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);						

					} 
					else {
						$NEWSLISTSTYLE1 = "
							<tr>
								<td style='width:100%;height:40px;vertical-align: top;font-family:Tahoma; font-size:12px;' >
									<hr />
									{NEWSTITLELINK=extend}									
								</td>
							</tr>";
						$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);	
					}
					$count++;
				}
				$text .= "</table></td>";				
		}
	}
	$text .= "</tr></table>";
	$ns -> tablerender('', $text, 'no_caption');
	unset($text);
		
	foreach ($pref['frontpage_catnews'] as $i => $value) {
		$sql3 = new db;

		$sql3->db_Select("news_category", "*", "category_id='".$pref['frontpage_catnews'][$i]."' ");
		$cats = $sql3->db_Fetch();

			$query1 = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE news_category='".$pref['frontpage_catnews'][$i]."'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")
			ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",".$pref[frontpage_cat_news];
			$sql->db_Select_gen($query1);
				$text = "<table border='0' style='width:100%' ><tr>";
				$count = 0;
				while($row = $sql -> db_Fetch()){
		        extract($row);
				if (strlen($news_thumbnail) == 0)
					$news_thumbnail = "no_image.png";
					if ($count == 0) {
						$NEWSLISTSTYLE1 = "
						<td style='width:40%'>
						<h2>{NEWSTITLELINK=extend}</h2>
						{NEWSIMAGETHUMB}<br /><br />
						{NEWSBODY}
						{EXTENDED}	
						</td><td style='width:5%'></td><td style='width:60%;text-align:right'  >";							
						$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
					} 
					else {
						$NEWSLISTSTYLE1 = "
						<table style='width:100%' >
							<tr>
								<td >
								<img src='".e_IMAGE_ABS."newspost_images/".$news_thumbnail."' alt='{NEWSTITLE}' style='width:80px;height:80px;float:right;margin:5px;border:1px solid #c5c5c5;'   />{NEWSTITLELINK=extend}
								<br />
								{NEWSBODY}
								{EXTENDED}	
								</td>
							</tr>
						</table>
						<hr />						
						";							
						$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);

					}
				$count++;
				}
			$text .= "<div style='text-align:left'><a href='".e_BASE."news.php?cat.$news_category' > ". LAN_FRONTPAGE_100 ." <img src='".e_PLUGIN."cat_news/next.gif' alt='". LAN_FRONTPAGE_100 ."' style='border:0;' /></a></div>";
			$text .= "</td></tr></table>";

		$ns -> tablerender($cats['category_name'], $text);
		unset($text);
	}
	unset($text);
	
	$text = "<table border='0'  ><tr>";	
	for ($i=4 ; $i<7 ; $i++) {
		if ($pref['frontpage_box_'.$i.''] != 0) {

			$query1 = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE news_category='".$pref['frontpage_box_'.$i.'']."'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")
			ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",".$pref[frontpage_cat_news];
			$sql->db_Select_gen($query1);
				
				$count = 0;
				while($row = $sql -> db_Fetch())
				{
					extract($row);
					if (strlen($news_thumbnail) == 0)
						$news_thumbnail = "no_image.png";
					if ($count == 0) 
					{
						$text .= "<td style='vertical-align: top;text-align:center;width:33%;'  ><table  class='border_box'  ><tr><td class='title_box'>" . $category_name ."</td></tr>";
						
						$NEWSLISTSTYLE1 = "						
						<tr>
							<td style='width:100%;height:150px;vertical-align: top;' >								
								{NEWSIMAGETHUMB}
								{NEWSTITLELINK=extend}
								</a>
							</td>
						</tr>";							
						$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);						
						
						//$text .= "<tr><td style='width:100%;height:150px;vertical-align: top;' ><a href='".e_HTTP."news.php?extend.".$news_id."'><img src='".e_IMAGE_ABS."newspost_images/".$news_thumbnail."' alt='". $news_title ."' style='width:150px;height:100px;margin:5px;border:1px solid #c5c5c5;'   /><br /> ".$tp->html_truncate($news_title, 50 , '...')."</a></td></tr>";
					} 
					else {
						$NEWSLISTSTYLE1 = "
							<tr>
								<td style='width:100%;height:40px;vertical-align: top;font-family:Tahoma; font-size:12px;' >
									<hr />
									{NEWSTITLELINK=extend}									
								</td>
							</tr>";
						$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);	
					}
					$count++;
				}
				$text .= "</table></td>";		
				
		}
	}
	$text .= "</tr></table>";
	$ns -> tablerender('', $text, 'no_caption');
	unset($text);
	// $ns -> tablerender($cats['category_name'], $text);
?>