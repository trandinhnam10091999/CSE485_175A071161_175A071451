<?php 
	if (isset($_POST['sm_login'])) {
		
		$userName = mysqli_real_escape_string($conn, $_POST['user']);
		$passWord = mysqli_real_escape_string($conn, $_POST['passw']);

		$sql = "SELECT *FROM tbl_user WHERE email = '$userName' AND stt_user = 1"; // câu lệnh sql
		$query = mysqli_query($conn, $sql); // truy vấn câu lệnh lên csdl
		$count = mysqli_num_rows($query); // Đếm số bản ghi trả ra
		$row = mysqli_fetch_array($query);

		if (isset($count) && $count == 1 && password_verify($passWord,$row['passw'])) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['name'] = $row['name'];
			header("Location: admin/index.php");
		}else{
			echo "<p style='color: red'>UserName hoặc Password không đúng!</p>";
		}

	}
 ?>
<form action="" method="POST">
	<legend>Đăng nhập hệ thống</legend>

	<div class="form-group">
		<label for="">Username</label>
		<input type="email" required name="user" class="form-control" value="<?php if(isset($userName)){ echo $userName; } ?>" placeholder="Nhập email của bạn">
	</div>

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" required name="passw" class="form-control" value="" placeholder="Nhập pass">
	</div>

	<button type="submit" name="sm_login" class="btn btn-primary">Đăng nhập</button>
	<span>Nếu bạn chưa có tài khoản? <a href="index.php?page=register" style="color: red;">Đăng ký</a></span>
</form>