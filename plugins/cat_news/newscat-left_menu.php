<?php
if (!defined('e107_INIT')) { exit; }

include_lan(e_PLUGIN."cat_news/languages/".e_LANGUAGE.".php");
require_once(e_HANDLER."news_class.php");
$ix = new news;
$nobody_regexp = "'(^|,)(".str_replace(",", "|", e_UC_NOBODY).")(,|$)'";
$order_by="order"; 
$pref['cat_news'] = named_records_sort($pref['cat_news'], $order_by, true);

// URL REWRITE SEO
$rewrite = e_THEME.$pref['sitetheme']."/urlrewrite.php";
if (file_exists($rewrite)) {
   require_once($rewrite);
} else {
   require_once("urlrewrite.php");
}

	foreach ($pref['cat_news'] as $i => $value )
	{
		
		$cat = $i ;
		$limit = $pref['cat_news'][$i]['num'] ;
		if ($pref['cat_news'][$i]['render'] == 1) 
		{
			$query = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE news_category='".$cat ."'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_class IN (".USERCLASS_LIST.") AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")  
			ORDER BY n.news_datestamp DESC LIMIT 0,".$limit;

			if(!$sql->db_Select_gen($query))
			{
				$text = "<div class='mediumtext'>". CATNEWS_MENUS_00 ."</div>";
			} 
			else 
			{
				$text = "<div style='text-align:center'>";
				$NEWSLISTSTYLE1 = "
				{NEWSIMAGESIDE}
				{NEWSTITLELINK=extend}" ;	
				
				while($row = $sql -> db_Fetch()){
				extract($row);
					$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
				}
			
				$text .= "<div style='text-align:left'><a href='".e_BASE."news.php?cat.$cat' > ". CATNEWS_MENUS_01 ."  <img src='".e_PLUGIN."cat_news/next.gif' alt='' style='border:0;' /></a></div>";
				$text .= "</div>";
				$caption = "<a href='".e_BASE."/news.php?cat.$cat' > ". $category_name ." </a>";
			}
			$ns -> tablerender($caption, $text);
			unset($text);				
			unset($category_name);				
			unset($caption);				
		}

	}		
?>
