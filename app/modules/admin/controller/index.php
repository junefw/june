<?php

namespace modules\_admin\controller;

use modules\_admin\Bootstrap;

class Index extends Bootstrap{
  
    public function indexAction(){
        $data = array();
        $this->layout($data);
    }
    
    public function testAction(){
        echo 'testAction';
    }
    
}
