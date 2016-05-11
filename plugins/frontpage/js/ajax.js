var xmlHttp;
var action="showimg";
var timercnt=0;
var timerid=0;
function embedlink(idx,valuex){
if (document.getElementById(idx).checked){document.getElementById('fwpage').value +=valuex+",";}
if (!document.getElementById(idx).checked){

toreplace=document.getElementById('fwpage').value;
document.getElementById('fwpage').value=toreplace.replace(valuex+",","")

}

}

function setaction(act){
action=act;

}

function CallAjax(str,url)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }


url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}


function stateChanged(){ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 



// xmlHttp.responseText.setContentType();
resp=xmlHttp.responseText;
setresponse(resp);
 } 
}


function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}



var tblid="";
function settblid(id){
tblid=id;
}
function drawtable(){
var trows=document.getElementById('trows').value;
var tcols=document.getElementById('tcols').value;
var twidth=document.getElementById('twidth').value;
var theight=document.getElementById('theight').value;
var align=document.getElementById('align').value;
var dir=document.getElementById('dir').value;
if (trows<1){ trows=1; }
if (tcols<1){ tcols=1;}

if (twidth==""){ecwidth=" width=%100 ";} else {var ecwidth=" width="+twidth+" ";}
if (theight!=""){echeight=" ";} else {var echeight= " height="+theight+" ";}

var vidwid="<div align="+align+" dir="+dir+" id=intable>";
var divwidend="</div>";


var content=vidwid+"<table border=1 cellpadding=0 bordercolor='#000000' "+ecwidth+echeight+"cellspacing=0 style='border:1px solid #000000;' >";

for (var x = 1; x <= trows; x++)
   {
   content +="<tr>";
   for (var y = 1; y <= tcols; y++)
  		{
		content +="<td align='center' valign='middle'></td>";
		}
	content +="</tr>";
	}
content+="</table>"+divwidend;

document.getElementById('foo').innerHTML +=content; 
}

function setresponse(response){

if (action=="showimg"){document.getElementById("txtHint").innerHTML=response;}
if (action=="last50"){document.getElementById("morelinks").innerHTML=response;}
if (action=="changeslide"){

var longstring=response;

var brokenstring=longstring.split("********"); 
document.getElementById("slidecont").innerHTML=brokenstring[0];
document.getElementById("imgcont").style.background='url('+brokenstring[1]+')  right top';

}
if (action=="gethline"){document.getElementById("extrafoo").innerHTML+="<p>"+response;}
if (action=="addcomment"){document.getElementById("comform").innerHTML=response;}
}

function insertimgcap(){
var thepath=document.getElementById('imgpath').value;
var thecaption=document.getElementById('inscap').value;
var float=document.getElementById('float').value;
if (thepath!=""){
var content="<div style='float:"+float+"'><table border='0' cellpadding='0' cellspacing='0' width='310'>";
content +="<tr><td><img border='0' src='../meoicons/headers/caption.gif' width='310' height='10'></td></tr>";
content +="<tr><td align='center'><table border='0' cellpadding='0' cellspacing='0' width='300'>";
content +="<tr><td align='center'><img src='"+thepath+"' id='imgb'></td></tr><tr>";
content +="<td bgcolor='#F6F6F6'><p id='caption'>"+thecaption+"</td></tr></table></td>";
content +="</tr><tr><td><img border='0' src='../meoicons/headers/captionb.gif' width='310' height='10'></td></tr></table></div>";}
else {
content ="<div style='float:"+float+"'><table border='0' cellpadding='0' cellspacing='0' width='200'><tr><td><img border='0' src='../meoicons/bg/summary.gif' width='200' height='44'></td></tr><tr>";
content +="<td background='../meoicons/bg/summarys.gif' align='center'><table border='0' cellpadding='0' cellspacing='0' width='155'><tr><td><p id='caption2'>"+thecaption+"</p>";
content +="</td></tr></table></td></tr><tr><td><img border='0' src='../meoicons/bg/summaryb.gif' width='200' height='27'></td></tr></table></div>";
}
document.getElementById('foo').innerHTML += content;


}


