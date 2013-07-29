<?php
namespace modules\_default\model;
use Model;

class User extends Model{
  
  public function getUser(){
    
    $res = array(
        'name' =>'vuong'
    );
    return $res;
  }
  
}

?>
