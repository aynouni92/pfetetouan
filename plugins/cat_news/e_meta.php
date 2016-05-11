<?php
/*
+ ----------------------------------------------------------------------------+
+----------------------------------------------------------------------------+
*/
if (!defined('e107_INIT')) { exit; }



	function named_records_sort($named_recs, $order_by, $rev=false, $flags=0)
	{// Create 1-dimensional named array with just 
	 // sortfield (in stead of record) values
		$named_hash = array(); 
		 foreach($named_recs as $key=>$fields) 
				 $named_hash["$key"] = $fields[$order_by];
	 
	 // Order 1-dimensional array, 
	 // maintaining key-value relations   
		if($reverse) arsort($named_hash,$flags=0) ;
		else asort($named_hash, $flags=0);
	  
	 // Create copy of named records array 
	 // in order of sortarray  
		$sorted_records = array(); 
		foreach($named_hash as $key=>$val) 
			   $sorted_records["$key"]= $named_recs[$key];
	  
	return $sorted_records;} 
	// $pref['cat_news'] = named_records_sort($pref['cat_news'], $order_by, true);
?>