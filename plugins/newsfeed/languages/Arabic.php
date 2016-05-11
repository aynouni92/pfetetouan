<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     �Steve Dunstan 2001-2002
|     http://e107.org
|     jalist@e107.org
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $Source: /cvsroot/e107/e107_0.7/e107_plugins/newsfeed/languages/Arabic.php,v $
|     $Revision: 1.9 $
|     $Date: 2006/11/04 18:26:47 $
|     $Author: e107coders $
|     $Translation : AnouaroS $
+----------------------------------------------------------------------------+
*/
define("NFLAN_01", "جالب الأخبار");
define("NFLAN_02", "هذه القائمة الإضافية ستقوم بعرض أخبار (rss feeds) من مواقع اخرى تدعم هذه الخاصية و عرضها حسب الخيارات .ترجمة AnouaroS ، شبكة الباتشات و السوفتوير.");
define("NFLAN_03", "إعدادات جالب الاخبار");
define("NFLAN_04", "تم تثبيث القائمة بنجاح ، للتعديل و لإضافة روابط أخبار لتم جلبها للموقع ، عليك الذهاب الى القائمة في لوحة التحكم.");
define("NFLAN_05", "تعديل");
define("NFLAN_06", "حذف");
define("NFLAN_07", "الاخبار المتوفرة");
define("NFLAN_08", "ص. الرئيسية لجالب الاخبار");
define("NFLAN_09", "أضف جالب خبر جديد");
define("NFLAN_10", "مسار URL الكامل لجالب الاخبار rss feed");
define("NFLAN_11", "مسار الصورة الكامل");
define("NFLAN_12", "طريقة العرض");
define("NFLAN_13", "عدم العرض (معطلة)");
define("NFLAN_14", "فقط في القائمة");
define("NFLAN_15", "أضف");
define("NFLAN_16", "تحديث");
define("NFLAN_17", "إذا كان الفيد له صورة تلقائية مصاحبة، ادخل 'default' لاستعمالها. لاستعمال صورة خاصة ، أدخل المسار الكامل للصورة. أو اتركه فارغا لعدم استعمال الصورة.");
define("NFLAN_18", "توقيت التحديث بالثواني");
define("NFLAN_19", "مثال، 3600: سيتم تحديث الخبر كل ساعة.");
define("NFLAN_20", "في صفحة جالب الأخبار فقط");
define("NFLAN_21", "في القائمة و صفحة جالب الاخبار");
define("NFLAN_22", "اختر المكان الذي سيتم فيه عرض الخبر");
define("NFLAN_23", "تمت إضافة الخبر المجلوب (feed)بنجاح.");
define("NFLAN_24", "تركت بعض الحقول فارغة.");
define("NFLAN_25", "تم تحديث الإعدادات بنجاح.");
define("NFLAN_26", "مدة التحديث");
define("NFLAN_27", "الخيارات");
define("NFLAN_28", "مسار URL");
define("NFLAN_29", "الأخبار المتوفرة المعروضة");
define("NFLAN_30", "إسم الخبر المجلوب (feed)");
define("NFLAN_31", "الرجوع للائحة الرئيسية");
define("NFLAN_32", "لا يوجد جالب اخبار بهذا الرقم التعريفي..");
define("NFLAN_33", "تاريخ النشر:");
define("NFLAN_34", "غير معروف");
define("NFLAN_35", "نشر بواسطة");
define("NFLAN_36", "الوصف");
define("NFLAN_37", "أدخل وصف مصغر للفيد ، أو أدخل 'default' لاستعمال الوصف المصاحب للفيد(في حالة إذا كان موجود).");
define("NFLAN_38", "آخر المواضيع الجديدة");
define("NFLAN_39", "التفاصيل");
define("NFLAN_40", "تم الحذف بنجاح.");
define("NFLAN_41", "لم يتم تحديد أي جالب أخبار لحد الساعة");
define("NFLAN_42", "<b>»</b> <u>إسم الخبر المجلوب:</u>
لتعريف الخبر المجلوب من المواقع الاخرى، اعطي الإسم الذي تريده.
<br />
<b>»</b> <u>مسار URL لجالب الأخبار xml:</u>
العنوان الكامل لمسار rss feed
<br />
<b>»</b> <u>مسار الصورة:</u>
إذا كان الفيد له صورة تلقائية مصاحبة، ادخل 'default' لاستعمالها. لاستعمال صورة خاصة ، أدخل المسار الكامل للصورة. أو اتركه فارغا لعدم استعمال الصورة.
<br />
<b>»</b> <u>الوصف:</u>
أدخل وصف مصغر للفيد ، أو أدخل 'default' لاستعمال الوصف المصاحب للفيد(في حالة إذا كان موجود).
<br />
<b>»</b> <u>مدة تحديث الاخبار :</u>
أدخل عدد الثوان التي سيتم خلالها عملية التحديث، مثلا 1800: 30 دقيقة، 3600: ساعة.
<br />
<b>»</b> <u>التفعيل:</u>
ان سيتم عرض الأخبار؟ لرؤية جالب الأخبار يجب تفعيل خاصيةجالب الاخبار في لوحة التحكم ، <a href='".e_ADMIN."menus.php'>القوائم</a>.
<br />توجد لائحة متميزة للأخبار القابلة للجلب في <a href='http://www.syndic8.com/' rel='external'>syndic8.com</a> or <a href='http://feedfinder.feedster.com/index.php' rel='extter.com/index.php' rel='external'>feedster.com</a>");
define("NFLAN_43", "مساعدة");
define("NFLAN_44", "إضغط للمعاينة");
define("NFLAN_45", "عدد العناصر لعرضها في القائمة");
define("NFLAN_46", "عدد العناصر لعرضها في الصفحة");
define("NFLAN_47", "0 أو اتركه فارغا لعرض الكل");
define("NFLAN_48", "غير قادر على حفظ المدخلة في قاعدة البيانات .");
define("NFLAN_49", "Unable to unserialize rss data - uses non-standard syntax");


?>