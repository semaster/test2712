<?php 

if(!defined("IN_RULE")) die ("Oops");

class Router 
{
    /**
     * $route массив хранящий имена используемых обьектов и параметров, которые используются в заданном маршруте
     */
    private $route = array("controller" =>"\Controller\ExceptionController",
                            "model"     =>"\Model\ExceptionModel",
                            "view"      =>"ExceptionView",
                            "params"    =>array());
    /**
     * осуществляет начальный разбор маршрута и заполнение $this->route значениями.
     */
    public function __construct() {
        $this->parseURI();      
    }
    /**
     * запуск приложения. функция проверяет можно ли создать обьекты указанных моделей и котроллеров
     * в случае неудачи передает управление контроллеру ExceptionController для вывода сообщения об ошибке
     */
    public function run() {
        try {
            $modeltmp                   = new $this->route['model'];
        } catch(Exception $e) {
            $this->route['controller'] = "\Controller\ExceptionController";
            $this->route['model']      = "\Model\ExceptionModel";
            $this->route['view']       = "ExceptionView";
        }
        try {
            $controller                 = new $this->route['controller']($this->route);
        } catch(Exception $e) {
            $controller                 = new \Controller\ExceptionController;
            $controller->ModelName      = "\Model\ExceptionModel";
            $controller->ViewName       = "ExceptionView";
            $controller->message        = "Route to controller not found";
        }

        if ( method_exists($controller, 'init') ) { $controller->init(); } 
    }

    /**
     * Создаем маршурт с необходимыми параметрами.
     * @path string  маршрут URI
     * @appoint  array 
     */
    public function add ($path, $appoint) {
        //задаем правила в стиле регулярных выражений
        $path = str_replace(':params', '[\w\.\@]*', $path);
        $path = str_replace('/', '\/', $path);
        //если запрашиваемый URL-путь не соответсвует заданным правилам - выходим
        if ( !preg_match("/^".$path."$/", $_SERVER['QUERY_STRING']) ) return;
        //назначаем имена контроллеров и моделей в соответствии со структурой директорий
        foreach ($appoint as $Key=>$Value)  {
            if ($Key == 'controller')   $Value = "Controller\\".$Value;
            if ($Key == 'model')        $Value = "Model\\".$Value;
            $this->route[$Key] = $Value; 
            //следующий цикл производит передачу дополнительных параметров в массив
            if (is_int($Value)) {
                $parts = explode('/', str_replace(SITE_DIRECTORY, "", $_SERVER['QUERY_STRING']));
                $this->route['params'][$Key] = $parts[$Value];
            }
        }
    }

    /**
     * Маршурт по умолчанию для главной страницы. Это можно не делать тут а вынести в индексный файл
     */
    private function parseURI () {
        $this->add(
            '/',
            array(
                'controller' => 'IndexController',
                'model'      => 'IndexModel',
                'view'       => 'IndexView'
            )
        );
        $this->add(
            '',
            array(
                'controller' => 'IndexController',
                'model'      => 'IndexModel',
                'view'       => 'IndexView'
            )
        );
    }
}