function savetxt(){
var formvalue=document.getElementById('foo').innerHTML;
document.getElementById('TEXT').value=formvalue;
if (document.getElementById('TEXT').value==""){ 

return false; } else {

return true;}

}





function chtrans(){

document.getElementById("chtrans").style.background='rgba(3, 132, 183, 0.5)';
}



function showcomform(){
var comstring="<table border='0' cellpadding='0' style='border-collapse: collapse' width='400'><tr><td width='50'><img border='0' src='meoicons/comments/comname.gif' width='42' height='20'></td>";
comstring +="<td><input type='text' name='comname' size='32' style='font-family: Arial; color: #666666; font-size: 12pt; font-weight: bold' dir='rtl'></td></tr>";
comstring +="<tr><td width='50'><img border='0' src='meoicons/comments/comcnt.gif' width='42' height='20'></td>";
comstring +="<td><input type='text' name='comcnt' size='32' style='font-size: 12pt; font-family: Arial; color: #666666; font-weight: bold' dir='rtl'></td></tr>";
comstring +="<tr><td width='50'><img border='0' src='meoicons/comments/comtxt.gif' width='42' height='20'></td>";
comstring +="<td><textarea rows='8' name='comtxt' cols='34' dir='rtl' style='font-size: 12pt; font-family: Arial; color: #666666; font-weight: bold' onKeyUp='comlimit();' onKeyDown='comlimit();'></textarea><input readonly type='text' dir=rtl id='comrem' value='500/500' size=7 style='font-size:7pt; color:green;'></td></tr>";
comstring +="<tr><td width='50'>&nbsp;</td><td align='left'><input type='submit' value='«—”«·'  style='background-color:white;border: 1px solid #0066CC' >";
comstring +="</td></tr>";

comstring +="<tr><td align='left' dir=rtl id=comnote colspan=2>*Ì—ÃÏ «· —›⁄ ⁄‰ «·√·›«Ÿ «·‰«»Ì… Ê«· Ã—ÌÕ «·‘Œ’Ì ›Ì Õﬁ «·ﬂ «» Ê«·„⁄·ﬁÌ‰</td></tr>";
comstring +="<tr><td align='left' dir=rtl id=comnote colspan=2>*«·Õœ «·√ﬁ’Ï ··„‘«—ﬂ… ÂÊ 500 Õ—›</td></tr></table>";


document.getElementById('comform').innerHTML +=comstring;

document.getElementById('comarrow').innerHTML="<img border='0' src='meoicons/comments/commarrowdn.gif' width='18' height='10' onclick=\"hidecomform();\">";

}

function hidecomform(){
document.getElementById('comform').innerHTML="";
document.getElementById('comarrow').innerHTML="<img border='0' src='meoicons/comments/commarrow.gif' width='10' height='18' onclick=\"showcomform();\">";
}





function changeslide3(id){
// setaction("changeslide");

// var newslide="<table border='0' cellpadding='0' cellspacing='0' width='406'>";

var newslide="<table border='0' cellpadding='0' cellspacing='0' width='406' >";
newslide +="<tr><td height='352' id='imgcont2' background='"+photoid[id]+"'  valign='bottom'>";
newslide +="<table border='0' cellpadding='0' cellspacing='0' width='406' background='"+photoid[id]+"' style='background-position:center bottom;' id='imgcont3'>";
newslide +="<tr><td id='chtrans' bgcolor='#123557' height=38>";
newslide +="<a href='?id="+newsid[id]+"' id='chtrans2'><p id='chtrans2'>"+headline[id]+"</p></a></td></tr>";
newslide +="<tr><td bgcolor='#123557' id='chtrans' height=37><a href='?id="+newsid[id]+"' id='chtrans3'><p id='chtrans3'>"+summary[id]+"</p></a></td></tr>";
newslide +="</table></td></tr></table>";
document.getElementById("slidecont").innerHTML=newslide;
// SetOpacity('imgcont',0)
SetOpacity('imgcont2',0)
document.getElementById("imgcont").style.background="url("+photoid[id]+")   right top";
// document.getElementById("imgcont2").style.background="url("+photoid[id]+")  center top";
// document.getElementById("imgcont3").style.background="url("+photoid[id]+")   center bottom";
FadeIn('imgcont');
// SetOpacity('imgcont',80)
SetOpacity('imgcont2',80);
}





