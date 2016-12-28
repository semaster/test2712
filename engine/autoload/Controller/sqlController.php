<?php 
namespace Controller;

if(!defined("IN_RULE")) die ("Oops");

class sqlController extends Controller 
{

    public function init() {
    	//создаем "инстанс" модели
    	$this->InstanceModel = new $this->ModelName;
    	// это переменная используется скрытия блока с информацией в зависимости того получены ли данные
    	$data['panelVisibility'] = 'hidden';
    	// получение данных в соответствии с задание для запроса 1
    	if ($_POST['sql'] == 1) $data = $this->InstanceModel->getSQL1($_POST['email']);
    	// получение данных в соответствии с задание для запроса 2
    	if ($_POST['sql'] == 2) $data = $this->InstanceModel->getSQL2($_POST['email']);
    	// выводим представление
        $this->InstanceView->generate('_layout', $this->ViewName, $data);
    }
}

?>