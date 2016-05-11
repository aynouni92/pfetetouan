<?php
/*
+---------------------------------------------------------------+
|        e107 website system
|        News Counter by Naja7Host (www.naja7host.com)
|
|        Released under the terms and conditions of the
|        GNU General Public License (http://gnu.org).
+---------------------------------------------------------------+
*/



if (isset($_POST['frontpage_banners_submit_button'])) {

	$pref['frontpage_image_banner1'] = $_POST['frontpage_image_banner1'];
	$pref['frontpage_image_banner1_link'] = $_POST['frontpage_image_banner1_link']; 
	$pref['frontpage_image_banner1_desc'] = $_POST['frontpage_image_banner1_desc'];	
	$pref['frontpage_image_banner2'] = $_POST['frontpage_image_banner2'];
	$pref['frontpage_image_banner2_link'] = $_POST['frontpage_image_banner2_link']; 
	$pref['frontpage_image_banner2_desc'] = $_POST['frontpage_image_banner2_desc'];	
	$pref['frontpage_image_banner3'] = $_POST['frontpage_image_banner3']; 
	$pref['frontpage_image_banner3_link'] = $_POST['frontpage_image_banner3_link']; 
	$pref['frontpage_image_banner3_desc'] = $_POST['frontpage_image_banner3_desc'];	

	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
}
   
//==============

$text .= "
<form method='post' action='" . e_SELF . "' id='banner_frontpage'>
	<table class='fborder' style='" . ADMIN_WIDTH . "'>
		<tr>
			<td class='fcaption' colspan='2'>" . LAN_FRONTPAGE_21 . "</td>
		</tr>
		<tr>
			<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
		</tr>";

// banner 1	
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>
			".LAN_FRONTPAGE_24."<br />
			".$rs->form_text("frontpage_image_banner1_link", 53, $pref['frontpage_image_banner1_link'], 100)."<br /><br />
			".LAN_FRONTPAGE_6."<br />
			".$rs->form_text("frontpage_image_banner1_desc", 53, $pref['frontpage_image_banner1_desc'], 100)."<br />
			</td><td class='forumheader3'>";
			$param = "frontpage_image_banner1,".e_IMAGE."banners,".$pref['frontpage_image_banner1'].",280px,100px,";
			$text .= $tp->parseTemplate("{IMAGESELECTOR={$param}}");
			$text .= "
			</td>
		</tr>";		
		
// banner 2 
$text .= "
		<tr>
			<td style='width:40%' class='forumheader4'>			".LAN_FRONTPAGE_24."<br />
			".$rs->form_text("frontpage_image_banner2_link", 53, $pref['frontpage_image_banner2_link'], 100)."<br /><br />
			".LAN_FRONTPAGE_6."<br />
			".$rs->form_text("frontpage_image_banner2_desc", 53, $pref['frontpage_image_banner2_desc'], 100)."<br />
			</td>
			<td class='forumheader4'>";
			$param = "frontpage_image_banner2,".e_IMAGE."banners,".$pref['frontpage_image_banner2'].",280px,100px,";
			$text .= $tp->parseTemplate("{IMAGESELECTOR={$param}}");
			$text .= "
			</td>
		</tr>";
		
// banner 3
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>
			".LAN_FRONTPAGE_24."<br />
			".$rs->form_text("frontpage_image_banner3_link", 53, $pref['frontpage_image_banner3_link'], 100)."<br /><br />
			".LAN_FRONTPAGE_6."<br />
			".$rs->form_text("frontpage_image_banner3_desc", 53, $pref['frontpage_image_banner3_desc'], 100)."<br />
			</td>
			<td class='forumheader3'>";
			$param = "frontpage_image_banner3,".e_IMAGE."banners,".$pref['frontpage_image_banner3'].",280px,100px,";
			$text .= $tp->parseTemplate("{IMAGESELECTOR={$param}}");
			$text .= "
			</td>
		</tr>";		

		
	$text .= "

	<tr>
	<td colspan='2' class='forumheader3' style='text-align: center;'>
	<input class='button' type='submit' name='frontpage_banners_submit_button' value='".LAN_FRONTPAGE_15."' />
	</td>
	</tr>


	";
	
	$text .= "</table></form>";	
?>
 
