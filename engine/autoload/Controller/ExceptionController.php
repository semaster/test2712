<?php 
namespace Controller;
/*
|--------------------------------------------------------------------------
| Controller exception page
|--------------------------------------------------------------------------
*/
class ExceptionController extends Controller 
{

    public function init() {   
        $this->InstanceView->generate('_layout', $this->ViewName);
    }
}

?>