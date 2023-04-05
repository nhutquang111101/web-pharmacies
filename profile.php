<?php
	include 'inc/newheader.php';
	// include 'inc/slider.php';
?>
<?php
    $login_check = Session::get('customer_login');
    if($login_check == false){
        header('Location: login.php');
    }
    
?>
<?php
    // if(isset($_GET['proid']) && $_GET['proid']!=NULL){
    //     $id = $_GET['proid'];
    // }
    // else {
    //     echo "<script>window.location ='404.php'</script>";
    // }
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])    ){
           
	// 	$quantity = $_POST['quantity'];
	// 	$AddtoCart = $ct->add_to_cart($id,$quantity);
	// }
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
    	<div class="section group">
            <div class="header">
            <h2>Thông Tin khách hàng</h2>
            </div>
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
<?php
	include 'inc/footer.php';
?>	