function showgates(){

document.getElementById('countries').innerHTML=gates;

}


function hidegates(){

document.getElementById('countries').innerHTML="";


}



function printver(){

var content=document.getElementById('newscontainer').innerHTML;


var string = "<table border='0' cellpadding='0' cellspacing='0'>";
string += "	<tr>";
string += "		<td>";
string += "		<table border='0' cellpadding='0' cellspacing='0'>";
string += "			<tr>";
string += "				<td valign='top'>";
string += "				<img border='0' src='meoicons/logo.gif' width='250' height='85'></td>";
string += "				<td><p ><img src='meoicons/prback.gif' onclick=\"window.location.reload( true )\" style='cursor:hand;'></p><font size=4 face=Arial color=black><p><a href='javascript:window.print();'>ÿ»«⁄…</a></p>";
string += "				<p>&nbsp;</td>";
string += "			</tr>";
string += "		</table>";
string += "		</td>";
string += "	</tr>";
string += "	<tr>";
string += "		<td>"+content+"</td>";
string += "	</tr>";
string += "	<tr>";
string += "		<td>&nbsp;</td>";
string += "	</tr>";
string += "</table>";


document.body.dir = 'rtl', 
document.body.background='meoicons/printbg.gif';
document.body.innerHTML=string;
}

function sprintver(){
var link=document.getElementById('updated').innerText;
var headline=document.getElementById('mhline2').innerText;
var summary=document.getElementById('insummary').innerText;
var source=document.getElementById('source').innerText;
var intext=document.getElementById('storytext').innerHTML;
intext=removeHTMLTags(intext);
var path=window.location.href;
var string='';
string +="<p ><img src='meoicons/prback.gif' onclick=\"window.location.reload( true )\" style='cursor:hand;'></p>";
string +="<font size=4 face=Arial color=black><p><a href='javascript:window.print();'>ÿ»«⁄…</a></p>";
string +="<p>source: "+path+"</p>";
string +="<p>"+link+"</p>";
string +="<p>"+headline+"</p>";
string +="<p>"+summary+"</p>";
string +="<p>"+source+"</p>";
string +="<p>"+intext+"</p></font>";
document.body.dir = 'rtl', 
document.body.background='meoicons/printbg.gif';
document.body.innerHTML=string;
}



function removeHTMLTags(strInputCode){
// var strTagStrippedText = strInputCode.replace(/(?:<\s*\/?\s*)(img|div|table|td|tr).(?:\s*([^>]*)?\s*>)/gi, "");
 var strTagStrippedText = strInputCode.replace(/<\/?[^Pp](.+?)[^>]+(>|$)/g, "");
//var strTagStrippedText = strInputCode.replace(/\<div\>(.+?)[^>]\<\/div\>/g, "");
 // var strTagStrippedText = strInputCode.replace(/\<div(.+?)\/div\>/g, "");

 		return 	strTagStrippedText;	
}


function launchtimer(){
clearInterval (timerid);
timerid=setInterval ( "changetimed()", 10000 );


}

function changetimed(){
timercnt+=1;
if (timercnt>4){timercnt=0;}
changeslide3(timercnt);
var imgid=newsid[timercnt];
var previd=newsid[timercnt-1];
if (timercnt==0){previd=newsid[4];}
// document.getElementById("echotest").innerHTML=imgid;


document.getElementById(previd).style.border="0px solid black";
document.getElementById(previd).style.width="80px";
document.getElementById(previd).style.height="68px";


document.getElementById(imgid).style.border="1px solid black";
document.getElementById(imgid).style.width="78px";
document.getElementById(imgid).style.height="66px";
}


function stoptimer(){
clearInterval (timerid);
}

function showloader(id){

var loaderstr="<table border='0' cellpadding='0' style='border-collapse: collapse' width='500'>";
loaderstr +="<tr><td align='center'>«·≈÷«›… Ã«—Ì…° Ì—ÃÏ «·«‰ Ÿ«—</td></tr>";
loaderstr +="<tr><td align='center'><img src='meoicons/loader.gif'></td></tr></table>";
document.getElementById(id).innerHTML=loaderstr;

}

