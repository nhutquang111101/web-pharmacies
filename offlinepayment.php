<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
    if(isset($_GET['orderid']) && $_GET['orderid']== 'order'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrders($customer_id);
        $delcat = $ct->dele_all_data_cart();
        header('Location: success.php');
    }
    // else {
    //     echo "<script>window.location ='404.php'</script>";
    // }
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])    ){
           
	// 	$quantity = $_POST['quantity'];
	// 	$AddtoCart = $ct->add_to_cart($id,$quantity);
	// }
?>
<style>
    .btn-order{
        margin-bottom: 20px;
    }
	.box_left{
	width: 50%;
	border: 1px solid #666;
	float: left;
	padding: 4px;
}
.box_right{
	width: 48%;
	border: 1px solid #666;
	float: right;
	padding: 10px;
}
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="heading">
            <h2>Thanh Toán</h2>
            </div>
            <div class="clear"></div>


            <div class="box_left">
            <div class="cartpage">
			    	<!-- <h2>Your Cart</h2> -->
					<?php 
						if(isset($update_quantity_Cart)){
							echo $update_quantity_Cart;
						}
					?>
					<?php 
						if(isset($delcart)){
							echo $delcart;
						}
					?>
						<table class="tblone">
							<tr>
                                <th width="5%">ID</th>
								<th width="20%">Product Name</th>
								<!-- <th width="10%">Image</th> -->
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<!-- <th width="10%">Action</th> -->
							</tr>
							<?php
								
								$getproduct_cart = $ct->get_product_cart();
								if($getproduct_cart){
									$subtotal =0;
									$quaty=0;
                                    $i = 0;
									while($result = $getproduct_cart->fetch_assoc()){
                                        $i++;
							?>
							<tr>
                                <td><?php echo  $i; ?></td>
								<td><?php echo $result['productName']?></td>
								<!-- <td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td> -->
								<td><?php echo $fm->format_currency($result['price']).' '.'VNĐ'?></td>
								<td>
								
										<!-- <input type="hidden" name="cartId" value="<?php echo $result['cartId']?>"/> -->
										<?php echo $result['quantity']?>
						
								</td>
								<td>
									<?php 
										$total = $result['price'] * $result['quantity'];
										echo  $total.' VND';
									?>
								</td>
								<!-- <td><a href="?cartid=<?php echo $result['cartId']?>">Xóa</a></td> -->
							</tr>
							<?php
								$subtotal += $total;
								$quaty = $quaty + $result['quantity']; 
									}
								}
							?>
							
							
						</table>
						<?php
							$check_cart = $ct->cart_check();
							if($check_cart){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>
								<?php 
									
									echo  $fm->format_currency($subtotal).' VNĐ';
									Session::set('sum', $subtotal);
									Session::set('Qtity', $quaty);
								?>
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10% (<?php echo $vat = $subtotal * 0.1; ?>)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
									$vat = $subtotal * 0.1;
									$gtotal = $subtotal + $vat;  
									echo $fm->format_currency($gtotal).' VNĐ';
								?></td>
							</tr>
					   </table>
					   <?php
							}
							else{
								echo "Your Cart Is empty....!!!";
							}  
					   ?>
					</div>
            </div>


            <div class="box_right">
            <table class="tblone">
                <?php
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){

                        
                ?>
                <tr>
                    <td>Họ Tên</td>
                    <td>:</td>
                    <td><?php echo $result['fullname']?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><?php echo $result['address']?></td>
                </tr>
                <tr>
                    <td>Thành phố</td>
                    <td>:</td>
                    <td><?php echo $result['city']?></td>
                </tr>
                <tr>
                    <td>Quốc gia</td>
                    <td>:</td>
                    <td><?php echo $result['country']?></td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    <td>:</td>
                    <td><?php echo $result['zipcode']?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>:</td>
                    <td><?php echo $result['phone']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email']?></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="editprofile.php">Sửa</a></td>
                </tr>
                <?php
                        }
                    }    
                ?>
            </table>
            </div>
           
 		</div>
 	</div>
     <a href="?orderid=order" class="btn btn-dark btn-order">Đặt hàng</a>
</div>
</form>
<?php
	include 'inc/footer.php';
?>	