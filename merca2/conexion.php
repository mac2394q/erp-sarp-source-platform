<?php      

require __DIR__.'/vendor/autoload.php';         
use Google\Cloud\Firestore\FirestoreClient; 
use Google\Cloud\Samples\Firestore;  
use Google\Cloud\Storage\StorageClient;



    // function auth_cloud_explicit($projectId, $serviceAccountPath)
    // {
    //     //
    //     # Explicitly use service account credentials by specifying the private key
    //     # file.
    //     $config = [
    //         "projectId"=> $projectId,
    //         "keyFilePath" => "C:\\xampp\htdocs\merca2\sarpcolombia-eca9aee52679.json"
    //     ];
    //     $storage = new StorageClient($config);

    //     # Make an authenticated API request (listing storage buckets)
    //     foreach ($storage->buckets() as $bucket) {
    //         printf('Bucket=> %s' . PHP_EOL, $bucket->name());
    //     }
    // }
    
    

    //auth_cloud_explicit("sarpcolombia-3c64c","",);


    function initialize($projectId)
    {
        // Create the Cloud Firestore client
        $db = new FirestoreClient([
            "projectId"=> $projectId,
            "keyFilePath" => "portalx.net/erp_sarp/merca2/sarpcolombia-eca9aee52679.json"
        ]);
        printf('Created Cloud Firestore client with default project ID.' . PHP_EOL);
    }

    
    //
    //     $docRef = $db->collection("Products")->document('4000');
    //     $docRef->set([
    //         'active' => 'true',
    //         'createTime' => "1580875357372",
    //         'description' => 'prueba_producto2',
    //         'img' => "https://firebasestorage.googleapis.com/v0/b/sarpcolombia-3c64c.appspot.com/o/image%2FProducts%2F03HFzO9Og7aNy78VUPpH.jpeg?alt=media&token=5e97e2b2-4510-4484-a79f-2ac1568fe11b",
    //         'iva' => "0",
    //         'name' => 'prueba_producto2',
    //         'price' => '2000',
    //         'section' => [
    //             'id' => "Gck5gidbTSN484DobgmK",
    //             'subSection' => 4
    //         ],
    //         'updateTime' => "15808756535263",
    //         'weight' => "90gr"
    //     ]);

        
    //     printf('Added data to the lovelace document in the users collection.' . PHP_EOL);
    // }

    initialize("sarpcolombia-3c64c");
    //set GOOGLE_APPLICATION_CREDENTIALS="C:\laragon\www\test\sarpcolombia-02a892590549.json"

   