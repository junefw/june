<?php
require_once('database.php');
//////////////////LOP XU LY DU LIEU KE THUA TU LOP DATABASE
class xldl extends db_Connection {
	var $table;
	var $sql;
	var $mod;
	var $result;
	var $get_id;
	var $get_idTL;
	var $get_idTLC;
	var $get_idTLT;
	var $get_idTT;
	var $get_idDM;
	var $get_idDMC;
	var $get_idSP;
	var $get_idTVA;
	var $get_idTVACT;
	var $get_idHD;
	var $get_idCTHD;
	var $cart;
	var $sodong;
	var $tongsodong;
	var $ngaycapnhat;
	//Ham khoi tao
	public function __construct(){
		// ket noi csdl
		$this->SimpleDB_Connection();
		$this->table = NULL;
		$this->sql = NULL;
		$this->result = NULL;	
		$this->mod			= isset($_GET['mod']) ? $_GET['mod'] : '';
		$this->get_id 		= isset($_GET['id']) ? $_GET['id'] : '';
		$this->get_idTL 	= isset($_GET['idTL']) ? $_GET['idTL'] : '';
		$this->get_idTLC 	= isset($_GET['idTLC']) ? $_GET['idTLC'] : '';
		$this->get_idTLT 	= isset($_GET['idTLT']) ? $_GET['idTLT'] : '';
		$this->get_idTT 	= isset($_GET['idTT']) ? $_GET['idTT'] : '';
		$this->get_idDM 	= isset($_GET['idDM']) ? $_GET['idDM'] : '';
		$this->get_idDMC 	= isset($_GET['idDMC']) ? $_GET['idDMC'] : '';
		$this->get_idSP 	= isset($_GET['idSP']) ? $_GET['idSP'] : '';
		$this->get_idTVA 	= isset($_GET['idTVA']) ? $_GET['idTVA'] : '';
		$this->get_idTVACT 	= isset($_GET['idTVACT']) ? $_GET['idTVACT'] : '';
		$this->get_idHD 	= isset($_GET['idHD']) ? $_GET['idHD'] : '';
		$this->get_idCTHD 	= isset($_GET['idCTHD']) ? $_GET['idCTHD'] : '';
		$this->sodong 		= NULL;
		$this->tongsodong = 0;
		$now = getdate();
		$currentDate = $now["year"]."-".$now["mon"]."-".$now["mday"];
    	$currentTime = ($now["hours"]-1). ":" . $now["minutes"] . ":" . $now["seconds"];
		$this->ngaycapnhat = $currentDate.' '.$currentTime;
		//$this->cart		= $_SESSION['cart'];
	}
	
	//////////Ham doc du lieu:  tra ve mang mau tin trong bang
	/*function docDS($table) {
		$this->table = $table;
		$this->sql = "SELECT * FROM $this->table";
		$this->query($sql);
		$this->result =	$this -> loadAllRow();
		$this -> disconnect();
		return $this->result;
	}*/
	////////lay danh sach cac du lieu dua vao cau lenh truy van : SU DUNG CHO MOI TABLE
	function select_all_sql($sql) {
		$this->sql = $sql;
		$this->result = $this->query($this->sql);
		if (!$this->result) die($this->getError());
		if ($this->tongsodong = $this->result->getNumRows() == 0) die('Không thể kết nối');
		$this->disconnect();
		return $this->result;
	}
	function sodong()
        {
                $res = ($this->sodong ? $this->sodong : @mysql_num_rows($this->result));
                $this->sodong = $res;
                return $res;
        }
	////////////////////function limit_string() 2 tham so: chuoi va vi tri cat
	function limit_string($chuoi,$gioihan){
		if(strlen($chuoi)<=$gioihan)
		{
			return $chuoi;
		}
		else{
			/* 
			so sanh vi tri cat voi ki tu khoang trang dau tien trong chuoi ban dau tinh tu vi tri cat, neu vi tri khoang trang lon hon thi cat chuoi tai vi tri khoang trang do 
			*/
			if(strpos($chuoi," ",$gioihan) > $gioihan){
				$new_gioihan=strpos($chuoi," ",$gioihan);
				$new_chuoi = substr($chuoi,0,$new_gioihan)."...";
				return $new_chuoi;
			}
			// con lai
			$new_chuoi = substr($chuoi,0,$gioihan).".";
			return $new_chuoi;
		}
	}

