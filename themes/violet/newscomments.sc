if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) 
{
  
	// make e107 comments behave like wordpress...! ;) 

	global $nid , $editall,$pref, $sql, $tp;
	
	$news_item = getcachedvars('current_news_item'); 
	$nid = $news_item['news_id'] ;
	$editall = FALSE ;

	if($pref['comments_disabled'] == 1)
	{
		return;
	}	
	
	if(!$news_item['news_allow_comments'])
	{
	$addcommenttext = "<a href='#addcomments'>أضف تعليق</a><br /><br />";	
	$commenteditor = "
		<!-- respond -->
		$edit
		<div class='clear'>  </div>	
			<div class='newsbody'>
				<div class='title_box' id='addcomments' >أضف تعليقك</div>					
				<form id='form3' action='comment.php?comment.news.".$nid."' method='post'   onsubmit=\"return checkform(this);\"> 								
					<p>	
						<label for='name'>كاتب التعليق (ضروري)</label><br />
						<input id='name' name='author_name' value='' size='40' type='text' tabindex='1' />
					</p>
	
					<p>
						<label for='subject'>عنوان التعليق (ضروري)</label><br />
						<input id='subject' name='subject' value='' size='40' type='text' tabindex='2' />
					</p>
				
					<p>
						<label for='message'>التعليق</label><br />
						<textarea id='message' name='comment' rows='10' cols='60' tabindex='3'></textarea>
					</p>	
					<p>
						<label for='code'>أكتب الرقم الذي تراه امامك > <span id='txtCaptchaDiv' style='color:#F00'></span><!-- this is where the script will place the generated code --> 
						<input type='hidden' id='txtCaptcha' name='txtCaptcha' /></label><!-- this is where the script will place a copy of the code for validation: this is a hidden field -->
						<input type='text' name='txtInput' id='txtInput' size='10' />
					</p>	
					<p class='no-border'>
						<input type='hidden' name='e-token' value='".e_TOKEN."' />\n
						<input name='commentsubmit' class='button' type='submit' value='أضف تعليقك' tabindex='5' /> 					
					</p>					
					<script type='text/javascript' src='".THEME_ABS."script.js'></script>
				</form>	
			
			<!-- /respond -->
			</div>";
	}	
	
	function comids($cid) 
	{
		global $nid;
		$sql = new db;
		
			if ( intval($cid) ) 
			{
				$qry = "SELECT comment_id FROM #comments WHERE comment_pid = '$cid' AND comment_pid != '0'  AND comment_item_id = '$nid' AND comment_type = '0'  ";
			} 
			else 
			{
				$qry = "SELECT comment_id FROM #comments WHERE comment_pid = '0' AND comment_item_id = '$nid' AND comment_type = '0'  ";
			}
			
		$sql->db_select_gen( $qry );
		
			while( $row=$sql->db_Fetch() ) 
			{
				$ids[] .= $row['comment_id'];
			} 
		return $ids;
	}

	function create_commentz($cid) 
	{
		global $nid;
			if (comids($cid)) 
			{
				$comment .= create_commentz_tpl($cid);
				$cids = comids($cid);
					foreach ( $cids as $scid ) 
					{
						$comment .= "<ul class='children'>";
						
							if (comids($scid)) 
							{
								$comment .= "<li class='depth-2'>".create_commentz($scid)."</li>";
							} 
							else 
							{
								$comment .= "<li class='depth-3'>".create_commentz_tpl($scid)."</li>";
							} 
							
						$comment .= "</ul>"; 
					}
			} 
			else 
			{
				$comment .= create_commentz_tpl($cid);
			}
			
		return $comment; 
	}


	function create_commentz_tpl($cid) 
	{
		global $nid , $editall;
		$sql = new db;
		
		if (ADMIN && getperms("B"))
			$edit = "<a href='".e_ADMIN_ABS."modcomment.php?news.$nid.$cid' class='reply' >تعديل التعليق<img src='".e_IMAGE."generic/".IMODE."/newsedit.png' alt='تعديل التعليق' title='تعديل التعليق' /></a>";	

		$sql->db_select_gen("SELECT * FROM #comments WHERE comment_id = '$cid' AND comment_item_id = '$nid' AND comment_type = '0' ");
			while( $row=$sql->db_Fetch() ) 
			{
				extract($row);
				$author = explode('.',$comment_author );
				$date = strftime("%d %B %Y", $comment_datestamp); 
				$time = strftime("%H:%M", $comment_datestamp); 
				if ($comment_blocked == '0') 
				{
					$text .= "
						<ol class='commentlist'>
							<li id='comment-$cid'>
								<cite>
									<span class='author'>$author[1]</span> --> $comment_subject <br />
									<span class='time'>$time</span> بتاريخ <a href='#comment-$cid' title=''>$date</a>
								</cite>
							<div class='commenttext'>". nl2br($comment_comment) ."
							$edit<a href='comment.php?reply.news.$cid.$nid' title='' class='reply' >رد على هذا التعليق<img src='" .THEME_ABS. "images/comment_arrows.png' alt='' /></a>
							</div>
							</li>
						</ol>	
						";
				}
				else
				{
					if (ADMIN && getperms("B"))
					{
						$text .="<ol class='warning'>هذا تعليق غير متاح للعموم و  يحتاج للموافقة حتى يتم نشره بالموقع: <br />". nl2br($comment_comment) ."<br /><a href='".e_ADMIN_ABS."modcomment.php?news.$nid'>نشر التعليق</a></ol>";
						$editall = TRUE ;
					}	
				}
				
			}
		return $text;
	}

	$comment .= $addcommenttext ;
	
	foreach ( comids() as $cid ) { 
		$comment .= create_commentz($cid); 
	}

	if ($editall)	
		$edit = "<div class='info'><a href='".e_ADMIN_ABS."modcomment.php?news.$nid'>تعديل التعليقات</a></div>";
				
	$comment .=	$commenteditor ;
	
	return $comment;
}