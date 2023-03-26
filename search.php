<?php
	include 'inc/header.php';
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
<?php
	include 'inc/footer.php';
?>	