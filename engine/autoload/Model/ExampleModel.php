<?php
namespace Model;

if(!defined("IN_RULE")) die ("Oops");

class ExampleModel extends Model {
    /*
    |--------------------------------------------------------------------------
    | Use our REST API via curl
    |--------------------------------------------------------------------------
    | Fetch data API point 
    */
    public function getData() { 

        // create cURL object
        $curl = new \cURL($_SERVER['HTTP_HOST']);
        // take parameters from the post request
        $buff = $curl->get($_POST['email'], $_POST['amount'], $_POST['token']);
        // procees response
        $data['messageHead']     = $buff['status'];
        $data['messageBody']     = $buff['error_message'];
        if (isset($buff['id'])) $data['messageBody']     = 'ID операции: ' . $buff['id'];

        return $data;
    }
}