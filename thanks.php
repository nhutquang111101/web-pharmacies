<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
		// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrders($customer_id);
        $delcat = $ct->dele_all_data_cart();
		// header('Location: thanks.php');
    	// }
        // $delcat = $ct->dele_all_data_cart();
    
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
           <h2><p class="text-success">Đặt hàng Thành Công</p></h2>
           
           </p>   
           <p class="text-dark">Chúng tôi sẽ liên lạc sớm nhất cho bạn!!!</p> 
 		</div>
 	</div>
</div>
<?php
	include 'inc/footer.php';
?>	