function addcomment(){

var comnewsid=document.getElementById('newsid').value;
var comname=document.getElementById('comname').value;
var comcnt=document.getElementById('comcnt').value;
var comtxt=document.getElementById('comtxt').value;

if (comname !="" && comcnt !="" && comtxt !="" ){
showloader('comform');
var preparestring=comnewsid+"&&comname="+comname+"&&comcnt="+comcnt+"&&comtxt="+comtxt;
setaction("addcomment");
CallAjax(preparestring,"newcomment.php");
} else {

 document.getElementById('comform').innerHTML ="<p align='center' style='font-size: 14pt; font-family: Arial; color: #D41708; font-weight: bold'>Œÿ√∫  √ﬂœ „‰  ⁄»∆… Ã„Ì⁄ «·Œ«‰« </p>";
showcomform();
}

}






function SetOpacity(id,opacityPct)
{
  

  document.getElementById(id).style.filter = 'alpha(opacity=' + opacityPct + ')';
  

  document.getElementById(id).style.MozOpacity = opacityPct/100;
 

  document.getElementById(id).style.opacity = opacityPct/100;
}

function ChangeOpacity(id,msDuration,msStart,fromO,toO)
{
  var element=document.getElementById(id);
  var opacity = element.style.opacity * 100;
  var msNow = (new Date()).getTime();
  opacity = fromO + (toO - fromO) * (msNow - msStart) / msDuration;
  if (opacity<0) 
    SetOpacity(id,0)
  else if (opacity>100)
    SetOpacity(id,100)
  else
  {
    SetOpacity(id,opacity);
    element.timer = window.setTimeout("ChangeOpacity('" + id + "'," + msDuration + "," + msStart + "," + fromO + "," + toO + ")",1);
  }
}



function FadeIn(id)
{


  var element=document.getElementById(id);
  if (element.timer) window.clearTimeout(element.timer); 
  var startMS = (new Date()).getTime();
  element.timer = window.setTimeout("ChangeOpacity('" + id + "',1000," + startMS + ",0,100)",1);

}



function setpos(){
var slelement=document.getElementById('imgcont');
var slposX=findPosX(slelement);
var slposY=findPosY(slelement);
// var slarr=slpos.split(",");

document.getElementById('arrcont').style.top=slposY;
document.getElementById('arrcont').style.left=slposX;

alert(slposX +"X"+ slposY);


}


function findPos(obj) {
var curleft = curtop = 0;
if (obj.offsetParent) {
do {
/*
			curleft += obj.offsetLeft;
			curtop += obj.offsetTop;
*/
			curleft += obj.style.left;
			curtop += obj.style.top;


} 
while (obj = obj.offsetParent);
return [curleft,curtop];
}
}












function findPosX(obj)
  {
    var curleft = 0;
    if(obj.offsetParent)
        while(1) 
        {
          curleft += obj.offsetLeft;
          if(!obj.offsetParent)
            break;
          obj = obj.offsetParent;
        }
    else if(obj.x)
        curleft += obj.x;
    return curleft;
  }

  function findPosY(obj)
  {
    var curtop = 0;
    if(obj.offsetParent)
        while(1)
        {
          curtop += obj.offsetTop;
          if(!obj.offsetParent)
            break;
          obj = obj.offsetParent;
        }
    else if(obj.y)
        curtop += obj.y;
    return curtop;
  }




function fbs_click() {
var u=location.href;
var t=document.getElementById('mhline2').innerText;


window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
return false;
}





function share_twitter() {

var u=location.href;



window.open('http://twitter.com/home?status=Currently reading '+encodeURIComponent(u),'sharer','toolbar=0,status=0,width=626,height=436');
return false;
}

function chtitle(){
var ttext=document.getElementById('mhline2').innerText;
document.title=ttext; 

}



function comlimit() {
var max=500;
var comvalue=  document.getElementById('comtxt').value;
var comlength= document.getElementById('comtxt').value.length;
var remlength=max-comlength;
document.getElementById('comrem').value=remlength+"/500";
if (comlength>max){document.getElementById('comrem').style.color='red';} else {document.getElementById('comrem').style.color='green';}
}