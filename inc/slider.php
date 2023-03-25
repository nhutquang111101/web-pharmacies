<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
					$getLastestApple = $product->getLastestApple();
					if($getLastestApple){
						while($resultapple = $getLastestApple->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="admin/uploads/<?php echo $resultapple['image_product']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $resultapple['productName']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultapple['productID']?>">Adds to cart</a></span></div>
				   </div>
			   </div>
			   <?php
						}
					}  
			   ?>	
			   <?php
					$getLastestSamSung = $product->getLastestSamSung();
					if($getLastestSamSung){
						while($resultss = $getLastestSamSung->fetch_assoc()){
				?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="admin/uploads/<?php echo $resultss['image_product']?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $resultss['productName']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultss['productID']?>">Add to cart</a></span></div>
					</div>
				</div>
			</div>
			<?php
						}
					}  
			?>
			<?php
					$getLastestDeplple = $product->getLastestDeplple();
					if($getLastestDeplple){
						while($resultdelple = $getLastestDeplple->fetch_assoc()){
			?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="admin/uploads/<?php echo $resultdelple['image_product']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $resultdelple['productName']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultdelple['productID']?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php
						}
					}  
				?>	
				<?php
					$getLastestDell = $product->getLastestDell();
					if($getLastestDell){
						while($resultdell = $getLastestDell->fetch_assoc()){
				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="admin/uploads/<?php echo $resultdell['image_product']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Dell</h2>
						  <p><?php echo $resultdell['productName']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultdell['productID']?>">Add to cart</a></span></div>
					</div>
				</div>
			</div>
			<?php
						}
					}  
				?>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>