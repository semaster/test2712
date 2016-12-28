<?php
/*
    Данный пример автозагрузчика демонстрирует базовое использование функции spl_autoload_register
    для регистрации собственных автозагрузчиков.
    В данном примере это реализовано одной функцией, без создания классов и более громоздких конструкций.
    Поиск файлов происходит в той же директории в которой размещается файл данного загрузчика.
*/

//проверяем что вызов не исползуется напрямую без включения
if(!defined("IN_RULE")) die ("Oops");
// регистрируем свой автозагрузчик
spl_autoload_register ('autoload');

function autoload ($className) {

    $className = ltrim( $className, '\\' );

    $className = str_replace( '\\', '/', $className );

    $fileName = dirname(__FILE__).'/autoload/'.$className.'.php';

    if (is_readable($fileName)) include_once($fileName); else throw new Exception($className.'  not found');
    
}
