<?php 

if(!defined("IN_RULE")) die ("Oops");
    /*
    * фильры для обработки входящих (и других) данных
    */
class Filter 
{
	public function email($param) {
		return filter_var($param, FILTER_VALIDATE_EMAIL);	
	}
    public function numeric($param) {
        return is_numeric($param);
    }

}