	// Thong bao sau khi them thanh cong
	function upload_img($img_upload){
		if($img_upload){
			//echo ($img_upload.$_FILES["hinh"]["name"]);
			//if(!file_exists($img_upload.$_FILES["hinh"]["name"]))
				//move_uploaded_file($_FILES["hinh"]["tmp_name"],"$img_upload".$_FILES["hinh"]["name"]);
			//else
			return move_uploaded_file($_FILES["hinh"]["tmp_name"],$img_upload);
		}else{
			return false;
		}
	}
	function them_thanhcong($value1=FALSE,$value2=FALSE,$img_upload=FALSE){
		if($this->result) {
			//echo $img_upload;exit;
			if($img_upload!=FALSE)
				$this->upload_img($img_upload);
				echo "<script>alert('Thêm thành công');location.href='index.php?mod=$value1';</script>";
			}else{
				echo "<script>alert('Không thể thêm');location.href='index.php?mod=$value2';</script>";
		}	
	}
	// Thong bao sau khi sua thanh cong
	function sua_thanhcong($value1=FALSE,$value2=FALSE,$upload=FALSE){
		if($this->result) {
			if($upload!=FALSE)
				$this->upload_img($upload);
				//move_uploaded_file($_FILES["hinh"]["tmp_name"],"$upload".$_FILES["hinh"]["name"]);
				echo "<script>alert('Cập nhật thành công');location.href='index.php?mod=$value1';</script>";
			}else{
				echo "<script>alert('Không thể cập nhật');location.href='index.php?mod=$value2';</script>";
		}	
	}
	
///////////Xoa du lieu : SU DUNG CHO MOI TABLE
	
	function xoadl($table,$idtable,$get_idtable,$filename = FALSE,$where = FALSE) {
		$this->table = $table;
		$this->mod = $table;
		if($where == FALSE)
			$where = '';
			else
			$where = 'AND '.$where;
			
		$this->sql = "DELETE FROM $this->table WHERE $idtable=$get_idtable $where";
			//echo $this->sql; exit();
		$this->result = $this->query($this->sql);
		//echo $this->result->getNumRows(); exit();
		if($this->result) {
				echo "<script>alert('Xóa thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể xóa');location.href='index.php?mod=$this->mod';</script>";
			}
		if($filename!='') {$this->delfile($filename);
		}
		
		return $this->result;
	}
	
