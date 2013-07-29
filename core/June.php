<?php


require 'Function.php';

class June {

  static private $conf;
  
  static private $database;
  

  static function App($config) {
    
    self::$database = $config['database'];
    
    unset($config['database']);
    
    self::$conf = $config;
    
    unset($config);
    
    $cache = new Cache;
    
    return new Web();
  }

  public static function autoload($class) {

    $auto_arr = self::autoArr();
    $file = '';
       
    if (strpos($class, 'modules') !== false) {
      $dir = strtolower(str_replace('_', '', $class));
      $dir = str_replace('\\', '/', $dir);
      $file = CORE_PATH . 'app/' . $dir . '.php';
    } else {
        
        if(isset($auto_arr[$class]))
        {
            $file = CORE_PATH . 'core/' . $auto_arr[$class];
        }
    }
    
    if (file_exists($file)) {
      require $file;
    } 
  }
  
  //instance global config 
  public static function conf(){
    return self::$conf;
  }
  
  //instance global database info
  public static function database(){
    return self::$database;
  }
  
  public static function error($type){
      
      $view = new View();
      
      $view->displayError($type);
      
  }

    private static function autoArr(){
      
      return array(
        'Smarty' => 'addon/smarty/Smarty.class.php',
        'June' => 'June.php',
        'Web' => 'Web.php',
        'Router' => 'Router.php',
        'Controller' => 'Controller.php',
        'Module' => 'Module.php',
        'Database' => 'Database.php',
        'Model' => 'Model.php',
        'View' => 'View.php',
        'Cache' => 'Cache.php',
      );
      
  }

}



//auto require when call a class
spl_autoload_register(array('June', 'autoload'));