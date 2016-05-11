<?php
/*

*/
$eplug_admin = true;
require_once('../../class2.php');
if ( ! getperms('P')) { header('location:'.e_BASE.'index.php'); exit(); }

require_once(e_ADMIN."auth.php");

// Get language file (assume that the English language file is always present)
include_lan(e_PLUGIN."cat_news/languages/admin/".e_LANGUAGE.".php");

require_once(e_HANDLER."form_handler.php");
$rs = new form;
 // $pref['cat_news'] = array();
// Update settings ----------------------------------------+
if(isset($_POST['updatemain']))
{
	extract($_POST);
	$pref['cat_news'] = $cat_news;
	save_prefs();
	$message = CATNEWS_MENU_PLUGIN_01;
}


// Main + Message --------------------------------------------------+ 
if($message)
{
	$ns -> tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}


// Main settings -----------------------------------------+    
   $sql->db_Select("news_category", "*", "order by category_id", "no_where");

$text = "
	<div style='text-align:center'>
	".$rs -> form_open("post", e_SELF, "stylecss", "", "enctype='multipart/form-data'")."
	<table style='".ADMIN_WIDTH."' class='fborder'>
		<tr>
			<td colspan='5' class='fcaption'>
				".CATNEWS_MENU_PLUGIN_02."
			</td>
		</tr>
		";
$text .= "
		<tr>
			<td style='width:40%' class='forumheader2'>".CATNEWS_MENU_PLUGIN_03."</td>
			<td style='width:20%' class='forumheader2'>".CATNEWS_MENU_PLUGIN_07."</td>
			<td style='width:10%' class='forumheader2'>".CATNEWS_MENU_PLUGIN_04."</td>
			<td style='width:10%' class='forumheader2'>".CATNEWS_MENU_PLUGIN_06."</td>
			<td style='width:10%' class='forumheader2'></td>
		</tr> ";	

		
		
   while($row = $sql->db_Fetch() )
   {
			// $ch = (in_array($row['category_id'], $pref['frontpage_catnews']) ? " checked='checked'" : '');
			$text .= "
			<tr>
			<td style='width:40%' class='forumheader3'>" . $row['category_name'] . "</td>
			<td style='width:20%' class='forumheader3'>". 
				$rs -> form_select_open("cat_news[".$row['category_id']."][render]").
				$rs -> form_option(CATNEWS_MENU_PLUGIN_10, ((integer)$pref['cat_news'][$row['category_id']][render] == 0), 0).
				$rs -> form_option(CATNEWS_MENU_PLUGIN_09, ((integer)$pref['cat_news'][$row['category_id']][render] == 1), 1).
				$rs -> form_option(CATNEWS_MENU_PLUGIN_08, ((integer)$pref['cat_news'][$row['category_id']][render] == 2), 2).
				$rs -> form_select_close().
			"</td>			
			<td style='width:10%' class='forumheader3'>".$rs -> form_text("cat_news[".$row['category_id']."][num]", 5, (empty($pref['cat_news'][$row['category_id']][num]) ? '1' : $pref['cat_news'][$row['category_id']][num]) , 2)."</td>
			<td style='width:10%' class='forumheader3'>".$rs -> form_text("cat_news[".$row['category_id']."][order]", 5, (empty($pref['cat_news'][$row['category_id']][order]) ? $row['category_id'] : $pref['cat_news'][$row['category_id']][order])  , 2)."</td>
			<td style='width:10%' class='forumheader3'></td>
			</tr>";
   $i++;
   }		

$text .="
		<tr style='vertical-align:top'>
			<td colspan='5' style='text-align:center' class='forumheader'>
			<input class='button' style='cursor:hand; cursor:pointer' type='submit' name='updatemain' value='".LAN_SAVE."' />
			</td>
		</tr>
	</table>
	<br />
	<br />
	".$rs -> form_close();	


$ns -> tablerender(CATNEWS_MENU_PLUGIN_02 , $text);
require_once(e_ADMIN.'footer.php');
?>