	function delfile($filename)
	{
		if(is_file($filename)){
			if (!unlink($filename)) 
				return false;
			else 
				return true;
		}
	}
	/////HAM TAO THU MUC mkdir
	function create_folder($path){
		if(!is_dir($path))
		{	
			mkdir($path);
			chmod($path,0775);
		}
	}
	function xoa_dulieu($table,$idtable,$get_idtable){
		switch($this->mod){
			case $table:
				return $this->xoadl($table,$idtable,$get_idtable);
			break;
		}
	}
	//kiem tra noi dung cho du khong ton tai du lieu
		function ktra_noidung($sql) {
		$this->sql = $sql;
		$this->result = $this->query($this->sql);
		$this->disconnect();
		return $this->result;
	}
	////////// them san pham
	function them_sanpham($tensanpham,$hinh,$gia,$idnhasanxuat,$soluong,$trichdan,$noidung,$idtheloai,$idtheloaicon,$conoibat,$conew,$active,$iddonvitinh) {
		$this->table = "sanpham";
		$this->mod = $_GET['mod'];
		$this->sql = "INSERT INTO $this->table(tensanpham,hinh,gia,idnhasanxuat,soluong,trichdan,noidung,ngaycapnhat,idtheloai,idtheloaicon,conoibat,conew,active,iddonvitinh) VALUES('$tensanpham','$hinh',$gia,'$idnhasanxuat','$soluong','$trichdan','$noidung','$this->ngaycapnhat','$idtheloai','$idtheloaicon','$conoibat','$conew','$active','$iddonvitinh') ";
		//bat buoc phai ton tai tensanpham, hinh va gia
		if($tensanpham && $hinh){
			print_r($this->sql);
			$this->result = $this->query($this->sql);
		}else{
			echo "Vui lòng điền đầy đủ thông tin bắt buộc";	
		}
	
		$upload = '../upload/picture/'.$hinh;
		//$upload = move_uploaded_file($_FILES["hinh"]["tmp_name"],"../upload/picture/".$_FILES["hinh"]["name"]);
		//$this->them_thanhcong($this->table,$this->mod,$upload);
		if($this->mod!='them_sanphamdacbiet')
			$this->them_thanhcong('sanpham','them_sanpham',$upload);
			else 
			$this->them_thanhcong('sanphamdacbiet','them_sanphamdacbiet',$upload);
		$this->disconnect();
	}
	///////////Cap nhat san pham
	function sua_sanpham($tensanpham,$hinh,$gia,$idnhasanxuat,$soluong,$trichdan,$noidung,$ngaycapnhat,$idtheloai,$idtheloaicon,$conoibat,$conew,$active,$iddonvitinh,$get_idSP) {
		$this->table = "sanpham";
		$this->mod = isset($_GET['mod']) ? $_GET['mod'] : '';
		if($hinh){
			$this->sql = "UPDATE $this->table SET 
												tensanpham 	= '$tensanpham',
												hinh		= '$hinh',
												gia			= '$gia',
												idnhasanxuat= '$idnhasanxuat',
												soluong		= '$soluong',
												trichdan	= '$trichdan',
												noidung		= '$noidung',
												ngaycapnhat	= '$ngaycapnhat',
												idtheloai	= '$idtheloai',
												idtheloaicon= '$idtheloaicon',
												conoibat	= '$conoibat',
												conew		= '$conew',
												active		= '$active',
												iddonvitinh	= '$iddonvitinh'
											WHERE idsanpham = $get_idSP";
			//bat buoc phai ton tai tensanpham va gia
			if($tensanpham){
				$this->result = $this->query($this->sql);
			}else{
				echo "Vui lòng điền đầy đủ thông tin bắt buộc";
			}
			$upload = move_uploaded_file($_FILES["hinh"]["tmp_name"],"../upload/picture/".$_FILES["hinh"]["name"]);
			if($this->mod	!= 'sua_sanphamdacbiet')
			$this->sua_thanhcong($this->table,$this->table,$upload);
			else 
			$this->sua_thanhcong('sanphamdacbiet','sanphamdacbiet',$upload);
		}else{
			$this->sql = "UPDATE $this->table SET 
												tensanpham 	= '$tensanpham',
												gia			= '$gia',
												idnhasanxuat= '$idnhasanxuat',
												soluong		= '$soluong',
												trichdan	= '$trichdan',
												noidung		= '$noidung',
												ngaycapnhat	= '$ngaycapnhat',
												idtheloai	= '$idtheloai',
												idtheloaicon= '$idtheloaicon',
												conoibat	= '$conoibat',
												conew		= '$conew',
												active		= '$active',
												iddonvitinh	= '$iddonvitinh'
											WHERE idsanpham = $get_idSP";
			//bat buoc phai ton tai tensanpham va gia
			if($tensanpham){
				$this->result = $this->query($this->sql);
			}else{
				echo "Vui lòng điền đầy đủ thông tin bắt buộc";	
			}
			if($this->mod	!= 'sua_sanphamdacbiet')
			$this->sua_thanhcong($this->table,$this->table);
			else 
			$this->sua_thanhcong('sanphamdacbiet','sanphamdacbiet');
		}
		$this->disconnect();
		return $this->result;
	}
	
