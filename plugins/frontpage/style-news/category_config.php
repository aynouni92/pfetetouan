<?php
// =========================================================================
// POST SETTINGS
// ===========================================================================
if (isset($_POST['frontpage_news_submit_category'])) {

	$pref['frontpage_news_slider'] = $_POST['frontpage_news_slider'];
	// $pref['frontpage_news_rest'] = $_POST['frontpage_news_rest']; 
	$pref['frontpage_facebook'] = $tp->todb($_POST['frontpage_facebook']);
	$pref['frontpage_box_1'] = $tp->todb($_POST['frontpage_box_1']);
	$pref['frontpage_box_2'] = $tp->todb($_POST['frontpage_box_2']);
	$pref['frontpage_box_3'] = $tp->todb($_POST['frontpage_box_3']);
	$pref['frontpage_box_4'] = $tp->todb($_POST['frontpage_box_4']);
	$pref['frontpage_box_5'] = $tp->todb($_POST['frontpage_box_5']);
	$pref['frontpage_box_6'] = $tp->todb($_POST['frontpage_box_6']);
	$pref['frontpage_cat_news'] = $_POST['frontpage_cat_news']; 
	$pref['frontpage_catnews'] = $_POST['frontpage_catnews'];
	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "<tr>
				<td class='forumheader3' colspan='2'><strong>" . $result_msg . "</strong>&nbsp;</td>
			</tr>";		
}   

// ===========================================================================
	// $db_Fetch1 = $sql->db_Fetch();
	$text .= $rs->form_open("post", e_SELF."?news" ,  'frontpage_news_submit_category', '', 'enctype="multipart/form-data"') .
		"<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_35 ."</td>
			<td class='forumheader3' style='width:65%'><input class='tbox' name='frontpage_news_slider' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_news_slider'], $pref['frontpage_news_slider'])."' /> </td>
		</tr>
		<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_41 ."</td>
			<td class='forumheader3' style='width:65%'>". $rs->form_textarea("frontpage_facebook", 70, 5, varsettrue($tp->post_toForm($_POST['frontpage_facebook']), $tp->post_toForm($pref['frontpage_facebook'])), "overflow:hidden") ."</td>
		</tr>	
		<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_45 ."</td>
			<td class='forumheader3' style='width:65%'>";
				for ($i=1 ; $i<4 ; $i++) {
				$text .= $rs->form_select_open('frontpage_box_'.$i.'' ) ."
				" .$rs->form_option(LAN_FRONTPAGE_47 , "{$ch}" , 0) ;
				$sql->db_Select("news_category", "*", "order by category_id", "no_where");
				while($row = $sql->db_Fetch() )
				{

				$text .= $rs->form_option($row['category_name'], ($pref['frontpage_box_'.$i.''] == $row['category_id'] ), $row['category_id']) ;

				} 
				// unset($row1);
				$text .= $rs->form_select_close() ;
				}
				
				$text .= "</td>
		</tr>	
		<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_42 ."</td>
			<td class='forumheader3' style='width:65%'>".
				$rs -> form_checkbox('frontpage_catnewsall', '', '', "", " onclick='checkUncheckAll(this);'"). LAN_FRONTPAGE_43 .
			"<br />";
				$sql->db_Select("news_category", "*", "order by category_id", "no_where");
				while($row = $sql->db_Fetch() )
				{
				$ch = (in_array($row['category_id'], $pref['frontpage_catnews']) ? " checked='checked'" : '');
				// list category in checkbox 
				$text .= $rs -> form_checkbox('frontpage_catnews[]', "{$row['category_id']}", "{$ch}" ) . $row['category_name'] ."<br />";
				$i++;
				}
	$text .="</td>
		</tr>		
		<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_46 ."</td>
			<td class='forumheader3' style='width:65%'>";
				for ($i=4 ; $i<7 ; $i++) {
				$text .= $rs->form_select_open('frontpage_box_'.$i.'' ) ."
				" .$rs->form_option(LAN_FRONTPAGE_47 , "{$ch}" , 0) ;
				$sql->db_Select("news_category", "*", "order by category_id", "no_where");
				while($row = $sql->db_Fetch() )
				{

				$text .= $rs->form_option($row['category_name'], ($pref['frontpage_box_'.$i.''] == $row['category_id'] ), $row['category_id']) ;

				} 
				// unset($row1);
				$text .= $rs->form_select_close() ;
				}
				
				$text .= "</td>
		</tr>		
		<tr>
			<td class='forumheader3' style='width:35%'>". LAN_FRONTPAGE_44 ."</td>
			<td class='forumheader3' style='width:65%'><input class='tbox' name='frontpage_cat_news' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_cat_news'], $pref['frontpage_cat_news'])."' /> </td>
		</tr>		
		<tr>
			<td class='forumheader' colspan='2' style='text-align:left; vertical-align: top;'>
				<input type='submit' class='button' name='frontpage_news_submit_category' value='".LAN_SAVE."' />
			</td>
		</tr>
		";
		
	$text .= $rs->form_close();
		//echo $tp->post_toForm($_POST['frontpage_facebook']) ;
		/*
	*/
// =========================================================================

?>