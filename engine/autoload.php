<?php
/*
|--------------------------------------------------------------------------
| IN_RULE - to control included files
|--------------------------------------------------------------------------
| Use IN_RULE to denie executing without including in "entry point"
*/
if(!defined("IN_RULE")) die ("Oops");
/*
|--------------------------------------------------------------------------
| Application Name
|--------------------------------------------------------------------------
| This example demonstrates the basic usage of the autoloader spl_autoload_register function
| to register our own autoloaders.
| In this example, a single function is implemented without creating classes and more bulky structures.
| File search takes place in the same directory that houses the file of the boot loader.
*/
spl_autoload_register ('autoload');

function autoload ($className) {

    $className = ltrim( $className, '\\' );

    $className = str_replace( '\\', '/', $className );

    $fileName = dirname(__FILE__).'/autoload/'.$className.'.php';

    if (is_readable($fileName)) include_once($fileName); else throw new Exception($className.'  not found');
    
}
