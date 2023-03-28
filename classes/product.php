<?php
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>

<?php
	/**
	 * 
	 */
	class product
	{

		private $db;
		private $fm;

		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function search_product($keyword){
			$keyword = $this->fm->validation($keyword);
			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
			
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE productName LIKE '%$keyword%'
			 order by tbl_product.productId ";
			$result = $this->db->select($query);
			return $result;
		}
		public function insert_product($data, $file){

			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['types']);

			$date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');
            //kiem tra hinh anh va lay hinh anh tu may cho vao upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name= $_FILES['image_product']['name'];
            $file_size= $_FILES['image_product']['size'];
            $file_temp= $_FILES['image_product']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;



			if($productName == "" || $category == "" || $brand == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == ""){
				$alert = "<span class'error'>Không được để trống các trường</span>";
				return $alert;
			}
			else
			{	
                move_uploaded_file($file_temp, $uploaded_image);
				$query ="INSERT INTO tbl_product(productName, catId, brandId, product_desc,types, price, image_product)
                 VALUES('$productName', '$category','$brand','$product_desc','$type','$price','$unique_image')";
				$result = $this->db->insert($query);

				if($result){
					//audit hanh dong
					$insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Thêm Sản Phẩm','".$date_string."')";
					$result_audit = $this->db->insert($insert_audit);    
					
					if($result_audit){
						echo "Lưu Thành công hành động";
					}
					
					else{
						echo "Không Bắt được hành động";
					}
					$alert = "<span class'success'>Thêm Thành công sản phẩm</span>";
					return $alert;
				}
				else
				{
					$alert = "<span class'error'>Thêm Không Thành công sản phẩm</span>";
					return $alert;
				}
			}
		}

		public function insert_slider($data, $file){
			$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
			$date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');
            //kiem tra hinh anh va lay hinh anh tu may cho vao upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name= $_FILES['slider_image']['name'];
            $file_size= $_FILES['slider_image']['size'];
            $file_temp= $_FILES['slider_image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
			

			if($sliderName == "" || $type == "" ){
				$alert = "<span class'error'>Không được để trống các trường</span>";
				return $alert;
			}
			else{
				if(!empty($file_name)){
					//neu nguoi dung chon file hinh anh
					if($file_size > 1048567){
						 $alert ="<span class='error'>Hinh Anh phai thap hon 1MB</span>";
						 return $alert;
					}
					elseif(in_array($file_ext, $permited) == false){
						$alert = "<span class='error'>You Can Upload  Only:-".implode(',', $permited)."</span>";
						return $alert;
					}
					move_uploaded_file($file_temp, $uploaded_image);
					$query ="INSERT INTO tbl_slider(sliderName, slider_image, type)
                 	VALUES('$sliderName','$unique_image', '$type')";
					$result = $this->db->insert($query);

					if($result){
						//audit hanh dong
					$insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Thêm slider','".$date_string."')";
					$result_audit = $this->db->insert($insert_audit);    
					
					if($result_audit){
						echo "Lưu Thành công hành động";
					}
					
					else{
						echo "Không Bắt được hành động";
					}
						$alert = "<span class'success'>Thêm Thành công Slider</span>";
						return $alert;
					}
					else
					{
						$alert = "<span class'error'>Thêm Không Thành công Slider/span>";
						return $alert;
					}
				}
				
			}
		}

		public function show_product(){
			// sắp xếp giảm dần
			// $query ="SELECT * FROM tbl_product order by productId desc ";
			$query ="SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
			
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
			 INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			  order by tbl_product.productId desc ";
				$result = $this->db->select($query);
			return $result;
		}

		public function getSlider(){
			$query ="SELECT * FROM tbl_slider where type = 1 order by sliderId desc";
				$result = $this->db->select($query);
			return $result;
		}

		public function getSliderAdmin(){
			$query ="SELECT * FROM tbl_slider order by sliderId desc";
				$result = $this->db->select($query);
			return $result;
		}

		public function getproductbyId($id){
			$query ="SELECT * FROM tbl_product where productID = '$id'";
				$result = $this->db->select($query);
			return $result;
		}

		public function updateSlider($id, $type){
			$type = mysqli_real_escape_string($this->db->link, $type);
			$query ="UPDATE tbl_slider SET type = '$type' where sliderId = '$id'";
			$result = $this->db->update($query);
			return $result;
		}

		public function update_product($data,$file, $id){
			
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['types']);
			$date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');
            //kiem tra hinh anh va lay hinh anh tu may cho vao upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name= $_FILES['image_product']['name'];
            $file_size= $_FILES['image_product']['size'];
            $file_temp= $_FILES['image_product']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
			

			if($productName == "" || $category == "" || $brand == "" || $product_desc == "" || $price == "" || $type == ""){
				$alert = "<span class'error'>Không được để trống các trường</span>";
				return $alert;
			}
			else{
				if(!empty($file_name)){
					//neu nguoi dung chon file hinh anh
					if($file_size > 1048567){
						 $alert ="<span class='error'>Hinh Anh phai thap hon 1MB</span>";
						 return $alert;
					}
					elseif(in_array($file_ext, $permited) == false){
						$alert = "<span class='error'>You Can Upload  Only:-".implode(',', $permited)."</span>";
						return $alert;
					}
					move_uploaded_file($file_temp, $uploaded_image);
					$query ="UPDATE tbl_product SET
					 productName = '$productName',
					 brandId = '$brand',
					 catId = '$category',
					 product_desc = '$product_desc',
					 types = '$type',
					 image_product = '$unique_image',
					 price = '$price'
					WHERE productID = '$id'";
				}else{
					//neu nguoi dung khong chon file 
					$query ="UPDATE tbl_product SET
					 productName = '$productName',
					 brandId = '$brand',
					 catId = '$category',
					 product_desc = '$product_desc',
					 types = '$type',
					 price = '$price'
					WHERE productID = '$id'";
				}
				
				$result = $this->db->update($query);

				if($result){
					//audit hanh dong
					$insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Cập Nhật Sản Phẩm','".$date_string."')";
					$result_audit = $this->db->insert($insert_audit);    
					
					if($result_audit){
						echo "Lưu Thành công hành động";
					}
					
					else{
						echo "Không Bắt được hành động";
					}
					$alert = "<span class'success'>Sửa Thành công San Pham</span>";
					return $alert;
				}
				else
				{
					$alert = "<span class'error'>Sủa Không Thành công San Pham</span>";
					return $alert;
				}
			
			}
		
		}
		public function delete_product($id){
			$query ="DELETE FROM tbl_product where productID = '$id'";
			$result = $this->db->delete($query);
			$date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');
			if($result){
				//audit hanh dong
				$insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Xóa Sản Phẩm','".$date_string."')";
				$result_audit = $this->db->insert($insert_audit);    
				
				if($result_audit){
					echo "Lưu Thành công hành động";
				}
				
				else{
					echo "Không Bắt được hành động";
				}
				$alert = "<span class'success'>Xóa thành công San Pham</span>";
				return $alert;
			}
			else{
				$alert = "<span class'success'>Xóa không thành công San Pham</span>";
				return $alert;
			}
		}

		public function delSlider($id){
			$query ="DELETE FROM tbl_slider where sliderId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class'success'>Xóa thành công Slider</span>";
				return $alert;
			}
			else{
				$alert = "<span class'success'>Xóa không thành công Slider</span>";
				return $alert;
			}
		}

		public function delete_wishlist($proid, $customer_id){
			$query ="DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id = '$customer_id'";
			$result = $this->db->delete($query);
			return $result;
			// if($result){
			// 	$alert = "<span class'success'>Xóa thành công San Pham</span>";
			// 	return $alert;
			// }
			// else{
			// 	$alert = "<span class'success'>Xóa không thành công San Pham</span>";
			// 	return $alert;
			// }
		}
	
		//end backend
		public function getproduct_feathered(){
			$sp_tungtrang = 4;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tung_trang = ($trang - 1)*$sp_tungtrang;
			$query = "SELECT * FROM tbl_product WHERE types = '1' order by productID desc LIMIT $tung_trang,$sp_tungtrang";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproduct_new(){
			$sp_tungtrang = 4;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tung_trang = ($trang - 1)*$sp_tungtrang;
			$query = "SELECT * FROM tbl_product order by productID desc LIMIT $tung_trang,$sp_tungtrang";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_all_product(){
			
			$query = "SELECT * FROM tbl_product";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_details($id){
			$query ="SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
			 INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			  WHERE  tbl_product.productID = '$id'";
				$result = $this->db->select($query);
			return $result;
		}

		public function getLastestDell(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '1' order by productID desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getLastestSamSung(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '2' order by productID desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestDeplple(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '7' order by productID desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestApple(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '6' order by productID desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		
		public function insert_compare($productid,$customer_id){
			$productid = mysqli_real_escape_string($this->db->link, $productid);
            $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

			$query = "SELECT * FROM tbl_product WHERE productID = '$productid'";
			$result = 	$this->db->select($query)->fetch_assoc();
			
			$producName = $result['productName'];
			$price = $result['price'];
			$image = $result['image_product'];

			$query_product = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id = '$customer_id'";
			$result_product = 	$this->db->select($query_product);
			if($result_product){
				$msg = "Sản Phẩm đã thêm vào Mục So Sánh";
				return $msg;
			}
			else
			{
				$query_insert ="INSERT INTO tbl_compare(customer_id, productId, productName, price,	image)
				VALUES('$customer_id', '$productid','$producName','$price','$image')";
			   $result_cart = $this->db->insert($query_insert);
	
			   if($result_cart){
					$alert = "<span class'success'>Thêm vào so sánh thành công</span>";
					return $alert;
			   }
			   else
			   {
					$alert = "<span class'success'>Thêm vào so sánh không thành công</span>";
					return $alert;
			   }
			}
		}
		public function insert_wishlist($productid,$customer_id){
			$productid = mysqli_real_escape_string($this->db->link, $productid);
            $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

			$query = "SELECT * FROM tbl_product WHERE productID = '$productid'";
			$result = 	$this->db->select($query)->fetch_assoc();
			
			$producName = $result['productName'];
			$price = $result['price'];
			$image = $result['image_product'];

			$query_wishlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id = '$customer_id'";
			$result_wishlist= 	$this->db->select($query_wishlist);
			if($result_wishlist){
				$msg = "Sản Phẩm đã thêm vào Mục Yêu Thích";
				return $msg;
			}
			else
			{
				$query_insert ="INSERT INTO tbl_wishlist(customer_id, productId, productName, price,image)
				VALUES('$customer_id', '$productid','$producName','$price','$image')";
			  	 $result_wishlist = $this->db->insert($query_insert);
	
			   if($result_wishlist){
					$alert = "<span class'success'>Thêm vào yêu thích thành công</span>";
					return $alert;
			   }
			   else
			   {
					$alert = "<span class'success'>Thêm vào yêu thích không thành công</span>";
					return $alert;
			   }
			}
		}

		public function get_Compare_product($customer_id){
			$query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_id' order by id_compare desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_Wishlist($customer_id){
			$query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id' order by id_wishlist desc";
			$result = $this->db->select($query);
			return $result;
		}

	}
?>