<?php
	include 'inc/newheader.php';
	// include 'inc/slider.php';
?>
<?php 
     $login_check = Session::get('customer_login');
     if($login_check == false){
         header('Location: login.php');
     }
	 $ct = new Cart();
	 if(isset($_GET['confirmid'])){
		$id = $_GET['confirmid'];
		$time= $_GET['time'];
		$price= $_GET['price'];
		$shiftedConfirm = $ct->Confirm_shifted($id, $time,$price);
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
	  <li><details class="dropdown-btn">
							<summary role="button-btn">
								<a class="button-btn">Danh Mục</a>
							</summary>
							<?php
							$getall_category = $cat->show_catgeory_fontend();
								if($getall_category){
								while($result_allcate = $getall_category->fetch_assoc()){
										?>
				      				<ul>
										<li>
										<a href="productbycat.php?catid=<?php echo $result_allcate['catId']?>"><span><?php echo $result_allcate['catName']?></span></a>
										</li></ul>
				    				<?php
										}
								}
								?>
						</details></li>
	  <div class="clear"></div>
	</ul>
</div>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h4>Chi Tiết Hàng Đã Mua</h4>
					
						<table class="tblone">
							<tr>
                                <th width="10%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="10%">Quantity</th>
                                <th width="10%">Date</th>
                                <th width="25%">Status</th>
								<!-- <th></th> -->
								<!-- <th width="20%">Total Price</th> -->
								<th width="10%">Action</th>
							</tr>
							<?php
								 $customer_id = Session::get('customer_id');
								$get_cart_ordered = $ct->get_carts_ordered($customer_id);
								if($get_cart_ordered){
									// $subtotal =0;
                                    $i = 0;
									$quaty=0;
									while($result = $get_cart_ordered->fetch_assoc()){
                                        $i++;
							?>
							<tr>
                                <td><?php echo $i;?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $result['price']?></td>
								<td>
									<!-- <form action="" method="post"> -->
										<!-- <input type="hidden" name="cartId" value="<?php echo $result['cartId']?>"/> -->
										<!-- <input type="number" name="quantity" min="0" value=""/> -->
										<!-- <input type="submit" name="submit" value="Update"/> -->
                                        <?php echo $result['quantity']?>
									<!-- </form> -->
								</td>
                                <td><?php echo $fm->FormatDate($result['date_order'])?></td>
                                <td><?php 
                                    if($result['status']== 0){
                                        echo 'Pending';
                                    }
                                    elseif($result['status']== 1){
									?>
										<span>Shifted</span>
										<!-- <a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo  $result['price'] ?>&time=<?php echo $result['date_order']?>">Shifted</a> -->
                                    <?php
									}elseif($result['status']== 2){
										echo 'Recieved';
									}?>
                        
                                </td>

								
									<?php
										if($result['status'] == '0'){
									?>
										<td><?php echo 'N/A';?></td>
									<?php 
									}elseif($result['status']== 1){

									?>
									<td><a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo  $result['price'] ?>&time=<?php echo $result['date_order']?>">Confirmed</a></td>
									<?php }else{?>
										<td><?php echo 'Received';?></td>
									<?php
										}
									?>
							</tr>
							<?php
								// $subtotal += $total;
								// $quaty = $quaty + $result['quantity']; 
									}
								}
							?>
							
							
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';
?>	