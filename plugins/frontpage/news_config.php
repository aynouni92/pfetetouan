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
require_once(e_HANDLER."file_class.php");

$fl = new e_file;
// $fl1 = new e_file;
$path_conf = e_PLUGIN."frontpage/style-news/";
$path_conf_theme = e_THEME."".$pref['sitetheme']."/style-news/";
if($file_array = $fl->get_files($path_conf, "_config","standard",0))
{
		sort($file_array);
}


if($file_array1 = $fl->get_files($path_conf_theme, "_config","standard",0))
{
		sort($file_array1);
}

// print_r($pref['frontpage_news_style']);
// print_r(e_THEME."".$pref['sitetheme']."/style-news/");
if (isset($_POST['frontpage_news_submit_style'])) {

	$pref['frontpage_news_style'] = $_POST['frontpage_news_style'];	
	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "<tr>
				<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
			</tr>";		
} 

if (isset($_POST['frontpage_news_submit_style'])) {
	$pref['frontpage_news_style'] = $_POST['frontpage_news_style'];	
	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "<tr>
				<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
			</tr>";		
} 

//==============

// News Categories  -----------------------------------------+    

$text .="<table class='fborder' style='" . ADMIN_WIDTH . "'>
		<tr>
			<td class='fcaption' colspan='2'>" . LAN_FRONTPAGE_3 ." - ". LAN_FRONTPAGE_25 . "</td>
		</tr>";
$text .= $result ;

$text .="
	<tr>
		<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_37 ."</td>
		<td class='forumheader3' style='width:65%'>
			" .$rs->form_open("post", e_SELF."?news" ,  'frontpage_news_submit_style', '', 'enctype="multipart/form-data"') ."
            " .$rs->form_select_open('frontpage_news_style' );
			$counter = 0;
			while (isset($file_array[$counter]))
			{
				$fpath = str_replace(e_PLUGIN."frontpage/style-news/","",$file_array[$counter]['path']).str_replace("_config.php","",$file_array[$counter]['fname']);
				$cpath = $file_array[$counter]['path'].$file_array[$counter]['fname'] ;
				$selected = '';
				if (stristr($cpath, $pref['frontpage_news_style']) !== FALSE)
				{
					$selected = " selected='selected'";
				}
				$text .= $rs->form_option($fpath, $selected , $cpath);
				$counter++;
			}			
			$counter = 0;
			while (isset($file_array1[$counter]))
			{
				$fpath = str_replace(e_THEME."".$pref['sitetheme']."/style-news/","",$file_array1[$counter]['path']).str_replace("_config.php","",$file_array1[$counter]['fname']);
				$cpath = $file_array1[$counter]['path'].$file_array1[$counter]['fname'] ;
				$selected = '';
				if (stristr($cpath, $pref['frontpage_news_style']) !== FALSE)
				{
					$selected = " selected='selected'";
					$path_conf = $path_conf_theme;
				}
				$text .= $rs->form_option($fpath, $selected , $cpath);
				$counter++;
			}			
			
$text .=	$rs->form_select_close()."
			<input type='submit' class='button' name='frontpage_news_submit_style' value='".LAN_SAVE."' />
			".$rs -> form_select_close()."
        </td>
	</tr>";

	include($pref['frontpage_news_style']);
	


$text .= "</table>";


?>
 
