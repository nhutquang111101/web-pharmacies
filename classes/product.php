<?php
	include_once '../lib/database.php';
	include_once '../helper/format.php';
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

		public function insert_product($data, $file){

			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['types']);
            
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
		public function getproductbyId($id){
			$query ="SELECT * FROM tbl_product where productID = '$id'";
				$result = $this->db->select($query);
			return $result;
		}
		// public function update_catgeory($catName, $id){
		// 	$catName = $this->fm->validation($catName);

		// 	$catName = mysqli_real_escape_string($this->db->link, $catName);

		// 	$id = mysqli_real_escape_string($this->db->link, $id);

		// 	if(empty($catName)){
		// 		$alert = "<span class'error'>Không được để trống tên Danh Mục</span>";
		// 		return $alert;
		// 	}
		// 	else
		// 	{	
		// 		$query ="UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'";
		// 		$result = $this->db->update($query);

		// 		if($result){
		// 			$alert = "<span class'success'>Sửa Thành công danh mục</span>";
		// 			return $alert;
		// 		}
		// 		else
		// 		{
		// 			$alert = "<span class'error'>Sủa Không Thành công danh mục</span>";
		// 			return $alert;
		// 		}
		// 	}
		// }
		// public function delete_category($id){
		// 	$query ="DELETE FROM tbl_category where catId = '$id'";
		// 	$result = $this->db->delete($query);
		// 	if($result){
		// 		$alert = "<span class'success'>Xóa thành công danh mục</span>";
		// 		return $alert;
		// 	}
		// 	else{
		// 		$alert = "<span class'success'>Xóa không thành công danh mục</span>";
		// 		return $alert;
		// 	}
		// }
	}
?>