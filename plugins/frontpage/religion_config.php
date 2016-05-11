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


if (isset($_POST['frontpage_religion_submit_button'])) {

	$pref['frontpage_news_enable'] = $_POST['frontpage_news_enable'];
	$pref['frontpage_audio_enable'] = $_POST['frontpage_audio_enable']; 
	$pref['frontpage_banners_enable'] = $_POST['frontpage_banners_enable'];	
	$pref['frontpage_video_enable'] = $_POST['frontpage_video_enable'];
	$pref['frontpage_fatwa_enable'] = $_POST['frontpage_fatwa_enable']; 

	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "<tr>
				<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
			</tr>";		
}

//==============

$text .= "
<form method='post' action='" . e_SELF . "' id='banner_frontpage'>
	<table class='fborder' style='" . ADMIN_WIDTH . "'>
		<tr>
			<td class='fcaption' colspan='2'>" . LAN_FRONTPAGE_3 ." - ". LAN_FRONTPAGE_26 . "</td>
		</tr>
		<tr>
			<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
		</tr>";
		
// enable/disable news
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_FRONTPAGE_29 . "</td>
			<td class='forumheader3'>
				<input type='radio' name='frontpage_news_enable' value='1' ".($pref['frontpage_news_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_17."&nbsp;&nbsp;
				<input type='radio' name='frontpage_news_enable' value='0' ".(!$pref['frontpage_news_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_18."<br />
			</td>
		</tr>";
		
// enable/disable audio
if (isset($pref['plug_installed']['audio'])) 
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_FRONTPAGE_30 . "</td>
			<td class='forumheader3'>
				<input type='radio' name='frontpage_audio_enable' value='1' ".($pref['frontpage_audio_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_17."&nbsp;&nbsp;
				<input type='radio' name='frontpage_audio_enable' value='0' ".(!$pref['frontpage_audio_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_18."<br />
			</td>
		</tr>";

// enable/disable banners
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_FRONTPAGE_31 . "</td>
			<td class='forumheader3'>
				<input type='radio' name='frontpage_banners_enable' value='1' ".($pref['frontpage_banners_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_17."&nbsp;&nbsp;
				<input type='radio' name='frontpage_banners_enable' value='0' ".(!$pref['frontpage_banners_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_18."<br />
			</td>
		</tr>";

// enable/disable video
if (isset($pref['plug_installed']['ytm_gallery'])) 
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_FRONTPAGE_32 . "</td>
			<td class='forumheader3'>
				<input type='radio' name='frontpage_video_enable' value='1' ".($pref['frontpage_video_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_17."&nbsp;&nbsp;
				<input type='radio' name='frontpage_video_enable' value='0' ".(!$pref['frontpage_video_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_18."<br />
			</td>
		</tr>";

// enable/disable fatwa
if (isset($pref['plug_installed']['fatwa'])) 
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_FRONTPAGE_33 . "</td>
			<td class='forumheader3'>
				<input type='radio' name='frontpage_fatwa_enable' value='1' ".($pref['frontpage_fatwa_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_17."&nbsp;&nbsp;
				<input type='radio' name='frontpage_fatwa_enable' value='0' ".(!$pref['frontpage_fatwa_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_18."<br />
			</td>
		</tr>";		

$text .= "
	<tr>
	<td colspan='2' class='forumheader3' style='text-align: center;'>
	<input class='button' type='submit' name='frontpage_religion_submit_button' value='".LAN_FRONTPAGE_15."' />
	</td>
	</tr>


	";		
		
$text .= "</table></form>";	
?>
 
