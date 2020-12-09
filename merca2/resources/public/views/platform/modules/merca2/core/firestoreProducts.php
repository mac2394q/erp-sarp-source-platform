<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/merca2/conf.php');
require_once(CONTROLLERS_PATH.'productController.php');
require_once(DATABASE_PATH.'ConnectionFirebase.php');
require_once(VENDOR_PATH.'autoload.php');         

    //COMUNICACION CON FIREBASE Y INSERCION DE PRODUCTO
    function addProducts($products, $idDocument = ""){
        $dbConnect = initialize();

        // EVALUA SI EL DOCUMENTO ESTA VACIO O NO, EN CASO DE QUE NO SE CREA UN DOCUMENTO NUEVO
        $docRef = (!empty($idDocument)) ? $dbConnect->collection('test')->document($idDocument) : 
        $dbConnect->collection('test')->newDocument();

        $docRef->set([
            'active' => $products['active'],
            'createTime' => $products['createTime'],
            'description' => $products['description'],
            'img' => $products['img'],
            'iva' => $products['iva'],
            'name' => $products['name'],
            'price' => $products['price'],
            'section' => [
                'id' => $products['section']['id'],
                'subSection' => $products['section']['subSection']
            ],
            'updateTime' => $products['updateTime'],
            'weight' => $products['weight']
        ]);
    }

    //LEER TODOS LOS DOCUMENTOS DE FIREBASE DE UNA COLLECTION Y LOS RETORNA
    function readData($collection){
        $dbConnect = initialize();

        $productsRef = $dbConnect->collection($collection);
        $snapshot = $productsRef->documents();
        
        return $snapshot;
    } 

    
?> 