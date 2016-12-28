<?php
namespace Model;

if(!defined("IN_RULE")) die ("Oops");

class sqlModel extends Model {

    /*
    * пример SQL 1 запроса описанного в задании
    */
    public function getSQL1($email) { 
        //получаем соединение с БД
        $dblink = \DB::getInstance()->getConnection();
        //подготавливаем и выполняем запрос
        if ($stm = $dblink->prepare("SELECT SUM(amount) AS sum FROM transactions 
            WHERE  email=? AND YEAR(create_date) = YEAR(NOW()) AND MONTH(create_date) = MONTH(NOW()) 
            GROUP BY email ")) {
            $stm->execute(array($email));$row = $stm->fetch(); $stm = NULL;
            $data['panelVisibility'] = '';
            $data['messageHead']     = 'Сумма платежей выбранных по идентификатору (почта) за последний месяц:';
            $data['messageBody']     = $row['sum'];
        } 

        if (! \Filter::email($email)) $data['messageBody']     = 'Укажите емейл';

        return $data;
    }
    /*
    * пример SQL 2 запроса описанного в задании
    */
    public function getSQL2($email) { 

        $dblink = \DB::getInstance()->getConnection();

        if ($stm = $dblink->prepare("SELECT date_format(create_date, '%W' ) AS weekday, sum(amount) AS revenue 
            FROM transactions WHERE email=? AND status='approved'
            GROUP BY WEEKDAY(create_date)")) {

            $stm->execute(array($email));$rows = $stm->fetchAll(); $stm = NULL;
        } 
        $data['panelVisibility'] = '';
        $data['messageHead']     = 'Сумма платежей выбранных по идентификатору (почта) по дням недели:';
        $data['messageBody']     = 'email => ' . $email . '<br>';
        foreach ($rows as $row) {
            $data['messageBody']     .= $row['weekday'] . ' => ' . $row['revenue'] . '<br>'; 
        }

        if (! \Filter::email($email)) $data['messageBody']     = 'Укажите емейл';        

        return $data;
    }


}