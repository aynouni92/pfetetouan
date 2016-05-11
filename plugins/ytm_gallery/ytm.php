<?php
/*
+---------------------------------------------------------------+
|        YouTube Gallery v4.01 - by Erich Radstake
|        http://www.erichradstake.nl
|        info@erichradstake.nl
|
|        This is a module for the e107 .7+ website system
|        Copyright Steve Dunstan 2001-2002
|        http://e107.org
|        jalist@e107.org
|
|        Released under the terms and conditions of the
|        GNU General Public License (http://gnu.org).
|
+---------------------------------------------------------------+
*/

require_once("../../class2.php");
require_once(e_HANDLER."userclass_class.php");
$lan_file = e_PLUGIN."ytm_gallery/languages/".e_LANGUAGE.".php";
require_once(file_exists($lan_file) ? $lan_file :  e_PLUGIN."ytm_gallery/languages/English.php");
// require_once( e_PLUGIN."ytm_gallery/plugin.php");
// require_once( e_PLUGIN."ytm_gallery/_drawrating.php");
// require_once(e_HANDLER."comment_class.php");



// Check if plugin isn't in upgrade modus
/*
$query20  = "SELECT plugin_version FROM ".MPREFIX."plugin WHERE plugin_path = 'ytm_gallery'";
$result20 = mysql_query($query20);
while ($row20 = mysql_fetch_array($result20,MYSQL_ASSOC)) {
$inst_version = $row20['plugin_version'];
} */

if(isset($_GET['cat']))
	$movie_cat = $_GET['cat'];
else
	$movie_cat = $_POST['cat'];

if(isset($_GET['view']))
	$view_movie = $_GET['view'];


$back_string      = $_GET['string'];
$back_string_page = $_GET['sp'];
$back_gal_cat     = $_GET['galc'];
$back_gal_page    = $_GET['galp'];

$query01  = "SELECT title_gallery, movie_colum, movie_row, submit_class, gal_order, disp_title, disp_search, seo, short_title, short_title_count, menu_width, menu_height,  title_tp FROM ".MPREFIX."er_ytm_gallery WHERE id = '1'";
$result01 = mysql_query($query01);
	while ($row01 = mysql_fetch_array($result01,MYSQL_ASSOC))
		{
		$colum            = $row01['movie_colum'];
		$rows             = $row01['movie_row'];
		$ym_title         = $row01['title_gallery'];
		$sub_class        = $row01['submit_class'];
		$gal_order        = $row01['gal_order'];
		$dt_way           = $row01['disp_title'];
		$ss_way           = $row01['disp_search'];
		// $sd_way           = $row01['disp_download'];
		$at_way           = $row01['short_title'];
		$atc_way          = $row01['short_title_count'];
		$ytm_rate_tp      = $row01['title_tp'];
		$store_seo			= $row01['seo'];
		$pict_width       = $row01['menu_width'];
		$pict_height      = $row01['menu_height'];
		}


