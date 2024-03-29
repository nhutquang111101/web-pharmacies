<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>

<?php
	/**
	 * 
	 */
	class brand
	{

		private $db;
		private $fm;

		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function search_brand($keyword){
			$keyword = $this->fm->validation($keyword);
			$query = "SELECT * FROM tbl_brand WHERE brandName LIKE '%$keyword%'";
			$result = $this->db->select($query);
			return $result;
		}

		public function insert_brand($brandName){
			$brandName = $this->fm->validation($brandName);

			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			$date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');

			if(empty($brandName)){
				$alert = "<span class='error'>Không được để trống tên thương hiệu</span>";
				return $alert;
			}
			else
			{	
				$query ="INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
				$result = $this->db->insert($query);

				if($result){
					//audit hanh dong
					$insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Thêm Thương Hiệu','".$date_string."')";
					$result_audit = $this->db->insert($insert_audit);    
					
					if($result_audit){
						echo "Lưu Thành công hành động";
					}
					
					else{
						echo "Không Bắt được hành động";
					}
					$alert = "<span class='success'>Thêm Thành công thương hiệu</span>";
					return $alert;
				}
				else
				{
					$alert = "<span class='error'>Thêm Không Thành công thương hiệu</span>";
					return $alert;
				}
			}
		}

		public function show_brand(){
			// sắp xếp giảm dần
			$query ="SELECT * FROM tbl_brand order by brandId desc ";
				$result = $this->db->select($query);
			return $result;
		}
		public function getbrandbyId($id){
			$query ="SELECT * FROM tbl_brand where brandId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_brand($brandName, $id){
			$brandName = $this->fm->validation($brandName);

			$brandName = mysqli_real_escape_string($this->db->link, $brandName);

			$id = mysqli_real_escape_string($this->db->link, $id);

			$date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');

			if(empty($brandName)){
				$alert = "<span class='error'>Không được để trống tên thương hiệu</span>";
				return $alert;
			}
			else
			{	
				$query ="UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
				$result = $this->db->update($query);

				if($result){
					//audit hanh dong
					$insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Cập Nhật Thương Hiệu','".$date_string."')";
					$result_audit = $this->db->insert($insert_audit);    
					
					if($result_audit){
						echo "Lưu Thành công hành động";
					}
					
					else{
						echo "Không Bắt được hành động";
					}
					$alert = "<span class='success'>Sửa Thành công thương hiệu</span>";
					return $alert;
				}
				else
				{
					$alert = "<span class='error'>Sủa Không Thành công thương hiệu</span>";
					return $alert;
				}
			}
		}
		public function delete_brand($id){
			$query ="DELETE FROM tbl_brand where brandId = '$id'";
			$result = $this->db->delete($query);
			$date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');
			if($result){
					//audit hanh dong
					$insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Xóa Thương Hiệu','".$date_string."')";
					$result_audit = $this->db->insert($insert_audit);    
					
					if($result_audit){
						echo "Lưu Thành công hành động";
					}
					
					else{
						echo "Không Bắt được hành động";
					}
				$alert = "<span class'success'>Xóa thành công thương hiệu</span>";
				return $alert;
			}
			else{
				$alert = "<span class'success'>Xóa không thành công thương hiệu</span>";
				return $alert;
			}
		}
	}
?>