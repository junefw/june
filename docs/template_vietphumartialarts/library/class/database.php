<?php 
//////////////////////LOP DATABASE : TRUY VAN CSDL
/*
class database {
	var $_sql	= '';
	var $_connection = '';
	var $_cursor = null;
	public function database(){
		$host 		= 'localhost';
		$user		= 'root';
		$database	= 'quanlybansua';
		$password	= 'test';
		$this ->_connection = mysql_pconnect($host,$user,$password);
		if(!$this->_connection){
			die("Khong the ket noi");
		}
		if(!$database && mysql_select_db($database,$this->_connection)){
			die("Khong the ket noi:".mysql_error());
		}
		mysql_select_db($database,$this->_connection);
	}
	///////////////Tao Cau Truy Van va gan cho bien _sql
	public function setQuery($sql){
		$this->_sql = $sql;
	}
	////////////Thuc hien truy van lay cac dong du lieu gan cho con tro cursor
	public function query(){
		$this->_cursor = mysql_query($this->_sql,$this->_connection);
		return $this->_cursor;
	}
	///////////chuyen ket qua tu con tro cursor nay vao mang
	public function loadAllRow(){
		if(!($cur = $this->query())){
			return null;
		}
		global $tongSoDong;
		$tongSoDong = mysql_num_rows($this->query());
		$array = array();
		while($row = mysql_fetch_assoc($cur)) {
			$array[] = $row;
			//print_r($row['tenhangsua']."<br />");
		}
		mysql_free_result($cur);
		return $array;
	}
	///////////Dong ket noi
	public function disconnect() {
		mysql_close($this->_connection);
	}*/
	
class db_Connection
{
        var $conn;
        var $error = 'No Error';
        function SimpleDB_Connection()
        {
				$hostname = 'localhost';
				$username = 'root';
				$password = '';
                $this->conn = @mysql_connect($hostname, $username, $password);
				mysql_select_db('phuongthao',$this->conn);
                if (!$this->conn) $this->error = 'Could not connect to database.';
				//var_dump($this->conn);exit;
                return $this->conn;
        }
		///////////Chong injection
		
        function query($sql)
        {
                if (!$this->conn)
                {
                        $this->error = 'Not connected to database.';
                        return false;
                }

                $res = @mysql_query($sql, $this->conn);
                if (!$res)
                {
                        $this->error = mysql_error($this->conn);
                        return false;
                }

                return new SimpleDB_Result($res, $this->conn);
        }

        function getError()
        {
                return $this->error;
        }
		function disconnect() 
		{
				mysql_close($this->conn);
		}
}

class SimpleDB_Result
{
        var $conn;
        var $res;
        var $numRows;
        var $numAffected;

        function SimpleDB_Result(&$res, &$conn)
        {
                $this->res = $res;
                $this->conn = $conn;
        }

        function getNext()
        {
                $res = @mysql_fetch_assoc($this->res);
                return $res;
        }

        function getNumRows()
        {
                $res = ($this->numRows ? $this->numRows : @mysql_num_rows($this->res));
                $this->numRows = $res;
                return $res;
        }

        function getNumAffected()
        {
                $res = ($this->numAffected ? $this->numAffected : @mysql_affected_rows($this->conn));
                $this->numAffected = $res;
                return $res;
        }
}

/**
 * EXAMPLES:
 */

/*$db = new SimpleDB_Connection('localhost', 'username', 'password');
$sql = 'SELECT *
                FROM `users`
                WHERE `userid` < 99';
$result = $db->query($sql);
if (!$result) die($db->getError());
if ($result->getNumRows() == 0) die('No Results');
while ($row = $result->getNext())
{
        echo "{$row['username']}<br />\n";
}*/
/*	//////Ham tra ve cac mau tin trong trong csdl
	function Doc_DS($table)
	{
		$this->setQuery("SELECT * FROM $table");
		$result = $this->loadAllRow();
		$this->disconnect();
		return $result;
	}*/
?>