<?php
/*
+---------------------------------------------------------------+
|
|        $URL: ../languages/Arabic/lan_installer.php $
|        $Author: Naja7host.com $
+---------------------------------------------------------------+
*/
define('LANINS_TITLE', 'تثبيت السكريبت');
define('LANINS_000', 'معلومات غير مكتملة! توقف التركيب');
define('LANINS_001', 'الإصدار  %1$s');
define('LANINS_002', 'التثبيت');
define('LANINS_002a', '(المرحلة %1$s من 7)');
define('LANINS_003', '1');
define('LANINS_004', 'اختيار اللغة');
define('LANINS_004a', 'اللغة المختارة');
define('LANINS_004b', 'الللغة');
define('LANINS_005', 'من فضلك اختر اللغة التي ستستخدمها خلال عملية التثبيث');
define('LANINS_006', 'على بركة الله نبدأ');
define('LANINS_007', '4');
define('LANINS_008', 'التأكد من إصدار PHP & MySQL / صلاحيات الملفات');
define('LANINS_008a', 'التوافق & صلاحيات الملفات');
define('LANINS_009', 'أعد فحص صلاحيات الملفات');
define('LANINS_010', 'ملف غير قابل للكتابة:');
define('LANINS_010a', 'مجلد غير قابل للكتابة:');
define('LANINS_011', 'خطأ');
define('LANINS_012', 'على ما يبدوا أنه لا يوجد خادم قواعد البيانات . This probably means that either the MySQL PHP Extension isn\'t installed or your PHP installation wasn\'t compiled with MySQL support.');
define('LANINS_013', 'لم يتمكن من تحديد إصدارMySQL. هذا ليس خطأ فادح , يمكنك الاستمرار في التثبيث , لكن ليكن في علمك أن مجلة e107 تحتاجMySQL >= 3.23 لتعمل بكفاءة تامة.');
define('LANINS_014', 'صلاحيات الملفات');
define('LANINS_015', 'إصدار PHP');
define('LANINS_016', 'MySQL');
define('LANINS_017', 'صحبح');
define('LANINS_018', 'تأكد من ان الملفات التالية موجودة و بها صلاحيات الكتابة . عبها ان تكون حاملة للصلاحياتCHMOD 777, يمكنك الاستعانة بالاستضافة لعمل ذلك .');
define('LANINS_019', 'إصدار PHP الموجود على الخادم غير قادر ظمان عمل e107. e107 تحتاج إصدار PHP على الأقل 4.3.0 للعمل بكفاءة. عليك ترقية إصدار PHP أو الاتصال بالمستضيف للقيام بذلك .');
define('LANINS_020', 'الاستمرار في التثبيث');
define('LANINS_021', '2');
define('LANINS_022', 'معلومات قاعدة البيانات MySQL');
define('LANINS_022a', 'قاعدة البيانات');
define('LANINS_023', 'من فضلك أدخل معلومات MySQL هنا.
<br /><br />إذا كانت لديك صلاحيات الرووت (root) يمكنك إضافة واحدة عن طريق تعليم الخانة بالأسفل , و إما عليك استخدام معلومات قاعدة تم إنشائها مسبقا.<br /><br /> إذا كانت لدبك قاعدة بيانات واحدة فقط ، يمكنك استعمال البريفيكس لمشاركة قاعدة البيانات مع سكريبتات أخرى.<br /> إذا كنت لا تعرف أي شيء عن قاعدة البيانات فاتصل بالدعم الفني للمستضيف .
 
');
define('LANINS_024', 'MySQL Server:');
define('LANINS_025', 'MySQL Username:');
define('LANINS_026', 'MySQL Password:');
define('LANINS_027', 'MySQL Database:');
define('LANINS_028', 'أضف قاعدة البيانات');
define('LANINS_029', 'البريفيكس:');
define('LANINS_030', 'خادم فاعدة البيانات MySQL .يمكن استخدام الايبي مع منفذ الاتصال مثل : \'hostname:port\' أو إدخال رابط كامل للمضيف ، مثل : \':/path/to/socket\' .');
define('LANINS_031', 'اسم مستخدم قاعدة البيانات');
define('LANINS_032', 'كلمة مرور مستخدم قاعدة البيانات');
define('LANINS_033', 'اسم قاعدة البيانات التي سيتم تركيب المجلة عليها ، يمكنك انشائها اذا كنت تملك الصلاحيات الكافية لذلك ، او ادخل معلومات قاعدة موجودة مسبقا.');
define('LANINS_034', 'البريفيكس الذي سيستخدم لجداول القاعدة ، صالح لعدة تثبيثات من سكريبتات مختلفة على قاعدة واحدة.');
define('LANINS_035', 'متابعة');
define('LANINS_036', '3');
define('LANINS_037', 'تم الاتصال بخادم قاعدة البيانات بنجاح');
define('LANINS_038', ' و تم إضافة القاعدة بنجاح.');
define('LANINS_038a', 'Database Validation');
define('LANINS_039', 'تأكد منأنك قمت بإدخال جميع المعلومات, خاصة معلوماتخادم قواعد البيانات .MySQL Server ,MySQL Password , MySQL Usernameand MySQL Database (كل هذه المعلومات لا غنى عنها في خادم قواعد البيانات )');
define('LANINS_040', 'أخطاء');
define('LANINS_041', 'المجلةغير قادرة على ربط الاتصال بخادمقاعدة البيانات انطلاقا من المعلومات المدخلة.<br /> من فظلك  تأكد من ان المعلومات المجخلة صحيحة!');
define('LANINS_042', 'الاتصال بخادم MySQL تم بنجاح.');
define('LANINS_043', 'غير قادر على إنشاء قاعدةالبيانات, من فضلك تاكد من انك تملك الصلاحيات لإنشاء قاعدة البيانات على خادمك.');
define('LANINS_044', 'تم إنشاء قاعدة البيانات بنجاح.');
define('LANINS_045', 'من فضلك ، إضغط على الزر للانتقال للمرحلة القادمة.');
define('LANINS_046', '5');
define('LANINS_047', 'معلومات المدير العام');
define('LANINS_047a', 'الإدارة');
define('LANINS_048', 'انتقل للمرحلة الأخيرة');
define('LANINS_049', 'كلمة المرور غير متطابقة. من فضلك عد للصفحة السابقة و صحح الخطأ.');
define('LANINS_050', 'خاصية XML');
define('LANINS_051', 'مثبثة');
define('LANINS_052', 'غير مثبثة');
define('LANINS_053', 'المجلة تحتاج PHP مدمج بخاصية XML . عليك الاتصال بالمستضيف للترقية ، إقرأ المزيد عن هذه الخاصية على موقع <a href="http://php.net/manual/en/ref.xml.php" target="_blank">php.net</a> قبل الاستمرار');
define('LANINS_054', ' قبل الاستمرار');
define('LANINS_055', 'تأكيد التثبيث');
define('LANINS_055a', 'تأكيد');
define('LANINS_056', '6');
define('LANINS_057', ' المجلة تملك كل المعلومات لاكمال عملية التثبيث.<br /><br />من فضلك اضغط على الزر لاكمال عملية التثبيث و إنشاء المجلة.');
define('LANINS_058', '7');
define('LANINS_060', 'غير قادر على قراءة ملف نواة القاعدة<br /><br /><br /> تأكد من وجود ملف <b>core_sql.php<b> في المجلد <b>/admin/sql<b> الخاص بالمجلة.');
define('LANINS_061', 'المجلة غير قادرة على إنشاء الجداول في قاعدة البيانات .<br /><br /> من فضلك قم بحذف كل الجداول الموجودة بالقاعدة و تخلص من كل المشاكل في القاعدة قبل المحاولة من جديد .');
define('LANINS_062', '');
define('LANINS_063', 'مرحبا بك في المجلة المعربة');
define('LANINS_069', 'تم تثبيث المجلة بنجاح !<br />لدواعي امنية عليك إرجاع صلاحيات الملف <b>e107_config.php</b> للترخيص 644. <br />أيضا قم بحذف ملف install.php بعد الضغط على الزر اسفله  .');
define('LANINS_070', 'المجلة غير قادرة على حفظ ملف الاعدادات على خادمك .<br />من فضلك تأكدمن ان الملف <b>e107_config.php</b> يملك الصلاحيات الكافية.');
define('LANINS_071', 'إنهاء التثبيث');
define('LANINS_071a', 'تم');
define('LANINS_071b', 'خطأ أثناء انهاء التثبيت');
define('LANINS_071c', 'تم  مع أخطاء');
define('LANINS_072', 'اسم دخول المشرف العام');
define('LANINS_073', 'هذا هو الاسم الذي ستستخدمه للدخول للموقع . كما يمكنك استخدامه كاسم ظاهر للمستخدم');
define('LANINS_074', 'اسم الظهور للمشرف العام');
define('LANINS_075', 'هذا هو الاسم الذي سيظهر في ملفك الشخصي ، المنتدى ، و جميع المناطق الأخرى. إذ كنت ترغب في أن يكون نفس اسم المستخدم اتركه فارغا');
define('LANINS_076', 'كلمة مرور المشرف العام');
define('LANINS_077', 'كلمة مرور المدير العام للموقع');
define('LANINS_078', 'تأكيد كلمة المرور');
define('LANINS_079', 'أعد إدخال كلمة مرور المدير العام');
define('LANINS_080', 'بريد المشرف العام');
define('LANINS_081', 'أدخل بريد المدير العام الخاص بك');
define('LANINS_082', 'admin@yoursite.com');
define('LANINS_083', 'حدث خطأ في MySQL:');
define('LANINS_084', 'مدير التثبيث غير قادر على التصال بقاعدة البيانات');
define('LANINS_085', 'مدير التثبيث غير قادر على اختيار قاعدة البيانات:');
define('LANINS_086', 'اسم دخول المدير العام ، كلمة مرور المدير العام ، بريد المدير العام هي <b>حقول ضرورية</b>!  من فضلك  تأكد من إدخالهم .');
define('LANINS_087', 'منوعات');
define('LANINS_088', 'الرئيسية');
define('LANINS_089', 'التحميلات');
define('LANINS_090', 'الأعضاء');
define('LANINS_091', 'أضف خبر');
define('LANINS_092', 'اتصل بنا');
define('LANINS_093', 'Grants access to private menu items');
define('LANINS_094', 'مثال لمجموعة منتدى خاص');
define('LANINS_095', 'Integrity Check');
define('LANINS_096', 'آخر التعليقات');
define('LANINS_097', '[المزيد ...]');
define('LANINS_098', 'الأخبار');
define('LANINS_099', 'نظام المجلة');
define('LANINS_100', 'آخر مشاركات المنتدى');
define('LANINS_101', 'تحديث إعدادات القائمة');
define('LANINS_102', 'الوقت / التاريخ');
define('LANINS_103', 'البلوجينات');
define('LANINS_104', 'تم الفحص');
define('LANINS_105', 'A database name or prefix beginning with some digits followed by \'e\' or \'E\' is not acceptable. <br />A database name or prefix can not be empty.');
define('LANINS_106', 'WARNING - e107 cannot write to the directories and/or files listed. While this will not stop e107 installing, it will mean that certain features are not available.<br /><br />You will need to change the file permissions to use these features');
define('LANINS_107', 'الملف e107_config.php ليس فارغ');
define('LANINS_108', 'يمكن ان يكون لديك سكريبت مثبت سابقا');
define('LANINS_DB_UTF8_LABEL', 'استخدام ترميز UTF-8 في قاعدة البيانات ؟');
define('LANINS_DB_UTF8_CAPTION', 'ترميز MySQL :');
define('LANINS_DB_UTF8_TOOLTIP', 'If set, the installation script will make the database UTF-8 compatible if possible. UTF-8 Database are required for the next major e107 version.');
define('LANINS_109', 'Inititated');
define('LANINS_110', 'انتهاء');
define('LANINS_111', 'الستايلات');
define('LANINS_112', 'المكتبة');
define('LANINS_113', '');
define('LANINS_121', 'e107_config.php يوجد حاليا !');
define('LANINS_122', 'يمكن ان يكون لديك مجلة مثبتة سابقا');
define('LANINS_123', 'Debug info');
define('LANINS_124', 'Backtrace');
define('LANINS_125', 'مرلحة غير صحيحة');
define('LANINS_125a', 'خطأ');
define('LANINS_WELCOME', '[b]مرحبا في موقعك الجديد![/b] .

تم  تركيب المجلة بنجاح و هي الان قابلة للاستخدام . لوحة التحكم [link=admin/admin.php]موجودة هنا[/link], اظغط للدخول . ستحتاج لاسم المستخدم و كلمة المرور التي ادخلتها اثناء التثبيت . 

[b]الدعم[/b] 
[link=http://e107.org/]صفحة المجلة عالميا[/link] 
[link=http://e107.org/support]المنتديات[/link] 
[link=http://wiki.e107.org/]موسوعة التعليمات[/link]

 شكرا لاستخدامك المجلة, نتمنى ان تلائم احتياجاتك .');
define('LANINS_NEWS', '[b]مرحبا![/b]
 السكريبت عبارة عن مجلة إدارة المحتوى ، مبرمجة للعمل عللى مختلف المواقع ، حيث يمكن تعديلها و تغييرها كليا باي شكل تريد  
 [list][link=http://e107.org/content/Learn-all-about-e107]كل ما تحتاجه لتعرفه عن المجلة[/link]*[link=http://e107.org/content/About-Us:The-Team]المطورين| Support Team[/link]*[link=http://wiki.e107.org/]الدروس و التعليمات[/link][/list]');


?>