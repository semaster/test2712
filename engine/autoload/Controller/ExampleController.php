<?php 
namespace Controller;
/*
|--------------------------------------------------------------------------
| Controller usage examples page
|--------------------------------------------------------------------------
*/
class ExampleController extends Controller 
{

    public function init() {
    	//init model instance
    	$this->InstanceModel = new $this->ModelName;
    	// use panelVisibility variable in template to hide some fields if not POST method
    	$data['panelVisibility'] = 'hidden';
    	// obtain data from the model in the case of "post" requests
    	if ($_POST) $data = $this->InstanceModel->getData();
    	// output to _layout template
        $this->InstanceView->generate('_layout', $this->ViewName, $data);
    }
}

?>