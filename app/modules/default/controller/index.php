<?php

namespace modules\_default\controller;

use modules\_default\Bootstrap;

class Index extends Bootstrap{
  
    public function indexAction(){
//        $this->cache();
    $cart = load_helper('Cart');
//    $cart->addProduct(4,5); 
    $id = $cart->showProduct();
    $cart->removeAll();
    echodebug($id);
        $model = array(
            'test1' => 'hello',
        );
        $this->layout($model);
    }
	
	public function adminAction()
	{
		$data = array('admin' => 'day la admin');
		$this->clearCache('','','index');
		$this->view($data);
	}
}
