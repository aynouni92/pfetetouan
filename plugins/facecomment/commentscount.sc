if($pref['facecomment_enabled'] AND $pref['facecomment_displaycount'])
{ 
	global $pref;
	$news_item = getcachedvars('current_news_item');	
	if ($pref['facecomment_type'] == "div")
		return "التعليقات (<fb:comments-count href=".SITEURL."news.php?extend.$news_item[news_id]/></fb:comments-count>)";
	else  
		return "التعليقات <iframe src='http://www.facebook.com/plugins/comments.php?href=".SITEURL."news.php?extend.$news_item[news_id]&permalink=1' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:130px; height:13px;' allowTransparency='true'></iframe>";
		

}



