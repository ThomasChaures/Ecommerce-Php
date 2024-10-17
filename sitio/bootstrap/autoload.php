<?php

spl_autoload_register(function(string $className){
    $classFile = $className . '.php';
    $classPath = __DIR__ . '../class/' . $classFile;

    if(file_exists($classFile)){
        require_once $classPath;
    }
});