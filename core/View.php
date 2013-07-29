<?php

class View {
    
    private $conf;
    
    private $router;

    public $smarty;
    
    private $defaultTemplate = 'default';
    
    public $enable_cache = 0;
    
    private $time_cache = '3600';


    public function __construct() {
        $this->smarty = new Smarty;
        $this->conf = June::conf();
        if(isset($this->conf['defaultTemplate']))
        {
            $this->defaultTemplate = $this->conf['defaultTemplate'];
        }
        $this->smarty->caching = 2;
        $this->smarty->setTemplateDir($this->conf['url']['site_path'] . '/templates/' . $this->defaultTemplate .'/');
        $this->smarty->setCompileDir($this->conf['url']['site_path'] . 'tmp/compile');
        $this->smarty->setConfigDir($this->conf['url']['site_path'] . 'tmp/configs');
        $this->smarty->setCacheDir($this->conf['url']['site_path'] . 'tmp/cache');
    }
    
    public function run($route){
        $this->router = $route;
        return $this;
    }
    
    private function render($file){
      
      
        $this->assignVariable();
        
        $this->smarty->display($file);
        
        if($this->enable_cache)
        {
          $this->renderCache($file);
        }
        
    }
    
    //will get layout and view
    public function renderLayout($data){
        
        $this->assign($data);
        
        $module = $this->router->module;
        if(isset($this->conf['template']['layout'][$this->router->module]))
        {
            $module = $this->conf['template']['layout'][$this->router->module];
        }
        $file = 'layout/' . $module . '.tpl';
        $this->render($file);
    }
    
    //only get view
    public function renderView($data=array()){
        $this->assign($data);
        $action = $this->router->action;
        if(isset($this->conf['template']['view'][$this->router->action]))
        {
            $action = $this->conf['template']['view'][$this->router->action];
        }
        
        $file = 'view/' . $this->router->controller . '/'.$action.'.tpl';

        $this->render($file);
        
    }
    
    //cache file
    private function renderCache($file){
      
      $cache_dir = $this->conf['url']['core_path'] .'cache/' . $this->conf['project'] . '/';
      
      $file_name = $this->router->module . '_' . $this->router->controller . '_' . $this->router->action. '.tpl';
      
      if(!is_dir($cache_dir))
      {
        mkdir($cache_dir,0,true);
      }
      
      $file_name = $cache_dir . $file_name;
      
      $result = $this->smarty->fetch($file);
      
      file_put_contents($file_name, $result);
    }
    
    private function checkCache(){
      
      $cache_dir = $this->conf['url']['core_path'] .'cache/' . $this->conf['project'] . '/';
      
      $file_name = $this->router->module . '_' . $this->router->controller . '_' . $this->router->action. '.tpl';
      
      $file_name = $cache_dir . $file_name;
      
      if(file_exists($file_name))
      {
         return $file_name;
      }
      
      return false;
        
    }
    
    public function cache(){
      
      if($file_name = $this->checkCache())
      {
        $this->smarty->display($file_name);
        exit;
      }
      return ;
    }
    

    //assign data from controller to template
    private function assign($data){
        $this->doAssign($data);
    }
    
    
    private function doAssign($data){

        foreach($data as $key => $item)
        {
            $this->smarty->assign($key,$item);
        }
    }
    
    //display error page
    public function displayError($type){
        
        $file = 'error/' . $type . '.tpl';
        
        $this->smarty->display($file);
        
        exit;
        
    }
    private function assignVariable(){
        $arrData = array(
            'rooturl' => $this->conf['url']['site'],
            'rootpath' => $this->conf['url']['site_path'],
            'controller' => $this->router->controller,
            'action' => $this->router->action,
            'module' => $this->router->module,
            'view' => $this,
        );
        $this->doAssign($arrData);
    }
}

?>
