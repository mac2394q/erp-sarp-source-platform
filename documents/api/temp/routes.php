<?php $o = array();

// ** THIS IS AN AUTO GENERATED FILE. DO NOT EDIT MANUALLY ** 

//==================== v1 ====================

$o['v1'] = array();

//==== v1 * ====

$o['v1']['*'] = array (
    'explorer' => 
    array (
        'GET' => 
        array (
            'url' => 'explorer/*',
            'className' => 'Luracast\\Restler\\Explorer',
            'path' => 'explorer',
            'methodName' => 'get',
            'arguments' => 
            array (
            ),
            'defaults' => 
            array (
            ),
            'metadata' => 
            array (
                'description' => 'Serve static files for exploring',
                'longDescription' => 'Serves explorer html, css, and js files',
                'url' => 'GET *',
                'package' => 'Luracast\\Restler',
                'access' => 'hybrid',
                'version' => '3.0.0rc6',
                'scope' => 
                array (
                    '*' => 'Luracast\\Restler\\',
                    'stdClass' => 'stdClass',
                    'Text' => 'Luracast\\Restler\\Data\\Text',
                    'ValidationInfo' => 'Luracast\\Restler\\Data\\ValidationInfo',
                    'Scope' => 'Luracast\\Restler\\Scope',
                ),
                'resourcePath' => 'explorer',
                'classDescription' => 'Class Explorer',
                'param' => 
                array (
                ),
                'return' => 
                array (
                    'type' => 'array',
                ),
            ),
            'accessLevel' => 1,
        ),
    ),
);

//==== v1 explorer/swagger ====

$o['v1']['explorer/swagger'] = array (
    'GET' => 
    array (
        'url' => 'explorer/swagger',
        'className' => 'Luracast\\Restler\\Explorer',
        'path' => 'explorer',
        'methodName' => 'swagger',
        'arguments' => 
        array (
        ),
        'defaults' => 
        array (
        ),
        'metadata' => 
        array (
            'description' => '',
            'longDescription' => '',
            'return' => 
            array (
                'type' => 'stdClass',
                'description' => '',
                'children' => 
                array (
                ),
            ),
            'package' => 'Luracast\\Restler',
            'access' => 'hybrid',
            'version' => '3.0.0rc6',
            'scope' => 
            array (
                '*' => 'Luracast\\Restler\\',
                'stdClass' => 'stdClass',
                'Text' => 'Luracast\\Restler\\Data\\Text',
                'ValidationInfo' => 'Luracast\\Restler\\Data\\ValidationInfo',
                'Scope' => 'Luracast\\Restler\\Scope',
            ),
            'resourcePath' => 'explorer',
            'classDescription' => 'Class Explorer',
            'param' => 
            array (
            ),
        ),
        'accessLevel' => 1,
    ),
);

//==== v1 products/{n0} ====

