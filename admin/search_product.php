<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/product.php';?>
<?php include_once '../helper/format.php';?>
<?php

	$pd = new product();
	$fm = new Format();
	if(isset($_GET['productid'])){
		$id = $_GET['productid'];
		$delproduct = $pd->delete_product($id);
	}if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $keyword = $_POST['keyword'];

        $search_product = $pd->search_product($keyword);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="block">  
		<?php
           if(isset($delproduct)){
               echo $delproduct;
           }
        ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Image</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Category</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// $pdList = $pd->show_product();
					if($search_product){
						$i =0;
						while ($result = $search_product->fetch_assoc()){
						$i++;
				
				?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['price']?></td>
					<td><img src="uploads/<?php echo $result['image_product']?>" width = 50></td>
					<td><?php echo $result['brandName']?></td>
					<td><?php  echo $fm->textShorten( $result['product_desc'],50)?></td>
					<td><?php echo $result['catName']?></td>
					<td><?php 
					 
							if($result['types'] == "1"){
								echo 'Thinh Hanh';
							}
							else
							{
								echo 'Khong Thinh Hanh';
							}
					
					?></td>
					<td><a href="productedit.php?productid=<?php echo $result['productID']?>">Edit</a> || <a href="?productid=<?php echo $result['productID']?>">Delete</a></td>
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

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
