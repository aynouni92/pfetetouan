<?php
	
	$seo_url = $pref['seo_url'];
    function make_url($news_item)
    {
		global $seo_url;
		$news_seo = strtolower(ereg_replace(' ', '-', $news_item['news_title'])); //added seo
        
        if ($seo_url == TRUE) {
            return "".e_HTTP.$news_item['category_name']."/".$news_item['news_title']."/".$news_item['news_id'].".html";
		} else {
            return "".e_HTTP."news.php?extend.".$news_item['news_id'];
        }
    }
    function make_url_sitemap($news_item)
    {
		global $seo_url;
		$news_seo = strtolower(ereg_replace(' ', '-', $news_item['news_title'])); //added seo
        
        if ($seo_url == TRUE) {
            return "news".$news_item['news_id'].".html";
		} else {
            return "news.php?extend.".$news_item['news_id'];
        }
    }	
	
?>
