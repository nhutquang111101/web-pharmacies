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

        public function insert_customer($data){
            $fullname = mysqli_real_escape_string($this->db->link, $data['fullname']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

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
            if($email == ''|| $password == ''){
				$alert = "<span class'error'>Không được để trống các trường</span>";
				return $alert;
			}else{
                $check_email = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password' LIMIT 1";
                $result_customer = $this->db->select($check_email);
                if($result_customer){
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

            if($fullname == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $phone == ""|| $password == ""){
				$alert = "<span class'error'>Không được để trống các trường</span>";
				return $alert;
			}else{
                    $query = "UPDATE tbl_customer SET fullname ='$fullname', address ='$address', city ='$city', zipcode ='$zipcode', phone ='$phone', email ='$email', 	password ='$password' WHERE id_customer ='$id'";
                    $result = $this->db->update($query);
                    if($result){
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