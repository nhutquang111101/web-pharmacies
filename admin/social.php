<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
	#cssTable td 
	{
		text-align: center; 
		vertical-align: middle;
	}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block"> 
		<form method="post">
			<label>Chọn ngày: </label>
			<input type="date" name="date" required>
			<button type="submit">Thống kê</button>
    	</form>
		<table class="data display datatable" id="cssTable"">
				<thead>
					<tr>
						<th>Thời Gian Đặt</th>
						<th>Sản Phẩm</th>
						<th>Số Lượng</th>
						<th>Giá</th>
					</tr>
				</thead>
				<tbody>
		<?php
    if(isset($_POST['date'])) {
        $date = $_POST['date'];
        $conn = mysqli_connect("localhost", "root", "", "website_mvc");

        if(!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM tbl_order WHERE DATE(date_order) = '$date'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            // echo 'có dữ liệu';
			while($row = mysqli_fetch_assoc($result)){
    ?>
		
				<tr class="odd gradeX">
				<td><?php echo $row['date_order']?></td>
				<td><?php echo $row['productName']?></td>
				<td><?php echo $row['quantity']?></td>
				<td><?php echo $row['price']?></td>
	<?php
			}
		} 
			// mysqli_close($conn);
	}
	?>
		</tbody>
	</table>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>