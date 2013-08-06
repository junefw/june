<?php 
// main index
//$cart = $_SESSION['cart'];
define('txt_admin','Administrator');
define('txt_phantrang','Phân trang');
define('txt_themmoi','Thêm mới');
function main() {
	$mod = isset($_GET['mod']) ? $_GET['mod'] : '';
	switch($mod) {
		case 'gioithieu':
			require_once('gioithieu.php');
		break;
		
		case 'dangkithanhvien':
			require_once('dangkithanhvien.php');
		break;
		
		case 'dangnhap':
			require_once('login_user.php');
		break;
		
		case 'thongtinkhachhang':
			require_once('thongtinkhachhang.php');
		break;
		
		case 'thanhtoanthanhcong':
			require_once('thanhtoanthanhcong.php');
		break;
		
		case 'thanhtoan':
			require_once('thanhtoan.php');
		break;
		
		case 'check_login':
			require_once('check_login_user.php');
		break;
		
		case 'thoat':
			require_once('thoat.php');
		break;
		
		case 'dangkithanhcong':
			require_once('dangkithanhvienOK.php');
		break;
			
		case 'thuvienanh':
			require_once('thuvienanh.php');
		break;
		
		case 'thuvienanhchitiet':
			require_once('thuvienanh_chitiet.php');
		break;
		
		case 'sanpham':
			require_once('sanpham.php');
		break;
		
		case 'chitietsanpham':
			require_once('chitietsanpham.php');
		break;
		
		case 'theloai':
			require_once('theloaisanpham.php');
		break;
		
		case 'theloaicon':
			require_once('theloaicon.php');
		break;
		
		case 'theloaitin':
			require_once('tintuc.php');
		break;
		
		case 'chitiettin':
			require_once('chitiettintuc.php');
		break;
		
		case 'khachhang':
			require_once('khachhang.php');
		break;
		
		case 'lienhe':
			require_once('lienhe.php');
		break;
		
		case 'dathang':
			require_once('dathang.php');
		break;
		
		case 'dathang_thanks':
			require_once('dathang_thanks.php');
		break;
		
		case 'search':
			require_once('ketqua_search.php');
		break;
			
		default: 
			require_once('homepage.php');
		break;
	}
}
// main administrator
function main_admin() {
	$mod = isset($_GET['mod']) ? $_GET['mod'] : '';
	switch($mod) {
		case 'xoa_dulieu':
			require_once('xoa_dulieu.php');
		break;
		
		case 'thuvienanh':
			require_once('thuvienanh.php');
		break;
		case 'them_thuvienanh':
			require_once('them_thuvienanh.php');
		break;
		case 'sua_thuvienanh':
			require_once('sua_thuvienanh.php');
		break;
		
		case 'thuvienanhchitiet':
			require_once('thuvienanhchitiet.php');
		break;
		case 'them_thuvienanhchitiet':
			require_once('them_thuvienanhchitiet.php');
		break;
		case 'sua_thuvienanhchitiet':
			require_once('sua_thuvienanhchitiet.php');
		break;
		
		case 'donvitinh':
			require_once('donvitinh.php');
		break;
		case 'them_donvitinh':
			require_once('them_donvitinh.php');
		break;
		case 'sua_donvitinh':
			require_once('sua_donvitinh.php');
		break;
		
		case 'gioithieu':
			require_once('gioithieu.php');
		break;
		
		case 'sanpham':
			require_once('sanpham.php');
		break;
		case 'sua_sanpham':
			require_once('sua_sanpham.php');
		break;
		case 'them_sanpham':
			require_once('them_sanpham.php');
		break;
		case 'xoa_sanpham':
			require_once('xoa_sanpham.php');
		break;
		
		case 'sanphamdacbiet':
			require_once('sanphamdacbiet.php');
		break;
		case 'sua_sanphamdacbiet':
			require_once('sua_sanpham.php');
		break;
		case 'them_sanphamdacbiet':
			require_once('them_sanpham.php');
		break;
		case 'xoa_sanphamdacbiet':
			require_once('xoa_sanpham.php');
		break;
		
		case 'nhasanxuat':
			require_once('nhasanxuat.php');
		break;
		case 'them_nhasanxuat':
			require_once('them_nhasanxuat.php');
		break;
		case 'sua_nhasanxuat':
			require_once('sua_nhasanxuat.php');
		break;
		
		case 'tintuc':
			require_once('tintuc.php');
		break;
		
		case 'sua_tintuc':
			require_once('sua_tintuc.php');
		break;
		
		case 'them_tintuc':
			require_once('them_tintuc.php');
		break;
		
		case 'xoa_tintuc':
			require_once('xoa_tintuc.php');
		break;
		
		case 'theloai':
			require_once('theloai.php');
		break;
		
		case 'them_theloai':
			require_once('them_theloai.php');
		break;
		
		case 'xoa_theloai':
			require_once('xoa_theloai.php');
		break;
		
		case 'sua_theloai':
			require_once('sua_theloai.php');
		break;
		
		case 'theloaicon':
			require_once('theloaicon.php');
		break;
		
		case 'them_theloaicon':
			require_once('them_theloaicon.php');
		break;
		
		case 'xoa_theloaicon':
			require_once('xoa_theloaicon.php');
		break;
		
		case 'sua_theloaicon':
			require_once('sua_theloaicon.php');
		break;
		
		case 'theloaitin':
			require_once('theloaitin.php');
		break;
		
		case 'them_theloaitin':
			require_once('them_theloaitin.php');
		break;
		
		case 'xoa_theloaitin':
			require_once('xoa_theloaitin.php');
		break;
		
		case 'sua_theloaitin':
			require_once('sua_theloaitin.php');
		break;
		
		
		case 'danhmuc':
			require_once('danhmuc.php');
		break;
		
		case 'them_danhmuc':
			require_once('them_danhmuc.php');
		break;
		
		case 'xoa_danhmuc':
			require_once('xoa_danhmuc.php');
		break;
		
		case 'sua_danhmuc':
			require_once('sua_danhmuc.php');
		break;
		
		case 'danhmuccon':
			require_once('danhmuccon.php');
		break;
		
		case 'them_danhmuccon':
			require_once('them_danhmuccon.php');
		break;
		
		case 'xoa_danhmuccon':
			require_once('xoa_danhmuccon.php');
		break;
		
		case 'sua_danhmuccon':
			require_once('sua_danhmuccon.php');
		break;
		
		case 'donhang':
			require_once('donhang.php');
		break;
		
		case 'them_donhang':
			require_once('them_donhang.php');
		break;
		
		case 'xoa_donhang':
			require_once('xoa_donhang.php');
		break;
		
		case 'sua_donhang':
			require_once('sua_donhang.php');
		break;
		
		case 'lienhe':
			require_once('lienhe.php');
		break;
		
		case 'login_success':
			require_once('login_success.php');
		break;
		
		case 'check_login':
			require_once('check_login.php');
		break;
		
		case 'thoat':
			require_once('thoat.php');
		break;
		
		case 'hoadon':
			require_once('hoadon.php');
		break;
		
		case 'sua_hoadon':
			require_once('sua_hoadon.php');
		break;
		case 'chitiethoadon':
			require_once('chitiethoadon.php');
		break;
		case 'them_chitiethoadon':
			require_once('them_chitiethoadon.php');
		break;
		/*case '':
			require_once('.php');
		break;
		
		case '':
			require_once('.php');
		break;
		
		case '':
			require_once('.php');
		break;
		*/
		default: 
			require_once('homepage.php');
		break;
	}
}
////////kiem tra vi tri
function check_position($vitri){
	switch($vitri){
		case '1':
			return "Header";
		break;
		
		case '2':
			return "Left";
		break;
		
		case '3':
			return "Right";
		break;
		
		case '4':
			return "Footer";
		break;
		
		default:
			return "No Position";
		break;
	}
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
function db_empty(){
	if($_GET['mod']=='search')
		$string = 'Không tìm thấy';
	else
	$string = 'Hiện chưa có dữ liệu';
	return '<div style="text-align:center;width:90%; margin-top:20px">'.$string.'</div>';
}

function sqlInjection($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

function thoat(){
	session_destroy();	
}
 
function search_highlight($needle, $replace, $haystack)
{
  $haystack = @eregi_replace($needle,$replace,$haystack); // ham thay the $needle == $replace trong chuoi $haystack
 return $haystack;
}
function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return 'Hiện có <span class="mautrang">0 sản phẩm</span>';
	} else {
		// Parse the cartsession variable
		$items = explode(',',$cart);
		//$s = (count($items) > 1) ? 's':'';
		return '<p style="margin-top:0;">Hiện có <a href="index.php?mod=dathang" style="color:#FFF;">'.count($items).' sản phẩm</a></p>';
	}
}
function checkout_qty(){
	$cart 	= $_SESSION['cart'];
	$items 	= explode(',',$cart);
	return 	count($items);
}

