if ($pref['facecomment_id'])
	$app_id = "&appId=".$pref['facecomment_id']."";
return "
<div id='fb-root'></div>
<script type='text/javascript' >(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/en_EN/all.js#xfbml=1".$app_id."';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
";