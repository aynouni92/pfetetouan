	if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) 
	{
		global $pref;
		$news_item = getcachedvars('current_news_item');
			return 
			"<div style='text-align:center;'> 
			".$pref['facecomment_observation'] ."<br /><br />
			<div class='fb-comments' data-href='".SITEURL."news.php?extend.".$news_item['news_id']."' data-num-posts='".$pref['facecomment_numpost']."' data-width='".$pref['facecomment_width']."'></div>
			</div>";
	}