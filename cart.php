<?php
	include 'inc/newheader.php';
	// include 'inc/slider.php';
?>
<?php
	if(isset($_GET['cartid'])){
		$cartid = $_GET['cartid'];
		$delcart = $ct->delete_product_cart($cartid);
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])    ){
        $cartId = $_POST['cartId']; 
		$quantity = $_POST['quantity'];
		$update_quantity_Cart = $ct->update_quantity_cart($quantity,$cartId);
		if($quantity<=0){
			$delcart = $ct->delete_product_cart($cartId);

		}
	}	
?>	
<?php 
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}

?>

<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <?php
			$check_cart  = $ct->cart_check();
			if($check_cart == true){
				echo '<li><a href="cart.php">Cart</a></li>';
			}
			else{
				echo '';
			}
			?>

			<?php
				$customer_id = Session::get('customer_id');
				$check_order = $ct->order_check($customer_id);
				if($check_order == true){
					echo '<li><a href="orderdetails.php">Order</a></li>';
				}
				else{
					echo '';
				}
			?>	
	  <?php
		$login_check = Session::get('customer_login');
		if($login_check == false){
			echo '';
		}
		else{
			echo '<li><a href="profile.php">Profile</a> </li>';
		}
		?>
		<?php
		$login_check = Session::get('customer_login');
		if($login_check){
			echo '<li><a href="compare.php">So Sánh</a> </li>';
		}
		?>
		<?php
		$login_check = Session::get('customer_login');
		if($login_check){
			echo '<li><a href="wishlist.php">Yêu Thích</a> </li>';
		}
		?>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
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
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								
								$getproduct_cart = $ct->get_product_cart();
								if($getproduct_cart){
									$subtotal =0;
									$quaty=0;
									while($result = $getproduct_cart->fetch_assoc()){
								
							?>
							<tr>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price']).' VNĐ'?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId']?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
									<?php 
										$total = $result['price'] * $result['quantity'];
										echo  $total;
									?>
								</td>
								<td><a href="?cartid=<?php echo $result['cartId']?>">Xóa</a></td>
							</tr>
							<?php
								$subtotal += $total;
								$quaty = $quaty + $result['quantity']; 
									}
								}
							?>
							
							
						</table>
						<?php
							$check_cart = $ct->cart_check();
							if($check_cart){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>
								<?php 
									
									echo  $fm->format_currency($subtotal).' VNĐ';
									Session::set('sum', $subtotal);
									Session::set('Qtity', $quaty);
								?>
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
									$vat = $subtotal * 0.1;
									$gtotal = $subtotal + $vat;  
									echo $fm->format_currency($gtotal).' VNĐ';
								?></td>
							</tr>
					   </table>
					   <?php
							}
							else{
								echo "Your Cart Is empty....!!!";
							}  
					   ?>
					   <!-- <a href="payment.php"><img src="images/check.png" alt="" /></a> -->
					</div>
					<div class="shopping">
						<!-- <div class="shopleft">
							<a href="index.html"><img src="images/shop.png" alt="" /></a>
						</div> -->
						<div class="shopright">
							<a href="payment.php"><img src="images/check.png" alt=""/></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';
?>	