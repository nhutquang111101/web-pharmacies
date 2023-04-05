<?php
	include 'inc/newheader.php';
	// include 'inc/slider.php';
?>
<?php
	if(isset($_GET['cartid'])){
		$cartid = $_GET['cartid'];
		$delcart = $ct->delete_product_cart($cartid);
	}
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])    ){
    //     $cartId = $_POST['cartId']; 
	// 	$quantity = $_POST['quantity'];
	// 	$update_quantity_Cart = $ct->update_quantity_cart($quantity,$cartId);
	// 	if($quantity<=0){
	// 		$delcart = $ct->delete_product_cart($cartId);

	// 	}
	// }	
?>	
<!-- <?php 
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?> -->
 <div class="main">
    <div class="content-r">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h4>So Sánh Sản Phẩm</h4>
					<?php 
						if(isset($update_quantity_Cart)){
							echo $update_quantity_Cart;
						}
					?>
					<?php 
						if(isset($delcart)){
							echo $delcart;
						}
					?>
						<table class="tblone">
							<tr>
								<th width="10%">Compare ID</th>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								$customer_id = Session::get('customer_id');
								$get_compare = $product->get_Compare_product($customer_id);
								if($get_compare){
									$i = 0;
									while($result = $get_compare->fetch_assoc()){
										$i++;
								
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" width="200px" alt=""/></td>
								<td><?php echo $result['price']?></td>
										
								<td><a  href="details.php?proid=<?php echo $result['productId']?>">Xem Lại Sản Phẩm</a></td>
							</tr>
							<?php
								
									}
								}
							?>
							
					   
					</div>
						<div class="shopping">
							<div class="shopleft">
								<a href="index.html"> <img src="images/shop.png" alt="" /></a>
							</div>
							<div class="shopright">
								<a href="payment.php"> <img src="images/check.png" alt="" /></a>
							</div>
						</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';
?>	