function showCart() {
	global $xldl;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		$total = '';
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="index.php?mod=dathang&amp;action=update" method="post" id="cart">';
		$output[] = '<table>';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM sanpham WHERE idsanpham = '.sqlInjection($id,'int');
			$result = $xldl->query($sql);
			$row = $result->getNext();
			$gia = $row['gia'];
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td style="text-align:center !important;"><a href="index.php?mod=dathang&amp;action=delete&idSP='.$id.'" class="r">Xóa</a></td>';
			$output[] = '<td><a href="index.php?mod=chitietsanpham&idSP='.$id.'">'.$tensanpham.'</a></td>';
			$output[] = '<td><img src="upload/picture/'.$hinh.'" alt=".'.$tensanpham.'" title="'.$tensanpham.'" width=100 height=80 /></td>';
			$output[] = '<td>'.number_format(($gia),'0','.','.').' VNĐ</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>'.number_format(($gia * $qty),'0','.','.').' VNĐ</td>';
			$total += $gia * $qty;
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>Tổng cộng: <strong>'.number_format($total,'0','.','.').' VNĐ</strong></p>';
		$output[] = '<div style="float:left; margin:1em" class="buttons"><a href="index.php?mod=thongtinkhachhang">Thanh toán</a></div>';
		$output[] = '<div style="float:left;" class="buttons"><button type="submit" class="positive">Cập nhật</button></div>';
		$output[] = '<div style="float:right;"><a href="index.php">>> Tiếp tục Đặt hàng </a></div>';
		$output[] = '</form>';
		$output[] = '<div class="cl_both"></div>';
	} else {
		$output[] = '<p>Hiện chưa có sản phẩm.</p>';
	}
	return join('',$output);
}
function create_order($hoten,$diachi,$email,$dienthoai,$fax,$soluong,$tongcong,$ykienkhachhang,$idthanhvien){
	global $xldl;
		$sql = "INSERT INTO hoadon(hoten,diachi,email,dienthoai,fax,soluong,tongcong,ykienkhachhang,idthanhvien) 
		VALUES('$hoten','$diachi','$email','$dienthoai','$fax','$soluong','$tongcong','$ykienkhachhang','$idthanhvien')";
	return $result = $xldl->query($sql);
}

