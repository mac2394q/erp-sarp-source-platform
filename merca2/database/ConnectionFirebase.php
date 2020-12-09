<?php      
require_once($_SERVER['DOCUMENT_ROOT'].'/erp_sarp/merca2/conf.php');
require_once(VENDOR_PATH.'autoload.php');         
use Google\Cloud\Firestore\FirestoreClient; 
use Google\Cloud\Samples\Firestore;  

    function initialize()     {             
        $db = new FirestoreClient([
            'projectId' => PROJECT_ID,
            'keyFilePath' => KEY_FILE_PATH
        ]); 

        return $db;
    }       
  
    
?>

   