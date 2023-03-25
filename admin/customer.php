<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/customer.php');
	include_once ($filepath.'/../helper/format.php');
?>
<?php
    if(isset($_GET['customerid']) && $_GET['customerid']!=NULL){
        $id = $_GET['customerid'];
    }
    else {
        echo "<script>window.location ='inbox.php'</script>";
    }
    $cs = new customer();


?>
<?php ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
               <div class="block copyblock"> 
             
                <?php
                    $get_customers = $cs->show_customer($id);
                    if($get_customers){
                        while($result = $get_customers->fetch_assoc()){

                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Họ tên</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['fullname']?>" name ="fullname" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['address']?>" name ="address" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Thành Phố</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['city']?>" name ="city" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Quốc Gia</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['country']?>" name ="country" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zip code</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['zipcode']?>" name ="zipcode" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Số Điện Thoại</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone']?>" name ="phone" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email']?>" name ="email" class="medium" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                       }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>