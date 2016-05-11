$nobody_regexp = "'(^|,)(".str_replace(",", "|", e_UC_NOBODY).")(,|$)'";
if(!$sql -> db_Select_gen("SELECT * FROM ".MPREFIX."news WHERE ".MPREFIX."news.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (".MPREFIX."news.news_class REGEXP ".$nobody_regexp.") ORDER BY ".MPREFIX."news.news_datestamp DESC LIMIT 0, 10")){
return "<span class='mediumtext'>******************</span>";
break;
}else{
while($row = $sql -> db_Fetch()){
extract($row);
$summaries .= "'".$news_title."',";
$sitelinks .= "'".e_BASE."news.php?extend.".$news_id."',";
}
$summaries1 = substr($summaries, 0, -1);  	
$sitelinks1 = substr($sitelinks, 0, -1);
return "
<span class='lang_text'> ". LAN_THEME_14 ." </span> :
<span id='theTicker' ></span>
<script type='text/javascript'>
var theSummaries = new Array(".$summaries1.");
var theSiteLinks = new Array(".$sitelinks1.");
</script>
<script type='text/javascript' src='".THEME_ABS."ticker_engine.js'></script>
";
break;
}     
 
