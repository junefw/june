<?php

class Hash {
  
  protected $key = '689bc0a82e8b88b493471a162e25167c';
  
  public function enHash($word){
    return md5( $word . $this->key );
  }
  
  public function check($word,$hash){
    if(md5( $word . $this->key ) === $hash)
    {
      return true;
    }
    return false;
  }
  
  
}

?>
