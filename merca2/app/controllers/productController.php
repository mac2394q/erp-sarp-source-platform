<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/merca2/conf.php');
require_once(PDO_PATH.'productDao.php');

    class productController
    {
        public static function listProductMerca2()
        {
            return productDao::listProductMerca2();
        }
    }

        