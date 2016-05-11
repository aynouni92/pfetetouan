<?php
/*
+---------------------------------------------------------------------------------+
| News Category Links Menu - a menu plugin that diplays news category links by bk
| Advanced News Category Links Menu - a menu plugin that diplays news category links by Naja7host 
|               Released under the terms and conditions of the
|                 GNU General Public License (http://gnu.org).
+---------------------------------------------------------------------------------+
*/
if (!defined('e107_INIT')) { exit; }
   // Include plugin language file, check first for site's preferred language
   include_lan(e_PLUGIN."newscategorylinks/languages/".e_LANGUAGE.".php");


   global $sql;


   // Get all news categories sorted by their id
   $sql->db_Select("news_category", "*", "order by category_id", "no_where");
   
   // Initialize page title and content variables
   $newscategorylinks_title = $pref['nclm_caption'];
	if (empty($pref['nclm_ulclass']))
		$nclm_ulclass = "";
	else	
		$nclm_ulclass = "class='".$pref['nclm_ulclass']."'";
		
	if (empty($pref['nclm_ilclass']))
		$nclm_ilclass = "";
	else	
		$nclm_ilclass = "class='".$pref['nclm_ilclass']."'";
		
   $newscategorylinks_text  = "";
	//if ($pref['nclm_all'] == 0 ) 
	$newscategorylinks_text  .= "<ul $nclm_ulclass>";
	if ($pref['nclm_mainlink'] == 0)
		$newscategorylinks_text  .= "<li $nclm_ilclass ><a href='" . e_HTTP . "' >" .NEWSCATEGORYLINKSMENU_PLUGIN_17."</a></li>";
		
   while($row = $sql->db_Fetch() )
   {
	if ($pref['nclm_all'] == 0 ) 
		{
		if ($curcount&1){
			//$n_text .=$sol_separator ."";
		$newscategorylinks_text .= "<li $nclm_ilclass ><a href='" . e_HTTP . "news.php?cat." . $row['category_id'] . "' >" . $row['category_name'] . "</a></li>";
		}else{
			//$n_text .=$sol_separator ."";
		$newscategorylinks_text .= "<li $nclm_ilclass ><a href='" . e_HTTP . "news.php?cat." . $row['category_id'] . "' >" . $row['category_name'] . "</a></li>";
		}		
		$curcount++;		
		}
	else 
		{
		if (in_array($row['category_id'], $pref['nclm_cat']))
		{
			if ($curcount&1){
				//$n_text .=$sol_separator ."";
			$newscategorylinks_text .= "<li $nclm_ilclass ><a href='" . e_HTTP . "news.php?cat." . $row['category_id'] . "' >" . $row['category_name'] . "</a></li>";
			}else{
				//$n_text .=$sol_separator ."";
			$newscategorylinks_text .= "<li $nclm_ilclass  ><a href='" . e_HTTP . "news.php?cat." . $row['category_id'] . "' >" . $row['category_name'] . "</a></li>";
			}		
			$curcount++;		
		}
		else 
				$newscategorylinks_text .="";	
		}
	}
	//if ($pref['nclm_all'] == 0 ) 
		   $newscategorylinks_text  .= "</ul>";	
   $newscategorylinks_text .= "";

   // Build the page 
	if ($pref['nclm_render'] == 0)
		$ns->tablerender($newscategorylinks_title, $newscategorylinks_text);
	else 	
		echo "".$newscategorylinks_text."";
?>