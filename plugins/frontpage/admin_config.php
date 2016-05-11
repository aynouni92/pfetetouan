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

   // Remember that we must include class2.php
   require_once("../../class2.php");

   // Check current user is an admin, redirect to main site if not
   if (!getperms("P")) {
      header("location:".e_HTTP."index.php");
      exit;
   }
if(file_exists(e_PLUGIN.'frontpage/languages/'.e_LANGUAGE.'.php')) 
	include_lan(e_PLUGIN.'frontpage/languages/'.e_LANGUAGE.'.php');
else 
	include_lan(e_PLUGIN.'frontpage/languages/English.php');

	
	// Include page header stuff for admin pages
	require_once(e_ADMIN."auth.php");
	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	global $sql;
   // Handle preferences form being submitted
if (e_QUERY) {
	$tmp = explode(".", e_QUERY);
	$action = $tmp[0];
	unset($tmp);
}   
   // 
if (isset($_POST['frontpage_submit_button'])) {
	$pref['frontpage_plugin_enable'] = $_POST['frontpage_plugin_enable'];
	$pref['frontpage_type_page'] = $_POST['frontpage_type_page'];	
	//echo $tp->toHTML($_POST['frontpage_footerjs'], FALSE, "nobreak, retain_nl, no_make_clickable, no_replace, emotes_off, no_hook");
	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "<tr>
				<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
			</tr>";	
}



//==============


   
   // Our informative text
$text = "";

if ($action =="") { // General Setting 

$text .= "
	". $rs->form_open("post", e_SELF) ."
	<table class='fborder' style='" . ADMIN_WIDTH . "'>
		<tr>
			<td class='fcaption' colspan='2'>" . LAN_FRONTPAGE_3 . "</td>
		</tr>
		";
$text .= $result;
// enable/disable the plugin
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_FRONTPAGE_19 . "</td>
			<td class='forumheader3'>
				<input type='radio' name='frontpage_plugin_enable' value='1' ".($pref['frontpage_plugin_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_17."&nbsp;&nbsp;
				<input type='radio' name='frontpage_plugin_enable' value='0' ".(!$pref['frontpage_plugin_enable'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_18."<br />
			</td>
		</tr>";
		
// type of frontpage the plugin
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_FRONTPAGE_19 . "</td>
			<td class='forumheader3'>
				<input type='radio' name='frontpage_type_page' value='0' ".(!$pref['frontpage_type_page'] ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_25."<br />
				<input type='radio' name='frontpage_type_page' value='1' ".($pref['frontpage_type_page'] == "1"  ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_26."<br />
				<input type='radio' name='frontpage_type_page' value='2' ".($pref['frontpage_type_page'] == "2"  ? " checked='checked'" : "")." /> ".LAN_FRONTPAGE_27."<br />			
			</td>
		</tr>";
		
// submit button
$text .= "
	<tr>
	<td colspan='2' class='forumheader3' style='text-align: center;'>
	<input class='button' type='submit' name='frontpage_submit_button' value='".LAN_FRONTPAGE_15."' />
	</td>
	</tr>
	";
	
$text .= "</table>".$rs->form_select_close();

}   

if ($action =="news") { // News Setting Page
	include(e_PLUGIN.'frontpage/news_config.php');
}

if ($action =="sliders") { // News Setting Page
	include(e_PLUGIN.'frontpage/sliders_config.php');
}

if ($action =="religion") {// Religion Setting Page
	include(e_PLUGIN.'frontpage/religion_config.php');
}  

if ($action =="commerce") { // Commerce Setting Page
	include(e_PLUGIN.'frontpage/commerce_config.php');
}   

if ($action =="banners") { // Banners Setting Page
	include(e_PLUGIN.'frontpage/banners_config.php');
}  

if ($action =="readme") {// Readme Setting Page

$text .= "

	<table class='fborder' style='" . ADMIN_WIDTH . "'>
		<tr>
			<td class='fcaption' colspan='2'>" . LAN_FRONTPAGE_3 . "</td>
		</tr>
		<tr>
			<td class='forumheader3' colspan='2'><strong>" . LAN_FRONTPAGE_4 . "</strong>&nbsp;</td>
		</tr>
		</table>";
		

}  
   
   // The usual, tell e107 what to include on the page
   $ns->tablerender(LAN_FRONTPAGE_1, $text);

   require_once(e_ADMIN."footer.php");
?>
 