$o['v1']['products/{n0}'] = array (
    'GET' => 
    array (
        'url' => 'products/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'get',
        'arguments' => 
        array (
            'id' => 0,
            'includestockdata' => 1,
            'includesubproducts' => 2,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => 0,
            2 => false,
        ),
        'metadata' => 
        array (
            'description' => 'Get properties of a product object by id',
            'longDescription' => 'Return an array with product information.',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'int',
                    'name' => 'includestockdata',
                    'description' => 'Load also information about stock (slower)',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Includestockdata',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'bool',
                    'name' => 'includesubproducts',
                    'description' => 'Load information about subproducts',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Includesubproducts',
                    'default' => false,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 
                array (
                    0 => 'array',
                    1 => 'mixed',
                ),
                'description' => 'Data without useless information',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '403',
                    'message' => 'Forbidden',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'PUT' => 
    array (
        'url' => 'products/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'put',
        'arguments' => 
        array (
            'id' => 0,
            'request_data' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Update product.',
            'longDescription' => 'Price will be updated by this API only if option is set on "One price per product". See other APIs for other price modes.',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'Id of product to update',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'array',
                    'name' => 'request_data',
                    'description' => 'Datas',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Request Data',
                    'default' => NULL,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'DELETE' => 
    array (
        'url' => 'products/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'delete',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Delete product',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'Product ID',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/ref/{s0} ====

$o['v1']['products/ref/{s0}'] = array (
    'GET' => 
    array (
        'url' => 'products/ref/{ref}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getByRef',
        'arguments' => 
        array (
            'ref' => 0,
            'includestockdata' => 1,
            'includesubproducts' => 2,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => 0,
            2 => false,
        ),
        'metadata' => 
        array (
            'description' => 'Get properties of a product object by ref',
            'longDescription' => 'Return an array with product information.',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Ref of element',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Ref',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'int',
                    'name' => 'includestockdata',
                    'description' => 'Load also information about stock (slower)',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Includestockdata',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'bool',
                    'name' => 'includesubproducts',
                    'description' => 'Load information about subproducts',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Includesubproducts',
                    'default' => false,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 
                array (
                    0 => 'array',
                    1 => 'mixed',
                ),
                'description' => 'Data without useless information',
            ),
            'url' => 'GET ref/{ref}',
            'throws' => 
            array (
                0 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '403',
                    'message' => 'Forbidden',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/ref_ext/{s0} ====

$o['v1']['products/ref_ext/{s0}'] = array (
    'GET' => 
    array (
        'url' => 'products/ref_ext/{ref_ext}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getByRefExt',
        'arguments' => 
        array (
            'ref_ext' => 0,
            'includestockdata' => 1,
            'includesubproducts' => 2,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => 0,
            2 => false,
        ),
        'metadata' => 
        array (
            'description' => 'Get properties of a product object by ref_ext',
            'longDescription' => 'Return an array with product information.',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'ref_ext',
                    'description' => 'Ref_ext of element',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Ref Ext',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'int',
                    'name' => 'includestockdata',
                    'description' => 'Load also information about stock (slower)',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Includestockdata',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'bool',
                    'name' => 'includesubproducts',
                    'description' => 'Load information about subproducts',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Includesubproducts',
                    'default' => false,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 
                array (
                    0 => 'array',
                    1 => 'mixed',
                ),
                'description' => 'Data without useless information',
            ),
            'url' => 'GET ref_ext/{ref_ext}',
            'throws' => 
            array (
                0 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '403',
                    'message' => 'Forbidden',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/barcode/{s0} ====

$o['v1']['products/barcode/{s0}'] = array (
    'GET' => 
    array (
        'url' => 'products/barcode/{barcode}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getByBarcode',
        'arguments' => 
        array (
            'barcode' => 0,
            'includestockdata' => 1,
            'includesubproducts' => 2,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => 0,
            2 => false,
        ),
        'metadata' => 
        array (
            'description' => 'Get properties of a product object by barcode',
            'longDescription' => 'Return an array with product information.',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'barcode',
                    'description' => 'Barcode of element',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Barcode',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'int',
                    'name' => 'includestockdata',
                    'description' => 'Load also information about stock (slower)',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Includestockdata',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'bool',
                    'name' => 'includesubproducts',
                    'description' => 'Load information about subproducts',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Includesubproducts',
                    'default' => false,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 
                array (
                    0 => 'array',
                    1 => 'mixed',
                ),
                'description' => 'Data without useless information',
            ),
            'url' => 'GET barcode/{barcode}',
            'throws' => 
            array (
                0 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '403',
                    'message' => 'Forbidden',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products ====

$o['v1']['products'] = array (
    'GET' => 
    array (
        'url' => 'products',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'index',
        'arguments' => 
        array (
            'sortfield' => 0,
            'sortorder' => 1,
            'limit' => 2,
            'page' => 3,
            'mode' => 4,
            'category' => 5,
            'sqlfilters' => 6,
        ),
        'defaults' => 
        array (
            0 => 't.ref',
            1 => 'ASC',
            2 => 100,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => '',
        ),
        'metadata' => 
        array (
            'description' => 'List products',
            'longDescription' => 'Get a list of products',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'sortfield',
                    'description' => 'Sort field',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sortfield',
                    'default' => 't.ref',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'sortorder',
                    'description' => 'Sort order',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sortorder',
                    'default' => 'ASC',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'int',
                    'name' => 'limit',
                    'description' => 'Limit for list',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Limit',
                    'default' => 100,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                3 => 
                array (
                    'type' => 'int',
                    'name' => 'page',
                    'description' => 'Page number',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Page',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                4 => 
                array (
                    'type' => 'int',
                    'name' => 'mode',
                    'description' => 'Use this param to filter list (0 for all, 1 for only product, 2 for only service)',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Mode',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                5 => 
                array (
                    'type' => 'int',
                    'name' => 'category',
                    'description' => 'Use this param to filter list by category',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Category',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                6 => 
                array (
                    'type' => 'string',
                    'name' => 'sqlfilters',
                    'description' => 'Other criteria to filter answers separated by a comma. Syntax example "(t.tobuy:=:0) and (t.tosell:=:1)"',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sqlfilters',
                    'default' => '',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => 'Array of product objects',
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'POST' => 
    array (
        'url' => 'products',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'post',
        'arguments' => 
        array (
            'request_data' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Create product object',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'array',
                    'name' => 'request_data',
                    'description' => 'Request data',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Request Data',
                    'default' => NULL,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => 'ID of product',
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/index ====

$o['v1']['products/index'] = array (
    'GET' => 
    array (
        'url' => 'products',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'index',
        'arguments' => 
        array (
            'sortfield' => 0,
            'sortorder' => 1,
            'limit' => 2,
            'page' => 3,
            'mode' => 4,
            'category' => 5,
            'sqlfilters' => 6,
        ),
        'defaults' => 
        array (
            0 => 't.ref',
            1 => 'ASC',
            2 => 100,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => '',
        ),
        'metadata' => 
        array (
            'description' => 'List products',
            'longDescription' => 'Get a list of products',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'sortfield',
                    'description' => 'Sort field',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sortfield',
                    'default' => 't.ref',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'sortorder',
                    'description' => 'Sort order',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sortorder',
                    'default' => 'ASC',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'int',
                    'name' => 'limit',
                    'description' => 'Limit for list',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Limit',
                    'default' => 100,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                3 => 
                array (
                    'type' => 'int',
                    'name' => 'page',
                    'description' => 'Page number',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Page',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                4 => 
                array (
                    'type' => 'int',
                    'name' => 'mode',
                    'description' => 'Use this param to filter list (0 for all, 1 for only product, 2 for only service)',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Mode',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                5 => 
                array (
                    'type' => 'int',
                    'name' => 'category',
                    'description' => 'Use this param to filter list by category',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Category',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                6 => 
                array (
                    'type' => 'string',
                    'name' => 'sqlfilters',
                    'description' => 'Other criteria to filter answers separated by a comma. Syntax example "(t.tobuy:=:0) and (t.tosell:=:1)"',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sqlfilters',
                    'default' => '',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => 'Array of product objects',
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/subproducts ====

$o['v1']['products/{n0}/subproducts'] = array (
    'GET' => 
    array (
        'url' => 'products/{id}/subproducts',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getSubproducts',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get the list of subproducts of the product.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'Id of parent product/service',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET {id}/subproducts',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/subproducts/add ====

$o['v1']['products/{n0}/subproducts/add'] = array (
    'POST' => 
    array (
        'url' => 'products/{id}/subproducts/add',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'addSubproducts',
        'arguments' => 
        array (
            'id' => 0,
            'subproduct_id' => 1,
            'qty' => 2,
            'incdec' => 3,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
            2 => NULL,
            3 => 1,
        ),
        'metadata' => 
        array (
            'description' => 'Add subproduct.',
            'longDescription' => ' Link a product/service to a parent product/service',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'Id of parent product/service',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'int',
                    'name' => 'subproduct_id',
                    'description' => 'Id of child product/service',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Subproduct Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'int',
                    'name' => 'qty',
                    'description' => 'Quantity',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Qty',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                3 => 
                array (
                    'type' => 'int',
                    'name' => 'incdec',
                    'description' => '1=Increase/decrease stock of child when parent stock increase/decrease',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Incdec',
                    'default' => 1,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'POST {id}/subproducts/add',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/subproducts/remove ====

$o['v1']['products/{n0}/subproducts/remove'] = array (
    'DELETE' => 
    array (
        'url' => 'products/{id}/subproducts/remove',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'delSubproducts',
        'arguments' => 
        array (
            'id' => 0,
            'subproduct_id' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Remove subproduct.',
            'longDescription' => ' Unlink a product/service from a parent product/service',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'Id of parent product/service',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'int',
                    'name' => 'subproduct_id',
                    'description' => 'Id of child product/service',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Subproduct Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'DELETE {id}/subproducts/remove',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/categories ====

$o['v1']['products/{n0}/categories'] = array (
    'GET' => 
    array (
        'url' => 'products/{id}/categories',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getCategories',
        'arguments' => 
        array (
            'id' => 0,
            'sortfield' => 1,
            'sortorder' => 2,
            'limit' => 3,
            'page' => 4,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => 's.rowid',
            2 => 'ASC',
            3 => 0,
            4 => 0,
        ),
        'metadata' => 
        array (
            'description' => 'Get categories for a product',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'sortfield',
                    'description' => 'Sort field',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sortfield',
                    'default' => 's.rowid',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'string',
                    'name' => 'sortorder',
                    'description' => 'Sort order',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sortorder',
                    'default' => 'ASC',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                3 => 
                array (
                    'type' => 'int',
                    'name' => 'limit',
                    'description' => 'Limit for list',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Limit',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                4 => 
                array (
                    'type' => 'int',
                    'name' => 'page',
                    'description' => 'Page number',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Page',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'mixed',
                'description' => '',
            ),
            'url' => 'GET {id}/categories',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/selling_multiprices/per_segment ====

$o['v1']['products/{n0}/selling_multiprices/per_segment'] = array (
    'GET' => 
    array (
        'url' => 'products/{id}/selling_multiprices/per_segment',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getCustomerPricesPerSegment',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get prices per segment for a product',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'mixed',
                'description' => '',
            ),
            'url' => 'GET {id}/selling_multiprices/per_segment',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/selling_multiprices/per_customer ====

$o['v1']['products/{n0}/selling_multiprices/per_customer'] = array (
    'GET' => 
    array (
        'url' => 'products/{id}/selling_multiprices/per_customer',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getCustomerPricesPerCustomer',
        'arguments' => 
        array (
            'id' => 0,
            'thirdparty_id' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => '',
        ),
        'metadata' => 
        array (
            'description' => 'Get prices per customer for a product',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'thirdparty_id',
                    'description' => 'Thirdparty id to filter orders of (example \'1\')',
                    'properties' => 
                    array (
                        'pattern' => '/^[0-9,]*$/i',
                        'from' => 'query',
                    ),
                    'label' => 'Thirdparty Id',
                    'default' => '',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'mixed',
                'description' => '',
            ),
            'url' => 'GET {id}/selling_multiprices/per_customer',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/selling_multiprices/per_quantity ====

$o['v1']['products/{n0}/selling_multiprices/per_quantity'] = array (
    'GET' => 
    array (
        'url' => 'products/{id}/selling_multiprices/per_quantity',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getCustomerPricesPerQuantity',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get prices per quantity for a product',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'mixed',
                'description' => '',
            ),
            'url' => 'GET {id}/selling_multiprices/per_quantity',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/purchase_prices/{n1} ====

$o['v1']['products/{n0}/purchase_prices/{n1}'] = array (
    'DELETE' => 
    array (
        'url' => 'products/{id}/purchase_prices/{priceid}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'deletePurchasePrice',
        'arguments' => 
        array (
            'id' => 0,
            'priceid' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Delete purchase price for a product',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'Product ID',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'int',
                    'name' => 'priceid',
                    'description' => 'purchase price ID',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Priceid',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'url' => 'DELETE {id}/purchase_prices/{priceid}',
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/purchase_prices ====

$o['v1']['products/purchase_prices'] = array (
    'GET' => 
    array (
        'url' => 'products/purchase_prices',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getSupplierProducts',
        'arguments' => 
        array (
            'sortfield' => 0,
            'sortorder' => 1,
            'limit' => 2,
            'page' => 3,
            'mode' => 4,
            'category' => 5,
            'supplier' => 6,
            'sqlfilters' => 7,
        ),
        'defaults' => 
        array (
            0 => 't.ref',
            1 => 'ASC',
            2 => 100,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => '',
        ),
        'metadata' => 
        array (
            'description' => 'List purchase prices',
            'longDescription' => 'Get a list of all purchase prices of products',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'sortfield',
                    'description' => 'Sort field',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sortfield',
                    'default' => 't.ref',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'sortorder',
                    'description' => 'Sort order',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sortorder',
                    'default' => 'ASC',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'int',
                    'name' => 'limit',
                    'description' => 'Limit for list',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Limit',
                    'default' => 100,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                3 => 
                array (
                    'type' => 'int',
                    'name' => 'page',
                    'description' => 'Page number',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Page',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                4 => 
                array (
                    'type' => 'int',
                    'name' => 'mode',
                    'description' => 'Use this param to filter list (0 for all, 1 for only product, 2 for only service)',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Mode',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                5 => 
                array (
                    'type' => 'int',
                    'name' => 'category',
                    'description' => 'Use this param to filter list by category of product',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Category',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                6 => 
                array (
                    'type' => 'int',
                    'name' => 'supplier',
                    'description' => 'Use this param to filter list by supplier',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Supplier',
                    'default' => 0,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                7 => 
                array (
                    'type' => 'string',
                    'name' => 'sqlfilters',
                    'description' => 'Other criteria to filter answers separated by a comma. Syntax example "(t.tobuy:=:0) and (t.tosell:=:1)"',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Sqlfilters',
                    'default' => '',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => 'Array of product objects',
            ),
            'url' => 'GET purchase_prices',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/purchase_prices ====

$o['v1']['products/{n0}/purchase_prices'] = array (
    'GET' => 
    array (
        'url' => 'products/{id}/purchase_prices',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getPurchasePrices',
        'arguments' => 
        array (
            'id' => 0,
            'ref' => 1,
            'ref_ext' => 2,
            'barcode' => 3,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => '',
            2 => '',
            3 => '',
        ),
        'metadata' => 
        array (
            'description' => 'Get purchase prices for a product',
            'longDescription' => 'Return an array with product information. TODO implement getting a product by ref or by $ref_ext',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Ref of element',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Ref',
                    'default' => '',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'string',
                    'name' => 'ref_ext',
                    'description' => 'Ref ext of element',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Ref Ext',
                    'default' => '',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
                3 => 
                array (
                    'type' => 'string',
                    'name' => 'barcode',
                    'description' => 'Barcode of element',
                    'properties' => 
                    array (
                        'from' => 'query',
                    ),
                    'label' => 'Barcode',
                    'default' => '',
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 
                array (
                    0 => 'array',
                    1 => 'mixed',
                ),
                'description' => 'Data without useless information',
            ),
            'url' => 'GET {id}/purchase_prices',
            'throws' => 
            array (
                0 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '403',
                    'message' => 'Forbidden',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/attributes ====

$o['v1']['products/attributes'] = array (
    'GET' => 
    array (
        'url' => 'products/attributes',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getAttributes',
        'arguments' => 
        array (
        ),
        'defaults' => 
        array (
        ),
        'metadata' => 
        array (
            'description' => 'Get attributes.',
            'longDescription' => '',
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET attributes',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
            'param' => 
            array (
            ),
        ),
        'accessLevel' => 2,
    ),
    'POST' => 
    array (
        'url' => 'products/attributes',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'addAttributes',
        'arguments' => 
        array (
            'ref' => 0,
            'label' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Add attributes.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Reference of Attribute',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Ref',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'label',
                    'description' => 'Label of Attribute',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Label',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'POST attributes',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/attributes/{n0} ====

$o['v1']['products/attributes/{n0}'] = array (
    'GET' => 
    array (
        'url' => 'products/attributes/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getAttributeById',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get attribute by ID.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Attribute',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET attributes/{id}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'PUT' => 
    array (
        'url' => 'products/attributes/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'putAttributes',
        'arguments' => 
        array (
            'id' => 0,
            'request_data' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Update attributes by id.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Attribute',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'array',
                    'name' => 'request_data',
                    'description' => 'Datas',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Request Data',
                    'default' => NULL,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'PUT attributes/{id}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'DELETE' => 
    array (
        'url' => 'products/attributes/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'deleteAttributes',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Delete attributes by id.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Attribute',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => 'Result of deletion',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'DELETE attributes/{id}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/attributes/ref/{s0} ====

$o['v1']['products/attributes/ref/{s0}'] = array (
    'GET' => 
    array (
        'url' => 'products/attributes/ref/{ref}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getAttributesByRef',
        'arguments' => 
        array (
            'ref' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get attributes by ref.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Reference of Attribute',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Ref',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET attributes/ref/{ref}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/attributes/values/{n0} ====

$o['v1']['products/attributes/values/{n0}'] = array (
    'GET' => 
    array (
        'url' => 'products/attributes/values/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getAttributeValueById',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get attribute value by id.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Attribute value',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET attributes/values/{id}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'PUT' => 
    array (
        'url' => 'products/attributes/values/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'putAttributeValue',
        'arguments' => 
        array (
            'id' => 0,
            'request_data' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Update attribute value.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Attribute',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'array',
                    'name' => 'request_data',
                    'description' => 'Datas',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Request Data',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'PUT attributes/values/{id}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'DELETE' => 
    array (
        'url' => 'products/attributes/values/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'deleteAttributeValueById',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Delete attribute value by id.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Attribute value',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'DELETE attributes/values/{id}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/attributes/{n0}/values/ref/{s1} ====

$o['v1']['products/attributes/{n0}/values/ref/{s1}'] = array (
    'GET' => 
    array (
        'url' => 'products/attributes/{id}/values/ref/{ref}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getAttributeValueByRef',
        'arguments' => 
        array (
            'id' => 0,
            'ref' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get attribute value by ref.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Attribute value',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Ref of Attribute value',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Ref',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET attributes/{id}/values/ref/{ref}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'DELETE' => 
    array (
        'url' => 'products/attributes/{id}/values/ref/{ref}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'deleteAttributeValueByRef',
        'arguments' => 
        array (
            'id' => 0,
            'ref' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Delete attribute value by ref.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Attribute',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Ref of Attribute value',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Ref',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'DELETE attributes/{id}/values/ref/{ref}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/attributes/{n0}/values ====

$o['v1']['products/attributes/{n0}/values'] = array (
    'GET' => 
    array (
        'url' => 'products/attributes/{id}/values',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getAttributeValues',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get all values for an attribute id.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of an Attribute',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET attributes/{id}/values',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'POST' => 
    array (
        'url' => 'products/attributes/{id}/values',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'addAttributeValue',
        'arguments' => 
        array (
            'id' => 0,
            'ref' => 1,
            'value' => 2,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
            2 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Add attribute value.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Attribute',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Reference of Attribute value',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Ref',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'string',
                    'name' => 'value',
                    'description' => 'Value of Attribute value',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Value',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'POST attributes/{id}/values',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/attributes/ref/{s0}/values ====

$o['v1']['products/attributes/ref/{s0}/values'] = array (
    'GET' => 
    array (
        'url' => 'products/attributes/ref/{ref}/values',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getAttributeValuesByRef',
        'arguments' => 
        array (
            'ref' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get all values for an attribute ref.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Ref of an Attribute',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Ref',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET attributes/ref/{ref}/values',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/{n0}/variants ====

$o['v1']['products/{n0}/variants'] = array (
    'GET' => 
    array (
        'url' => 'products/{id}/variants',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getVariants',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get product variants.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET {id}/variants',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'POST' => 
    array (
        'url' => 'products/{id}/variants',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'addVariant',
        'arguments' => 
        array (
            'id' => 0,
            'weight_impact' => 1,
            'price_impact' => 2,
            'price_impact_is_percent' => 3,
            'features' => 4,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
            2 => NULL,
            3 => NULL,
            4 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Add variant.',
            'longDescription' => ' "features" is a list of attributes pairs id_attribute=>id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'float',
                    'name' => 'weight_impact',
                    'description' => 'Weight impact of variant',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Weight Impact',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'float',
                    'name' => 'price_impact',
                    'description' => 'Price impact of variant',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Price Impact',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                3 => 
                array (
                    'type' => 'bool',
                    'name' => 'price_impact_is_percent',
                    'description' => 'Price impact in percent (true or false)',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Price Impact Is Percent',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                4 => 
                array (
                    'type' => 'array',
                    'name' => 'features',
                    'description' => 'List of attributes pairs id_attribute->id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Features',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'POST {id}/variants',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/ref/{s0}/variants ====

$o['v1']['products/ref/{s0}/variants'] = array (
    'GET' => 
    array (
        'url' => 'products/ref/{ref}/variants',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'getVariantsByProdRef',
        'arguments' => 
        array (
            'ref' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Get product variants by Product ref.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Ref of Product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Ref',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'array',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'GET ref/{ref}/variants',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'POST' => 
    array (
        'url' => 'products/ref/{ref}/variants',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'addVariantByProductRef',
        'arguments' => 
        array (
            'ref' => 0,
            'weight_impact' => 1,
            'price_impact' => 2,
            'price_impact_is_percent' => 3,
            'features' => 4,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
            2 => NULL,
            3 => NULL,
            4 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Add variant by product ref.',
            'longDescription' => ' "features" is a list of attributes pairs id_attribute=>id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'string',
                    'name' => 'ref',
                    'description' => 'Ref of Product',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Ref',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'float',
                    'name' => 'weight_impact',
                    'description' => 'Weight impact of variant',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Weight Impact',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                2 => 
                array (
                    'type' => 'float',
                    'name' => 'price_impact',
                    'description' => 'Price impact of variant',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Price Impact',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                3 => 
                array (
                    'type' => 'bool',
                    'name' => 'price_impact_is_percent',
                    'description' => 'Price impact in percent (true or false)',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Price Impact Is Percent',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                4 => 
                array (
                    'type' => 'array',
                    'name' => 'features',
                    'description' => 'List of attributes pairs id_attribute->id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Features',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
                2 => 
                array (
                    'code' => '404',
                    'message' => 'Not Found',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'POST ref/{ref}/variants',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==== v1 products/variants/{n0} ====

$o['v1']['products/variants/{n0}'] = array (
    'PUT' => 
    array (
        'url' => 'products/variants/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'putVariant',
        'arguments' => 
        array (
            'id' => 0,
            'request_data' => 1,
        ),
        'defaults' => 
        array (
            0 => NULL,
            1 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Put product variants.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Variant',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
                1 => 
                array (
                    'type' => 'array',
                    'name' => 'request_data',
                    'description' => 'Datas',
                    'properties' => 
                    array (
                        'from' => 'body',
                    ),
                    'label' => 'Request Data',
                    'default' => NULL,
                    'required' => false,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => '',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'PUT variants/{id}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
    'DELETE' => 
    array (
        'url' => 'products/variants/{id}',
        'className' => 'Products',
        'path' => 'products',
        'methodName' => 'deleteVariant',
        'arguments' => 
        array (
            'id' => 0,
        ),
        'defaults' => 
        array (
            0 => NULL,
        ),
        'metadata' => 
        array (
            'description' => 'Delete product variants.',
            'longDescription' => '',
            'param' => 
            array (
                0 => 
                array (
                    'type' => 'int',
                    'name' => 'id',
                    'description' => 'ID of Variant',
                    'properties' => 
                    array (
                        'from' => 'path',
                    ),
                    'label' => 'Id',
                    'default' => NULL,
                    'required' => true,
                    'children' => 
                    array (
                    ),
                ),
            ),
            'return' => 
            array (
                'type' => 'int',
                'description' => 'Result of deletion',
            ),
            'throws' => 
            array (
                0 => 
                array (
                    'code' => 500,
                    'message' => 'RestException',
                    'exception' => 'Exception',
                ),
                1 => 
                array (
                    'code' => '401',
                    'message' => 'Unauthorized',
                    'exception' => 'Exception',
                ),
            ),
            'url' => 'DELETE variants/{id}',
            'access' => 'protected',
            'class' => 
            array (
                'DolibarrApiAccess' => 
                array (
                    'description' => '',
                    'properties' => 
                    array (
                        'requires' => 'user,external',
                    ),
                ),
            ),
            'scope' => 
            array (
                '*' => '',
                'RestException' => 'Luracast\\Restler\\RestException',
            ),
            'resourcePath' => 'products',
            'classDescription' => 'API class for products',
        ),
        'accessLevel' => 2,
    ),
);

//==================== apiVersionMap ====================

$o['apiVersionMap'] = array();

//==== apiVersionMap Luracast\Restler\Explorer ====

$o['apiVersionMap']['Luracast\Restler\Explorer'] = array (
    1 => 'Luracast\\Restler\\Explorer',
);

//==== apiVersionMap DolibarrApiAccess ====

$o['apiVersionMap']['DolibarrApiAccess'] = array (
    1 => 'DolibarrApiAccess',
);

//==== apiVersionMap Products ====

$o['apiVersionMap']['Products'] = array (
    1 => 'Products',
);
return $o;