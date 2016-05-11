print_r($breadcrumb);  require_once("class2.php");
if(!session_id())
@session_start(); 
echo "<pre>";
if($_GET['clear'] == "breadcrumb") 
    $_SESSION['TRACE_SESSION'] = ""; 
  
$mySection = substr(e_SELF, strrpos(e_SELF, "/") + 1, strrpos(e_SELF, ".") - strrpos(e_SELF, "/") - 1); 
echo "mySection $mySection";
$breadcrumb = explode("[url]", $_SESSION['TRACE_SESSION']); 

$breadcrumbAsString = ""; 
      
if(count($breadcrumb) > 7) 
    $breadcrumb = array_slice($breadcrumb, 1); 

for($i = 0; $i < count($breadcrumb); $i++){ 
    $element = explode("[title]", $breadcrumb[$i]); 
    $breadcrumbAsString .= "<a href='".$element[0]."'>".$element[1]."</a>"; 
    if($i + 1 < count($breadcrumb))  $breadcrumbAsString .= " » "; 
	  print_r($breadcrumb);  
} 
  
$_SESSION['TRACE_SESSION'] = implode("[url]", $breadcrumb); 
  
$_SESSION['TRACE_SESSION'] .= "[url]" .e_SELF.((e_QUERY != "" ) ? "?".e_QUERY : "") ."[title]". (defined("e_PAGETITLE") ? e_PAGETITLE : $mySection); 

print_r($_SESSION);  
return "<div id='breadcrumb'>Breadcrumb: ".$breadcrumbAsString."</div> 
";