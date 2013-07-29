<?php

class Module{
    
    public $router;
    
    private $view;
    
    public $conf;

    protected function __construct(){
        
        $this->conf = June::conf();
      
        $this->router =  new Router();
        
        $this->view = $this->pre_smarty();
        
        session_start();
        
    }
    
    protected final function model($model){
        // model namespace
        $ns = 'modules\_' . $this->router->module . '\model\\' . ucfirst($model);
        
        return new $ns;
    }
    
    protected final function layout($data){
        $this->view->renderLayout($data);
    }
    protected final function view($data){
        $this->view->renderView($data);
    }
    
    protected final function cache(){
      
        $this->view->cache();
        
        $this->view->enable_cache = 1 ;
      
    }
    
    protected final function clearCache($module = '',$controller = '',$action = ''){
      $path = $this->conf['url']['core_path'] . 'cache/' . $this->conf['project'] .'/';
      
      $module = ($module?$module:$this->router->module);
      $controller = ($controller?$controller:$this->router->controller);
      $action = ($action?$action:$this->router->action);
      
      $file_name = $path . $module . '_' . $controller . '_' .$action . '.tpl';
      
      if(file_exists($file_name))
      {
        @unlink($file_name);
      }
      else{
        echodebug('not');
      }
    }
    
    private final function pre_smarty(){
      
      $view = new View();
      
      $pre_smarty = $view->run($this->router);
      
      return $pre_smarty;
      
    }
    
    
    
}
