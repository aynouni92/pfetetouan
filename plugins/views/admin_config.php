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
if(file_exists(e_PLUGIN.'views/languages/'.e_LANGUAGE.'.php')) 
	include_lan(e_PLUGIN.'views/languages/'.e_LANGUAGE.'.php');
else 
	include_lan(e_PLUGIN.'views/languages/English.php');


   // Include page header stuff for admin pages
   require_once(e_ADMIN."auth.php");

   // Handle preferences form being submitted
if (e_QUERY)
{
	$tmp = explode(".", e_QUERY);
	$action = $tmp[0];
	unset($tmp);
}   
   // n.b. to complex to list in this example
if (isset($_POST['pref_submit_button'])) {
	$pref['views_plugin_enable'] = $_POST['views_plugin_enable'];
	$pref['views_count_news'] = $_POST['views_count_news'];
	$pref['views_count_news_after'] = $_POST['views_count_news_after'];
	$pref['views_count_download'] = $_POST['views_count_download'];
	$pref['views_count_page'] = $_POST['views_count_page'];
	$pref['views_count_video'] = $_POST['views_count_video'];
	$pref['views_menu_caption'] = $_POST['views_menu_caption'];
	$pref['views_menu_limit'] = $_POST['views_menu_limit'];
	$pref['views_menu_days'] = $_POST['views_menu_days'];
	save_prefs();
	$e107cache->clear('mostviewed');
	$e107cache->clear('mostviewed_menu');
	$result_msg = LAN_VIEWS_16;
}
   
   // Our informative text
$text = "";

