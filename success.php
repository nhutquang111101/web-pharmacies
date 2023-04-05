<?php
	include 'inc/newheader.php';
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
<div class="menu"style="padding-top:180px">
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
						</details></li>s
	  <div class="clear"></div>
	</ul>
</div>
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

                echo $total.' VNĐ';
           
           ?></p>   
           <p class="text-dark">Chúng tôi sẽ liên lạc sớm nhất cho bạn!!! Làm ơn hãy xem lại chi tiết đơn hàng <a href="orderdetails.php">Ở đây</a></p> 
 		</div>
 	</div>
</div>
<?php
	include 'inc/footer.php';
?>	