// Movie Page
if ($view_movie) 
	{
		if(isset($_GET['p']))
			$back_page = $_GET['p'];

		if(isset($_GET['c']))
			$back_cat = $_GET['c'];

		if(isset($_GET['toppage']))
			$back_toppage = $_GET['toppage'];

			if (!$back_cat == "") {
				if ( $store_seo == 1 )
					$backbutton = "$back_page-cat-$back_cat";
				else
					$backbutton = "" . e_SELF . "?paging=$back_page&cat=$back_cat";
			} else {
				if ( $store_seo == 1 )
					$backbutton = "" . e_HTTP . "video/list/$back_page";
				else
					$backbutton = "" . e_SELF . "?paging=$back_page";
			}

		$query06          = "
		SELECT movie_title, cat_name, cat_auth, input_user, timestamp FROM ".MPREFIX."er_ytm_gallery_movies gm
		LEFT JOIN ".MPREFIX."er_ytm_gallery_category gg ON gm.movie_category = gg.cat_id
		WHERE movie_code = '$view_movie'";

		$result06          = mysql_query($query06);
		while ($row06      = mysql_fetch_array($result06,MYSQL_ASSOC)) 
			{
				$view_title        = $row06['movie_title'];
				$view_category     = $row06['cat_name'];
				$view_user         = $row06['input_user'];
				$view_timestamp    = $row06['timestamp'];
				$view_new_cat_auth = $row06['cat_auth'];
			}

		define("e_PAGETITLE", $view_title);
		define("META_DESCRIPTION", $view_title ." - ". $view_category ." - ". SITENAME );
		require_once(HEADERF);
		$view_timestamp = date("d-m-Y", strtotime($view_timestamp));

		if     (!$view_title) {$displvideo = LAN_YTM_PAGE_20;}
		elseif (!check_class($view_new_cat_auth)) {$displvideo = LAN_YTM_PAGE_27;}
		else   
			{
				$displvideo = "
				<center>
				<h3>$view_title</h3><br />
				<object width='425' height='350'>
				<param name='movie' value='http://www.youtube.com/v/$view_movie'></param>
				<param name='wmode' value='transparent'></param>
				<embed src='http://www.youtube.com/v/$view_movie' type='application/x-shockwave-flash' wmode='transparent' width='425' height='350'></embed>
				</object>
				<br /><br />
				$VIDEOVIEWS
				<br /><br />
				$videocomment
				<br /><br />
				</center>";

				/*
				$text .= '
				<script type="text/javascript" src="jquery.min.js"></script>
				<script type="text/javascript" src="projekktor.min.js"></script>
				<link rel="stylesheet" href="maccaco/style.css" type="text/css" media="screen" />
				<video id="demoplayer" class="projekktor" title="barhoum.com" poster="http://img.youtube.com/vi/'.$view_movie.'/1.jpg" src="http://www.youtube.com/watch?v='.$view_movie.'" type="video/youtube" width="425" height="350" controls>
				</video>
				<br /><br />
				';
				$text .= "
				<script type='text/javascript'>
				$(document).ready(function() {
				 projekktor('#demoplayer');
				})
				</script>  
				";
				*/


				//$text .= "<sup>" . LAN_YTM_PAGE_9 . ": $view_category. " . LAN_YTM_PAGE_10 . " $view_user " . LAN_YTM_PAGE_11 . " $view_timestamp</sup><br /><br />";

				if ($back_string)
					{
						if ($back_gal_page) {$galsp = "&refp=$back_gal_page";}
						if ($back_gal_cat)  {$galsp .= "&refc=$back_gal_cat";}
						$displvideo .= "<a href='search.php?string=$back_string&paging=$back_string_page$galsp' title='" . LAN_YTM_PAGE_21 . "'>" . LAN_YTM_PAGE_19 . "</a><br />";
					} 
				else
					{
						if ($back_toppage)
						{
							$displvideo .= "<br /><a href='".e_PLUGIN."ytm_gallery/ytm_top_page.php' title='" . LAN_YTM_PAGE_28 . "'>" . LAN_YTM_PAGE_19 . "</a><br /><br /><br />";
						}
						else
						{
							$displvideo .= "<br /><a href='$backbutton' title='" . LAN_YTM_PAGE_14 . "'>" . LAN_YTM_PAGE_19 . "</a><br /><br /><br />";
						}
					}

				if(check_class($sub_class)) 
					{
						$displvideo .= "<br /><sub><a href='".e_PLUGIN."ytm_gallery/ytm_submit.php' title='" . LAN_YTM_PAGE_15 . "'>" . LAN_YTM_PAGE . "</a></sub>";
					}


				$displvideo .= "</center>";
			}

		$ns->tablerender($ym_title , $displvideo); // display video
		require_once(FOOTERF);
		exit();
	}

