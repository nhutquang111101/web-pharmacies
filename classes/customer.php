<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>

<?php
	/**
	 * 
	 */
	class customer
	{

		private $db;
		private $fm;
        
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

        public function insert_Comment(){
            $nameCustomer = $_POST['nameComment'];
            $productId = $_POST['product_id_Comment'];
            $content = $_POST['comment'];
            $date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');
            echo $productId;
            echo $nameCustomer;
            echo $content;
            if($nameCustomer == "" || $productId == "" || $content == "" ){
				$alert = "<span class'error'>Không được để trống các trường</span>";
				return $alert;
			}else{
                    $query = "INSERT INTO tbl_comment(customerName, content, productId)VALUES('$nameCustomer', '$content', '$productId')";
                    $result = $this->db->insert($query);
                    if($result){

                        $insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Thêm Bình Luận ','".$date_string."')";
                        $result_audit = $this->db->insert($insert_audit);    
                        
                        if($result_audit){
                            echo "Lưu Thành công hành động";
                        }
                        
                        else{
                            echo "Không Bắt được hành động";
                        }
                        $alert = "<span class'error'>Bình Luận sẽ được admin kiểm duyệt</span>";
                        return $alert;
                    }
                    else
                    {
                        $alert = "<span class'error'>Bình Luận không thành công....!!!</span>";
                        return $alert;
                    }
            }
        }

        public function delete_Comment($id){
			$query ="DELETE FROM tbl_comment where id_comment  = '$id'";
			$result = $this->db->delete($query);
			$date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');
			if($result){
					//audit hanh dong
					$insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Xóa Bình Luận','".$date_string."')";
					$result_audit = $this->db->insert($insert_audit);    
					
					if($result_audit){
						echo "Lưu Thành công hành động";
					}
					
					else{
						echo "Không Bắt được hành động";
					}
				$alert = "<span class'success'>Xóa thành công Bình Luận</span>";
				return $alert;
			}
			else{
				$alert = "<span class'success'>Xóa không thành công Bình Luận</span>";
				return $alert;
			}
		}

        public function show_comment(){
			// sắp xếp giảm dần
			$query ="SELECT * FROM tbl_comment order by id_comment desc ";
				$result = $this->db->select($query);
			return $result;
		}

        public function update_comment($id){
			$id = mysqli_real_escape_string($this->db->link, $id);

			$query = "UPDATE tbl_comment SET status = '1' WHERE id_comment = '$id'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span>Cập nhật trạng thái bình luận Thành Công</span>";
				return $msg;
			}
			else
			{
				$msg = "<span>Cập nhật trạng thái bình luận không Thành Công</span>";
				return $msg;
			}
		}
        public function insert_customer($data){
            $fullname = mysqli_real_escape_string($this->db->link, $data['fullname']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            $date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');

            if($fullname == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $country == ""|| $phone == ""|| $password == ""){
				$alert = "<span class'error'>Không được để trống các trường</span>";
				return $alert;
			}else{
                $check_email = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
                $result_check = $this->db->select($check_email);
                if($result_check){
                    $alert = "<span class'error'>Tài Khoản đã tồn tại</span>";
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_customer(fullname, address, city, country, zipcode, phone, email, 	password)VALUES('$fullname', '$address', '$city', '$country', '$zipcode', '$phone', '$email', '$password')";
                    $result = $this->db->insert($query);
                    if($result){

                        $insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Đăng Ký','".$date_string."')";
                        $result_audit = $this->db->insert($insert_audit);    
                        
                        if($result_audit){
                            echo "Lưu Thành công hành động";
                        }
                        
                        else{
                            echo "Không Bắt được hành động";
                        }
                        $alert = "<span class'error'>Đăng Ký Tài khoản thành công</span>";
                        return $alert;
                    }
                    else
                    {
                        $alert = "<span class'error'>Đăng Ký Không thành công...!</span>";
                        return $alert;
                    }
                }
            }
        }

        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            $date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');
            if($email == ''|| $password == ''){
				$alert = "<span class'error'>Không được để trống các trường</span>";
				return $alert;
			}else{
                $check_email = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password' LIMIT 1";
                $result_customer = $this->db->select($check_email);
                if($result_customer){
                    $insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Đăng Nhập','".$date_string."')";
                    $result_audit = $this->db->insert($insert_audit);    
                    
                    if($result_audit){
                        echo "Lưu Thành công hành động";
                    }
                    
                    else{
                        echo "Không Bắt được hành động";
                    }
                    $value = $result_customer->fetch_assoc();
                    Session::set('customer_login', true);
                    Session::set('customer_id', $value['id_customer']);
                    Session::set('customer_name',$value['fullname']);
                    header('Location:order.php');
                }else{
                    $alert = "<span class'error'>Tài khoản và mật khẩu không đúng</span>";
                    return $alert;
                }
            }
        }
        
        public function show_customer($id){
            $check_email = "SELECT * FROM tbl_customer WHERE id_customer = '$id' LIMIT 1";
            $result_check = $this->db->select($check_email);
            return $result_check;
        }

        public function update_customers($data, $id){
            $fullname = mysqli_real_escape_string($this->db->link, $data['fullname']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            $date = new DateTime();
			$date_string = $date->format('d-m-Y H:i:s');

            if($fullname == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $phone == ""|| $password == ""){
				$alert = "<span class'error'>Không được để trống các trường</span>";
				return $alert;
			}else{
                    $query = "UPDATE tbl_customer SET fullname ='$fullname', address ='$address', city ='$city', zipcode ='$zipcode', phone ='$phone', email ='$email', 	password ='$password' WHERE id_customer ='$id'";
                    $result = $this->db->update($query);
                    if($result){
                        $insert_audit = "INSERT INTO audit_action (nameAu, dateAu)VALUES('Cập Nhật User','".$date_string."')";
                        $result_audit = $this->db->insert($insert_audit);    
                        
                        if($result_audit){
                            echo "Lưu Thành công hành động";
                        }
                        
                        else{
                            echo "Không Bắt được hành động";
                        }
                        $alert = "<span > <p class='text-success'>Cập Nhật Tài khoản thành công</p></span>";
                        return $alert;
                    }
                    else
                    {
                        $alert = "<span > <p class='text-danger'>Cập Nhật Không thành công...!</p></span>";
                        return $alert;
                    }
            }
        }

	}
?>