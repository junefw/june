<?php
/*
name:helper cho phần giỏ hàng
author:Vuong
 */
class Cart {
  
  public function __construct() {
    
    if(!isset($_SESSION['cart']))
    {
      $_SESSION['cart'] = array();
    }
  }


  /*
   * Thêm sản phẩm vào giỏ hàng
   * Dùng Session
   */
  public function addProduct($id,$num=1){
    if(isset($_SESSION['cart'][$id]))
    {
      $qlt = $_SESSION['cart'][$id] + $num;
    }
    else
    {
      $qlt = $num;
    }
    
    $_SESSION['cart'][$id] = $qlt;
    
  }
  
  /*
   * Show id sản phẩm có trong giở hàng
   */
  public function showProduct(){
    return $_SESSION['cart'];
  }
  
  /*
   * Xoá 1 sản phẩm ra khỏi giỏ hàng
   */
  public function removeProduct($id){
    if(isset($_SESSION['cart'][$id]))
    {
       session_unset($_SESSION['cart'][$id]);
    }
  }
  
  /*
   * Xoá toàn bộ sản phẩm ra khỏi giỏ hàng
   * 
   */
  public function removeAll(){
    if(isset($_SESSION['cart']))
    {
       session_unset($_SESSION['cart']);
    }
  }
  
}

?>
