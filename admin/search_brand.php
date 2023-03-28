<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
    $brand = new brand();
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $delBrand = $brand->delete_brand($id);
    }if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $keyword = $_POST['keyword'];

        $search_brand = $brand->search_brand($keyword);
    }   

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">   
                <?php
                    if(isset($delBrand)){
                        echo $delBrand;
                }
                ?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
							// $show_brand = $brand->show_brand();
							if($search_brand){
								$i =0;
								while ($result = $search_brand->fetch_assoc()) {
								$i++;
									
							
						?>

						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['brandName']?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId']?>">Sửa</a> || <a onclick="return confirm('Bạn có muốn xóa không?')" href="?delid=<?php echo $result['brandId']?>">Xóa</a></td>
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

