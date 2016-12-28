<?php

header('Content-type: application/json');

if (is_readable(dirname(__FILE__)."/".$content.".php")) include(dirname(__FILE__)."/".$content.".php");