<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
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
					 <p><span class="price"><?php echo $result['price']?></span></p>   
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
<?php
	include 'inc/footer.php';
?>	