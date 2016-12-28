<?php 
/*
|--------------------------------------------------------------------------
| Web Router class
|--------------------------------------------------------------------------
*/
class Router 
{
    /*
    |--------------------------------------------------------------------------
    | Default Web Routes
    |--------------------------------------------------------------------------
    | Here defined default routin to exception point
    */
    private $route = array("controller" =>"\Controller\ExceptionController",
                            "model"     =>"\Model\ExceptionModel",
                            "view"      =>"ExceptionView",
                            "params"    =>array());
    /*
    |--------------------------------------------------------------------------
    | Assign $this->route with init values
    |--------------------------------------------------------------------------
    */
    public function __construct() {
        $this->parseURI();      
    }
    /*
    |--------------------------------------------------------------------------
    | Run 
    |--------------------------------------------------------------------------
    | We just check if we can create model and controller objects and then run app
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
    /*
    |--------------------------------------------------------------------------
    | Add route path
    |--------------------------------------------------------------------------
     * @path string  
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

    /*
    |--------------------------------------------------------------------------
    | Initial methos
    |--------------------------------------------------------------------------
    | Assign routes for main page
    | We can do it in index file but here too
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