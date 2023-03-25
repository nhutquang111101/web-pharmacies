<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>

<?php
	/**
	 * 
	 */
	class cart
	{

		private $db;
		private $fm;

		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function add_to_cart($id,$quantity){

			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$query = "SELECT * FROM tbl_product WHERE productID = '$id'";
			$result = 	$this->db->select($query)->fetch_assoc();
			
			$producName = $result['productName'];
			$price = $result['price'];
			$image = $result['image_product'];

			$check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId = '$sId'";
			$query_cart = 	$this->db->select($check_cart);
			if($query_cart){
				$msg = "San Pham Da duoc them vao Gio hang";
				return $msg;
			}
			else
			{
				$query_insert ="INSERT INTO tbl_cart(productId, sId, productName, price,quantity, image)
				VALUES('$id', '$sId','$producName','$price','$quantity','$image')";
			   $result_cart = $this->db->insert($query_insert);
	
			   if($result_cart){
					header('Location: cart.php');
			   }
			   else
			   {
					header('Location: 404.php');
			   }
			}
		}

		public function get_product_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_quantity_cart($quantity,$cartId){
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span>Cap Nhat So Luong hang Hoa Thanh Cong</span>";
				return $msg;
			}
			else
			{
				$msg = "<span>Cap Nhat So Luong hang Hoa Khong Thanh Cong</span>";
				return $msg;
			}
			
		}

		public function delete_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				header("Location: cart.php");
			}
			else
			{
				$msg = "<span>Xóa mặt hàng không thành công...!!!!!!</span>";
				return $msg;
			}
		}

		public function cart_check(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function dele_all_data_cart(){
			$sId = session_id();
			// $cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->delete($query);
			if($result){
				header("Location: cart.php");
			}
			else
			{
				$msg = "<span>Xóa mặt hàng không thành công...!!!!!!</span>";
				return $msg;
			}
		}

		public function insertOrders($customer_id){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$getproduct = $this->db->select($query);
			if($getproduct){
				while($result = $getproduct->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;	
					$image = $result['image'];
					$idCustomer = $customer_id;

					$query_order ="INSERT INTO tbl_order(productId, productName	, customer_id, quantity, price, image)
					VALUES('$productid', '$productName','$idCustomer','$quantity','$price','$image')";
				   	$result_order = $this->db->insert($query_order);
				}
			}
		}

		public function getAmountPrice($customer_id){
			$query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id' AND date_order = now()";
			$get_price = $this->db->select($query);
			return $get_price;
		}

		public function get_carts_ordered($customer_id){
			$query_order_detail = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
			$get_order_detail = $this->db->select($query_order_detail);
			return $get_order_detail;
		}

		public function order_check($customer_id){
			// $sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_inbox_cart(){
			$query = "SELECT * FROM tbl_order Order BY date_order";
			$result = $this->db->select($query);
			return $result;
		}
		public function shifted($id, $time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "UPDATE tbl_order SET status = '1' WHERE id_order = '$id' AND date_order = '$time' AND price = '$price'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span>Cập nhật tình trạng hàng hóa Thành Công</span>";
				return $msg;
			}
			else
			{
				$msg = "<span>Cập nhật tình trạng hàng hóa không Thành Công</span>";
				return $msg;
			}
		}

		public function del_shifted($id, $time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "DELETE FROM tbl_order WHERE id_order = '$id' AND date_order = '$time' AND price = '$price'";
			$result = $this->db->delete($query);
			if($result){
				$msg = "<span>Xóa đơn hàng Thành Công</span>";
				return $msg;
			}
			else
			{
				$msg = "<span>Xóa đơn hàng không Thành Công</span>";
				return $msg;
			}
		}
		public function Confirm_shifted($id, $time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "UPDATE tbl_order SET status = '2' WHERE customer_id = '$id' AND date_order = '$time' AND price = '$price'";
			$result = $this->db->update($query);
			return $result;
			// if($result){
			// 	$msg = "<span>Xóa đơn hàng Thành Công</span>";
			// 	return $msg;
			// }
			// else
			// {
			// 	$msg = "<span>Xóa đơn hàng không Thành Công</span>";
			// 	return $msg;
			// }
		}
	}
?>