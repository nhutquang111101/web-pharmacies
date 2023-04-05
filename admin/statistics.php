<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/cart.php');
	include_once ($filepath.'/../helper/format.php');
?>
<?php
	$ct = new Cart();
	 if(isset($_GET['shiftid'])){
		$id = $_GET['shiftid'];
		$time= $_GET['time'];
		$price= $_GET['price'];
		$shifted = $ct->shifted($id, $time,$price);
    }
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$time= $_GET['time'];
		$price= $_GET['price'];
		$deleshifted = $ct->del_shifted($id, $time,$price);
    }
?>
<?php

$ct = new cart();
$pd = new product();
$fm = new Format();
if(isset($_GET['productid'])){
    $id = $_GET['productid'];
    $delproduct = $pd->delete_product($id);
}if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = $_POST['date'];

    $date_filter = $ct->getOrderByDate($date);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        <div class="block">    
					<?php 
						if(isset($shifted)){
							echo $shifted; 
						}
					?> 
					<?php 
						if(isset($deleshifted)){
							echo $deleshifted; 
						}
					?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Thời Gian Đặt</th>
							<th>Sản Phẩm</th>
							<th>Số Lượng</th>
							<th>Giá</th>
							<th>Địa chỉ</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$ct = new cart();
							$fm = new Format();
							$getinbox_cart = $ct->get_inbox_cart();
								if($getinbox_cart){
									$i =0;
									while($result = $getinbox_cart->fetch_assoc()){
										$i++;
						
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $fm->FormatDate($result['date_order'])?></td>
							<td><?php echo $result['productName'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php ?><a href="customer.php?customerid=<?php echo $result['customer_id']?>">Xem địa chỉ</a></td>
							<td><?php
								if($result['status'] == 0){
								?>	

								<a href="?shiftid=<?php echo $result['id_order']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Pending</a>
								
								<?php
								}
								elseif($result['status'] == 1){
								?>
									<!-- <a href="?shiftid=<?php echo $result['id_order']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Shifting</a> -->
									<?php echo 'Shifting...'?>
								<?php
								}else{	
								?>

									<a href="?delid=<?php echo $result['id_order']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Removed</a>

								<?php } ?>
							</td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>