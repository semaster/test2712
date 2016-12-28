<?php 

/*
|--------------------------------------------------------------------------
| Random data generator (due to task)
|--------------------------------------------------------------------------
*/
class FakeData 
{
	/*
	|--------------------------------------------------------------------------
	| Here we get random json response
	|--------------------------------------------------------------------------
	*/
	public function status() {

		$data['id'] = rand(1,9999999);

		$rejected = array('status' => 'rejected','error_message' => 'Fraud detected!' );
		$approved = array('status' => 'approved', 'id' => $data['id']);
		$rand = rand(0,1);

		$data['json'] = ($rand == 1) ? $approved : $rejected;
		return $data;
	}

}