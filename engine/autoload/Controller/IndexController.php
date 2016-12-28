<?php 
namespace Controller;

if(!defined("IN_RULE")) die ("Oops");

class IndexController extends Controller 
{

    public function init() {
    	//задание заголовка страницы - используется в шаблоне.
    	// в остальных классах это будет упущено для лаконичности
        $data = array('pageTitle'   => 'REST API example');
        // выводим представление
        $this->InstanceView->generate('_layout', $this->ViewName, $data);
    }
}

?>