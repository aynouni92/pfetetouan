<?php
if (!defined('e107_INIT')) { exit; }
if($pref['facecomment_enabled'])
{ 
	// $jquery_loaded = preg_match("/<script.*?src=[\"']jquery[^\"']\"/i", ob_get_contents()); 
	if (e_PAGE == "news.php") {
		require_once(THEME.'theme.php');
		$search1 = "{NEWSCOMMENTS}";	
		$replace1 = "{COMMENTSCOUNT}";	
		$NEWSSTYLE  = str_replace($search1, $replace1, $NEWSSTYLE);				

		$search2 = "{NEWSCOMMENTCOUNT}";	
		$replace2 = "{COMMENTSCOUNT}";	
		$NEWSSTYLE  = str_replace($search2, $replace2, $NEWSSTYLE);				
		
		$NEWSSTYLE .= "{COMMENTSNEWS}";
	}		

	if (e_PAGE == "ytm.php") {
		$videocomment = 
			"<div style='text-align:center;'> 
			".$pref['facecomment_observation'] ."<br /><br />
			<div class='fb-comments' data-href='" . e_SELF ."?view=". $_GET['view'] . "' data-num-posts='".$pref['facecomment_numpost']."' data-width='".$pref['facecomment_width']."'></div>
			</div>";
	}	 
	
	$pref['facecomment_width']  = !$pref['facecomment_width'] ? '500' : intval($pref['facecomment_width']);	
	$pref['facecomment_numpost']  = !$pref['facecomment_numpost'] ? '10' : intval($pref['facecomment_numpost']);	
	
	// $header .= $pref['facecomment_observation'];
	echo "<!--";
	if ($pref['facecomment_id'])
		echo '<meta property="fb:app_id" content="'.$pref['facecomment_id'].'"/>';
		echo "\n";
	if ($pref['facecomment_admin'])
		echo '<meta property="fb:app_admin" content="'.$pref['facecomment_admin'].'"/>';
		echo "\n";
	echo "-->";	
	$headers = "{FACEBOOKJS}";
	$HEADER = $headers . $HEADER ;

	/*
	if ($pref['facecomment_type'] == "div")
	{
	if (!$jquery_loaded)
		echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>';
	
	
	echo "
	<script type='text/javascript'>
	$.ajaxSetup ({
		cache: false
	});
	var ajax_load = \"<img src='img/load.gif' alt='loading...' />\";

//	load() functions
	var loadUrl = 'ajax/load.php';
	$('#load_basic').click(function(){
		$('#result').html(ajax_load).load(loadUrl);
	});

	</script>
	";
	}*/
}
?>