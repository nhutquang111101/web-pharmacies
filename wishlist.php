<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
		if(isset($_GET['proid'])){
            $customer_id = Session::get('customer_id');
            $proid = $_GET['proid'];
            $delcart = $product->delete_wishlist($proid, $customer_id);
        }
?>	
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
							
					   
					</div>
					<!-- <div class="shopping">
						<div class="shopleft">
							<a href="index.html"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div> -->
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<!-- <?php
	include 'inc/footer.php';
?>	 -->