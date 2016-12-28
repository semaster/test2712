<?php
namespace Model;

class sqlModel extends Model {
    /*
    |--------------------------------------------------------------------------
    | SQL 1 example in action
    |--------------------------------------------------------------------------
    | Fetch data from DB due to described in task SQL 1
    */
    public function getSQL1($email) { 
        $dblink = \DB::getInstance()->getConnection();

        if ($stm = $dblink->prepare("SELECT SUM(amount) AS sum FROM transactions 
            WHERE  email=? AND YEAR(create_date) = YEAR(NOW()) AND MONTH(create_date) = MONTH(NOW()) 
            GROUP BY email ")) {
            $stm->execute(array($email));$row = $stm->fetch(); $stm = NULL;
            $data['panelVisibility'] = '';
            $data['messageHead']     = 'response for test SQL 1:';
            $data['messageBody']     = $row['sum'];
        } 

        if (! \Filter::email($email)) $data['messageBody']     = 'enter email';

        return $data;
    }
    /*
    |--------------------------------------------------------------------------
    | SQL 2 example in action
    |--------------------------------------------------------------------------
    | Fetch data from DB due to described in task SQL 2
    */
    public function getSQL2($email) { 

        $dblink = \DB::getInstance()->getConnection();

        if ($stm = $dblink->prepare("SELECT date_format(create_date, '%W' ) AS weekday, sum(amount) AS revenue 
            FROM transactions WHERE email=? AND status='approved'
            GROUP BY WEEKDAY(create_date)")) {

            $stm->execute(array($email));$rows = $stm->fetchAll(); $stm = NULL;
        } 
        $data['panelVisibility'] = '';
        $data['messageHead']     = 'response for test SQL 2:';
        $data['messageBody']     = 'email => ' . $email . '<br>';
        foreach ($rows as $row) {
            $data['messageBody']     .= $row['weekday'] . ' => ' . $row['revenue'] . '<br>'; 
        }

        if (! \Filter::email($email)) $data['messageBody']     = 'enter email';        

        return $data;
    }


}