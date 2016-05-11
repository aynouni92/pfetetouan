<?php/*+---------------------------------------------------------------+|        e107 website system|        News Counter by Naja7Host (www.naja7host.com)||        Released under the terms and conditions of the|        GNU General Public License (http://gnu.org).+---------------------------------------------------------------+*/
   // Remember that we must include class2.php   require_once("../../class2.php");
   // Check current user is an admin, redirect to main site if not   if (!getperms("P")) {      header("location:".e_HTTP."index.php");      exit;   }	include_lan(e_PLUGIN.'views/languages/'.e_LANGUAGE.'.php');
   // Include page header stuff for admin pages
   require_once(e_ADMIN."auth.php");
if (!defined('ADMIN_WIDTH')){    define(ADMIN_WIDTH, "width:100%;");}   // Our informative text	$text =" 	<table class='fborder' style='" . ADMIN_WIDTH . "'>		<tr>			<td class='fcaption' colspan='2'>" . LAN_VIEWS_11 . "</td>		</tr>		<tr>			<td style='width:40%' class='forumheader3'>" . LAN_VIEWS_36 . "</td>			<td class='forumheader'>".LAN_VIEWS_10."</td>		</tr>		<tr>			<td style='width:40%' class='forumheader3'>" . LAN_VIEWS_34 . "</td>			<td class='forumheader'>".LAN_VIEWS_35."</td>		</tr>		<tr>			<td class='forumheader' colspan='2'>Created & supported by <a href='http://naja7host.com' title='Quality Hosting' >Naja7host.com</a> , Quality Hosting and Secure e107 server.</td>		</tr>	</table>";
   // The usual, tell e107 what to include on the page   $ns->tablerender(LAN_VIEWS_11 , $text);   require_once(e_ADMIN."footer.php");
?>
 