// Gallery Page
// if manualy select an unathorised or none excisting category, return message

	if ($movie_cat)
	{
		$query05        = "SELECT cat_auth FROM ".MPREFIX."er_ytm_gallery_category WHERE cat_id = '$movie_cat'";
		$result05       = mysql_query($query05);
		while ($row05   = mysql_fetch_array($result05,MYSQL_ASSOC))
		{
			$check_auth     = $row05['cat_auth'];
		}
		
		if(!check_class($check_auth))
		{
			$textperm .= LAN_YTM_PAGE_1;
			require_once(HEADERF);
			$ns->tablerender($ym_title , $textperm);
			require_once(FOOTERF);
			exit();
		}
		
		if ($check_auth == "") 
		{        
			$textnocat .= LAN_YTM_PAGE_2;
			require_once(HEADERF);
			$ns->tablerender($ym_title , $textnocat);
			require_once(FOOTERF);
			exit();			
		}
                                          
	}


	if ($movie_cat)
	{
		$define_query = "AND movie_category = '$movie_cat'";
	}

	$rowsPerPage = ($colum * $rows);
	$pageNum = 1;


	if(isset($_GET['paging']))
	{
		$pageNum = $_GET['paging'];
		if ($pageNum == "") 
		{
			$pageNum = 1;
		}
	}

	$offset = ($pageNum - 1) * $rowsPerPage;

	$classes02 = e_CLASS_REGEXP;
	$classes02 = str_replace("(^|,)(", "", $classes02);
	$classes02 = str_replace(")(,|$)", "", $classes02);
	$classes02 = (explode("|",$classes02));


	$qspec02_i = 0;
	foreach($classes02 as $class02)
	{
		$qspec02 = $class02;
		
		if (!$qspec02_i == 0) 
		{
			$pre_qspecq02 = "OR";
		}
			$qspecq02 .= "$pre_qspecq02 cat_auth = '$qspec02' ";
			$qspec02_i++;
    }
    
	$auth_spec02 .=  "($qspecq02)";

            if     ($gal_order == "1") {$order_spec02 = "ORDER by timestamp DESC";}
            elseif ($gal_order == "2") {$order_spec02 = "ORDER by timestamp ASC";}
            else                       {$order_spec02 = "ORDER by timestamp DESC";}
            
            
	$query02 = "
	SELECT movie_code, movie_title, cat_id, cat_auth, input_user, cat_name FROM ".MPREFIX."er_ytm_gallery_movies nm
	LEFT JOIN ".MPREFIX."er_ytm_gallery_category nc ON nm.movie_category = nc.cat_id
	WHERE $auth_spec02 AND active = '1' AND input_status = '1' $define_query $order_spec02 LIMIT $offset, $rowsPerPage";

	$result02       = mysql_query($query02);
	$num_rows02     = mysql_num_rows($result02);

	// Gallery Variables
	$aantal_kolommen = $colum;
	$kolom_breedte   = 150;
	$aantal_items    = $num_rows02;
	$huidige_kolom   = 0;
	$width_temp      = (97 / $aantal_kolommen);
	$width           = "$width_temp%";
	$width_top_temp  = (97 / 2);
	$width_top       = "$width_top_temp%";

	define("e_PAGETITLE", LAN_YTM_PLUGIN );
	define("META_DESCRIPTION", LAN_YTM_PLUGIN ." - ". SITENAME );
	require_once(HEADERF);
	
	$text .= "
		<table cellpadding='0' cellspacing='0' style='width:97%; background-color: transparent'>
			<tr>
				<td style='width:$width_top; text-align:left; background-color: transparent; border-style:solid; border-width:0cm' COLSPAN='0' ROWSPAN='0'>
					<form style='background-color: transparent; border-style:solid; border-width:0cm' name='search_form' method='post' action='search.php'>";

    if ($ss_way == "0")
	{
		$text .="&nbsp;";
	}
	else
	{
		$text .="
					<input class='tbox' type='text' name='search' size='20' maxlength='100' />
					<input type='submit' name='search_submit_button' value='" . LAN_YTM_PAGE_17 . "' class='button' />
					<input class='tbox' type='hidden' name='refp' value='$pageNum'/>
					<input class='tbox' type='hidden' name='refc' value='$movie_cat'/>";
	}

	$text .="		</form>
				</td>
				<td style='width:$width_top; text-align:right; background-color: transparent; border-style:solid; border-width:0cm' COLSPAN='0' ROWSPAN='0'>";

	$query04        = "SELECT * FROM ".MPREFIX."er_ytm_gallery_category";
	$result04       = mysql_query($query04);

