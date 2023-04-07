<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thống kế</h2>
            <div class="block"> 
	<form method="POST" action="">
		<label for="date">Chọn ngày:</label>
		<input type="date" id="date" name="date">
		<button type="submit" name="submit">Thống kê</button>
	</form>
	<?php if (isset($_POST['submit'])) { ?>
		<h2>Danh sách đơn hàng</h2>
		<table class="data display datatable" id="example">
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
				// Lấy dữ liệu từ CSDL
				$conn = mysqli_connect("localhost", "root", "", "website_mvc");
				if (!$conn) {
				    die("Kết nối thất bại: " . mysqli_connect_error());
				}
				$date = $_POST['date'];
				$sql = "SELECT * FROM tbl_order WHERE DATE(date_order) = '$date'";
				$result = mysqli_query($conn, $sql);
				 
				// Đổ dữ liệu vào bảng
				while ($row = mysqli_fetch_assoc($result)) { ?>
					<tr class="odd gradeX">
						<td><?php echo $row['date_order']; ?></td>
						<td><?php echo $row['productName']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><?php echo $row['price']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<form method="POST" action="export.php">
			<input type="hidden" name="date" value="<?php echo $date; ?>">
			<button type="submit" name="export">Xuất File Excel</button>
		</form>
	<?php } ?>
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
