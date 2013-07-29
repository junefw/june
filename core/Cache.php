<?php

//cache is 3w part
//what do you want to cache
//where do you want to save cache
//when cache has expired

class Cache {
  
  public $where = '';
  
  public $what = '';
  
  public $when = '';
  
  private $conf;
  
  private $smarty;


  public function __construct() {
    $this->conf = June::conf();
  }
  
  public function run($smarty){
    
    $this->smarty = $smarty;
    
  }
  
  
  
}

?>
