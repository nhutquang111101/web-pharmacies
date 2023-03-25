<?php
	include 'inc/header.php';
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
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])    ){
           
	// 	$quantity = $_POST['quantity'];
	// 	$AddtoCart = $ct->add_to_cart($id,$quantity);
	// }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="header">
            <h2>Thông Tin khách hàng</h2>
            </div>
            <table class="tblone">
                <?php
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){

                        
                ?>
                <tr>
                    <td>Họ Tên</td>
                    <td>:</td>
                    <td><?php echo $result['fullname']?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><?php echo $result['address']?></td>
                </tr>
                <tr>
                    <td>Thành phố</td>
                    <td>:</td>
                    <td><?php echo $result['city']?></td>
                </tr>
                <tr>
                    <td>Quốc gia</td>
                    <td>:</td>
                    <td><?php echo $result['country']?></td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    <td>:</td>
                    <td><?php echo $result['zipcode']?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>:</td>
                    <td><?php echo $result['phone']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email']?></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="editprofile.php">Sửa</a></td>
                </tr>
                <?php
                        }
                    }    
                ?>
            </table>
 		</div>
 	</div>
</div>
<?php
	include 'inc/footer.php';
?>	