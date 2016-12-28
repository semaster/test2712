<?php
namespace Model;

class TransactionModel extends Model {
    /* 
    * @var array request methods
    */
    protected $methods = array('GET','POST');
    /*
    |--------------------------------------------------------------------------
    | make some checks
    |--------------------------------------------------------------------------
    | Execute check: specified request method, email, the number(amount) and the token
    | In this example, the token is given as a single value equal 'mytoken'
    */

    public function check($params) { 
        $json = (in_array($_SERVER['REQUEST_METHOD'], $this->methods)) ? NULL  
                : json_encode(array('error_message' => 'Wrong request method!', 'status' => 'error'));
        $json =  (\Filter::email($params['email'])) ? $json  
                : json_encode(array('error_message' => 'Wrong email!', 'status' => 'error'));
        $json =  (\Filter::numeric($params['amount'])) ? $json  
                : json_encode(array('error_message' => 'Wrong amount!', 'status' => 'error'));
        $json =  ($params['token'] == 'mytoken') ? $json  
                : json_encode(array('error_message' => 'Wrong token!', 'status' => 'error'));
        return $json;
    }
    /*
    |--------------------------------------------------------------------------
    | Generate fake response (due to task)
    |--------------------------------------------------------------------------
    */
    public function process($params) {

        $data = \FakeData::status();

        $data['json'] =  $this->logTransaction($params, $data);

        return $data['json'];

    }
    /*
    |--------------------------------------------------------------------------
    | Just log transaction to DB
    |--------------------------------------------------------------------------
    */
    private function logTransaction ($params, $data) {
        $dblink = \DB::getInstance()->getConnection();
        if ($stm = $dblink->prepare("INSERT INTO transactions (id,email,amount,status,create_date) VALUES (?,?,?,?,NOW())")) {
            $stm->execute(array($data['id'],$params['email'],$params['amount'],$data['json']['status']));
            $stm = NULL; 
        } else {
            $data['json'] = array('status' => 'error', 'error_message' => 'Something went wrong!');
        }

        return json_encode($data['json']);
    }
}