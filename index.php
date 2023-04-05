<?php
	include 'inc/newheader.php';
	include 'inc/newslider.php';
?>	
 <div class="main">
	<?php
		// echo session_id();
	?>
	<div class="menu-r">
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
    <div class="content">
<<<<<<< Updated upstream
=======
		<!-- <h3>Danh Mục</h3>
		<div>
			<?php
						$getall_category = $cat->show_catgeory_fontend();
							if($getall_category){
								while($result_allcate = $getall_category->fetch_assoc()){
					?>
				      <li><a href="productbycat.php?catid=<?php echo $result_allcate['catId']?>"><?php echo $result_allcate['catName']?></a></li>
				    <?php
								}
						}
			?>
		</div> -->
>>>>>>> Stashed changes
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
					$product_feathered = $product->getproduct_feathered();
					if($product_feathered){
						while($result_new = $product_feathered->fetch_assoc()){

				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image_product']?>" alt="" /></a>
					 <h2><?php echo $result_new['productName']?></h2>
					 <p><?php echo $fm->textShorten($result_new['productName'], 20)?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result_new['price'])." VNĐ"?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productID'] ?>" class="details">Details</a></span></div>
				</div>
				<?php
						}
					}
			?>
			</div>
			<?php
					$product_all = $product->get_all_product();
					$product_count = mysqli_num_rows($product_all);
					$product_button = $product_count/4;
					$i =0;
					echo '<p> Trang: </p>';
					for($i = 1; $i<$product_button; $i ++){
						echo '<a style="margin: 0 5px; text-decoration: none;" href="index.php?trang='.$i.'">'.$i.'</a>';

					}
				?>
			<div class="content_bottom">
			
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
					$product_new = $product->getproduct_new();
					if($product_new){
						while($result = $product_new->fetch_assoc()){

				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['image_product']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><?php echo $fm->textShorten($result['productName'], 20)?></p>
					 <p><span class="price"><?php echo $result['price']."VND"?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productID'] ?>" class="details">Details</a></span></div>
				</div>
				<?php
						}
					}
			?>
			</div>
			<div class="">
				<?php
					$product_all = $product->get_all_product();
					$product_count = mysqli_num_rows($product_all);
					$product_button = $product_count/4;
					$i =0;
					echo '<p> Trang: </p>';
					for($i = 1; $i<$product_button; $i ++){
						echo '<a style="margin: 0 5px; text-decoration: none;" href="index.php?trang='.$i.'">'.$i.'</a>';

					}
				?>
			</div>
    </div>
 </div>
 <banner>
	<div class="grid_banner">
		<div class="whole_banner" style="display:flex;">
			<div class="banner_item" style="padding-left:40px">
				<img
					src="./img/banner-new-1.png"/> 
			</div>
			<div class="banner_item-img" style="padding-left: 16px;">
				<img
								src="./img/banner-new.png"/>
								
			</div>
		</div>
	</div>
	</banner>
<?php
	include 'inc/footer.php';
?>	