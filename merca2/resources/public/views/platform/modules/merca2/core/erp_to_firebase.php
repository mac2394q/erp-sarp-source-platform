<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/merca2/conf.php');
    require_once(CONTROLLERS_PATH.'productController.php');
    require_once(DATABASE_PATH.'ConnectionFirebase.php');
    require_once(VENDOR_PATH.'autoload.php');     
    require_once(PLATFORM_PATH.'modules/merca2/core/firebase_data.php');


    $objProducts = productController::listProductMerca2();
    
    // MIGRA INFORMACION DEL ERP A FIREBASE POR MEDIO DE UN ARRAY ASSOC
    function erp_to_firebase($arrayObjectErp){
       
            foreach($arrayObjectErp as $arrayObject){    
                           
                $arrayFirebase = readData("Products", $arrayObject['name']);

                
                if($arrayFirebase != NULL){
                    addProducts($arrayObject, $arrayFirebase['data'], $arrayFirebase['id']);
                }else{
                    addProducts($arrayObject);
                }

            }
    }

    erp_to_firebase($objProducts);
?>