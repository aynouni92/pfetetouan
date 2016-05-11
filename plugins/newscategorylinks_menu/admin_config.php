<?php
/*
+---------------------------------------------------------------------------------+
| News Category Links Menu - a menu plugin that diplays news category links by bk
| Advanced News Category Links Menu - a menu plugin that diplays news category links by Naja7host 
|               Released under the terms and conditions of the
|                 GNU General Public License (http://gnu.org).
+---------------------------------------------------------------------------------+
*/
$eplug_admin = true;
require_once('../../class2.php');
if ( ! getperms('P')) { header('location:'.e_BASE.'index.php'); exit(); }

require_once(e_ADMIN."auth.php");

// Get language file (assume that the English language file is always present)
include_lan(e_PLUGIN."newscategorylinks_menu/languages/".e_LANGUAGE.".php");

require_once(e_HANDLER."form_handler.php");
$rs = new form;

// Update settings ----------------------------------------+
if(IsSet($_POST['updatemain']))
{
	extract($_POST);
	
	$pref['nclm_all']					= $nclm_all;
	$pref['nclm_caption']				= $nclm_caption;
	$pref['nclm_cat']					= $nclm_cat;
	$pref['nclm_mainlink']				= $nclm_mainlink;
	$pref['nclm_ulclass']				= $nclm_ulclass;
	$pref['nclm_ilclass']				= $nclm_ilclass;
	$pref['nclm_render']				= $nclm_render;

	save_prefs();
	$message = NEWSCATEGORYLINKSMENU_PLUGIN_08;
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
			<td colspan='2' class='forumheader'>
				".NEWSCATEGORYLINKSMENU_PLUGIN_02."
			</td>
		</tr>
		";
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>".NEWSCATEGORYLINKSMENU_PLUGIN_10."</td>
			<td style='width:60%' class='forumheader3'>".$rs -> form_text("nclm_caption", 30, $pref['nclm_caption'], 255)."</td>
		</tr> ";	

$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>".NEWSCATEGORYLINKSMENU_PLUGIN_11."</td>
			<td style='width:60%' class='forumheader3'>".
				$rs -> form_select_open(nclm_render).
				$rs -> form_option(NEWSCATEGORYLINKSMENU_PLUGIN_12, (($pref['nclm_render'] == 0)?"1":""), $form_value = "0").
				$rs -> form_option(NEWSCATEGORYLINKSMENU_PLUGIN_13, (($pref['nclm_render'] == 1)?"1":""), $form_value = "1").
				$rs -> form_select_close().
			"</td>
		</tr> ";			
		
$text .= "
		<tr>
			<td style='width:40%' class='forumheader3'>".NEWSCATEGORYLINKSMENU_PLUGIN_03."</td>
			<td style='width:60%' class='forumheader3'>".
				$rs -> form_select_open(nclm_all).
				$rs -> form_option(NEWSCATEGORYLINKSMENU_PLUGIN_04, (($pref['nclm_all'] == 0)?"1":""), $form_value = "0").
				$rs -> form_option(NEWSCATEGORYLINKSMENU_PLUGIN_05, (($pref['nclm_all'] == 1)?"1":""), $form_value = "1").
				$rs -> form_select_close().
			"</td>
		</tr>
		<tr>
			<td style='width:40%' class='forumheader3'>" . NEWSCATEGORYLINKSMENU_PLUGIN_14 . "</td>
			<td style='width:60%' class='forumheader3'>".
				$rs -> form_select_open(nclm_mainlink).
				$rs -> form_option(NEWSCATEGORYLINKSMENU_PLUGIN_04, (($pref['nclm_mainlink'] == 0)?"1":""), $form_value = "0").
				$rs -> form_option(NEWSCATEGORYLINKSMENU_PLUGIN_05, (($pref['nclm_mainlink'] == 1)?"1":""), $form_value = "1").
				$rs -> form_select_close().
			"</td>
		</tr>	
		<tr>
			<td style='width:40%' class='forumheader3'>".NEWSCATEGORYLINKSMENU_PLUGIN_15."</td>
			<td style='width:60%' class='forumheader3'>".$rs -> form_text("nclm_ulclass", 30, $pref['nclm_ulclass'], 255)."</td>
		</tr> 			
		<tr>
			<td style='width:40%' class='forumheader3'>".NEWSCATEGORYLINKSMENU_PLUGIN_16."</td>
			<td style='width:60%' class='forumheader3'>".$rs -> form_text("nclm_ilclass", 30, $pref['nclm_ilclass'], 255)."</td>
		</tr> 			
			</tr>		
		<tr>
			<td colspan='2' class='forumheader'>
				".NEWSCATEGORYLINKSMENU_PLUGIN_06."
			</td>
		</tr>";			

   while($row = $sql->db_Fetch() )
   {
			$ch = (in_array($row['category_id'], $pref['nclm_cat']) ? " checked='checked'" : '');
			// list category in checkbox 
			$text .= "
			<tr>
			<td style='width:40%' class='forumheader3'>" . $row['category_name'] . "</td>
			<td style='width:60%' class='forumheader3'><input class='tbox' type='checkbox' name='nclm_cat[ ]' value='{$row['category_id']}' {$ch} /></td>
			</tr>";
   $i++;
   }		

$text .="
		<tr style='vertical-align:top'>
			<td colspan='2' style='text-align:center' class='forumheader'>
			<input class='button' style='cursor:hand; cursor:pointer' type='submit' name='updatemain' value='".NEWSCATEGORYLINKSMENU_PLUGIN_07."' />
			</td>
		</tr>
	</table>
	<br />
	<br />
	".$rs -> form_close();	


$ns -> tablerender(NEWSCATEGORYLINKSMENU_PLUGIN_02 , $text);
require_once(e_ADMIN.'footer.php');
?>