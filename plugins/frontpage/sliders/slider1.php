<?php
unset($vitese);
if ($pref['frontpage_news_silder1_vit'])
	$vitese = $pref['frontpage_news_silder1_vit'];
else 
	$vitese = "5000";	
$beginslider =
	'
	<div class="contentslide c1" id="slider1">
		<div class="opacitylayer">
	'; 
$sliderstyle = 
	"
			<div class='contentdiv'>
				<table style='width: 100%;'>
					<tr>
						<td style='text-align:center;'>
							<h1>{NEWSTITLELINK=extend}</h1>
							{NEWSIMAGE}<br /><br />
							{NEWSBODY}
							{EXTENDED}	
							<br />
								<div class='clear'>  </div>	
							<br />
						</td>
					</tr>
				</table>
			</div>
	";	

$endslider = 
	'
			<div class="pagination p1" id="paginate-slider1"></div>
			<script type="text/javascript">ContentSlider("slider1", '. $vitese .')</script>
			<br />
		</div>
	</div>
	';				
unset($vitese);
?>