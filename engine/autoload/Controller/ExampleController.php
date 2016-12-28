<?php 
namespace Controller;

if(!defined("IN_RULE")) die ("Oops");

class ExampleController extends Controller 
{

    public function init() {
    	//создаем "инстанс" модели
    	$this->InstanceModel = new $this->ModelName;
    	// это переменная используется скрытия блока с информацией в зависимости того получены ли данные
    	$data['panelVisibility'] = 'hidden';
    	//получаем данные из модели в случае "пост"-запроса
    	if ($_POST) $data = $this->InstanceModel->getData();
    	// выводим представление
        $this->InstanceView->generate('_layout', $this->ViewName, $data);
    }
}

?>