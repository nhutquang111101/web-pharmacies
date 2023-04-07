<?php
require_once 'excel/PHPExcel.php';
require_once 'excel/PHPExcel/IOFactory.php';

// Kiểm tra xem đã submit form chưa
if(isset($_POST['export'])) {
	// Lấy ngày được chọn từ form
	$date = $_POST['date'];

	// Kết nối CSDL
	$conn = mysqli_connect("localhost", "root", "", "website_mvc");
	if (!$conn) {
	    die("Kết nối thất bại: " . mysqli_connect_error());
	}

	// Truy vấn CSDL để lấy dữ liệu đơn hàng
	$sql = "SELECT * FROM tbl_order WHERE DATE(date_order) = '$date'";
	$result = mysqli_query($conn, $sql);

	// Khởi tạo đối tượng PHPExcel
	$objPHPExcel = new PHPExcel();

	// Đặt tên cho các sheet
	$objPHPExcel->getActiveSheet()->setTitle('Thống kê');

	// Thêm các tiêu đề cho sheet
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Thời Gian Đặt');
	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Sản Phẩm');
	$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Số Lượng');
	$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Giá');

	// Đổ dữ liệu vào các cell
	$i = 2;
	while ($row = mysqli_fetch_assoc($result)) {
	    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $row['date_order']);
	    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $row['productName']);
	    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $row['quantity']);
	    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $row['price']);
	    $i++;
	}

	// Xuất file Excel
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="thongke.xlsx"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;
}
?>