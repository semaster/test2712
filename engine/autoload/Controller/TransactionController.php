<?php 
namespace Controller;
/*
|--------------------------------------------------------------------------
| Controller for API point
|--------------------------------------------------------------------------
*/
class TransactionController extends Controller 
{

    public function init() {
    	// init model instance
        $this->InstanceModel = new $this->ModelName;
	    /*
	    |--------------------------------------------------------------------------
	    | make some checks
	    |--------------------------------------------------------------------------
	    | Execute check: specified request method, email, the number(amount) and the token
	    | In this example, the token is given as a single value equal 'mytoken'
	    */
       	$data['json'] = $this->InstanceModel->check($this->params);
        //get response
        if (is_null($data['json'])) $data['json'] = $this->InstanceModel->process($this->params);
		// output to _json template
         $this->InstanceView->generate('_json', $this->ViewName, $data);
    }
}

?>