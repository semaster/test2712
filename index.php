<?php 
//переменная для контроля включаемых файлов
// этого можно не делать но не помешает если вы беспокоитесь о том
//  чтобы файлы не вызывались в обход "единой точки входа"
define("IN_RULE", TRUE);
// подгружаем настройки и автозагрузку
require_once(dirname(__FILE__).'/engine/config.php');
require_once(dirname(__FILE__).'/engine/autoload.php');

/*
Создаем роутинг. В этом примере синтаксис добавления маршрута: путь, массив параметров.
массив параметров включает:имя_контролера, имя_модели, имя_представления и дополнительные переменные. 
Значения переменных назначаются из массивв explode(путь), где число является ключем полученного массива.
:params - разбирается как [\w\.\@]+ (все символы, числа, точка, @ и знак подчеркивания)
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

$router->run();