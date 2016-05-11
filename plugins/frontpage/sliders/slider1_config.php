<?php
// =========================================================================
// POST SETTINGS
// ===========================================================================

if(file_exists(e_PLUGIN.'frontpage/sliders/slider1_'.e_LANGUAGE.'.php')) 
	include_lan(e_PLUGIN.'frontpage/sliders/slider1_'.e_LANGUAGE.'.php');
else 
	include_lan(e_PLUGIN.'frontpage/sliders/slider1_English.php');

	
if (isset($_POST['frontpage_news_submit_slider1'])) {

	$pref['frontpage_news_slider'] = $_POST['frontpage_news_slider'];
	$pref['frontpage_news_rest'] = $_POST['frontpage_news_rest']; 
	$pref['frontpage_news_silder1_vit'] = $_POST['frontpage_news_silder1_vit']; 
	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "<tr>
				<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
			</tr>";		
}   

// ===========================================================================

	$text .= $rs->form_open("post", e_SELF."?news" ,  'frontpage_news_submit_slider1', '', 'enctype="multipart/form-data"') .
		"<tr>
			<td class='forumheader3' style='width:35%'>". LAN_SLIDERS1_2 ."</td>
			<td class='forumheader3' style='width:65%'><input class='tbox' name='frontpage_news_slider' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_news_slider'], $pref['frontpage_news_slider'])."' /> </td>
		</tr>
		<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_36 ."</td>
			<td class='forumheader3' style='width:65%'><input class='tbox' name='frontpage_news_rest' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_news_rest'], $pref['frontpage_news_rest'])."' /> </td>
		</tr>
		<tr>
			<td class='forumheader3' style='width:35%'>". LAN_SLIDERS1_3 ."</td>
			<td class='forumheader3' style='width:65%'><input class='tbox' name='frontpage_news_silder1_vit' size='5' maxlength='5' type='text' value='".varsettrue($_POST['frontpage_news_silder1_vit'], $pref['frontpage_news_silder1_vit'])."' /> </td>
		</tr>		
		<tr>
			<td class='forumheader' colspan='2' style='text-align:left; vertical-align: top;'>
				<input type='submit' class='button' name='frontpage_news_submit_slider1' value='".LAN_SAVE."' />
			</td>
		</tr>".$rs->form_close();	
// =========================================================================

?>