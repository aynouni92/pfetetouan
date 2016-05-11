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
$order_by="order"; 

	
// Update settings ----------------------------------------+
if(isset($_POST['updatemain']))
{
	extract($_POST);
	$pref['cat_news'] = $cat_news;
	save_prefs();
	$message = CATNEWS_MENU_PLUGIN_01;

}
   	function comparar($a, $b) {
		return strnatcasecmp($a["order"], $b["order"]);
	}
// Main + Message --------------------------------------------------+ 
if($message)
{
	$ns -> tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}

$pref['cat_news'] = named_records_sort($pref['cat_news'], $order_by, true);
$text = "
	<div style='text-align:center'>
	".$rs -> form_open("post", e_SELF, "stylecss", "", "enctype='multipart/form-data'")."
	<table style='".ADMIN_WIDTH."' class='fborder'>
		<tr>
			<td colspan='4' class='forumheader'>
				".CATNEWS_MENU_PLUGIN_09."
			</td>
		</tr>
		";
$text .= "
		<tr>
			<td style='width:10%' class='forumheader3'>".CATNEWS_MENU_PLUGIN_06."</td>
			<td style='width:30%' class='forumheader3'>".CATNEWS_MENU_PLUGIN_03."</td>
			<td style='width:10%' class='forumheader3'>".CATNEWS_MENU_PLUGIN_07."</td>
			<td style='width:10%' class='forumheader3'>".CATNEWS_MENU_PLUGIN_04."</td>
		</tr> ";	


// echo count($pref['cat_news']);
	foreach ($pref['cat_news'] as $i => $value ) {
		$sql3 = new db;
		$sql3->db_Select("news_category", "*", "category_id='".$i."' ");
		$cats = $sql3->db_Fetch();
		
		$row['category_id'] = $i ;
		// echo $pref['cat_news'][$row['category_id']][render] ;  form_hidden
		if ($pref['cat_news'][$row['category_id']][render] == 1) 
			$text .= " 	<tr>
			<td style='width:10%' class='forumheader3'>".$rs -> form_text("cat_news[".$row['category_id']."][order]", 5, $pref['cat_news'][$row['category_id']][order], 2)."</td>		
			<td style='width:40%' class='forumheader3'>" . $cats['category_name'] . "</td>
			<td style='width:20%' class='forumheader3'>". 
				$rs -> form_select_open("cat_news[".$row['category_id']."][render]").
				$rs -> form_option(CATNEWS_MENU_PLUGIN_10, ((integer)$pref['cat_news'][$row['category_id']][render] == 0), 0).
				$rs -> form_option(CATNEWS_MENU_PLUGIN_09, ((integer)$pref['cat_news'][$row['category_id']][render] == 1), 1).
				$rs -> form_option(CATNEWS_MENU_PLUGIN_08, ((integer)$pref['cat_news'][$row['category_id']][render] == 2), 2).
				$rs -> form_select_close().
			"</td>			
			<td style='width:10%' class='forumheader3'>".$rs -> form_text("cat_news[".$row['category_id']."][num]", 5, $pref['cat_news'][$row['category_id']][num], 2)."</td>
			</tr>";
		else 
			$text .= 
			$rs -> form_hidden("cat_news[".$row['category_id']."][order]", $pref['cat_news'][$row['category_id']][order]).
			$rs -> form_hidden("cat_news[".$row['category_id']."][render]", $pref['cat_news'][$row['category_id']][render]).
			$rs -> form_hidden("cat_news[".$row['category_id']."][num]", $pref['cat_news'][$row['category_id']][num]);

			
		$i++;
	   // }
   }
$text .="
		<tr style='vertical-align:top'>
			<td colspan='4' style='text-align:center' class='forumheader'>
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