	////////// them san pham
	function them_tintuc($tieude,$hinh,$trichdan,$noidung,$ngaycapnhat,$idtheloaitin,$idtheloaitincon,$active) {
		$this->mod = $this->table = "tintuc";
		$this->sql = "INSERT INTO $this->table(tieude,hinh,trichdan,noidung,ngaycapnhat,idtheloaitin,idtheloaitincon,active) VALUES('$tieude','$hinh','$trichdan','$noidung','$ngaycapnhat','$idtheloaitin','$idtheloaitincon','$active') ";
		//bat buoc phai ton tai tensanpham, hinh va gia
		if($tieude && $hinh){
			$this->result = $this->query($this->sql);
		}else{
			echo "Vui lòng điền đầy đủ thông tin bắt buộc";	
		}
	
		if($this->result) {
			move_uploaded_file($_FILES["hinh"]["tmp_name"],"../upload/tintuc/".$_FILES["hinh"]["name"]);
			echo "<script>alert('Thêm thành công');location.href='index.php?mod=$this->mod';</script>";
		}else{
			echo "<script>alert('Thêm thất bại');location.href='index.php?mod=them_$this->mod';</script>";
		}
		$this->disconnect();
	}
	///////////Cap nhat san pham
	function sua_tintuc($tieude,$hinh,$trichdan,$noidung,$ngaycapnhat,$idtheloaitin,$idtheloaitincon,$active) {
		$this->table = "tintuc";
		$this->mod = "sua_tintuc";
		if($hinh){
			$this->sql = "UPDATE $this->table SET 
												tieude 		= '$tieude',
												hinh		= '$hinh',
												trichdan	= '$trichdan',
												noidung		= '$noidung',
												ngaycapnhat = '$ngaycapnhat',
												idtheloaitin= '$idtheloaitin',
												idtheloaitincon= '$idtheloaitincon',
												active		= '$active' 
											WHERE idtintuc 	= $this->get_idTT";
			//bat buoc phai ton tai tensanpham va gia
			if($tieude){
				$this->result = $this->query($this->sql);
			}else{
				echo "Vui lòng điền đầy đủ thông tin bắt buộc";
			}
			
			if($this->result) {
				move_uploaded_file($_FILES["hinh"]["tmp_name"],"../upload/tintuc/".$_FILES["hinh"]["name"]);
				echo "<script>alert('cập nhật thành công');location.href='index.php?mod=$this->table';</script>";
			}else{
				echo "<script>alert('Không thể cập nhật');location.href='index.php?mod=$this->mod&idTT=$this->get_idTT';</script>";
			}
		}else{
			$this->sql = "UPDATE $this->table SET 
												tieude 		= '$tieude',
												trichdan	= '$trichdan',
												noidung		= '$noidung',
												ngaycapnhat = '$ngaycapnhat',
												idtheloaitin= '$idtheloaitin',
												idtheloaitincon= '$idtheloaitincon',
												active		= '$active'  
											WHERE idtintuc 	= $this->get_idTT";
			//bat buoc phai ton tai tensanpham va gia
			if($tieude){
				$this->result = $this->query($this->sql);
			}else{
				echo "Vui lòng điền đầy đủ thông tin bắt buộc";	
			}
			if($this->result) {
				echo "<script>alert('cập nhật thành công');location.href='index.php?mod=$this->table';</script>";
			}else{
				echo "<script>alert('Không thể cập nhật');location.href='index.php?mod=$this->mod&idTT=$this->get_idTT';</script>";
			}
		}
		$this->disconnect();
		return $this->result;
	}
	
