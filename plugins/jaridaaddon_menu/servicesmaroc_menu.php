<?php
/*

*/
if (!defined('e107_INIT')) { exit; }

include_lan(e_PLUGIN."servicesmaroc_menu/languages/".e_LANGUAGE.".php");

$text ="
<div class='art-blockcontent'>

	<span class='on-the-web '>
		<a href='http://habous.net/horaire%20de%20priere/default.php?ville=94' title='".LAN_SERVICEMAROC_2."' target='_blank'>
			<img typeof='foaf:Image' src='".e_PLUGIN."/jaridaaddon_menu/images/salat.jpg' alt='".LAN_SERVICEMAROC_2."' title='".LAN_SERVICEMAROC_2."' />
		</a>
	</span>	
	<span class='on-the-web '>
		<a href='http://www.oncf.ma/Pages/Horaires.aspx' title='".LAN_SERVICEMAROC_4."' target='_blank'>
			<img typeof='foaf:Image' src='".e_PLUGIN."/jaridaaddon_menu/images/train.jpg' alt='".LAN_SERVICEMAROC_4."' title='".LAN_SERVICEMAROC_4."' />
		</a>
	</span>
	<span class='on-the-web '>
		<a href='http://www.marocmeteo.ma' title='".LAN_SERVICEMAROC_3."' target='_blank'>
			<img typeof='foaf:Image' src='".e_PLUGIN."/jaridaaddon_menu/images/meteo.jpg' alt='".LAN_SERVICEMAROC_3."' title='".LAN_SERVICEMAROC_3."' />
		</a>
	</span>	
	

</div>

";

	
$ns->tablerender(LAN_SERVICEMAROC_1, $text );

?>