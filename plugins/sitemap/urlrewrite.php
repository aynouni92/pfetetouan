<?php
	
//	$seo_url = false;
    function make_url_sitemap($news_item)
    {
		global $seo_url;
		$news_seo = strtolower(ereg_replace(' ', '-', $news_item['news_title'])); //added seo
        
        if ($seo_url == TRUE) {
            return "news-".$news_item['news_id']."/".$news_seo.".html";
		} else {
            return "news.php?extend.".$news_item['news_id'];
        }
    }	
	
?>