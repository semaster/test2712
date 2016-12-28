<?php 
namespace View;

/*
|--------------------------------------------------------------------------
| View class
|--------------------------------------------------------------------------
| Class to display the presentation. It performs a few simple steps:
| parses the data $data - for output variables
| $data - an array, key becomes variable name to use in template
| Finally checks whether the specified template file is available and if so then it run.
*/

class View
{

    public function generate ($template, $content,  $data = null) 
    {

        if (is_array($data)) { foreach ($data as $Key=>$Value)  $$Key = $Value; }

        $template = 'engine/template/'.strtolower($template).'.php';

        if( is_readable($template) ) { include_once($template); }
    }

}
