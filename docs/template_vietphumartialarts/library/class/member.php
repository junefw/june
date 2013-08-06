<?php
require_once("database.php");
class member extends db_Connection{
	var $username 	= '';
	var $password 	= '';
	var $fullname	= '';
	var $ngaythamgia = '';
	var $session_users = '';
	function __construct(){
	$this->db_Connection();
	$this->session_users = $_SESSION['myusername'];
	}
	function get_user_login(){
		$u = $this->session_users;
		$sql = "SELECT *
                FROM users
                WHERE username = '$u'";
		$result = $this->query($sql);
		if (!$result) die($this->getError());
		if ($result->getNumRows() == 0) die('No Results');
		if ($result){
			$row = $result->getNext();
			$this->username 	= $row['username'];
			$this->password		= $row['pass'];
			$this->fullname		= $row['fullname'];
			$this->ngaythamgia	= $row['ngaythamgia'];
		}
	}
	
	function change_password($name,$p,$re_p){
		if($name){
			$name = stripslashes($name);	
		}
		if($p){
			$p = stripslashes($p);	
		}
		if($re_p){
			$re_p = stripslashes($re_p);	
		}
		
		if($p && $re_p){
			if($p != $re_p){
				echo "Password và Re-password chưa đúng";
				exit;	
			}else{
				$p = md5($p);
				$u = $this->session_users;
				$sql_update = "UPDATE users SET pass='$p', fullname='$name' WHERE username='$u'";
				$this->query($sql_update);
				//echo $sql_update;
				echo "Thay đổi thông tin tài khoản thành công. <a href='index.php'>Trang chủ</a>";
				//$this->RedirectToURL('index.php');
			}
		}else{
				$sql_update = "UPDATE users SET fullname='$name' WHERE username='$u'";
				$this->query($sql_update);
				//echo $sql_update;
				echo "Thay đổi thông tin tài khoản thành công. <a href='index.php'>Trang chủ</a>";
		}
	}
	
	function logout(){
		session_destroy();
		//$this->RedirectToURL('index.php');	
	}
	 function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
	
}
?>