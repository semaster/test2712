<?php 
namespace View;

if(!defined("IN_RULE")) die ("Oops");

class View
{

/*
    Класс для вывода представления. Выполняет несколько простых действий:
    разбирает полученные данные $data - для вывода в шаблоне
    $data - это массив и он разбирается на переменные где ключ массива становится 
    названием переменной для использования в шаблоне
    проверяет доступен ли указанный файл шаблона и если да то подключает его.
*/
    public function generate ($template, $content,  $data = null) {

        if (is_array($data)) { foreach ($data as $Key=>$Value)  $$Key = $Value; }

        $template = 'engine/template/'.strtolower($template).'.php';
        if( is_readable($template) ) { include_once($template); }
    }

}
