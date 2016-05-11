<?php
/*---------------------------------------------------------------+
|	Released under the terms and conditions of the
|	GNU General Public License (http://www.gnu.org).
+---------------------------------------------------------------*/
if(!defined("e_THEME")){ exit; }

include_lan(THEME."languages/".e_LANGUAGE.".php");
@include_lan(THEME."languages/English.php");
setlocale(LC_TIME, 'ar_IN');

include('urlrewrite.php');

// [theme]
$themename = "الستايل الأزرق";
$themeversion = "3.0";
$themeauthor = "Naja7Host";
$themedate = "18-02-2012";
$themeinfo = "e107v7+";
$THEME_DISCLAIMER = LAN_THEME_6 ;
define("STANDARDS_MODE", TRUE);
define(LOGOSTYLE, "style='float: left; border: 0; margin-right: 10px;'");
$layout = "_default";
$xhtmlcompliant = TRUE;
$csscompliant = TRUE;
$no_core_css = TRUE;

$register_sc[] = "TICKER";
$register_sc[] = "NEWSIMAGE";
$register_sc[] = "NEWSIMAGETHUMB";
$register_sc[] = 'SHARE';
$register_sc[] = 'NEWSTITLELINK';
$register_sc[] = 'EXTENDED';
$register_sc[] = 'NEWSBODY';
$register_sc[] = 'SHOURTURL';
$register_sc[] = 'NEWSCOMMENTS';
// $register_sc[] = 'COUNTCOMMENTS';
// $register_sc[] = 'ADS480X15';

$logo = "<a href='".e_HTTP."'><img ".LOGOSTYLE." src='".THEME."images/logo24.png' alt='{SITENAME}' /></a><br style='clear:both' />";


// [header function]
function theme_head() {
	//global $logo, $colorstyle;	
	$headerstyle = "
	<!--[if IE 6]>
	<link rel='stylesheet' type='text/css' href='".THEME_ABS."iecss.css' />
	<![endif]-->
	";
	return $headerstyle;
}

$HEADER = "
<div id='container'>
<div id='main_container'>
	<div class='top_bar'>
    	<div class='top_search'>
			{SETSTYLE=clock}{PLUGIN=clock_menu}	            
        </div>
        
        <div class='languages'>
        	<div class='lang_text'>{SITETAG}</div>
        </div>
    
    </div>
	<div id='header'>
	
        <div class='oferte_content'>
        	<div class='top_divider'><img src='".THEME_ABS."images/header_divider.png' alt='' title='' width='1' height='164' /></div>
        	<div class='oferta'>           
				<a href='".e_BASE."'><img src='".THEME_ABS."images/logo.png' alt='' title='' style='border:0;' /></a>
            </div>
		
            <div class='top_divider'><img src='".THEME_ABS."images/header_divider.png' alt='{SITENAME}' title='{SITENAME}' width='1' height='164' /></div>
        	
        </div>

	    <div class='caption_details'>
		<object type='application/x-shockwave-flash' data='".THEME_ABS."images/show.swf?cl1=153&amp;cl2=5088749&amp;sh=59&amp;si=48&amp;ro=5'  width='120' height='120'>
		<param name='wmode' value='transparent'></param>
		<param name='movie' value='".THEME_ABS."images/show.swf?cl1=153&amp;cl2=5088749&amp;sh=59&amp;si=48&amp;ro=5' />
		</object>	
		
        </div>			
	
		<!-- end of oferte_content-->

    </div>
    
   <div id='main_content'> 
            <div id='menu_tab'>
            {MENU=4}	
            </div><!-- end of menu tab -->
			<div class='caption'>
			{TICKER}
			</div>	
   <div class='right_content' >
        {SETSTYLE=menu1}
		{MENU=1}
   </div><!-- end of right content -->  

   <div class='center_content'> 
   {MENU=3}
   {SETSTYLE}
";
$FOOTER = "
	
   
   </div><!-- end of center content -->
 
   <div class='left_content'  >
        {SETSTYLE=menu1}
		{MENU=2}
	</div><!-- end of left content -->
	
   </div><!-- end of main content -->
   
   <div class='footer'>
        
        <div class='center_footer'>
		{SITEDISCLAIMER}<br />
       	$THEME_DISCLAIMER<br />
		<a href='http://validator.w3.org/check?uri=referer' rel='external'><img src='".e_IMAGE_ABS."generic/valid-xhtml11_small.png' alt='' style='border: 0;' /></a> 	<a href='http://jigsaw.w3.org/css-validator/check/referer' rel='external'><img src='".e_IMAGE_ABS."generic/vcss_small.png' alt='' style='border: 0;' /></a>
        </div>
        
        <div class='right_footer'>
        <a href='".e_BASE."'>".LAN_THEME_7."</a>
        <a href='".e_BASE."page.php?4'>".LAN_THEME_8."</a>
        <a href='sitemap'>".LAN_THEME_9."</a>
        <a href='rss'>".LAN_THEME_10."</a>
        <a href='contact.php'>".LAN_THEME_11."</a>
        </div>      
   </div>                 
