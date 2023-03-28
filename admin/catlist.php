<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    $cat = new category();
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $delCat = $cat->delete_category($id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
				<form style="margin: 5px;" action="search_category.php" method="POST">
				    	<input type="text" placeholder="Tìm Kiếm danh mục..." name="keyword">
						<input type="submit" name="search_product" value="Tìm Kiếm">
				</form>
                <div class="block">   
				
                <?php
                    if(isset($delCat)){
                        echo $delCat;
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
							$show_cat = $cat->show_catgeory();
							if($show_cat){
								$i =0;
								while ($result = $show_cat->fetch_assoc()) {
								$i++;
									
							
						?>

						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['catName']?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId']?>">Sửa</a> || <a onclick="return confirm('Bạn có muốn xóa không?')" href="?delid=<?php echo $result['catId']?>">Xóa</a></td>
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

