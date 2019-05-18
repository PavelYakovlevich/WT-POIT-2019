<<<<<<< HEAD
<?php

include 'MainProc.php';

$currTime = date('H:i:s');

$templateHandler = new TemplateHandler();

$templateHandler->setValue('{TIME}', $currTime);
$templateHandler->setValue('{COMPANY_NAME}', "ООО 'Helthcare'");
$templateHandler->setValue('{PAGE_TITLE}', 'Helthcare');

$templateHandler->ReplaceValues('contacts.tpl');
echo $templateHandler->pageContent;
=======
<?php

include 'MainProc.php';

$currTime = date('H:i:s');

$templateHandler = new TemplateHandler();

$templateHandler->setValue('{TIME}', $currTime);
$templateHandler->setValue('{COMPANY_NAME}', "ООО 'Helthcare'");
$templateHandler->setValue('{PAGE_TITLE}', 'Helthcare');

$templateHandler->ReplaceValues('contacts.tpl');
echo $templateHandler->pageContent;
>>>>>>> 362a365b32ce5c3226849f6a12acde5a3a935133