if ($action =="")
{
$text .= "
<form method='post' action='" . e_SELF . "' id='count_views'>
	<table class='fborder' style='" . ADMIN_WIDTH . "'>
		<tr>
			<td class='fcaption' colspan='2'>" . LAN_VIEWS_3 . "</td>
		</tr>
		<tr>
			<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
		</tr>";
// enable/disable the plugin
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_VIEWS_19 . "</td>
			<td class='forumheader3'>
				<input type='radio' name='views_plugin_enable' value='1' ".($pref['views_plugin_enable'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_17."&nbsp;&nbsp;
				<input type='radio' name='views_plugin_enable' value='0' ".(!$pref['views_plugin_enable'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_18."<br />
			</td>
		</tr>";

// menu caption
$text .= "
	<tr>
		<td class='forumheader3' style='width:35%'>". LAN_VIEWS_31 ."</td>
		<td class='forumheader3' style='width:65%'><input class='tbox' name='views_menu_caption' size='25' maxlength='100' type='text' value='".varsettrue($_POST['views_menu_caption'], $pref['views_menu_caption'])."' /> </td>
	</tr>";

// menu limit news
$text .= "
	<tr>
		<td class='forumheader3' style='width:35%'>". LAN_VIEWS_32 ."</td>
		<td class='forumheader3' style='width:65%'><input class='tbox' name='views_menu_limit' size='3' maxlength='3' type='text' value='".varsettrue($_POST['views_menu_limit'], $pref['views_menu_limit'])."' /> </td>
	</tr>";

// menu date
$text .= "
	<tr>
		<td class='forumheader3' style='width:35%'>". LAN_VIEWS_33 ."</td>
		<td class='forumheader3' style='width:65%'><input class='tbox' name='views_menu_days' size='3' maxlength='3' type='text' value='".varsettrue($_POST['views_menu_days'], $pref['views_menu_days'])."' /> 
		</td>
	</tr>";
	
// enable/disable in news
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_VIEWS_5 . "</td>
			<td class='forumheader3'>
				<input type='radio' name='views_count_news' value='1' ".($pref['views_count_news'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_17."&nbsp;&nbsp;
				<input type='radio' name='views_count_news' value='0' ".(!$pref['views_count_news'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_18."<br />
			</td>
		</tr>";

if ($pref['views_count_news_after'] == "{NEWSCOMMENTS}") 
	$selected_newscom = "selected='selected'";
if ($pref['views_count_news_after'] == "{EMAILICON}") 
	$selected_emailicon = "selected='selected'";
if ($pref['views_count_news_after'] == "{NEWSDATE}") 
	$selected_newsdate = "selected='selected'";
if ($pref['views_count_news_after'] == "{NEWSAUTHOR}") 
	$selected_newsauthor = "selected='selected'";
	
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_VIEWS_23 . "</td>
			<td class='forumheader3'>
			<select class='tbox npdropdown' name='views_count_news_after' >
			<option value='{NEWSCOMMENTS}' ".$selected_newscom."   >".LAN_VIEWS_24."</option>
			<option value='{EMAILICON}'    ".$selected_emailicon." >".LAN_VIEWS_25."</option>
			<option value='{NEWSDATE}'     ".$selected_newsdate."  >".LAN_VIEWS_26."</option>
			<option value='{NEWSAUTHOR}'   ".$selected_newsauthor."  >".LAN_VIEWS_27."</option>
			</select>
			</td>
		</tr>";		
// enable/disable in downloads
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_VIEWS_13 . "</td>
			<td class='forumheader3'>
				<input type='radio' disabled name='views_count_download' value='1' ".($pref['views_count_download'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_17."&nbsp;&nbsp;
				<input type='radio' disabled name='views_count_download' value='0' ".(!$pref['views_count_download'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_18."<br />
			</td>
		</tr>";

// enable/disable in pages
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>" . LAN_VIEWS_14 . "</td>
			<td class='forumheader3'>
				<input type='radio' disabled name='views_count_page' value='1' ".($pref['views_count_page'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_17."&nbsp;&nbsp;
				<input type='radio' disabled name='views_count_page' value='0' ".(!$pref['views_count_page'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_18."<br />
			</td>
		</tr>";
		
// enable/disable in videos
if (isset($pref['plug_installed']['ytm_gallery']) )
	$text .= "
			<tr>
				<td style='width:40%' class='forumheader3'>" . LAN_VIEWS_28 . "</td>
				<td class='forumheader3'>
					<input type='radio' name='views_count_video' value='1' ".($pref['views_count_video'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_17."&nbsp;&nbsp;
					<input type='radio' name='views_count_video' value='0' ".(!$pref['views_count_video'] ? " checked='checked'" : "")." /> ".LAN_VIEWS_18."<br />
				</td>
			</tr>";
		
// userclass

	$text .= "

	<tr>
	<td colspan='2' class='forumheader3' style='text-align: center;'><input class='button' type='submit' name='pref_submit_button' value='".LAN_VIEWS_15."' />
	</td>
	</tr>
	";
	
$text .= "</table></form>";

}   

if ($action =="options")
{
$text .= "
<form method='post' action='" . e_SELF . "' id='count_views'>
	<table class='fborder' style='" . ADMIN_WIDTH . "'>
		<tr>
			<td class='fcaption' colspan='2'>" . LAN_VIEWS_3 . "</td>
		</tr>
		<tr>
			<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
		</tr>";
		
	$text .= "

	<tr>
	<td colspan='2' class='forumheader3' style='text-align: center;'>
	<input class='button' type='submit' disabled name='submit_button' value='".LAN_VIEWS_15."' />
	</td>
	</tr>


	";
	
	$text .= "</table></form>";	
}  

if ($action =="readme")
{
$text .= "

	<table class='fborder' style='" . ADMIN_WIDTH . "'>
		<tr>
			<td class='fcaption' colspan='2'>" . LAN_VIEWS_3 . "</td>
		</tr>
		<tr>
			<td class='forumheader3' colspan='2'><strong>" . LAN_VIEWS_4 . "</strong>&nbsp;</td>
		</tr>
		</table>";
		

}  
   // The usual, tell e107 what to include on the page
   $ns->tablerender(LAN_VIEWS_1, $text);

   require_once(e_ADMIN."footer.php");
?>
 
