<?php
	include 'inc/newheader.php';
	// include 'inc/slider.php';
?>
<?php
	    // if(isset($_GET['catid']) && $_GET['catid']!=NULL){
		// 	$id = $_GET['catid'];
		// }
		// else {
		// 	echo "<script>window.location ='404.php'</script>";
		// }
		// $cat = new category();
	
		
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
	<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$keyword = $_POST['keyword'];
	
				$search_product = $product->search_product($keyword);
		}
			?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Từ Khóa Tìm Kiếm: <?php echo $keyword?></h3>
    		</div>

    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php 
					if($search_product){
						while($result = $search_product->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
				 <img src="admin/uploads/<?php echo $result['image_product']?>" width="200px" alt="" />
					 <h2><?php echo $result['productName']?></h2>					 
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])?></span></p>   
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<?php 
						}
					}
					else{
						echo 'category Not Avaible';
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