#================================================================================
# News Category Links Menu - a menu plugin that diplays news category links by bk
# Upgraded to v2.0 by Mohamed Anouar (naja7host.com) . 
#               Released under the terms and conditions of the
#                 GNU General Public License (http://gnu.org).
#================================================================================

Purpose of the News Category Links Menu plugin
==============================================
This is a very Advanced menu plugin that shows a list of all or selected news categories and links to them.
The categories are sorted by their id. If you need to alter their order feel free to change the
"order by" in the SQL query (file newscategorylinks_menu.php; search for $sql->db_Select().


Prerequisites:
==============
E107 core v0.7.8 (or newer) installed.
Plugin may also work with older versions but was only tested with version v0.7.8.


Installation:
=============
The plugin requires no installation. Simply copy the newscategorylinks_menu folder into your e107_plugins folder. Uninstall by deleting the newscategorylinks_menu folder.


Updates:
===========
To update or downgrade simply overwrite the existing files of the plugin with the files from this archive.


Background information
================================
The plugin makes no changes to the database at all. Use CSS to format the links as you wish. If you need to change the menu caption, please change the according language file. The language files are located within the language subfolder of this plugin.


Changelog:
==========
Version 2.0:
 * New/Added Features:
   - administration interface
   - Select wich link shown in the menu 
   - render in box or plaintext 

 * Altered Features:
   -
 * Bugs Fixed:
   - language Files include 
 * Minor Changes:
   -
 * Wishlist:
   - define the order of the categories via an administration interface
   - add multiple menu with submenus 
 * Known bugs:
   -

Version 1.1:
 * New/Added Features:
   - added individual CSS class names for each news category link (even if this will be possible using CSS3 in the future)
 * Altered Features:
   -
 * Bugs Fixed:
   - fixed the bug which caused the plugin not to work correctly if a page was displayed that wasn't in the root folder (thanks to jongag1)
 * Minor Changes:
   -
 * Wishlist:
   - define the order of the categories via an administration interface
 * Known bugs:
   -

Version 1.0:
 * New/Added Features:
   - show a list of all available news categories and link to them
   - made plugin language file dependent
 * Altered Features:
   -
 * Bugs Fixed:
   -
 * Minor Changes:
   -
 * Wishlist:
   - define the order of the categories via an administration interface
   - CSS classes to format each news category link individually
 * Known bugs:
   -


License
=======
News Category Links Menu is distributed as free open source code released under the terms and conditions of the [link=external=http://gnu.org/]GNU General Public License[/link].