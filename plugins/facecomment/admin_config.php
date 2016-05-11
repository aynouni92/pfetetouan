<?php
/*
+ ----------------------------------------------------------------------------------------------------+
|        e107 website system 
|        Plugin Admin File: e107_plugins/facecomment/admin_config.php
|        Email: support@naja7host.com
|        $Author: Mohamed Anouar Achoukhy $
+----------------------------------------------------------------------------------------------------+
*/
require_once("../../class2.php");
if(!getperms("P")){ header("location:".e_BASE."index.php"); exit; } 

$lan_file = e_PLUGIN."facecomment/languages/admin/".e_LANGUAGE.".php";
include_lan($lan_file); 


require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php");
	$rs = new form;	

//Actions
if(isset($_POST['update_prefs'])) {
	//if ($_POST['facecomment_enabled'] == '0' )
	$pref['comments_disabled']  = !$_POST['facecomment_enabled'] ? '0' : '1';
	$pref['facecomment_enabled']  = !$_POST['facecomment_enabled'] ? '0' : '1';
	$pref['facecomment_displaycount'] = !$_POST['facecomment_displaycount'] ? '0' : '1';
	$pref['facecomment_width']  = !$_POST['facecomment_width'] ? '500' : intval($_POST['facecomment_width']);	
	$pref['facecomment_numpost']  = !$_POST['facecomment_numpost'] ? '10' : intval($_POST['facecomment_numpost']);	
	$pref['facecomment_id']  = $_POST['facecomment_id'] ;	
	$pref['facecomment_admin']  = $_POST['facecomment_admin'] ;	
	$pref['facecomment_type']  = $_POST['facecomment_type'];	
	$pref['facecomment_observation'] = $tp->todb($_POST['facecomment_observation']);
	save_prefs();
	show_message(FC_LAN_10, LAN_UPDATED);
	$_SESSION['sessmsg'] = array(FC_LAN_10, LAN_UPDATED);
	session_write_close();
	header("Location: ".e_SELF);
	exit;
	}
	

//session msgs - after-redirect messages
if(isset($_SESSION['sessmsg'])) {
  show_message($_SESSION['sessmsg'][0], $_SESSION['sessmsg'][1]);
  unset($_SESSION['sessmsg']);
}

//Show Admin pages
if($pageid == 'help') {
	header("Location:".e_PLUGIN."facecomment/admin_readme.php"); 

} else {
    $ns->tablerender(FC_LAN_1, show_options());
}

require_once(e_ADMIN."footer.php"); 
exit;

function show_options()
{
	global $pref;
	// echo $pref['comments_disabled'] ;
	$txt = "
	". form::form_open("post", e_SELF) ."
	<table class='fborder' style='width:95%'>
	<tr>
		<td class='fcaption' colspan='2' style='text-align:center'>".FC_LAN_9."</td>
	</tr>
	<tr>
		<td class='forumheader3' style='width:75%'>".FC_LAN_8."</td>
		<td class='forumheader3' style='width:25%'>
            <label for='facecomment_enabled1'>".LAN_ENABLED."</label>
            ".form::form_radio('facecomment_enabled', '1', $pref['facecomment_enabled'])."
            <label for='facecomment_enabled0'>".LAN_DISABLED."</label>
            ".form::form_radio('facecomment_enabled', '0', !$pref['facecomment_enabled'])."
        </td>
	</tr>
	<tr>
		<td class='forumheader3' style='width:75%'>".FC_LAN_12 ."</td>
		<td class='forumheader3' style='width:25%'><input class='tbox' name='facecomment_id' size='15' maxlength='30' type='text' value='".varsettrue($_POST['facecomment_id'], $pref['facecomment_id'])."' /></td>
	</tr>
	<tr>
		<td class='forumheader3' style='width:75%'>".FC_LAN_17 ."</td>
		<td class='forumheader3' style='width:25%'><input class='tbox' name='facecomment_admin' size='15' maxlength='30' type='text' value='".varsettrue($_POST['facecomment_admin'], $pref['facecomment_admin'])."' /></td>
	</tr>	
	<tr>
		<td class='forumheader3' style='width:75%'>".FC_LAN_13 ."</td>
		<td class='forumheader3' style='width:25%'><input class='tbox' name='facecomment_width' size='15' maxlength='4' type='text' value='".varsettrue($_POST['facecomment_width'], $pref['facecomment_width'])."' /> </td>
	</tr>	
	<tr>
		<td class='forumheader3' style='width:75%'>".FC_LAN_14 ."</td>
		<td class='forumheader3' style='width:25%'><input class='tbox' name='facecomment_numpost' size='15' maxlength='3' type='text' value='".varsettrue($_POST['facecomment_numpost'], $pref['facecomment_numpost'])."' /> </td>
	</tr>	
	<tr>
		<td class='forumheader3' style='width:75%'>".FC_LAN_20."</td>
		<td class='forumheader3' style='width:25%'>
            <label for='facecomment_displaycount1'>".LAN_ENABLED."</label>
            ".form::form_radio('facecomment_displaycount', '1', $pref['facecomment_displaycount'])."
            <label for='facecomment_displaycount0'>".LAN_DISABLED."</label>
            ".form::form_radio('facecomment_displaycount', '0', !$pref['facecomment_displaycount'])."
        </td>
	</tr>	
	<tr>
		<td class='forumheader3' style='width:75%'>". FC_LAN_18 ."</td>
		<td class='forumheader3' style='width:25%'>
            ".form::form_select_open('facecomment_type')."
			".form::form_option("iframe", ($pref['facecomment_type'] == 'iframe') , 'iframe')."
			".form::form_option("div", ($pref['facecomment_type'] == 'div'), 'div')."
            ".form::form_select_close()."
        </td>
	</tr>	
	<tr>
		<td class='forumheader3' style='width:35%'>". FC_LAN_15 ."</td>
		<td class='forumheader3' style='width:65%'>". form::form_textarea("facecomment_observation", 70, 10, varsettrue($_POST['facecomment_observation'],$pref['facecomment_observation']), "overflow:hidden") ."</td>
	</tr>		
	<tr>
		<td class='forumheader' colspan='2' style='text-align:left; vertical-align: top;'>
            <input type='submit' class='button' name='update_prefs' value='".LAN_SAVE."' />
        </td>
	</tr>
	</table>
	" . form::form_close() ."
	";
	return $txt;
}
function show_message($message, $caption='', $error=false) {
	global $ns;
	$ns->tablerender($caption, "<div style='text-align:center; font-weight: bold'>".($error ? "<span style='color: #8B0000'>".$message."</span>" : $message)."</div>");
}
?>