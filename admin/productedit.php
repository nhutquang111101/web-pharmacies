<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/product.php';?>

<?php

    $pd = new product();
    if(isset($_GET['productid']) && $_GET['productid']!=NULL){
        $id = $_GET['productid'];
    }
    else {
        echo "<script>window.location ='productlist.php'</script>";
    }
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])    ){
           

            $updateProduct = $pd->update_product($_POST, $_FILES,$id);
        }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Chỉnh sửa Sản Phẩm</h2>
        <?php
                if(isset($updateProduct)){
                    echo $updateProduct;
                }
        ?>
        <?php
            $get_product_by_id = $pd->getproductbyId($id);
            if($get_product_by_id){
                while($result_product = $get_product_by_id->fetch_assoc()){
        ?>
        
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="productName" Value="<?php echo $result_product['productName']?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Chọn danh mục sản phẩm</option>
                            <?php
                                $cat = new category();
                                $catlist = $cat->show_catgeory();
                                if($catlist){
                                    while($result =  $catlist->fetch_assoc()){
                            ?>

                            <option
                            <?php
                                if($result['catId' ]== $result_product['catId']){echo 'selected';}
                            ?>
                            value="<?php echo $result['catId']?>"><?php echo $result['catName']?></option>
                           
                           <?php
                            }
                        }
                           ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn thương hiệu</option>
                            <?php
                                $brand = new brand();
                                $show_brand = $brand->show_brand();
                                if($show_brand){
                                    while($result =  $show_brand->fetch_assoc()){
                            ?>
                            <option 
                            <?php
                                if($result['brandId' ]== $result_product['brandId']){echo 'selected';}
                            ?>
                            value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
                            <?php
                                }
                            }
                           ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce" ><?php echo $result_product['product_desc']?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $result_product['price']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['image_product']?>" width = 120>
                        <input type="file" name="image_product"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="types">
                            <option>Select Type</option>
                            <?php
                                if($result_product['types'] == "0"){
                            ?>
                                <option  value="1">Featured</option>
                                <option selected value="0">Non-Featured</option>
                            <?php
                                }
                                else{
                                
                            ?>
                            <option selected value="1">Featured</option>
                            <option  value="0">Non-Featured</option>
                            <?php
                                 } 
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


