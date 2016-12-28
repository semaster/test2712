<?php 
/*
|--------------------------------------------------------------------------
| IN_RULE - to control included files
|--------------------------------------------------------------------------
*/
define("IN_RULE", TRUE);
/*
|--------------------------------------------------------------------------
| Load configuration and Register The Auto Loader
|--------------------------------------------------------------------------
*/
require_once(dirname(__FILE__).'/engine/config.php');
require_once(dirname(__FILE__).'/engine/autoload.php');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| This file is where you may define all of the routes that are handled
| by your application. Syntax is simple: path and array of parameters that include
| names of controller, model, view, variables
/ :params - equal to regex [\w\.\@]*
*/

$router = new Router;

$router->add(
    '/transaction/:params/:params/:params',
    array(
        'controller' => 'TransactionController',
        'model'      => 'TransactionModel',
        'view'       => 'TransactionView',
        'email'     => 2,
        'amount'    => 3,
        'token'     => 4
    )
);

$router->add(
    '/example',
    array(
        'controller' => 'ExampleController',
        'model'      => 'ExampleModel',
        'view'       => 'ExampleView'
    )
);

$router->add(
    '/sql',
    array(
        'controller' => 'sqlController',
        'model'      => 'sqlModel',
        'view'       => 'sqlView'
    )
);
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
*/
$router->run();