<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/merca2/conf.php');
    require_once(DATABASE_PATH.'DataSource.php');
    require_once(CONTROLLERS_PATH.'productController.php');

    class productDao{

        
        public static function listProductMerca2(){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT llx_product.rowid as 'ID - ERP',NULL as 'ID - Firebase' ,'true' as 'active'
            ,UNIX_TIMESTAMP(now()) as 'createTime' , llx_product.description as 'description', TRUNCATE(llx_product_price.tva_tx,0) as 'iva' 
            ,NULL as 'img' ,llx_product.label as 'name' ,TRUNCATE(llx_product.price,0) as 'price' ,NULL as 'section' ,
            UNIX_TIMESTAMP(now()) as 'updateTime' ,llx_product.weight as 'weight' FROM `llx_product` 
            join llx_product_price on(llx_product.rowid=llx_product_price.fk_product) ORDER BY `ID - ERP` ASC");
            
            if(count($data_table)>0){
                $arrayModel = array();
                foreach($data_table as $clave => $value){
                    $arrayObj = array(
                        "id_erp" => $data_table[$clave]['ID - ERP'],
                        "id_firebase" => $data_table[$clave]['ID - Firebase'],
                        "active" => $data_table[$clave]['active'],
                        "createTime" => $data_table[$clave]['createTime'],
                        "description" => $data_table[$clave]['description'],
                        "iva" => $data_table[$clave]['iva'],
                        "img" => $data_table[$clave]['img'],
                        "name" => $data_table[$clave]['name'],
                        "price" => $data_table[$clave]['price'],
                        "section" => $data_table[$clave]['section'],
                        "updateTime" => $data_table[$clave]['updateTime'],
                        "weight" => $data_table[$clave]['weight']
                    );
                    array_push($arrayModel,$arrayObj);
                }
                return $arrayModel;
            }else{
                return false;
            }
        }

        
    }

?>