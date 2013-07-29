<?php

class Web {

    private $conf;
    
    private $router;
    
    private $defaultModule;


    public function __construct() {
      
    }

    public function run() {
        
        $this->conf = June::database();
        
        $this->router = $this->runRouter();
        
        $this->runModule();
        
        
    }
    

    protected function runRouter() {
        return new Router();
    }
    
    
    protected function runModule(){
      
        $ns = 'modules\_' . $this->router->module . '\controller\\' . ucfirst($this->router->controller);
        if(!class_exists($ns)){
            June::error('404');
        }
        $module = new $ns;
        $action = $this->router->action . 'Action';
        if(method_exists($module, $action))
        {
            call_user_func(array($module,$action));
        }else{
            June::error('404');
        }
    }
  
}
