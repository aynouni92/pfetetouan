<?php
// =========================================================================
// POST SETTINGS
// ===========================================================================
if (isset($_POST['frontpage_news_submit_default'])) {

	$pref['frontpage_news_slider'] = $_POST['frontpage_news_slider'];
	$pref['frontpage_news_rest'] = $_POST['frontpage_news_rest']; 
	$pref['frontpage_facebook'] = $tp->todb($_POST['frontpage_facebook']);
	// $pref['frontpage_fatwa_enable'] = $_POST['frontpage_fatwa_enable']; 
	// $pref['frontpage_catnews'] = $_POST['frontpage_catnews'];
	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "<tr>
				<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
			</tr>";		
}   

// ===========================================================================

	$text .= $rs->form_open("post", e_SELF."?news" ,  'frontpage_news_submit_default', '', 'enctype="multipart/form-data"') .
		"<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_35 ."</td>
			<td class='forumheader3' style='width:65%'><input class='tbox' name='frontpage_news_slider' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_news_slider'], $pref['frontpage_news_slider'])."' /> </td>
		</tr>
		<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_36 ."</td>
			<td class='forumheader3' style='width:65%'><input class='tbox' name='frontpage_news_rest' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_news_rest'], $pref['frontpage_news_rest'])."' /> </td>
		</tr>
		<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_41 ."</td>
			<td class='forumheader3' style='width:65%'>". $rs->form_textarea("frontpage_facebook", 70, 5, varsettrue($tp->post_toForm($_POST['frontpage_facebook']), $tp->post_toForm($pref['frontpage_facebook'])), "overflow:hidden") ."</td>
		</tr>	
		<tr>
			<td class='forumheader' colspan='2' style='text-align:left; vertical-align: top;'>
				<input type='submit' class='button' name='frontpage_news_submit_default' value='".LAN_SAVE."' />
			</td>
		</tr>".$rs->form_close();	
// =========================================================================

?>