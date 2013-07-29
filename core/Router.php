<?php

class Router{
    
    public $module;
    
    public $defaultModule;
    
    public $controller = 'index';
    
    public $action = 'index' ;
    
    public $route;
    
    public $arrRoute = array();
    
    private $conf;


    public function __construct() {
      $this->process();
    }
    
    private function process(){
      
        $this->conf = June::conf();
        
        $this->defaultModule = $this->conf['defaultModule'];
      
        $this->getRoute();
        
        $this->getModule();
        
        $this->getController();
        
        $this->getAction();
    }
    
    private function getRoute(){
        if(isset($_GET['route']))
        {
            $this->route = trim($_GET['route'],'/');
            
            $this->arrRoute = explode('/', $this->route);   
            
        }
    }
    
    private function getModule(){
        $module = (isset($this->arrRoute[0])?$this->arrRoute[0]:false);
        if($module)
        {
            $this->module = $module;
            
        }  else {
            
            $this->module = $this->defaultModule;
        }
    }
    
    private function getController(){
//        $controller = $this->arrRoute[1];
        if(isset($this->arrRoute[1]))
        {
            $this->controller = $this->arrRoute[1];
        }
    }
    
    private function getAction(){
//        $action = $this->arrRoute[2];
        if(isset($this->arrRoute[2]))
        {
            $this->action = $this->arrRoute[2];
        }
    }
    
    public function __get($param){
      
        $arrRoute = $this->arrRoute;

        $key = array_search($param, $arrRoute);
        if($key and isset($arrRoute[$key+1]) and $key > 2)
        {
            return $arrRoute[$key+1];
        }
    }
}