<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	include_once 'lib/database.php';
	include_once 'helper/format.php';

	// sql_autoload_register(function($className)){
	// 	include_once "classes/".$className.".php";
	// }
	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$cs = new customer();
	$product = new product();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/> 
 <link href="./css/newstyle.css" rel="stylesheet"/> 
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<header class="header">
        <div class="header-summary">
            <nav class="header-navbar">
                <ul class="header-navbar-list">
                    <li class="header-navbar-items header-navbar-items-separate">Hotline đặt hàng(Miễn phí)</li>
                    <li class="header-navbar-items header-navbar-items-separate header-navbar-items-cover"><i class="fa fa-phone"></i></i>18006089</li>
                </ul>
                <ul class="header-navbar-list">
                    <li class="header-navbar-items header-navbar-items-separate">
                        <a href="#" class="header-navbar-items-link">Cẩm nang mua hàng</a>
                    </li>
                    <li class="header-navbar-items header-navbar-items-separate">
                        <a href="#" class="header-navbar-items-link">Bí quyết sống khoẻ </a>
                    </li>
                    <li class="header-navbar-items header-navbar-items-separate"><i class="fa-solid fa-location-dot"></i></i>1244 Kha vạn cân</li>
                    <!-- <li class="header-navbar-items header-navbar-items-strong header-navbar-items-separate">
                        Đăng kí
                    </li>
                    <li class="header-navbar-items header-navbar-items-strong">
                        <i class="fa fa-user"></i> Đăng nhập
                    </li> -->
                </ul>


            </nav>
            <div class="header-another-part">
                <div class="logoimg">
                   <a href="index.php"><img src="./img/logo-new.png" alt ></a> 
                </div>
                <div class="search_box">
				    <form action="search.php" method="POST">
				    	<input type="text" placeholder="Tìm Kiếm Sản Phẩm..." name="keyword">
						<input type="submit" name="search_product" value="Tìm Kiếm">
				    </form>
			    </div>

                

                <div class="icons">
                    <!-- <div id="search-btn" class="fas fa-search"></div> -->
                   <!-- <div id="user-btn" class="fas fa-user">
                    </div> -->
                    <div id="order-btn" class="fas fa-box"></div>
                    <a href="wishlist.php"><div id="heart-btn"  class="fa-solid fa-heart" ></div></a>
                    <a href="cart.php"><div id="cart-btn" class="fas fa-shopping-cart"><span><?php
									$check_cart = $ct->cart_check();
									if($check_cart){
									$sum = Session::get("sum");
									$qty = Session::get("Qtity");
									echo $qty.' đ'.' ';//.$qty;
									}else{
										echo '0';
									}
								?></span></div></a>
                                <?php
				if(isset($_GET['customer_id'])){
					$customer_id = $_GET['customer_id'];
					$delcat = $ct->dele_all_data_cart();
					$delcompare = $ct->del_compare($customer_id);
					Session::destroy();
				}
			?>	  
                    <?php
				        $login_check = Session::get('customer_login');
				        if($login_check == false){
					    echo '<a href="login.php"><div id="user-btn" class="fas fa-user">
                        </div></a></div>';
				        }
				        else{
				    	echo '<a href="?customer_id='.Session::get('customer_id').'"><div id="user-btn" class="fas fa-right-from-bracket">
                        </div></a></div>';
				        }
			        ?>
                </div>
                <!-- <form action="" class="search-form">
                    <input type="search" id="search-box" placeholder="search here .....">
                    <label for="search-box" class="fas fa-search"></label>
                </form> -->
            </div>
        </div>



    </header>