<?php
/*
+---------------------------------------------------------------+
|       e107 website system
|
|		$Author: Mohamed Anouar Achoukhy
+---------------------------------------------------------------+
*/
//define("PAGE_NAME", "موقع فضيلة الشيخ الدكتور القاضى برهون");
require_once("class2.php");
require_once(HEADERF);

global $sql2, $tp;

$obj2 = new convert;
$count =6;
$curcount =1;
$huidige_kolom   = 0;
$aantal_kolommen = 3;

$video_cap = "آخر المرئيات";
$audio_cap = "آخر الصوتيات";
$fatwa_cap = "آخر الفتاوى";
$news_cap = "آخر الأخبار";
$no_news = "No news items";

switch ($pref['frontpage_type_page']) {

	case '0':
	$fpath =  str_replace("../../","",$pref['frontpage_news_style']);
	$fpath =  str_replace("_config.php",".php",$fpath);
	// print_r($fpath);
	include($fpath); 
	break;
	case '1':
	/* NEWS ***********************************************************************/
	if($pref['frontpage_news_enable']) {
	$qry = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
	LEFT JOIN #user AS u ON n.news_author = u.user_id
	LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
	WHERE n.news_class IN (".USERCLASS_LIST.") AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().") AND n.news_render_type=0  ORDER BY n.news_datestamp DESC LIMIT 0,".$count;


	if($sql2->db_Select_gen($qry))
	{
		$n_text = "<table class='fborder' width='100%'>";
		while ($row = $sql2->db_Fetch())
		{		
			$title = $tp->toHTML($row['news_title']);
			$time = $tp->toHTML($row['news_datestamp']);
			$time = $obj2->convert_date($time, "short");
			$query = "SELECT total_views FROM views WHERE news_id = '".$row['news_id'];
			$result = mysql_query($query);
			$array = mysql_fetch_assoc($result);
			$totalviews =  $array['total_views'];
			$totalviews = ($totalviews ? $totalviews : "0" );		

				$n_text .="<tr ><td class='forumheader3'> <a href='".e_HTTP."post-".$row['news_id'].".html'>".$title."</a></td><td class='forumheader3' style='width:120px;'><img src='" . e_PLUGIN . "frontpage/images/Clock-icon.png' style='vertical-align: top;' alt='نشر بتاريخ' />  ".$time." </td></tr>";

			

		}
		$n_text .= "</table>";
	}
	else
	{
		$n_text = $no_news;
	}
	$ns->tablerender($news_cap, $n_text);
	} 
	 
	/* AUDIO ***********************************************************************/
	if($pref['frontpage_audio_enable']) {
	 
	$audio_text = "<table class='fborder' width='97%'>";

		  $query02 = "SELECT audio_id, audio_code , audio_title, audio_category, cat_id, cat_auth FROM ".MPREFIX."er_audio_gallery_movies ym
					  LEFT JOIN ".MPREFIX."er_audio_gallery_category yc ON ym.audio_category = yc.cat_id
					  WHERE  active = '1' AND input_status = '1' ORDER by timestamp DESC LIMIT 0,".$count;
					  

		  $result02       = mysql_query($query02);
		  $num_rows02     = mysql_num_rows($result02);
		  while ($row02 = mysql_fetch_array($result02,MYSQL_ASSOC)) {
			$audio_id      = $row02['audio_id'];
			$audio_code      = $row02['audio_code'];
			$audio_title     = $row02['audio_title'];
			// $gal_m_user      = $row02['input_user'];
			// $gal_m_cat       = $row02['cat_name'];

		  // Display Gallery with full information above
		  $audio_text .= "<tr ><td class='forumheader3' style='text-align:right' width='60%'>  <a href='" . e_HTTP . "audio/listen/$audio_id.html'>$audio_title</a> <td class='forumheader3' style='text-align:right' width='20%'> <img src='" . e_PLUGIN . "audio/images/icon_counter.gif' title='".$audio_title."' alt='".$audio_title."' align='absmiddle' border='0' /><a href='" . e_HTTP . "audio/listen/$audio_id.html'> استماع</a></td> </td><td class='forumheader3' style='text-align:right' width='20%'> <img src='" . e_PLUGIN . "audio/images/icon_save.gif' title='".$audio_title."' alt='".$audio_title."' align='absmiddle' border='0' /><a href='audio/listen/files/$audio_code'>  تحميل </a></td></tr>";

		  }
	$audio_text .= "</table>";
	$ns -> tablerender($audio_cap, $audio_text); 

	}
	/* BANNER  ***********************************************************************/
	if($pref['frontpage_banners_enable']) {
	//$banner_text ="
	echo" 
		<table class='fborder' width='97%' >
		<tr >
		<td  style='text-align:center;'>
			<script type='text/javascript' src='".THEME_ABS."files/swfobject.js'></script>
			<script type='text/javascript'>
				var flashvars = {};
				flashvars.xml = '".THEME_ABS."config.xml';
				flashvars.font = 'font.swf';
				var attributes = {};
				attributes.wmode = 'transparent';
				attributes.id = 'slider';
				swfobject.embedSWF('".THEME_ABS."cu3er.swf', 'cu3er-container', '490', '180', '9', 'expressInstall.swf', flashvars, attributes);
			</script>
				<div id='cu3er-container' style='text-align:center;'>
					<a href='http://www.adobe.com/go/getflashplayer'>
						<img src='http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' />
					</a>
				</div>
				</td>
			
			</tr></table>";
		//$ns -> tablerender($banner_cap, $banner_text); 		
	}

	/* VIDEO ***********************************************************************/
	if($pref['frontpage_video_enable']) {
	$ytm_text = "<table class='fborder' width='97%'>";

		  $query01 = "SELECT movie_code,  movie_title, movie_category, cat_id, cat_auth FROM ".MPREFIX."er_ytm_gallery_movies ym
					  LEFT JOIN ".MPREFIX."er_ytm_gallery_category yc ON ym.movie_category = yc.cat_id
					  WHERE  active = '1' AND input_status = '1' ORDER by timestamp DESC LIMIT 0,".$count."";
					  

		  $result01       = mysql_query($query01);
		  $num_rows01     = mysql_num_rows($result01);
		  while ($row01 = mysql_fetch_array($result01,MYSQL_ASSOC)) {
		  
			$movie_code      = $row01['movie_code'];
			$movie_title     = $row01['movie_title'];
			// $gal_m_user      = $row01['input_user'];
			// $gal_m_cat       = $row01['cat_name'];
			  // Row Finished?
			  if($huidige_kolom == 0) {
				// open new row
				$ytm_text .= "<tr>\n";
			  }
		  // Display Gallery with full information above
		  $ytm_text .= "
			<td class='forumheader3' style='text-align:center;'>
			<a href='" . e_HTTP . "video/show/$movie_code.html'><img src='http://img.youtube.com/vi/$movie_code/2.jpg' title='$movie_title' width='145' height='100' border='0' /></a><br />
			<a href='" . e_HTTP . "video/show/$movie_code.html'>$movie_title</a><br /><br />
			</td>
			";
	  // new column
	  $huidige_kolom++ ;

	  // Row Finisched?
	  if($huidige_kolom == $aantal_kolommen) {
		// close row and reset $huidige_kolom
		$ytm_text .= "</tr>\n";
		$huidige_kolom = 0;
	  }		
		  }
	$ytm_text .= "</tr></table>";
	$ns -> tablerender($video_cap, $ytm_text);
	}
	
	/* FATWA ***********************************************************************/
	if($pref['frontpage_fatwa_enable']) {
			$fatwa_arg = "select fatwa_id,fatwa_question,fatwa_views,fatwa_parent from #fatwa 
			left join #fatwa_info on fatwa_parent = fatwa_info_id 
			where fatwa_approved>0 and find_in_set(fatwa_info_class,'" . USERCLASS_LIST . "') order by fatwa_datestamp desc limit 0," . $count;
			
			if ($sql->db_Select_Gen($fatwa_arg))
			{
				$i = 1;
				$fatwa_cache = "<table class='fborder' width='97%'>";
				while ($fatwa_row = $sql->db_Fetch())
				
				{
					extract($fatwa_row);
					$fatwa_quest = substr($fatwa_question, 0, 20);
					if (strlen($fatwa_question) > 20)
					{
						$fatwa_quest .= " ...";
					}
					$fatwa_cache .="<tr ><td class='forumheader3'>". $i ." </td><td class='forumheader3'> <a href='" . e_PLUGIN . "fatwa/fatwa.php?0.cat." . $fatwa_parent . "." . $fatwa_id . "' title='" . $tp->toHTML($fatwa_question) . "'>" . $tp->toHTML($fatwa_question) . "</a> </td></tr> ";
					$i ++;
				}
				//$fatwa_cache .= "</div>";
				$fatwa_cache .= "</table>";
			}
			else
			{
				$fatwa_cache .= FATWALAN_100;
			}
			
			$e107cache->set("nq_fatwanew_menu", $fatwa_cache);
			$fatwa_text .= $fatwa_cache;		
		$ns->tablerender($tp->toFORM($fatwa_cap), $fatwa_text); 
	}   		
		
	break;
	case '2':
		
	break;		

} 

require_once(FOOTERF);

?>