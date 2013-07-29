<?php

function echodebug($data) {
    echo '<pre>';
    if (is_bool($data)) {
        var_dump($data);
    } else {
        print_r($data);
    }
    echo '</pre>';
}


function keyEnd($arr){
    
    end($arr);         // move the internal pointer to the end of the array
    $key = key($arr);  // fetches the key of the element pointed to by the internal
    return $key;
    
}

function loging($data){
    $log = '';
    $log .= '############################### -'.date('h:m:s d:m:y').'- ###############################'. "\n";
    $log .= print_r($data,true);
    $log .= "\n" . '############################### -END- ############################### ' . "\n";
    
    file_put_contents(CORE . 'log/log', $log,FILE_APPEND);
    
}

function redirect($url){
    header('Location: ' . $url);
}

function load_helper($class){
  
  require 'helper/' . $class . '.php';
  
  return new $class;
  
}
