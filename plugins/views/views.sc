/*Mohamed Anouar Achoukhy - Naja7host.CoM
//Last Update: 05.12.2010
*/
if ($pref['views_plugin_enable'] == 1) 
{ 
	/* render Views button */
	if ($pref['views_count_news'] == 1) 
	{ 
	parse_str($parm);
	global $tp, $pref ;

	include_lan(e_PLUGIN."views/languages/".e_LANGUAGE.".php");
	$news_item = getcachedvars('current_news_item'); 
	$query = "SELECT total_views FROM ".MPREFIX."views WHERE news_id = '$news_item[news_id]' ";
	$result = mysql_query($query);
	$array = mysql_fetch_assoc($result);
	$totalviews =  $array['total_views'];
	$text ="";
	
	if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) {
		$sql2 = new db;
		if (empty($totalviews))	
				{
				$sql2->db_Insert("views", "'$news_item[news_id]', '1','news'");
				$text .= LAN_VIEWS_6." (1)";
				}
		else	{
				$u_new = $totalviews + 1;
				$sql2->db_Update("views", "total_views='$u_new' , type='news' WHERE news_id='$news_item[news_id]' ");
				$text .="
					<script type='text/javascript'> 
						$(document).ready(function () { 
							$('#views').append(' (". $u_new .") '); 
						}); 
					</script> 
				
					<div id=\"views\">".LAN_VIEWS_6." </div>";
				}
	} 

	return $text;
	}
}	
//Mohamed Anouar Achoukhy / Naja7host.CoM