	//////////Them the loai
	public function them_theloai($tieude,$url,$active,$sapxep){
		$strsql = "INSERT INTO theloai(tieude,url,active,sapxep) VALUES ('$tieude','$url','$active','$sapxep')";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Thêm thành công');location.href='index.php?mod=theloai';</script>";
			}else{
				echo "<script>alert('Không thể thêm');location.href='index.php?mod=theloai';</script>";
		}
		$this -> disconnect();
	}
	
	/////////Sua the loai
	public function sua_theloai($tieude,$url,$active,$sapxep,$get_idTL){
		$this->mod = 'theloai';
		$strsql = "UPDATE theloai SET 
		tieude 	='$tieude',
		url		= '$url',
		active	= '$active',
		sapxep	= '$sapxep'
		WHERE idtheloai = $get_idTL";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Sửa thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể sửa');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
		return $this->result;
	}
	//////////Them the loai con
	public function them_theloaicon($tieude,$url,$active,$sapxep,$get_idTL){
		$strsql = "INSERT INTO theloaicon(tieude,url,active,idtheloai,sapxep) VALUES ('$tieude','$url','$active','$get_idTL','$sapxep')";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Thêm thành công');location.href='index.php?mod=theloai';</script>";
			}else{
				echo "<script>alert('Không thể thêm');location.href='index.php?mod=theloai';</script>";
		}
		$this -> disconnect();
	}
	
	/////////Sua the loai con
	public function sua_theloaicon($tieude,$url,$active,$sapxep,$get_idTL,$get_idTLC){
		$this->mod = 'theloaicon';
		$strsql = "UPDATE theloaicon SET 
		tieude 	='$tieude',
		url		= '$url',
		active	= '$active',
		idtheloai='$get_idTL',
		sapxep	= '$sapxep'
		WHERE idtheloaicon = $get_idTLC";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Sửa thành công');location.href='index.php?mod=$this->mod&idTL=$this->get_idTL';</script>";
			}else{
				echo "<script>alert('Không thể sửa');location.href='index.php?mod=$this->mod&idTL=$this->get_idTL';</script>";
		}
		$this -> disconnect();
		return $this->result;
	}
	//////////Them the loai
	public function them_theloaitin($tieude,$url,$active,$sapxep){
		$this->mod = 'theloaitin';
		$strsql = "INSERT INTO theloaitin(tieude,url,active,sapxep) VALUES ('$tieude','$url','$active','$sapxep')";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Thêm thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể thêm');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
	}
	
	/////////Sua the loai tin
	public function sua_theloaitin($tieude,$url,$sapxep,$xoa,$active,$get_idTLT){
		$this->mod = 'theloaitin';
		$strsql = "UPDATE theloaitin SET 
		tieude 	='$tieude',
		url		= '$url',
		xoa		= '$xoa',
		active	= '$active',
		sapxep	= '$sapxep'
		WHERE idtheloaitin = $get_idTLT";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Sửa thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể sửa');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
		return $this->result;
	}
	//////////Them danh muc
	public function them_danhmuc($tieude,$url,$active,$vitri,$loaitintuc,$sapxep){
		//$active = int($active);
		//$sapxep = int($sapxep);
		//$vitri = int($vitri);
		$this->mod = 'danhmuc';
		$strsql = "INSERT INTO menu_horizontal(tieude,url,active,vitri,sapxep,loaitintuc) VALUES ('$tieude','$url','$active','$vitri','$sapxep','$loaitintuc')";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Thêm thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể thêm');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
	}
	
	/////////Sua the loai
	public function sua_danhmuc($tieude,$url,$active,$vitri,$sapxep,$loaitintuc,$get_idDM){
		$this->mod = 'danhmuc';
		$strsql = "UPDATE menu_horizontal SET 
		tieude 	='$tieude',
		url		= '$url',
		active	= '$active',
		vitri	= '$vitri',
		sapxep	= '$sapxep',
		loaitintuc	= '$loaitintuc'
		WHERE idmenu = $get_idDM";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Sửa thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể sửa');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
		return $this->result;
	}
	
	//////////Them danh muc
	public function them_danhmuccon($tieude,$url,$active,$vitri,$sapxep,$loaitintuc,$get_idDM){
		$this->mod = 'danhmuccon';
		$strsql = "INSERT INTO submenu_horizontal(tieude,url,active,vitri,sapxep,loaitintuc,idmenu) VALUES ('$tieude','$url','$active','$vitri','$sapxep','$loaitintuc','$get_idDM')";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Thêm thành công');location.href='index.php?mod=$this->mod&idDM=$get_idDM';</script>";
			}else{
				echo "<script>alert('Không thể thêm');location.href='index.php?mod=$this->mod&idDM=$get_idDM';</script>";
		}
		$this -> disconnect();
	}
	
	/////////Sua the loai
	public function sua_danhmuccon($tieude,$url,$active,$vitri,$sapxep,$loaitintuc,$get_idDM,$get_idDMC){
		$this->mod = 'danhmuccon';
		$strsql = "UPDATE submenu_horizontal SET 
		tieude 	='$tieude',
		url		= '$url',
		active	= '$active',
		vitri	= '$vitri',
		sapxep	= '$sapxep',
		loaitintuc = '$loaitintuc',
		idmenu  = '$get_idDM'
		WHERE idsubmenu = $get_idDMC";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Sửa thành công');location.href='index.php?mod=$this->mod&idDM=$this->get_idDM';</script>";
			}else{
				echo "<script>alert('Không thể sửa');location.href='index.php?mod=$this->mod&idDM=$this->get_idDM';</script>";
		}
		$this -> disconnect();
		return $this->result;
	}
	
	//////////Them gioithieu
	public function them_gioithieu($noidung,$active){
		$this->mod = 'gioithieu';
		$strsql = "INSERT INTO gioithieu(noidung,active) VALUES ('$noidung','$active')";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Thêm thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể thêm');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
	}
	/////////Sua gioithieu
	public function sua_gioithieu($noidung,$active){
		$this->mod = 'gioithieu';
		$strsql = "UPDATE gioithieu SET 
		noidung	= '$noidung',
		active		= '$active' ";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Sửa thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể sửa');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
		return $this->result;
	}

