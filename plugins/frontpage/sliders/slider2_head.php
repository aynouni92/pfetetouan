<?php
unset($vitese);
if ($pref['frontpage_news_silder1_vit'])
	$vitese = $pref['frontpage_news_silder1_vit'];
else 
	$vitese = "5000";	
	
	echo '
	<!-- slide show -->
	<link rel="stylesheet" type="text/css" href="' . SITEURL . e_PLUGIN . 'frontpage/sliders/slider2/style2.css" />
	<script type="text/javascript" src="' .SITEURL. e_PLUGIN . 'frontpage/sliders/slider2/jquery.min.js" ></script>
	<script type="text/javascript" src="' .SITEURL. e_PLUGIN . 'frontpage/sliders/slider2/jquery-ui.min.js" ></script>
	<script type="text/javascript"> 
		$(document).ready(function(){
			$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", '. $vitese .', true);
		});
	</script>
	';

?>