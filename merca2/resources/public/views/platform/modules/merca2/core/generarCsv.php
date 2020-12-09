<?php

function generarCSV($objData, $table)
{
    $delimiter = ";";
    $encapsulador = '"';

    $filename = ($table == 'user') ? "Users_" . date('d-m-Y') . ".csv" : "Sections_" . date('d-m-Y') . ".csv";

    if (!empty($objData)) {

        switch ($table) {
            case 'user':
                csvUser($objData, $filename, $delimiter, $encapsulador);
                break;
            case 'sections':
                csvSections($objData, $filename, $delimiter, $encapsulador);
                break;
        }
    }

}

// GENERAR CSV DE COLLECCION USUARIOS
function csvUser($objData, $filename, $delimiter, $encapsulador)
{

    $ruta = "php://memory";
    $f = fopen($ruta, 'w');

    $fields = array('ID', 'active', 'codeRef', 'createTime', 'email', 'isAnonymous',
        'lastName', 'member', 'name', 'online', 'phone', 'type', 'uid', 'updateTime', 'username', 'referral');

    fputcsv($f, $fields, $delimiter, $encapsulador);

    foreach ($objData as $data) {

        $id = (isset($data['ID']) && !empty($data['ID'])) ? utf8_decode($data['ID']) : 'NULL';
        $active = (isset($data['active']) && !empty($data['active'])) ? 'true' : 'false';
        $codeRef = (isset($data['codeRef']) && !empty($data['codeRef'])) ? utf8_decode($data['codeRef']) : 'NULL';
        $createTime = (isset($data['createTime']) && !empty($data['createTime'])) ? utf8_decode($data['createTime']) : 'NULL';
        $email = (isset($data['email']) && !empty($data['email'])) ? utf8_decode($data['email']) : 'NULL';
        $isAnonymous = (isset($data['isAnonymous']) && !empty($data['isAnonymous'])) ? utf8_decode($data['isAnonymous']) : 'NULL';
        $lastName = (isset($data['lastName']) && !empty($data['lastName'])) ? utf8_decode($data['lastName']) : 'NULL';
        $member = (isset($data['member']) && !empty($data['member'])) ? utf8_decode($data['member']) : 'NULL';
        $name = (isset($data['name']) && !empty($data['name'])) ? utf8_decode($data['name']) : 'NULL';
        $online = (isset($data['online']) && !empty($data['online'])) ? utf8_decode($data['online']) : 'NULL';
        $phone = (isset($data['phone']) && !empty($data['phone'])) ? utf8_decode($data['phone']) : 'NULL';
        $type = (isset($data['type']) && !empty($data['type'])) ? utf8_decode($data['type']) : 'NULL';
        $uid = (isset($data['uid']) && !empty($data['uid'])) ? utf8_decode($data['uid']) : 'NULL';
        $updateTime = (isset($data['updateTime']) && !empty($data['updateTime'])) ? utf8_decode($data['updateTime']) : 'NULL';
        $username = (isset($data['username']) && !empty($data['username'])) ? utf8_decode($data['username']) : 'NULL';

        $lineData = array(
            $id,
            $active,
            $codeRef,
            $createTime,
            $email,
            $isAnonymous,
            $lastName,
            $member,
            $name,
            $online,
            $phone,
            $type,
            $uid,
            $updateTime,
            $username,
        );

        if (isset($data['referrals']) && !empty($data['referrals'])) {
            $countReferal = count($data['referrals']);
            for ($i = 0; $i < $countReferal; $i++) {
                array_push($lineData, $data['referrals'][$i]);
            }
        }
        fputcsv($f, $lineData, $delimiter, $encapsulador);
    }

    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}

//GENERAR CSV DE COLLECCION SECTIONS

function csvSections($objData, $filename, $delimiter, $encapsulador)
{
    $ruta = "php://memory";
    $f = fopen($ruta, 'w');

    //ENCABEZADO DE CADA COLUMNA
    $fields = array('createTime', 'img', 'name', 'updateTime');
    $conSection = 0;
    foreach ($objData as $dataSection) {
        if (isset($dataSection['subSections']) && !empty($dataSection['subSections'])) {
            $temporal = count($dataSection['subSections']);
            // COMPRUEBO LA CANTIDAD MAXIMA DE SECTIONES
            if ($temporal > $conSection) {
                $conSection = $temporal;
            }
        }
    }

    // AÑADO LAS SECCIONES AL ENCABEZADO TENIENDO EN CUENTA LA CANTIDAD
    if ($conSection > 0) {
        for ($i = 0; $i < $conSection; $i++) {
            array_push($fields, 'subSections ' . $i);
        }
    }

    fputcsv($f, $fields, $delimiter, $encapsulador);

    //PROCEDO A RECORRER Y INGRESAR LOS VALORES DENTRO CADA COLUMNA TENIENDO EN CUENTA SU ORDEN
    foreach ($objData as $data) {
        $imagen = (isset($data['img']) && !empty($data['img'])) ? $data['img'] : 'NULL';
        $updateTime = (isset($data['updateTime']) && !empty($data['updateTime'])) ? utf8_decode($data['updateTime']) : 'NULL';
        $createTime = (isset($data['createTime']) && !empty($data['createTime'])) ? utf8_decode($data['createTime']) : 'NULL';
        $name = (isset($data['name']) && !empty($data['name'])) ? utf8_decode($data['name']) : 'NULL';

        $lineData = array(
            $createTime,
            $imagen,
            $name,
            $updateTime,
        );

        if (isset($data['subSections']) && !empty($data['subSections'])) {
            $countSection = count($data['subSections']);

            if ($conSection >= $countSection) {
                for ($j = 0; $j < $conSection; $j++) {
                    if (isset($data['subSections'][$j]) && !empty($data['subSections'][$j])) {
                        array_push($lineData, utf8_decode($data['subSections'][$j]));
                    } else {
                        array_push($lineData, 'NULL');
                    }
                }
            }

        }
        // AÑADO LA FILA AL ARCHIVO QUE SE VA A GENERAR
        fputcsv($f, $lineData, $delimiter, $encapsulador);
    }

    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}
