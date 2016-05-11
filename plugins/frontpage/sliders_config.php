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
if($file_array = $fl->get_files(e_PLUGIN."frontpage/sliders", "_config","standard",0))
{
		sort($file_array);
}

// print_r($file_array);
if (isset($_POST['frontpage_sliders_submit'])) {

	$pref['frontpage_news_slider_type'] = $_POST['frontpage_news_slider_type'];	
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
			<td class='fcaption' colspan='2'>" . LAN_FRONTPAGE_3 ." - ". LAN_FRONTPAGE_25 . " - ". LAN_FRONTPAGE_49 ."</td>
		</tr>";
$text .= $result ;

$text .="
	<tr>
		<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_50 ."</td>
		<td class='forumheader3' style='width:65%'>
			" .$rs->form_open("post", e_SELF."?sliders" ,  'frontpage_sliders_submit', '', 'enctype="multipart/form-data"') ."
            " .$rs->form_select_open('frontpage_news_slider_type' )."
			" .$rs->form_option(LAN_FRONTPAGE_51, '' , 0);
			
			$counter = 0;
			while (isset($file_array[$counter]))
			{
				$fpath = str_replace(e_PLUGIN."frontpage/sliders/","",$file_array[$counter]['path']).str_replace("_config.php","",$file_array[$counter]['fname']);
				$selected = '';
				if (stristr($fpath, $pref['frontpage_news_slider_type']) !== FALSE)
				{
					$selected = " selected='selected'";
				}
				$text .= $rs->form_option($fpath, $selected , $fpath);
				$counter++;
			}			
			
$text .=	$rs->form_select_close()."
			<input type='submit' class='button' name='frontpage_sliders_submit' value='".LAN_SAVE."' />
			".$rs -> form_select_close()."
        </td>
	</tr>";

	include(e_PLUGIN.'frontpage/sliders/'.$pref['frontpage_news_slider_type'].'_config.php');
	


$text .= "</table>";


?>
 
