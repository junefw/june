<?php
namespace modules\_default\model;
use Model;

class News extends Model{
  
  public function getDetail(){
    $res = $this->get('tbl_member',10,10);
    return $res;
  }
  
}

?>