</div>
<!-- end of main_container -->
</div>
";

$CUSTOMHEADER = "
<div id='container'>
<div id='main_container'>
	<div class='top_bar'>
    	<div class='top_search'>
			{SETSTYLE=clock}{PLUGIN=clock_menu}	            
        </div>
        
        <div class='languages'>
        	<div class='lang_text'>{SITETAG}</div>
        </div>
    
    </div>
	<div id='header'>
	
        <div class='oferte_content'>
        	<div class='top_divider'><img src='".THEME_ABS."images/header_divider.png' alt='' title='' width='1' height='164' /></div>
        	<div class='oferta'>           
				<a href='".e_BASE."'><img src='".THEME_ABS."images/logo.png' alt='' title='' style='border:0;' /></a>
            </div>
		
            <div class='top_divider'><img src='".THEME_ABS."images/header_divider.png' alt='{SITENAME}' title='{SITENAME}' width='1' height='164' /></div>
        	
        </div>

	    <div class='caption_details'>
		<object type='application/x-shockwave-flash' data='".THEME_ABS."images/show.swf?cl1=153&amp;cl2=5088749&amp;sh=59&amp;si=48&amp;ro=5'  width='120' height='120'>
		<param name='wmode' value='transparent'></param>
		<param name='movie' value='".THEME_ABS."images/show.swf?cl1=153&amp;cl2=5088749&amp;sh=59&amp;si=48&amp;ro=5' />
		</object>	
		
        </div>			
	
		<!-- end of oferte_content-->

    </div>
    
   <div id='main_content'> 
            <div id='menu_tab'>
            {MENU=4}
            </div><!-- end of menu tab -->
			<div class='caption'>
			{TICKER}
			</div>	
 
   <div class='center_content_custom'> 
   {MENU=3}
   {SETSTYLE}
 
";

$CUSTOMPAGES = " contact submitnews.php user.php usersettings.php forum_viewforum.php forum.php forum_viewtopic.php forum_post.php";

// $CUSTOMPAGES['my_news'] = "news.php";

//	[tablestyle]
function tablestyle($caption, $text, $mode){
global $style;

	if($mode == 'no_caption')
	{
		echo $text;
		return;	
	}

	else if($style == "menu1")
	{
		echo "
		<!-- content start -->
			<div class='title_box'>".$caption."</div>  
			<div class='border_box'>".$text."</div>	
		<!-- content end -->		
		";
	} else if($mode == "menu2") {
		echo "
		<!--sidebox start -->
		<div class='center_title_bar'>".$caption."</div>
			<div class='prod_box_big'>
				<div class='top_prod_box_big'></div>
				".$text."
			</div>
		<div class='bottom_prod_box_big'></div> 
		<!--sidebox end -->		
		";
	} else if($mode == "clock") {
		echo $text;			
	}  else {
		echo "
		<!-- content start -->
			<div class='title_box'>".$caption."</div>  
			<div class='content_box'>".$text."</div>		
		<!-- content end -->		
		";
	}
	
}


// You can customize the news-category bullet listing here.
$NEWSARCHIVE ="<div>
		<table style='width:98%;'>
		<tr>
		<td>
		<div>{ARCHIVE_BULLET} <b>{ARCHIVE_LINK}</b> <span class='smalltext'><i>{ARCHIVE_AUTHOR} @ ({ARCHIVE_DATESTAMP}) ({ARCHIVE_CATEGORY})</i></span></div>
		</td>
		</tr>
		</table>
		</div>";
		
$NEWSLISTSTYLE = "
	<table style='width: 100%;'>
	<tr><td>
	
		<div class='newsimagethumb'>{NEWSIMAGETHUMB}</div>
		<div class='newstitle'>{NEWSTITLELINK=extend}</div>
		{NEWSBODY}<br /><div style='float:left;'>{EXTENDED}</div><br />
		<div class='clear'>  </div>	
	
	</td></tr>
	</table>	<hr />\n";