function create_orderDetail(){
	global $xldl;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
			$sql_hoadon = 'SELECT idhoadon FROM hoadon ORDER BY idhoadon DESC';
			$result_hoadon = $xldl->query($sql_hoadon);
			$row_hoadon = $result_hoadon->getNext();
			//print_r($result_hoadon);
			$idhoadon = $row_hoadon['idhoadon'];
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM sanpham WHERE idsanpham = '.sqlInjection($id,int);
			$result = $xldl->query($sql);
			$row = $result->getNext();
			//$gia = $row[gia];
			extract($row);
				$sql = "INSERT INTO chitiethoadon(tieude,hinh,gia,soluong,idsanpham,idhoadon)
				VALUES('".$tensanpham."','".$hinh."','".$gia."','".$qty."','".$id."','".$idhoadon."')";
				$result = $xldl->query($sql);
			}
	}
	return;
}
function checkout_total() {
	global $xldl;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM sanpham WHERE idsanpham = '.sqlInjection($id,int);
			$result = $xldl->query($sql);
			$row = $result->getNext();
			//$gia = $row[gia];
			extract($row);
			$total += $gia * $qty;
			
		}
	}
	return $total;
}
function checkout_showcart() {
	global $xldl;
	$cart = $_SESSION['cart'];
	$total = '';
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<table>';
		$output[] = '<tr>';
			$output[] = '<td><strong>Tên sản phẩm</strong></td>';
			$output[] = '<td><strong>Hình</strong></td>';
			$output[] = '<td><strong>Giá</strong></td>';
			$output[] = '<td><strong>Số lượng</strong></td>';
			$output[] = '<td><strong>Thành tiền</strong></td>';
			$output[] = '</tr>';
			$output[] = '<tr><td colspan="5"><div style="border-bottom:1px solid #ccc; width:100%;"></div></td></tr>';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM sanpham WHERE idsanpham = '.sqlInjection($id,'int');
			$result = $xldl->query($sql);
			$row = $result->getNext();
			//$gia = $row[gia];
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td><a href="index.php?mod=chitietsanpham&idSP='.$id.'">'.$tensanpham.'</a></td>';
			$output[] = '<td><img src="upload/picture/'.$hinh.'" alt=".'.$tensanpham.'" title="'.$tensanpham.'" width=100 height=80 /></td>';
			$output[] = '<td>'.number_format(($gia),'0','.','.').' VNĐ</td>';
			$output[] = '<td>'.$qty.'</td>';
			$output[] = '<td>'.number_format(($gia * $qty),'0','.','.').' VNĐ</td>';
			$total += $gia * $qty;
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>Tổng cộng: <strong>'.number_format($total,'0','.','.').' VNĐ</strong></p>';
		$output[] = '<div class="cl_both"></div>';
	} else {
		$output[] = '<p>Hiện chưa có sản phẩm.</p>';
	}
	return join('',$output);
}
?>