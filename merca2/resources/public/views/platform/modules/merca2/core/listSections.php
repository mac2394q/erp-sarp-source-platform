<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/merca2/conf.php';
require_once CONTROLLERS_PATH . 'productController.php';
require_once "generarCsv.php";
require_once VENDOR_PATH . 'autoload.php';
require_once PLATFORM_PATH . 'modules/merca2/core/firebase_data.php';

$objUser = readData2('Sections');

if (isset($objUser) && !empty($objUser)) {
    generarCSV($objUser, "sections");
}
exit;

