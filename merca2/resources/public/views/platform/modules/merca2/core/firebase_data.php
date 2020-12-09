<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/merca2/conf.php';
require_once CONTROLLERS_PATH . 'productController.php';
require_once DATABASE_PATH . 'ConnectionFirebase.php';
require_once VENDOR_PATH . 'autoload.php';

//COMUNICACION CON FIREBASE Y INSERCION DE PRODUCTO
function addProducts($products, $data = "", $idDocument = "")
{
    $dbConnect = initialize();

    $createTime = (!empty($data)) ? $data['createTime'] : $products['createTime'];
    $img = (!empty($data)) ? $data['img'] : "https://www.transloyola.com/fotos/Image/contenidos/default.jpg";
    $idSection = (!empty($data)) ? $data['section']['id'] : "zzVaOD9L6hi6ntX5e9Az";
    $subSection = (!empty($data)) ? $data['section']['subSection'] : 0;
    $updateTime = (!empty($data)) ? $data['updateTime'] : $products['updateTime'];

    // EVALUA SI EL DOCUMENTO ESTA VACIO O NO, EN CASO DE QUE NO SE CREA UN DOCUMENTO NUEVO
    if (!empty($idDocument)) {

        $dbConnect->collection('Products')->document($idDocument)->delete();
        $docRef = $dbConnect->collection('Products')->document($products['id_erp']);
    } else {
        $docRef = $dbConnect->collection('Products')->document($products['id_erp']);
    }

    // REALIZA LA INSERCION EN FIREBASE
    $docRef->set([
        'active' => $products['active'],
        'createTime' => $createTime,
        'description' => utf8_encode($products['description']),
        'img' => $img,
        'iva' => $products['iva'],
        'name' => utf8_encode($products['name']),
        'price' => $products['price'],
        'section' => [
            'id' => $idSection,
            'subSection' => $subSection,
        ],
        'updateTime' => $updateTime,
        'weight' => $products['weight'],
    ]);
}

//LEER DATOS DE UN DOCUMENTO
function readData($collection, $name)
{

    $dbConnect = initialize();

    $dataRef = $dbConnect->collection($collection);
    $query = $dataRef->where('name', '=', $name);
    $snapshot = $query->documents();

    foreach ($snapshot as $document) {
        if ($document->exists()) {
            $array = [
                "id" => $document->id(),
                "data" => $document->data(),
            ];
            return $array;
        }
    }
}
//LEER DATA TEST
function readData2($collection)
{

    $dbConnect = initialize();
    $dataRef = $dbConnect->collection($collection)->documents();

    return $dataRef;
}

// AGREGAR DATOS TEST
function addProductsTest($products)
{
    $dbConnect = initialize();

    $docRef = $dbConnect->collection('test')->newDocument();
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
            'subSection' => $products['section']['subSection'],
        ],
        'updateTime' => $products['updateTime'],
        'weight' => $products['weight'],
    ]);

}
