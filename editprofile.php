<?php
	include 'inc/newheader.php';
	// include 'inc/slider.php';
?>
<?php
    $login_check = Session::get('customer_login');
    if($login_check == false){
        header('Location: login.php');
    }
    
?>
<?php
    // if(isset($_GET['proid']) && $_GET['proid']!=NULL){
    //     $id = $_GET['proid'];
    // }
    // else {
    //     echo "<script>window.location ='404.php'</script>";
    // }
    $id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){ // $_POST là tên trong name="save"
		$updateCustomer = $cs->update_customers($_POST,$id);
	}
?>
 <div class="main">
    <div class="content-r">
    	<div class="section group">
            <div class="header">
            <?php
                if(isset($updateCustomer)){
                    echo $updateCustomer;
                }
            ?>
            <h2>Cập Nhật thông tin khách hàng</h2>
            </div>
            <form action="" method="post">
            <table class="tblone">
                <?php
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){

                        
                ?>
                <tr>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Họ Tên </span>
                    </div>
                    <input type="text" class="form-control" name="fullname" value="<?php echo $result['fullname']?>">
                    </div>
                </div>
                </tr>

                <tr>
                <!-- <div class="form-group">
                <h5 for="usr">Name:</h5>
                <input type="text" name="fullname" value="<?php echo $result['address']?>"> -->
                <!-- </div> -->
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Địa chỉ</span>
                    </div>
                    <input type="text" class="form-control" name="address" value="<?php echo $result['address']?>">
                    </div>
                </div>
                </tr>

                <tr>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Thành phố</span>
                    </div>
                    <input type="text" class="form-control" name="city" value="<?php echo $result['city']?>">
                    </div>
                </tr>
                <tr>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Zip Code</span>
                    </div>
                    <input type="text" class="form-control" name="zipcode" value="<?php echo $result['zipcode']?>">
                    </div>
                </tr>
                
                <tr>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại</span>
                    </div>
                    <input type="text" class="form-control" name="phone" value="<?php echo $result['phone']?>">
                    </div>
                </tr>

                <tr>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                    </div>
                    <input type="text" class="form-control" name="email" value="<?php echo $result['email']?>">
                    </div>
                </tr>
                <tr>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Mật Khẩu</span>
                    </div>
                    <input type="password" class="form-control" id="myInput" name="password" value="<?php echo $result['password']?>">
                    </div>
                </tr>
                <tr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </div>
                    
                </tr>
                <tr>

                   <input type="submit" class="grey" name="save" value="Sửa">
                </tr>
                <?php
                        }
                    }    
                ?>
            </table>
             </form>
 		</div>
 	</div>
</div>
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php
	include 'inc/footer.php';
?>	
