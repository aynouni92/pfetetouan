<?php
/*

*/
if (!defined('e107_INIT')) { exit; }

include_lan(e_PLUGIN."jaridaaddon_menu/languages/".e_LANGUAGE."_Social.php");

$text ="

<div class='art-blockcontent'>
	<span class='on-the-web otw-facebook'>
		<a href='http://www.facebook.com/pages/الخيمة-بريس/515330085184690' title='".LAN_SOCIALMAROC_2."' target='_blank'>
			<img typeof='foaf:Image' src='".e_PLUGIN."/jaridaaddon_menu/images/facebook.png' alt='".LAN_SOCIALMAROC_3."' title='".LAN_SOCIALMAROC_3."' />
		</a>
	</span>
	
	<span class='on-the-web otw-twitter'>
		<a href='https://twitter.com/alkhaymapress' title='".LAN_SOCIALMAROC_3."' target='_blank'>
			<img typeof='foaf:Image' src='".e_PLUGIN."/jaridaaddon_menu/images/twitter.png' alt='".LAN_SOCIALMAROC_3."' title='".LAN_SOCIALMAROC_3."' />
		</a>
	</span>

	<span class='on-the-web otw-youtube'>
		<a href='http://www.youtube.com/feed/?feature=guide' title='".LAN_SOCIALMAROC_4."' target='_blank'>
			<img typeof='foaf:Image' src='".e_PLUGIN."/jaridaaddon_menu/images/youtube.png' alt='".LAN_SOCIALMAROC_4."' title='".LAN_SOCIALMAROC_4."' />
		</a>
	</span>

	<span class='on-the-web otw-google'>
		<a href='#' title='".LAN_SOCIALMAROC_5."' target='_blank'>
			<img typeof='foaf:Image' src='".e_PLUGIN."/jaridaaddon_menu/images/google.png' alt='".LAN_SOCIALMAROC_5."' title='".LAN_SOCIALMAROC_5."' />
		</a>
	</span>


	<span class='on-the-web otw-feed'>
		<a href='".e_PLUGIN."/rss_menu/rss.php' title='".LAN_SOCIALMAROC_6."' target='_blank'>
			<img typeof='foaf:Image' src='".e_PLUGIN."/jaridaaddon_menu/images/rss.png' alt='".LAN_SOCIALMAROC_6."' title='".LAN_SOCIALMAROC_6."' />
		</a>
	</span>
</div>
";

	
$ns->tablerender(LAN_SOCIALMAROC_1, $text );

?>