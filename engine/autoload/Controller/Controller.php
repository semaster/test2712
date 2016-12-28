<?php 
namespace Controller;
/*
|--------------------------------------------------------------------------
| abstract Controller 
|--------------------------------------------------------------------------
*/
abstract class Controller 
{
    public $ModelName;
    public $ViewName;
    public $InstanceModel;
    public $InstanceView;
    public $params;
    public $message;

    // init properties with routed values
    public function __construct($route = [])    {
        $this->ModelName   = $route['model'];
        $this->ViewName    = $route['view'];
        $this->params      = $route['params'];
        $this->InstanceView = new \View\View();
    }

    abstract public function init();
}
