<?php 
require_once('database.php');
////////////LOP XU LY NGHIEP VU KE THUA TU LOP DATABASE
class xlnv extends db_Connection {
	var $table;
	var $sql;
	var $mod;
	var $result;
	var $get_id;
	var $get_idTL;
	var $get_idTLC;
	var $get_idDM;
	var $get_idDMC;
	//Ham khoi tao
	public function __construct(){
		// ket noi csdl
		$this->SimpleDB_Connection();
		$this->table = NULL;
		$this->sql = NULL;
		$this->result = NULL;	
		$this->mod	= NULL;
		$this->get_id = $_GET['id'];
		$this->get_idTL = $_GET['idTL'];
		$this->get_idTLC = $_GET['idTLC'];
		$this->get_idDM = $_GET['idDM'];
		$this->get_idDMC = $_GET['idDMC'];
	}
	function writeShoppingCart() {
		$cart = $_SESSION['cart'];
		if (!$cart) {
			return 'Hiện có <span class="mautrang">0 sản phẩm</span>';
		} else {
			// Parse the cartsession variable
			$items = explode(',',$cart);
			//$s = (count($items) > 1) ? 's':'';
			return '<p>Hiện có <a href="index.php?mod=dathang" style="color:#FFF;">'.count($items).'sản phẩm</a></p>';
		}
	}

	function showCart() {
		//global $db;
		$cart = $_SESSION['cart'];
		if ($cart) {
			$items = explode(',',$cart);
			$contents = array();
			foreach ($items as $item) {
				$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
			}
			$output[] = '<form action="index.php?mod=dathang&amp;action=update" method="post" id="cart">';
			$output[] = '<table>';
			foreach ($contents as $id=>$qty) {
				$sql = 'SELECT * FROM sanpham WHERE idsanpham = '.$id;
				//print_r($sql);
				$query_cart = $this->query($sql);
				$row		= $query_cart->getNext();
				//$result = $db->query($sql);
				//$row = $result->fetch();
				extract($row);
				$output[] = '<tr>';
				$output[] = '<td><a href="index.php?mod=dathang&amp;action=delete&id='.$id.'" class="r">Xóa</a></td>';
				$output[] = '<td>'.$title.' by '.$author.'</td>';
				$output[] = '<td>&pound;'.$price.'</td>';
				$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
				$output[] = '<td>'.($price * $qty).' VNĐ</td>';
				$total += $price * $qty;
				$output[] = '</tr>';
			}
			$output[] = '</table>';
			$output[] = '<p>Tổng cộng: <strong>'.$total.' VNĐ</strong></p>';
			$output[] = '<div style="float:left;"><button type="submit">Cập nhật</button></div>';
			$output[] = '<div style="float:right;"><a href="index.php">Tiếp tục Đặt hàng</a></div>';
			$output[] = '</form>';
		} else {
			$output[] = '<p>Hiện chưa có sản phẩm.</p>';
		}
		return join('',$output);
	}
	
}
?>
