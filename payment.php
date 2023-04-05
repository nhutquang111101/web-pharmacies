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
            <div class="heading">
            <h2>Thanh Toán</h2>
            </div>
            <h3>Phương Thức Thanh Toán</h3>
            <a href="offlinepayment.php">Trả tiền mặt khi nhận hàng</a>
            <!-- <a href="onlinepayment.php">Thanh toán Online Qua ATM MOMO</a> -->
            <a href="onlinepayment_qr.php">Thanh toán Online</a>
            <a href="cart.php"><button type="button" class="btn btn-dark">Trở Lại</button></a>
 		</div>
 	</div>
</div>
<?php
	include 'inc/footer.php';
?>	