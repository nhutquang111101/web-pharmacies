<!-- <?php 
include 'excel/PHPExcel.php';

 if(isset($_POST['btnExport'])) {

		$date = $_POST['date'];

        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('A1');

        $rowCount = 1;
        $sheet->setCellValue('A'.$rowCount,'Thời Gian Đặt');
        $sheet->setCellValue('B'.$rowCount,'Sản Phẩm');
        $sheet->setCellValue('C'.$rowCount,'Số Lượng');
        $sheet->setCellValue('D'.$rowCount,'Giá');

        $sql = "SELECT * FROM tbl_order WHERE DATE(date_order) = '$date'";
        $result = mysqli_query($conn, $sql);

        while($rows = mysqli_fetch_array($result)){
            $rowCount++;
            $sheet->setCellValue('A'.$rowCount, $rows['date_order']);
            $sheet->setCellValue('B'.$rowCount, $rows['productName']);
            $sheet->setCellValue('D'.$rowCount, $rows['quantity']);
            $sheet->setCellValue('D'.$rowCount, $rows['price']);
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
        $filename = 'thongke.xlsx';
        $objWriter->save($filename);

        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
		// header('Content-Type: application/vnd.ms-excel');
        header('Content-Length: '.filesize($filename));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: no-cache');
        readfile($filename);
		unlink($filename);
        return;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xuất Dữ liệu</title>
</head>
<body>
	<form method="POST">
	<label>Chọn ngày: </label>
			<input type="date" name="date" required>
		<button name="btnExport" type="submit">Xuất File</button>
	</form>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Xuất file Excel với PHP</title>
</head>
<body>
    <h1>Xuất file Excel với PHP</h1>
    <form method="POST" action="export.php">
        <label for="date">Chọn ngày:</label>
        <input type="date" id="date" name="date">
        <button type="submit">Xuất Excel</button>
    </form>
</body>
</html>