$NEWSSTYLE = "";
if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) {
	$NEWSSTYLE .= "
	<div class='newsbody'>
		<div style=' border-bottom-style: solid; border-bottom-width: 1px'><img src='" .THEME_ABS. "images/back.png' style='vertical-align: middle;' alt='' /> - <a href='". SITEURL ."' >". LAN_THEME_7 ." </a> » {NEWSCATEGORY} - <span style='float:left;'> {PDFICON} {EMAILICON} {PRINTICON} {ADMINOPTIONS}</span></div>	
		<div style='border-bottom-style: solid; border-bottom-width: 1px'><img src='" .THEME_ABS. "images/news.png' style='vertical-align: middle;' alt='' /> -  ". LAN_THEME_13 ." :  {NEWSTITLELINK} {TRACKBACK} <span style='float:left;'>{NEWSICON}</span>	</div>
		<div><img src='" .THEME_ABS. "images/Profile.png' style='vertical-align: middle;'  alt='' /> - ". LAN_THEME_4 ." : {NEWSAUTHOR=nolink} - {NEWSDATE} 	</div>
	</div>	
	<div class='newsbody'>	
	
		<div class='newstitle'>{SHARE}<br /><h1>{NEWSTITLE}</h1></div>
		<div class='newsimage'><br />{NEWSIMAGE}<br /><br /><br />	</div>	
		{NEWSBODY}<br />
		<div class='clear'>  </div>		
		{SHOURTURL}
	</div>
	{NEWSCOMMENTS}
	";
	} else {
	$NEWSSTYLE .= "
	<table style='width: 100%;'>
	<tr><td>
	
		<div class='newsimagethumb'>{NEWSIMAGETHUMB}</div>
		<div class='newstitle'>{NEWSTITLELINK=extend}</div>
		{NEWSBODY}<br /><div style='float:left;'>{EXTENDED}</div><br />
		<div class='clear'>  </div>	
	
	</td></tr>
	</table>
	";
	};

// linkstyle
// http://wiki.e107.org/?title=Styling_Individual_Sitelink_Menus
function linkstyle($np_linkstyle) {
// Common to all styles (for this theme)
  $linkstyleset['linkdisplay']      = 1;  /* 1 - along top, 2 - in left or right column */
  $linkstyleset['linkalign']        = "center";

// Common sublink settings
// NOTE: *any* settings can be customized for sublinks by using
//       'sub' as a prefix for the setting name. Plus, there's "subindent"
//  $linkstyleset['sublinkclass'] = "mysublink2;
//  $linkstyleset['subindent']    = " ";

// Now for some per-style setup
  switch ($np_linkstyle)
  {
  case 'topbar':
	$linkstyleset['prelink'] = "<ul>";
	$linkstyleset['postlink'] = "</ul>";
	$linkstyleset['linkstart'] = "<li>";
	$linkstyleset['linkend'] = "</li>";
	$linkstyleset['linkstart_hilite'] = "<li class='current_page_item'>";
	$linkstyleset['linkclass_hilite'] = "";
	$linkstyleset['linkseparator'] = "";
  break;
  default: // if no LINKSTYLE defined
  $linkstyleset['prelink'] = "<ul class='menu'>";
  $linkstyleset['postlink'] = "</ul>";
  $linkstyleset['linkstart'] = "<li>";
  $linkstyleset['linkend'] = "</li>";
  $linkstyleset['linkstart_hilite'] = "";
  $linkstyleset['linkclass_hilite'] = "";
  $linkstyleset['linkclass'] = "";
  $linkstyleset['sublinkclass'] = "";
  }
return $linkstyleset;
}
define("COMMENTLINK", LAN_THEME_1);
define("COMMENTOFFSTRING", LAN_THEME_2);
define("PRE_EXTENDEDSTRING", "");
define("EXTENDEDSTRING", LAN_THEME_3);
define("POST_EXTENDEDSTRING", "");

// icons
define("ICONPRINT", "printer.png");
define("ICONMAIL", "email.png");
define("ICONPRINTPDF", "pdf.png");
define("ICONSTYLE", "float: right; border: 0; margin-right: 10px;");
/*


define(PRELINK, "");
define(POSTLINK, "");
define(LINKSTART, "<li>");
define(LINKCLASS, "nav2");
define(LINKEND, "</li><li class='divider'></li>");
define(LINKDISPLAY, 1);
define(LINKALIGN, "center");
*/
?>
