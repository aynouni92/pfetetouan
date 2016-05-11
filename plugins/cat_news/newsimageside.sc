//SC_BEGIN NEWSIMAGE
$rewrite = e_THEME.$pref['sitetheme']."/urlrewrite.php";
if (file_exists($rewrite)) {
   require_once($rewrite);
} else {
   require_once("urlrewrite.php");
}


$news_item = getcachedvars('current_news_item');
$url = make_url($news_item);
$param = getcachedvars('current_news_param');
	/*if (strlen($news_item['news_thumbnail']) == 0)
	{	// If news thumbnail is empty display the no_image.png
		$news_item['news_thumbnail'] = "no_image.png";
	}*/
return (isset($news_item['news_thumbnail']) && $news_item['news_thumbnail']) ? "<a href='$url'><img class='".$GLOBALS['NEWS_CSSMODE']."_image' src='".e_IMAGE_ABS."newspost_images/".$news_item['news_thumbnail']."' alt='' style='border:0;' /></a>" : "";
//SC_END

return "<img src='".e_IMAGE_ABS."newspost_images/".$parm."' alt='' />";

