<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
    if(isset($_GET['proid']) && $_GET['proid']!=NULL){
        $id = $_GET['proid'];
    }
    else {
        echo "<script>window.location ='404.php'</script>";
    }
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
           
		$quantity = $_POST['quantity'];
		$AddtoCart = $ct->add_to_cart($id,$quantity);
	}
	$customer_id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])    ){
           
		$productid = $_POST['productid'];
		$insertCompare = $product->insert_compare($productid,$customer_id);
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){
           
		$productid = $_POST['productid'];
		$insertWishList = $product->insert_wishlist($productid,$customer_id);
	}
	if(isset($_POST['commentSubmit'])){
		$comment = $cs->insert_Comment();
	}
	
	
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
		<?php
			$get_product_details = $product->get_details($id);
			if($get_product_details){
				while($reult_detail = $get_product_details->fetch_assoc()){
			
		?>

		<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $reult_detail['image_product']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $reult_detail['productName']?></h2>
					<p><?php echo $fm->textShorten($reult_detail['product_desc'], 150)?></p>					
					<div class="price">
						<p>Price: <span><?php echo $fm->format_currency($reult_detail['price']).' VNĐ'?></span></p>
						<p>Category: <span><?php echo $reult_detail['catName']?></span></p>
						<p>Brand:<span><?php echo $reult_detail['brandName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						
					</form>	
					<?php
							if(isset($AddtoCart)){
								echo '<span style="color: red; font-size:18px;">Sản Phẩm Đã Thêm Vào Giỏi Hàng  </span>';
							}
						?>			
				</div>
				<div class="add-cart">
					
					<form action ="" method="POST">
						
						<input type="hidden" name="productid" value="<?php echo $reult_detail['productID'] ?>"/>
					
						<span>
							<?php
								$login_check = Session::get('customer_login');
								if($login_check){
									echo '<input type="submit" class="" name="compare" value="So Sánh Sản Phẩm"/>';
								}else
								{
									echo '';
								}
							?>
						</span>
						<?php 
							if(isset($insertCompare)){
								echo $insertCompare;
							}
						?>
					</form>

					<form action ="" method="POST">
						<!-- <a href="?compare=<?php echo $reult_detail['productID']?>">So Sánh Sản Phẩm</a>	 -->
						<input type="hidden" name="productid" value="<?php echo $reult_detail['productID'] ?>"/>
						
						<!-- <input type="submit" class="" name="compare" value="So Sánh Sản Phẩm"/> -->
						<span>
							<?php
								$login_check = Session::get('customer_login');
								if($login_check){
									echo '<input type="submit" class="" name="wishlist" value="Yêu Thích Sản Phẩm Sản Phẩm"/>';
									// echo '<input type="submit" class="" name="compare" value="So Sánh Sản Phẩm"/>';
								}else
								{
									echo '';
								}
							?>
						</span>
						<?php 
							if(isset($insertWishList)){
								echo $insertWishList;
							}
						?>
					</form>
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $fm->textShorten($reult_detail['product_desc'], 150)?>
	    </div>
				
	</div>
	<?php
				}
			}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
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
    				</ul>
    	
 				</div>
 		</div>
		<?php 
			if(isset($comment)){
				echo $comment;
			}
		?>
		<div>
			<form action="" method="POST">
			<?php 
				$login_check = Session::get('customer_login');
				if($login_check == false){
					echo 'Đăng Nhập Để Bình Luận';
				}
				else{
					// echo Session::get('customer_name');
					// echo Session::get('customer_name');
					echo '<h2>'.Session::get('customer_name').'</h2>';
				}
			?>
			<input type="hidden" value="<?php echo $id; ?>" name="product_id_Comment"/>
			<input type="text" value="<?php echo Session::get('customer_name'); ?>" name="nameComment"/>
			<textarea placeholder="Nhập Bình Luận" rows="5" style="resize: none;" class="form-control" name="comment"></textarea>
			<input type="submit" name="commentSubmit" class="" value="Bình Luận"/>
			</form>
		</div>
		<div>
		<?php
				// $id = $reult_detail['productId'];
				// echo $id;
				$get_comment = $cs->show_comment_status($id);
					if($get_comment == true){
						// echo 'lấy được ID'.$id;
						while($result_comment = $get_comment->fetch_assoc()){
		?>
			<table class="data display datatable" id="example">
					<tbody>
						<tr class="odd gradeX">
							<td>Bình Luận về sản phẩm: <?php echo $result_comment['content']?></td>
					</tbody>
				</table>
		<?php
				}
			}
		?>
		</div>
 	</div>
<?php
	include 'inc/footer.php';
?>	