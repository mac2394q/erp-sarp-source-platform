<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/merca2/conf.php');
    require_once(CONTROLLERS_PATH.'productController.php');
    require_once("generarCsv.php");
    $objProducts = productController::listProductMerca2();

    if($objProducts){
        generarCSV($objProducts);
    }
    exit();