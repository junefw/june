<?php
require_once("database.php");
class paging extends db_Connection{
	var $sql;
	var $link;
	var $res_page;
	
	
	var $n;
	var $n1;
	var $dau;
	var $cuoi;
	var $nhom;
	var $sodong;
	var $tongsonhom;
	var $tongsotrang;
	var $tongsodong;
	var $p;
	var $get_id;
	var $get_idTL;
	var $get_idTLC;
	var $get_idTLT;
	var $get_idTLTC;
	var $get_idTT;
	var $get_idDM;
	var $get_idDMC;
	var $get_idSP;
	var $get_idTVA;
	var $get_idTVACT;
	var $get_idHD;
	var $get_idCTHD;
	function __construct(){
		$this->SimpleDB_Connection();
		$this->sql = NULL;
		$this->link = NULL;
		$this->res_page = NULL;
		$this->n = NULL;
		$this->n1 = NULL;
		$this->dau = NULL;
		$this->cuoi = NULL;
		$this->nhom = NULL;
		$this->sodong = NULL;
		$this->tongsonhom = NULL;
		$this->tongsotrang = NULL;
		$this->tongsodong = NULL;
		$this->p = NULL;
		$this->get_idTL = isset($_GET['idTL']) ? $_GET['idTL'] : '';
		$this->get_idTLC = isset($_GET['idTLC']) ? $_GET['idTLC'] : '';
		$this->get_idTLT = isset($_GET['idTLT']) ? $_GET['idTLT'] : '';
		$this->get_idTT = isset($_GET['idTT']) ? $_GET['idTT'] : '';
		$this->get_idDM = isset($_GET['idDM']) ? $_GET['idDM'] : '';
		$this->get_idDMC = isset($_GET['idDMC']) ? $_GET['idDMC'] : '';
		$this->get_idSP = isset($_GET['idSP']) ? $_GET['idSP'] : '';
		$this->get_idTVA = isset($_GET['idTVA']) ? $_GET['idTVA'] : '';
		$this->get_idTVACT 	= isset($_GET['idTVACT']) ? $_GET['idTVACT'] : '';
		$this->get_idHD 	= isset($_GET['idHD']) ? $_GET['idHD'] : '';
		$this->get_idCTHD 	= isset($_GET['idCTHD']) ? $_GET['idCTHD'] : '';
		$this->get_id	= isset($_GET['id']) ? $_GET['id'] : '';
	}
	function get_page($sql){
		$this->sodong=9;
		$this->nhom=2;
		$this->sql = $sql;
		if(!isset($_GET["tst"])) {
			$this->res_page = $this->query($this->sql);
			$this->tongsodong = $this->res_page->getNumRows();
			$this->tongsotrang=ceil($this->tongsodong/$this->sodong);
			$this->tongsonhom=ceil($this->tongsotrang/$this->nhom);
	  	}
	  	else
	  	{
		  	$this->tongsotrang=intval($_GET["tst"]);
		  	$this->tongsonhom=ceil($this->tongsotrang/$this->nhom);
	  	}
	  
	  
	  
	  	if(!isset($_GET["p"]))
	  	{ 
			if(!isset($_GET["n"]))
			{
				$this->p=1; $this->n=1; 
			}
			else
		  	{
				$this->n=intval($_GET["n"]);
				$this->p=$this->n*$this->nhom-$this->nhom+1;  
			}
	  
	  	}
	  	else
	  	{
			$this->p=intval($_GET["p"]);
			$this->n=ceil($this->p/$this->nhom);
	  	}
	  
	  	  	$x=($this->p-1)*$this->sodong;
	  	  	$s=$this->sql." limit ".$x.",".$this->sodong;
	   	  	$this->res_page=$this->query($s);	
	}
	
	///////tao link
	
	function load_page($link){
	$this->link = $link;
		if($this->n>1) 
		{
			$this->n1=$this->n-1;
			echo '<a href="'.$this->link.'&amp;n='.$this->n1.'&tst='.$this->tongsotrang.'"> < </a>';
		} 
		$this->dau=($this->n-1)*$this->nhom+1;
		if($this->n<$this->tongsonhom)
		{
			$this->cuoi=$this->dau+$this->nhom-1;
		}
		else
		{
			$this->cuoi=$this->tongsotrang;
		}
		for($i=$this->dau;$i<=$this->cuoi;$i++)
		{ 
			if($i==$this->p)
			{ 
				echo "<span class='current_page'>".$i."</span>";
			}
			else
			{
				echo '<a href="'.$this->link.'&amp;p='.$i.'&tst='.$this->tongsotrang.'">'.$i.'</a>';
			}
		}
	   
		if($this->n<$this->tongsonhom)
		{
			$n2=$this->n+1;
			echo '<a href="'.$this->link.'&amp;n='.$n2.'&tst='.$this->tongsotrang.'"> > </a>';
		}
	}
}
?>