<?php 
namespace Controller;

if(!defined("IN_RULE")) die ("Oops");

abstract class Controller 
{
    public $ModelName;
    public $ViewName;
    public $InstanceModel;
    public $InstanceView;
    public $params;
    public $message;

    // при создании обекта "инжектим" из роутинга названия используемых классов: контролер, модель, представление
    // экземпляр представления создается тут же. Экземплеяр модели создается в контроллере по мере надобности
    public function __construct($route = [])    {
        $this->ModelName   = $route['model'];
        $this->ViewName    = $route['view'];
        $this->params      = $route['params'];
        $this->InstanceView = new \View\View();
    }

    // этот абстрактный метод используется для "инициализации" приложения при запуске
    abstract public function init();
}
