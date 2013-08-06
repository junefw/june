<?php
class linhtinh 
{
	function kiemTraBien($value)
	{
		if(isset($value) || !is_null($value))
		{
			return true;
		}
		else
		{
			return false;
		}
			
	}
	function _empty($str) 
	{
		return $str;
	}
	
	///////////Chong injection
	public function sqlInjection( $value ){ 
        //Kiểm tra xem version PHP bạn sử dụng có hiểu hàm mysql_real_escape_string() hay ko 
         
        if ($this->real_escape_string_exists) { 
            //Trường hợp sử dụng PHP v4.3.0 trở lên 
            //PHP hiểu hàm mysql_real_escape_string() 
             
            if( $this->magic_quotes_active ) {  
                //Trong trường hợp PHP đã hỗ trợ hàm get_magic_quotes_gpc() 
                //Ta sử dụng hàm stripslashes để bỏ qua các dấu slashes 
                $value = stripslashes( $value );  
            } 
            $value = mysql_real_escape_string( $value ); 
        }  
        else { 
            //Trường hợp dùng cho các version PHP dưới 4.3.0 
            //PHP không hiểu hàm mysql_real_escape_string() 
             
            if( !$this->magic_quotes_active ){  
                //Trong trường hợp PHP không hỗ trợ hàm get_magic_quotes_gpc() 
                //Ta sử dụng hàm addslashes để thêm các dấu slashes vào giá trị 
                $value = addslashes( $value );  
            } 
            // Nếu hàm get_magic_quotes_gpc() đã active có nghĩa là các dấu slashes đã tồn tại rồi 
        } 
        return $value; 
    } 
	
	
	
}
?>