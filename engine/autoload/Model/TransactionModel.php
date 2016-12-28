<?php
namespace Model;

if(!defined("IN_RULE")) die ("Oops");

class TransactionModel extends Model {
    /* 
    * @var array перечень поддерживаемых методов для запроса.
    */

    protected $methods = array('GET','POST');
    /*
    * выполняем проверки: соответствие заданным методам запроса, правильность емейла, количества и токена
    * в этом примере токен задан как единственное значение равное mytoken
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

    public function process($params) {

        $data = \FakeData::status();

        $data['json'] =  $this->logTransaction($params, $data);

        return $data['json'];

    }

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