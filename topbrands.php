<?php
	include 'inc/newheader.php';
	include 'inc/newslider.php';
?>
<?php
	    if(isset($_GET['catid']) && $_GET['catid']!=NULL){
			$id = $_GET['catid'];
		}
		else {
			echo "<script>window.location ='404.php'</script>";
		}
		$cat = new category();
	
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$catName = $_POST['catName'];
	
				$updateCat = $cat->update_catgeory($catName, $id);
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
	<?php 
				$name_cate =$cat->get_name_by_cat($id);
				if($name_cate){
					while($result_namecate = $name_cate->fetch_assoc()){
			?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Category: <?php echo $result_namecate['catName']?></h3>
    		</div>

    		<div class="clear"></div>
			<?php 
						}
					}
			?>
    	</div>
	      <div class="section group">
				<?php 
					$productbyCat =$cat->get_product_by_cat($id);
					if($productbyCat){
						while($result = $productbyCat->fetch_assoc()){
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
 <!-- <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img src="images/feature-pic1.png" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$505.22</span></p>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview-2.html"><img src="images/feature-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$620.87</span></p> 
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview-4.html"><img src="images/feature-pic3.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$220.97</span></p>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<img src="images/feature-pic4.png" alt="" />
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$415.54</span></p> 
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img src="images/new-pic1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$403.66</span></p>
				    
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview-4.html"><img src="images/new-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$621.75</span></p>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview-2.html"><img src="images/feature-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$428.02</span></p>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
				 <img src="images/new-pic3.jpg" alt="" />
					 <h2>Lorem Ipsum is simply </h2>					 
					 <p><span class="price">$457.88</span></p>   
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Canon</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img src="images/new-pic1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$403.66</span></p>
				    
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview-4.html"><img src="images/new-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$621.75</span></p>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview-2.html"><img src="images/feature-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$428.02</span></p>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
				 <img src="images/new-pic3.jpg" alt="" />
					 <h2>Lorem Ipsum is simply </h2>					 
					 <p><span class="price">$457.88</span></p>   
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
			</div>
    </div>
 </div> -->
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