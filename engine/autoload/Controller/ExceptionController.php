<?php 
namespace Controller;

if(!defined("IN_RULE")) die ("Oops");

class ExceptionController extends Controller 
{

    public function init() {   
		// выводим представление
        $this->InstanceView->generate('_layout', $this->ViewName);
    }
}

?>