// Category Dropdown
	$text .= "
					<form style='background-color: transparent; border-style:solid; border-width:0cm' method='POST' name='cat_form' action='" . e_SELF . "'>
						<select class='tbox' name='cat' onchange=cat_form.submit()>
							<option value='' >". LAN_YTM_PAGE_0 . "</option>";

	while ($row04   = mysql_fetch_array($result04,MYSQL_ASSOC)) 
	{
		$c_cat_name     = $row04['cat_name'];
		$c_cat_code     = $row04['cat_id'];
		$c_cat_auth     = $row04['cat_auth'];
      
		if(check_class($c_cat_auth)) 
		{
			if ($c_cat_code == $movie_cat) 
			{
				$selected_cat="SELECTED";
			}
			else
			{
				$selected_cat = "";
			}
			$text .="		<option $selected_cat value='$c_cat_code' >$c_cat_name</option>";
		}
	}

	$text .="			</select>
					</form>
				</td>
			</tr>
		</table>
		<br />";
	$text .="
		<table class='fborder' width='97%'>";

	while ($row02 = mysql_fetch_array($result02,MYSQL_ASSOC)) 
	{
		$movie_code      = $row02['movie_code'];
		$movie_title     = $row02['movie_title'];
		$gal_m_user      = $row02['input_user'];
		$gal_m_cat       = $row02['cat_name'];

		// Row Finished?
		if($huidige_kolom == 0) 
		{
			// open new row
			$text .= "<tr>\n";
		}

		if (!$movie_cat == "") 
		{
			$l_movie_cat = "&c=$movie_cat";
		}

		$movie_title_mouse = $movie_title;
		$movie_title_2     = $movie_title;

		if ($at_way == "1") 
		{
			$movie_title_count = strlen($movie_title);
			if ($movie_title_count > $atc_way) 
			{
				$movie_title_2 = substr($movie_title,"0",$atc_way);
				$movie_title_2 = "$movie_title_2...";
			}
		}

		$show_dt_way = "0";
		
		if     ($dt_way == "1") {$show_dt_way = "1";}
		if     ($dt_way == "2") {$show_dt_way = "2";}

		if ($show_dt_way == "1") 
		{
			if ( $store_seo == 1 ) 
				// Display Gallery with full information above
				$text .= "<td class='forumheader3' style='text-align:center' width='$width'><b>$movie_title_2</b><br /><br /><a href='" . e_HTTP . "video/show/$movie_code.html'><img src='http://img.youtube.com/vi/$movie_code/2.jpg' title='$movie_title_mouse' width='$pict_width' height='$pict_height' border='0' /></a><br /><br /></td>\n";
			else 
				$text .= "<td class='forumheader3' style='text-align:center' width='$width'><b>$movie_title_2</b><br /><br /><a href='ytm.php?view=$movie_code&p=$pageNum$l_movie_cat'><img src='http://img.youtube.com/vi/$movie_code/2.jpg' title='$movie_title_mouse' width='$pict_width' height='$pict_height' border='0' /></a><br /><br /></td>\n";
		}
		elseif ($show_dt_way == "2") 
		{
			if ( $store_seo == 1 ) 
				// Display Gallery with full information under
				$text .= "<td class='forumheader3' style='text-align:center' width='$width'><br /><br /><a href='" . e_HTTP . "video/show/$movie_code.html'><img src='http://img.youtube.com/vi/$movie_code/2.jpg' title='$movie_title_mouse' width='$pict_width' height='$pict_height' border='0' /><br /><br /><b>$movie_title_2</b></a></td>\n";
			else
				$text .= "<td class='forumheader3' style='text-align:center' width='$width'><br /><br /><a href='ytm.php?view=$movie_code&p=$pageNum$l_movie_cat'><img src='http://img.youtube.com/vi/$movie_code/2.jpg' title='$movie_title_mouse' width='$pict_width' height='$pict_height' border='0' /><br /><br /><b>$movie_title_2</b></a></td>\n";
		}

		else 
		{
			if ( $store_seo == 1 ) 
				$text .= "<td class='forumheader3' style='text-align:center' width='$width'><br /><br /><a href='" . e_HTTP . "video/show/$movie_code.html'><img src='http://img.youtube.com/vi/$movie_code/2.jpg' title='$movie_title_mouse' width='$pict_width' height='$pict_height' border='0' /></a><br /><br /><b>" . LAN_YTM_PAGE_24 . ":</b> [<a href='#' title='$movie_title_mouse - " . LAN_YTM_PAGE_9 . " $gal_m_cat - " . LAN_YTM_PAGE_10 . " - $gal_m_user'>...</a>]<br /><br /></td>\n";
			else
				// Display Gallery with mouse over
				$text .= "<td class='forumheader3' style='text-align:center' width='$width'><br /><br /><a href='ytm.php?view=$movie_code&p=$pageNum$l_movie_cat'><img src='http://img.youtube.com/vi/$movie_code/2.jpg' title='$movie_title_mouse' width='$pict_width' height='$pict_height' border='0' /></a><br /><br /><b>" . LAN_YTM_PAGE_24 . ":</b> [<a href='#' title='$movie_title_mouse - " . LAN_YTM_PAGE_9 . " $gal_m_cat - " . LAN_YTM_PAGE_10 . " - $gal_m_user'>...</a>]<br /><br /></td>\n";
		}
   
		// new column
		$huidige_kolom++;

		// Row Finisched?
		if($huidige_kolom == $aantal_kolommen) 
		{
			// close row and reset $huidige_kolom
			$text .= "</tr>\n";
			$huidige_kolom = 0;
		}
	}

	// fix for last row
	if($huidige_kolom != 0) 
	{
		// row wasn't complete
		for($i_c = $huidige_kolom; $i_c < $aantal_kolommen; $i_c++) 
		{
			$text .= "<td width='$width'>&nbsp;</td>\n";
		}
		// close row
		$text .= "</tr>\n";
	}

	$text .= "
		</table>";

	$text .= "
	<br /><br /><center>";

	// Navigation
	$query03   = "
		SELECT COUNT(movie_code) AS numrows FROM ".MPREFIX."er_ytm_gallery_movies nm
		LEFT JOIN ".MPREFIX."er_ytm_gallery_category nc ON nm.movie_category = nc.cat_id
		WHERE $auth_spec02 AND active = '1' AND input_status = '1' $define_query;";
              
	$result03  = mysql_query($query03);
	$row03     = mysql_fetch_array($result03, MYSQL_ASSOC);
	$numrows   = $row03['numrows'];

	$maxPage = ceil($numrows/$rowsPerPage);

	$self = "" . e_SELF . "";

	if ($movie_cat) 
	{
		$setcat = "&cat=$movie_cat";
	}

	if ($pageNum > 1)
	{
		$paging = $pageNum - 1;
		if ( $store_seo == 1 ) 			
			$prev = " <a href=\"" . e_HTTP . "video/list/$paging$setcat\">" . LAN_YTM_PAGE_5 . "</a>&nbsp;&nbsp;--&nbsp;&nbsp;";
		else 
			$prev = " <a href=\"$self?paging=$paging$setcat\">" . LAN_YTM_PAGE_5 . "</a>&nbsp;&nbsp;--&nbsp;&nbsp;";

		if ( $store_seo == 1 ) 			
			$first = " <a href=\"" . e_HTTP . "video/list/1$setcat\">" . LAN_YTM_PAGE_6 . "</a>&nbsp;&nbsp;";
		else 		
			$first = " <a href=\"$self?paging=1$setcat\">" . LAN_YTM_PAGE_6 . "</a>&nbsp;&nbsp;";
	}

	// First Page
	else
	{
		$prev  = "";
		$first = "";
	}

	if ($pageNum < $maxPage)
	{
		$paging = $pageNum + 1;
		if ( $store_seo == 1 ) 		
			$next = "&nbsp;&nbsp;--&nbsp;&nbsp;<a href=\"" . e_HTTP . "video/list/$paging$setcat\">" . LAN_YTM_PAGE_7 . "</a>&nbsp;&nbsp;";
		else 
			$next = "&nbsp;&nbsp;--&nbsp;&nbsp;<a href=\"$self?paging=$paging$setcat\">" . LAN_YTM_PAGE_7 . "</a>&nbsp;&nbsp;";
		
		
		if ( $store_seo == 1 ) 	
			$last = " <a href=\"" . e_HTTP . "video/list/$maxPage$setcat\">" . LAN_YTM_PAGE_8 . "</a> ";
		else 
			$last = " <a href=\"$self?paging=$maxPage$setcat\">" . LAN_YTM_PAGE_8 . "</a> ";	
	}

	// Last Page
	else
	{
		$next = "";
		$last = "";
	}

	$text .= "$first$prev " . LAN_YTM_PAGE_3 . " <strong>$pageNum</strong> " . LAN_YTM_PAGE_4 . " <strong>$maxPage</strong>$next$last";

	$SND_TP = "1";

	if(check_class($sub_class)) 
	{
		$text .= "<br /><sub><a href='".e_PLUGIN."ytm_gallery/ytm_submit.php'>" . LAN_YTM_PAGE . "</a></sub>";
	}

	$text .= "</center>";

	/*  function tablerender($ym_title, $text, $mode = "default", $return = false)
	{
		  $query                = "SELECT * from ".MPREFIX."er_ytm_gallery WHERE id = '1'";
		  $result               = mysql_query($query);
		  $row                  = mysql_fetch_array($result,MYSQL_ASSOC);
		  $store_seo			= $row['seo'];
		global $ns, $store_seo;
		// do the mod rewrite steps if installed
		#$modules = apache_get_modules(); // && file_exists(e_PLUGIN.'fatwa/.htaccess')
		if ( $store_seo == 1 )
		{
			$patterns[0] = '/' . $PLUGINS_DIRECTORY . '\/ytm_gallery\/ytm\.php\?([0-9]+).([a-z]+).([0-9]+).([0-9]+)/';
			$patterns[1] = '/' . $PLUGINS_DIRECTORY . '\/ytm_gallery\/ytm\.php\?([0-9]+).([a-z]+).([0-9]+)/';
			$patterns[2] = '/' . $PLUGINS_DIRECTORY . '\/ytm_gallery\/ytm1\.php/';
			$replacements[0] = '/video-$1-$2-$3-$4.html';
			$replacements[1] = '/video-$1-$2-$3.html';
			$replacements[2] = '/video_stats.html';

			$text = preg_replace($patterns, $replacements, $text);
		}
		$ns->tablerender($ym_title, $text, $mode , $return);
	}*/

	/*
		  $query                = "SELECT * from ".MPREFIX."er_ytm_gallery WHERE id = '1'";
		  $result               = mysql_query($query);
		  $row                  = mysql_fetch_array($result,MYSQL_ASSOC);
		  $store_seo			= $row['seo'];
	if ( $store_seo == 1 )
	{		  
			
			$patterns[0] = '/ytm_gallery\/ytm.php\?view=([^-]*)&p=([0-9]+)/';
			$patterns[1] = '/ytm_gallery\/ytm\.php/';
			$patterns[2] = '/ytm_gallery\/ytm_gallery\/ytm\.php/';
			$patterns[3] = '/ytm_gallery\/';
			$patterns[4] = '/ytm_gallery\/ytm_top_page\.php/';
			$replacements[0] = '../video-$1-$2.html';
			$replacements[1] = '/video.html';
			$replacements[2] = '/video_stats.html';
			$replacements[3] = '../video_stats';
			$replacements[4] = 'gallery.html';			
			$text1 = preg_replace($patterns, $replacements, $text);
			$ym_title = $patterns[4];
	 $ns->tablerender($ym_title, $text1);
	}
	else 	*/
   $ns->tablerender($ym_title , $text);
   require_once(FOOTERF);

?>
