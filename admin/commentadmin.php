<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php';?>
<?php
    $customer = new customer();
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $delComment = $customer->delete_Comment($id);
    }
    if(isset($_GET['confirmid'])){
		$id = $_GET['confirmid'];
		$updateComment = $customer->update_comment($id);
    }

?>
    <div class="grid_10">
        <div class="box round first grid">
        <h2>Kiểm Soát Bình Luận</h2>
                <div class="block">   
                <?php
                    if(isset($delComment)){
                        echo $delComment;
                }
                ?>
                <?php 
                    if(isset($updateComment)){
                        echo $updateComment;
                    }
                ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên Người đăng</th>
                            <th>nội Dung</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_comment = $customer->show_comment();
							if($show_comment){
								$i =0;
								while ($result = $show_comment->fetch_assoc()) {
								$i++;
									
							
						?>

						<tr class="odd gradeX">
							<td><?php echo $i?></td>
                            <td><?php echo $result['customerName']?></td>
							<td><?php echo $result['content']?></td>
							<td><a onclick="return confirm('Bạn có muốn xóa không?')" href="?delid=<?php echo $result['id_comment']?>">Xóa</a></td>
                            <td><?php
                                if($result['status'] == 0){
                                   
                                ?>   
                                <a href="?confirmid=<?php echo $result['id_comment']?>">Duyệt</a> 
                                <?php
                                }else{
                                ?>
                                <a>Đã Duyệt</a>
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
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>