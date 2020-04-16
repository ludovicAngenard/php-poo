<?php

spl_autoload_register(function ($class) {
    if(substr($class,0,9)==="Exception"){
        include '../Exception/'.$class.'.php';
    }
    else{
        include $class.'.php';
    }
    
    
});
?>