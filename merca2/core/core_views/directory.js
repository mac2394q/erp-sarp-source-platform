//importante ROOT_PATH debe contener siempre al final el nombre del directorio principal donde
//esta almacenado el proyecto

//configuracion en ambiente local:
var app = "miscelanea";
var dominio = "http://localhost/miscelanea/";
//var dominio = "http://localhost/credito/";
var dominio_server = "http://localhost/miscelanea/";
//rutas adjuntas :
var routeAppMobile = '';
var routeAppPlatform = dominio + '/resources/public/views/platform/modules/';
var routeApp = dominio + '/resources/public/views/platform/';

var routeAppWeb = dominio + '/resources/public/views/web/modules/';
var routeAppPlatformModule = '';
var routeAppWebsite = '';
//export
function routesAppPlatform() {
    return routeAppPlatform;
}

function routesAppModule() {
    return routeAppPlatformModule;
}

function routesAppMobile() {
    return routeAppMobile;
}

function routesAppWeb() {
    return routeAppWeb;
}

function routesApp() {
    return routeApp;
}