<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    $cat = new category();
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $delCat = $cat->delete_category($id);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $keyword = $_POST['keyword'];

        $search_category = $cat->search_category($keyword);
    }   

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
	
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
							// $show_cat = $cat->show_catgeory();
							if($search_category){
								$i =0;
								while ($result = $search_category->fetch_assoc()) {
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

