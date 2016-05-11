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


if (isset($_POST['frontpage_commerce_submit_button'])) {
	$pref['frontpage_image_partner'] = $_POST['frontpage_image_partner'];	
	$pref['frontpage_image_partner_alt'] = $_POST['frontpage_image_partner_alt'];
	$pref['frontpage_footerjs'] = $tp->toHTML($_POST['frontpage_footerjs'], FALSE, "nobreak, retain_nl, no_make_clickable, no_replace, emotes_off, no_hook");
	//echo $tp->toHTML($_POST['frontpage_footerjs'], FALSE, "nobreak, retain_nl, no_make_clickable, no_replace, emotes_off, no_hook");
	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "<tr>
				<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
			</tr>";		
}


//==============

$text .= "
<form method='post' action='" . e_SELF . "' id='frontpage'>
	<table class='fborder' style='" . ADMIN_WIDTH . "'>
		<tr>
			<td class='fcaption' colspan='2'>" . LAN_FRONTPAGE_3 ." - ". LAN_FRONTPAGE_27 . "</td>
		</tr>
		<tr>
			<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
		</tr>";
		
// image corner
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_FRONTPAGE_5 . "</td>
			<td class='forumheader3'>";
			$param = "frontpage_image_partner,".e_IMAGE.",".$pref['frontpage_image_partner'].",150px,100px,";
			$text .= $tp->parseTemplate("{IMAGESELECTOR={$param}}");
			$text .= "
			</td>
		</tr>";

	$text .= "<tr>
	<td style='width:20%' class='forumheader3'>".LAN_FRONTPAGE_6."</td>
	<td style='width:80%' class='forumheader3'>"
		.$rs->form_text("frontpage_image_partner_alt", 53, $pref['frontpage_image_partner_alt'] , 100)."</td>
	</tr>";		
		
// google analytics
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_FRONTPAGE_7 . "</td>
			<td class='forumheader3'>
				<textarea class='tbox' name='frontpage_footerjs' cols='60' rows='10' />". $pref['frontpage_footerjs'] ."</textarea></td>
		</tr>";
		
		
// submit button

	$text .= "

	<tr>
	<td colspan='2' class='forumheader3' style='text-align: center;'>
	<input class='button' type='submit' name='frontpage_submit_button' value='".LAN_FRONTPAGE_15."' />
	</td>
	</tr>


	";
	
$text .= "</table></form>";
?>
 
