<?php
try{
//define base dirrectory

  
require_once('config.php');
// ini_set('display_errors',1);
// error_reporting(E_ALL|E_STRICT);
// ini_set('error_log','script_errors.log');
// ini_set('log_errors','On');

define('SITE_BASE_DIR', CONFIG::app_base_url);

// Include the Rapid library
require_once('lib/Rapid.php');

date_default_timezone_set("Europe/Dublin");


// Create a new Router instance
$app = new \Rapid\Router();



$app->GET('/', 'Home');

//Routes for paint object
$app->GET('/addPaint', 'AddPaintGet');
$app->POST('/addPaint', 'AddPaintPost');
$app->GET('/viewPaint', 'ViewPaint');
$app->GET('/deletePaint', 'DeletePaint');
$app->GET('/editPaint', 'EditPaintGet');
$app->POST('/editPaint', 'EditPaintPost');


//Routes for company object
$app->GET('/viewCompany', 'ViewCompany');
$app->GET('/addCompany', 'AddCompany');
$app->POST('/addCompany', 'AddNewCompany');
$app->GET('/deleteCompany', 'DeleteCompany');
$app->GET('/editCompany', 'EditCompanyGet');
$app->POST('/editCompany', 'EditCompanyPost');


// Process the request
$app->dispatch();
}
catch(\Rapid\RouteNotFoundException $e){
   $res =  $e->getResponseObject();
   $res->render('main', '404', []);

}

?>