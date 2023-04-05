<?php
	include 'inc/newheader.php';
	 include 'inc/newslider.php';
?>
<?php
		if(isset($_GET['proid'])){
            $customer_id = Session::get('customer_id');
            $proid = $_GET['proid'];
            $delcart = $product->delete_wishlist($proid, $customer_id);
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
</div>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h4>Sản Phẩm Yêu Thích</h4>
						<table class="tblone">
							<tr>
								<th width="10%">Compare ID</th>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Action</th>
							</tr>
							<?php
								$customer_id = Session::get('customer_id');
								$get_wishlist = $product->get_Wishlist($customer_id);
								if($get_wishlist){
									$i = 0;
									while($result = $get_wishlist->fetch_assoc()){
										$i++;
								
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" width="200px" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price']).' VNĐ'?></td>
										
								<td>
                                    <a  href="details.php?proid=<?php echo $result['productId']?>">Mua Ngay</a> |
                                    <a  href="?proid=<?php echo $result['productId']?>">Xóa Yêu Thích</a>
                                </td>
							</tr>
							<?php
								
									}
								}
							?>
						<table>	
			</div>				
    	</div>  	
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