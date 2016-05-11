if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) {
$news_item = getcachedvars('current_news_item'); 
return "
<div class='info'>
". LAN_THEME_12 ." <a href='".SITEURL."news".$news_item['news_id'].".html' rel='nofollow' >".SITEURL."news".$news_item['news_id'].".html</a>
</div>
";
}