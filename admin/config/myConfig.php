<?php  
	$conn = mysqli_connect("localhost", "id11164361_trandinhnam", "1234567890", "id11164361_cse485") or die("Can't connect database");
	if ($conn) {
		// echo "Kết nối database thành công!";
		mysqli_set_charset($conn, 'utf8');
	}else{
		echo "Lỗi kết nối!";
	}
?>