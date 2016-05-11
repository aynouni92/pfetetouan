<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     Copyright (C) 2001-2002 Steve Dunstan (jalist@e107.org)
|     Copyright (C) 2008-2010 e107 Inc (e107.org)
|
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $URL: https://e107.svn.sourceforge.net/svnroot/e107/trunk/e107_0.7/e107_plugins/counter_menu/counter_menu.php $
|     $Revision: 11678 $
|     $Id: counter_menu.php 11678 2010-08-22 00:43:45Z e107coders $
|     $Author: e107coders $
+----------------------------------------------------------------------------+
*/
if (!defined('e107_INIT')) { exit; }
include_lan(e_PLUGIN.'smallonline_menu/languages/'.e_LANGUAGE.'.php');
global $pref ;
$text = "";
$totalonline = MEMBERS_ONLINE + GUESTS_ONLINE ;

if (isset($pref['statActivate']) && $pref['statActivate'] == true) {
	$pageName = preg_replace("/(\?.*)|(\_.*)|(\.php)/", "", basename (e_SELF));
	$logfile = e_PLUGIN."log/logs/logp_".date("z.Y", time()).".php";
	$totalv = 0;
	if(!is_readable($logfile))
	{
		if(ADMIN && !$pref['statCountAdmin'])
		{
			$text = SONLINE_L14;
		}
		$siteTotal = 1;

	} else {
		$text = "";
		require($logfile);
		if($sql -> db_Select("logstats", "*", "log_id='statTotal' OR log_id='statUnique' OR log_id='pageTotal'"))
		{
			while($row = $sql -> db_Fetch())
			{
				if($row['log_id'] == "statTotal")
				{
					$siteTotal += $row['log_data'];
				}
				
			}
		}
	}	
	
	// BEGIN  THE TOTAL AND UNIQUE MOUNTH SITE VISITE 
	if(!$entries = $sql -> db_Select("logstats", "*", "log_id REGEXP('^[[:digit:]]+\-[[:digit:]]+$') ORDER BY CONCAT(LEFT(log_id,4), RIGHT(log_id,2)) DESC")) {
		//$lastmtotal .= ONLINE_L11;
	}
		$array = $sql -> db_getList();
		$monthTotal = array();
		$mtotal = 0;
		$utotal = 0;
		
	foreach($array as $info  ) 
	{
	$thismounth = date("Y-m") ;
	$lastmount = date("Y-m",strtotime('-1 month')) ;
		if ($thismounth == $info['log_id'])
		{
		$date = $info['log_id'];
		$stats = unserialize($info['log_data']);
		// $stats1 = unserialize($info['log_data']['TOTAL']['ttlv']);
		// $monthTotal[$date]['totalv'] = varset($stats['TOTAL']['ttlv'], 0);
		// $monthTotal[$date]['uniquev'] = varset($stats['TOTAL']['unqv'], 0);
		$mtotal =  varset($stats['TOTAL']['ttlv'], 0)  ;
		//$mtotal += $monthTotal[$date]['totalv']; // total mounth visite
		// $utotal += $monthTotal[$date]['uniquev']; // unique site visite on the mounth 
		}
		if ($lastmount == $info['log_id'])
		{
		$date = $info['log_id'];
		$stats = unserialize($info['log_data']);
		// $stats1 = unserialize($info['log_data']['TOTAL']['ttlv']);
		// $monthTotal[$date]['totalv'] = varset($stats['TOTAL']['ttlv'], 0);
		// $monthTotal[$date]['uniquev'] = varset($stats['TOTAL']['unqv'], 0);
		$lastmtotal =  varset($stats['TOTAL']['ttlv'], 0) ;
		//$mtotal += $monthTotal[$date]['totalv']; // total mounth visite
		// $utotal += $monthTotal[$date]['uniquev']; // unique site visite on the mounth 
		}
		
	}	
	// END THE TOTAL AND UNIQUE MOUNTH SITE VISITE 

	foreach($pageInfo as $key => $info) 
	{
		$totalv += $info['ttl'];
	}


	
	$text .= SONLINE_L2 ."<br /> " ;
	$text .= SONLINE_L3 ." : $totalonline<br /> " ;
	$text .= SONLINE_L4 ." : $totalv<br />";
	//$text .= SONLINE_L9 ." : ". print_r($ttotal)."<br />";	
	$text .= SONLINE_L5 ." : $mtotal<br />";
	$text .= SONLINE_L6 ." : $lastmtotal<br />";
	$text .= SONLINE_L7 ." : $siteTotal<br />";

	//unset($dbPageInfo)
	
}
else
{
	if(ADMIN)
	{
		$text .= "<span class='smalltext'>".SONLINE_L12."</span>";
		// $ns->tablerender(COUNTER_L7, $text, 'counter');
	}
}

if ($pref["views_plugin_enable"] == 1) { 
	/* render Views button */
	if ($pref['views_count_news'] == 1) { 
$handle = mysql_query ("SELECT SUM(total_views) AS myvalue FROM ".MPREFIX."views ") ;
// Fetch the row
$row = mysql_fetch_assoc( $handle );
// Grab the data we want out of the row
$views = $row['myvalue'];
$text .= SONLINE_L13." : ".$views ;
	}
}

$ns->tablerender(SONLINE_L1, $text);


?>