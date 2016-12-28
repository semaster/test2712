<?php 
namespace Controller;
/*
|--------------------------------------------------------------------------
| Controller for SQL examples page
|--------------------------------------------------------------------------
*/
class sqlController extends Controller 
{

    public function init() {
    	//init model instance
    	$this->InstanceModel = new $this->ModelName;
    	// use panelVisibility variable in template to hide some fields if not POST method
    	$data['panelVisibility'] = 'hidden';
    	// receive data in accordance with the task to query 1
    	if ($_POST['sql'] == 1) $data = $this->InstanceModel->getSQL1($_POST['email']);
    	// receive data in accordance with the task to query 2
    	if ($_POST['sql'] == 2) $data = $this->InstanceModel->getSQL2($_POST['email']);
    	// output to _layout template
        $this->InstanceView->generate('_layout', $this->ViewName, $data);
    }
}

?>