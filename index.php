<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>	
 <div class="main">
	<?php
		// echo session_id();
	?>
    <div class="content">
		<h3>Danh Mục</h3>
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
		</div>
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
<?php
	include 'inc/footer.php';
?>	