//////////Them gioithieu
	public function them_lienhe($noidung,$active){
		$this->mod = 'lienhe';
		$strsql = "INSERT INTO lienhe(noidung,active) VALUES ('$noidung','$active')";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Thêm thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể thêm');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
	}
	/////////Sua gioithieu
	public function sua_lienhe($noidung,$active){
		$this->mod = 'lienhe';
		$strsql = "UPDATE lienhe SET 
		noidung	= '$noidung',
		active		= '$active' ";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Sửa thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể sửa');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
		return $this->result;
	}
	////////// THEM DON HANG
	function them_donhang($hoten,$diachi,$email,$dienthoai,$fax,$ngaycapnhat,$idsanpham,$noidung) {
		$this->table = "donhang";
		$this->sql = "INSERT INTO $this->table(hoten,diachi,email,dienthoai,fax,ngaycapnhat,idsanpham,noidung) VALUES('$hoten','$diachi','$email','$dienthoai','$fax','$ngaycapnhat',$idsanpham,'$noidung')";
		//bat buoc phai ton tai tensanpham, hinh va gia
		if($hoten && $diachi && $dienthoai){
			$this->result = $this->query($this->sql);
		}else{
			echo "Vui lòng điền đầy đủ thông tin bắt buộc";	
			exit();
		}
		$this->disconnect();
		return $this->result;
	}
	///////////CAP NHAT DON HANG
	function sua_donhang($hoten,$diachi,$email,$dienthoai,$fax,$active,$get_idDH) {
		$this->table = "donhang";
		
		$this->sql = "UPDATE $this->table SET 
											hoten 		= '$hoten',
											diachi		= '$diachi',
											email		= '$email',
											dienthoai	= '$dienthoai',
											fax			= '$fax',
											active		= '$active'
											
										WHERE iddonhang = $get_idDH";
		//bat buoc phai ton tai tensanpham va gia
		if($hoten && $diachi && $dienthoai){
			$this->result = $this->query($this->sql);
		}else{
			echo "Vui lòng điền đầy đủ thông tin bắt buộc";	
		}
		if($this->result) {
			echo "<script>alert('cập nhật thành công');location.href='index.php?mod=$this->table';</script>";
		}else{
			echo "<script>alert('Không thể cập nhật');location.href='index.php?mod=$this->table';</script>";
		}
		
		$this->disconnect();
		return $this->result;
	}
	
	function them_donvitinh($tieude,$ghichu,$sapxep,$active){
		$this->mod = $this->table = 'donvitinh';	
		$this->sql = "INSERT INTO $this->table(tieude,ghichu,sapxep,active) VALUES('$tieude','$ghichu','$sapxep','$active')";
		$this->result = $this->query($this->sql);
		$this->them_thanhcong($this->table,$this->mod);
		$this->disconnect();
	}
	function sua_donvitinh($tieude,$ghichu,$sapxep,$active){
		$this->mod = $this->table = 'donvitinh';	
		$this->sql = "UPDATE $this->table SET
								tieude	= '$tieude',
								ghichu	= '$ghichu',
								sapxep	= '$sapxep',
								active	= '$active'
								WHERE iddonvitinh = $this->get_id";
		$this->result = $this->query($this->sql);
		$this->sua_thanhcong($this->table,$this->mod);
		$this->disconnect();
	}
	function them_nhasanxuat($tieude,$ghichu,$sapxep,$active){
		$this->mod = $this->table = 'nhasanxuat';	
		$this->sql = "INSERT INTO $this->table(tennhasanxuat,hinh,sapxep,active) VALUES('$tieude','$hinh','$sapxep','$active')";
		$this->result = $this->query($this->sql);
		
		$upload = move_uploaded_file($_FILES["hinh"]["tmp_name"],"../upload/nhasanxuat/".$_FILES["hinh"]["name"]);
		$this->them_thanhcong($this->table,$this->mod,$upload);
		$this->disconnect();
	}
	function sua_nhasanxuat($tieude,$hinh,$sapxep,$active){
		$this->mod = $this->table = 'nhasanxuat';
		if($hinh){	
		$this->sql = "UPDATE $this->table SET
								tennhasanxuat	= '$tieude',
								hinh			= '$hinh',
								sapxep			= '$sapxep',
								active			= '$active'
								WHERE idnhasanxuat = $this->get_id";
		$this->result = $this->query($this->sql);
		
		$upload ="../upload/nhasanxuat/";
		$this->sua_thanhcong($this->table,$this->mod,$upload);
		$this->disconnect();
		}else{ 
		$this->sql = "UPDATE $this->table SET
								tennhasanxuat	= '$tieude',
								sapxep			= '$sapxep',
								active			= '$active'
								WHERE idnhasanxuat = $this->get_id";	
		
		$this->result = $this->query($this->sql);
		$this->sua_thanhcong($this->table,$this->mod);
		$this->disconnect();
		}
		return true;
	}
	function them_thuvienanh($tieude,$hinh,$trichdan,$active){
		$hinh = rand(1000,1000000).$hinh;
		$this->mod = $this->table = 'thuvienanh';	
		$this->sql = "INSERT INTO $this->table(tieude,trichdan,hinh,ngaycapnhat,active) VALUES('$tieude','$trichdan','$hinh','$this->ngaycapnhat','$active')";
		$this->result = $this->query($this->sql);
		if($this->result){
			$path = "../upload/thuvienanh/".$hinh;
			if($path){
				//$upload = move_uploaded_file($_FILES["hinh"]["tmp_name"],"../upload/thuvienanh/".$_FILES["hinh"]["name"]);
				$this->them_thanhcong($this->table,$this->mod,$path);
				$this->disconnect();
			}
		}
	}
	function sua_thuvienanh($tieude,$hinh,$trichdan,$ngaycapnhat,$active){
		$this->mod = $this->table = 'thuvienanh';
		if($hinh){	
		$hinh = rand(1000,1000000).$hinh;
		$sql = "SELECT hinh FROM thuvienanh WHERE idthuvienanh=".$this->get_idTVA;
		$result = $this->query($sql);
		$row = $result->getNext();
		//$path_fileOld = "../upload/thuvienanh/thuvienanhchitiet/tenthumuc/";
		$path_fileOld = "../upload/thuvienanh/".$row[hinh];
		$this->delfile($path_fileOld);
		$this->sql = "UPDATE $this->table SET
								tieude			= '$tieude',
								trichdan		= '$trichdan',
								hinh			= '$hinh',
								ngaycapnhat		= '$ngaycapnhat',
								active			= '$active'
								WHERE idthuvienanh = $this->get_idTVA";
		$this->result = $this->query($this->sql);
		
		$upload ="../upload/thuvienanh/".$hinh;
		$this->sua_thanhcong($this->table,$this->mod,$upload);
		$this->disconnect();
		}else{ 
		$this->sql = "UPDATE $this->table SET
								tieude			= '$tieude',
								trichdan		= '$trichdan',
								ngaycapnhat		= '$ngaycapnhat',
								active			= '$active'
								WHERE idthuvienanh = $this->get_idTVA";	
		
		$this->result = $this->query($this->sql);
		$this->sua_thanhcong($this->table,$this->mod);
		$this->disconnect();
		}
		return true;
	}
	// THEM THU VIEN ANH CHI TIET
	/* 	if(thu vien anh)
	**	if(!folder thu vien anh: chua cac hinh anh chi tiet)
	**	create_folder(duong dan chua ten thu muc can tao)
	**	if(folder thu vien anh)
	**	Thuc hien upload va dua vao csdl (goi ham upload_img)
	**	The End.
	*/
	function them_thuvienanhchitiet($tieude,$hinh,$active){
		// tao random ten hinh khi upload len
		$hinh = $this->get_idTVA.rand(1000,1000000).$hinh;
		$this->table = 'thuvienanhchitiet';
		$this->mod =  'thuvienanhchitiet&idTVA='.$this->get_idTVA;
		$this->sql = "INSERT INTO $this->table(tieude,hinh,ngaycapnhat,idthuvienanh,active) VALUES('$tieude','$hinh','$this->ngaycapnhat','$this->get_idTVA','$active')";
		if($this->get_idTVA){
			$path = "../upload/thuvienanh/thuvienanhchitiet/".$this->get_idTVA."/";
			$this->create_folder($path);
			if($path){
				$this->result = $this->query($this->sql);
				$img_upload = $path.$hinh;
				$this->them_thanhcong($this->mod,$this->mod,$img_upload);
				$this->disconnect();
			}else{ return false; }
		}else{ echo "<font color='#FF0000'>Vui lòng chọn thư viện cần tạo</font>"; return false;}
		return true;
	}
	////SUA THU VIEN ANH CHI TIET
	function sua_thuvienanhchitiet($tieude,$hinh,$ngaycapnhat,$active){
		$this->table = 'thuvienanhchitiet';
		$this->mod =  'thuvienanhchitiet&idTVA='.$this->get_idTVA;
		if($hinh){	
		$hinh = $this->get_idTVA.rand(1000,1000000).$hinh;
			$sql = "SELECT hinh FROM thuvienanhchitiet WHERE idthuvienanhchitiet=".$this->get_idTVACT;
			$result = $this->query($sql);
			$row = $result->getNext();
			//$path_fileOld = "../upload/thuvienanh/thuvienanhchitiet/tenthumuc/";
			$path_fileOld = "../upload/thuvienanh/thuvienanhchitiet/".$this->get_idTVA."/".$row[hinh];
			$this->delfile($path_fileOld);
			if($result){
				//echo $path_fileOld;
				$this->sql = "UPDATE $this->table SET
										tieude			= '$tieude',
										hinh			= '$hinh',
										ngaycapnhat		= '$ngaycapnhat',
										active			= '$active'
										WHERE idthuvienanhchitiet = $this->get_idTVACT";
				if($this->get_idTVA){
					$path = "../upload/thuvienanh/thuvienanhchitiet/".$this->get_idTVA."/";
					$img_upload = $path.$hinh;
					if($path){					
						if($img_upload){
							$this->result = $this->query($this->sql);				
							$this->sua_thanhcong($this->mod,$this->mod,$img_upload);
							$this->disconnect();
						}
					}else {
						$this->create_folder($path);
						$this->result = $this->query($this->sql);				
						$this->sua_thanhcong($this->mod,$this->mod,$img_upload);
						$this->disconnect();	
					}
				}else{ 
					echo "<font color='#FF0000'>Vui lòng chọn thư viện cần tạo</font>"; return false;
				}
			}else{
				return false;	
			}
		}else{ 
				$this->sql = "UPDATE $this->table SET
										tieude			= '$tieude',
										ngaycapnhat		= '$ngaycapnhat',
										active			= '$active'
										WHERE idthuvienanhchitiet = $this->get_idTVACT";	
				
				$this->result = $this->query($this->sql);
				$this->sua_thanhcong($this->mod,$this->mod);
				$this->disconnect();
		}
	}
	/////////Sua hoa don
	public function sua_hoadon($hoten,$diachi,$email,$dienthoai,$fax,$soluong,$tongcong,$ykienkhachhang,$active){
		$this->mod = 'hoadon';
		$strsql = "UPDATE hoadon SET 
		hoten 			= '$hoten',
		diachi			= '$diachi',
		email			= '$email',
		dienthoai		= '$dienthoai',
		fax				= '$fax',
		soluong			= '$soluong',
		tongcong		= '$tongcong',
		ykienkhachhang 	= '$ykienkhachhang',
		active			= '$active'
		WHERE idhoadon = $this->get_idHD";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Sửa thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể sửa');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
		return $this->result;
	}
	//////////Them chi tiet hoa don
	public function them_chitiethoadon($tieude,$hinh,$gia,$soluong,$idsanpham){
		$this->mod = 'chitiethoadon'.'&idHD='.$this->get_idHD;
		echo $strsql = "INSERT INTO chitiethoadon(tieude,hinh,gia,soluong,idsanpham,idhoadon) VALUES ('$tieude','$hinh','$gia','$soluong','$idsanpham','$this->get_idHD')";
		$this->result = $this->query($strsql);
		if($this->result) {
				echo "<script>alert('Thêm thành công');location.href='index.php?mod=$this->mod';</script>";
			}else{
				echo "<script>alert('Không thể thêm');location.href='index.php?mod=$this->mod';</script>";
		}
		$this -> disconnect();
	}
}
?>