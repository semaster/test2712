<?php 
namespace Controller;
/*
|--------------------------------------------------------------------------
| Controller for main (index) page
|--------------------------------------------------------------------------
*/
class IndexController extends Controller 
{

    public function init() {
		// Set the page title - used in the template.
	    // In other places it will be lost for brevity
        $data = array('pageTitle'   => 'REST API example');
        // output to _layout template
        $this->InstanceView->generate('_layout', $this->ViewName, $data);
    }
}

?>