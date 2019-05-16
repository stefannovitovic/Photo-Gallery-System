<?php


    // autolader
    function classAutoLoader($className){

        $className = strtolower($className);
        $path      = "includes/{$className}.php";

        if(file_exists($path)){
            require_once($path);
        }else{
            die ("This file does not exists!");
        }
    }
    spl_autoload_register('classAutoLoader');

    function redirect_user($location){
        header("Location: {$location}");
    }


?>