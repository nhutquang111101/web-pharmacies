<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
  if(isset($_GET['orderid']) && $_GET['orderid']== 'order'){
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrders($customer_id);
    $delcat = $ct->dele_all_data_cart();
    header('Location: success.php');
    } 
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
           <h2><p class="text-success">Đặt hàng Thành Công</p></h2>
           <?php
            $customer_id = Session::get('customer_id');
            $get_amount = $ct->getAmountPrice($customer_id);
            if($get_amount){
                $amount = 0;
                while($result = $get_amount->fetch_assoc()){
                    $price = $result['price'];
                    $amount += $price;
                }
            }
           ?>
           <p class="text-dark">Tổng tiền mà bạn đã đặt là: <?php 
                $vat = $amount * 0.1;
                $total = $vat + $amount;

                echo $total.' VND';
           
           ?></p>   
           <p class="text-dark">Chúng tôi sẽ liên lạc sớm nhất cho bạn!!! Làm ơn hãy xem lại chi tiết đơn hàng <a href="orderdetails.php">Ở đây</a></p> 
 		</div>
 	</div>
</div>
<?php
	include 'inc/footer.php';
?>	