<?php 
namespace Controller;

if(!defined("IN_RULE")) die ("Oops");

class TransactionController extends Controller 
{

    public function init() {

        $this->InstanceModel = new $this->ModelName;

        //проверяем метод запроса, если не пост - тогда выдаем сообщение об ошибке.
       	$data['json'] = $this->InstanceModel->check($this->params);

        //обрабатываем запрос, генерируем псевдо ответ. (при условии что предыдущие проверки прошли)
        if (is_null($data['json'])) $data['json'] = $this->InstanceModel->process($this->params);

         $this->InstanceView->generate('_json', $this->ViewName, $data);
    }
}

?>