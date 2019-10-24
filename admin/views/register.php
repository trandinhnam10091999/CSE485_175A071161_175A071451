<?php
 	include_once 'config/myConfig.php';
	if (isset($_POST['sm_register'])) {
		$userName = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['user']);
		$passWord = mysqli_real_escape_string($conn, $_POST['passw']);
		$repassWord = mysqli_real_escape_string($conn, $_POST['confirm_pass']);
		$regexName = '/^[^\d+]*[\d+]{0}[^\d+]*$/';
		if (!preg_match($regexName, $userName)) {
			// $error_Name = "Họ tên không hợp lệ!";
			$userName = "";
			$error = 1;
		}else{
			$error = 0;
		}
		if ($passWord != $repassWord) {
			$error_Pass="Mật khẩu không trùng khớp";
			$passWord = "";
			$repassWord = "";
		}
		$passW=password_hash($passWord,PASSWORD_BCRYPT);
		
		if ($error!=1) {
			$sql = "SELECT * FROM tbl_user where email like '%$email' ";
			$query = mysqli_query($conn,$sql);
			$num = mysqli_num_rows($query);
			if($num > 0){
				$error_Name = 'Tài khoản đã tồn tại';
			}else{
				$sql="INSERT into tbl_user(name,email,passw) values ('$userName','$email','$passW') ";
				$query= mysqli_query($conn,$sql);
				$noti="Đăng kí thành công";
			}
			
		}else{
			$error_Name = "Họ tên không hợp lệ!";

		}



	}
 ?>
<form action="" method="POST">
	<legend>Đăng ký tài khoản</legend>
	<span style="color: red;"><?php if(isset($noti)){ echo $noti; } ?></span>

	<div class="form-group">
		<label for="">Họ tên <span style="color: red;">(*)</span></label><span style="color: red;"><?php if(isset($error_Name)){ echo $error_Name; } ?></span>
		<input type="text" required name="name" class="form-control" value="<?php if(isset($userName)){ echo $userName; }else{ } ?>" placeholder="Nhập họ tên của bạn">
	</div>

	<div class="form-group">
		<label for="">Tài khoản (Email) <span style="color: red;">(*)</span></label>
		<input type="email" required name="user" class="form-control" value="<?php if(isset($email)){ echo $email; }else{ } ?>" placeholder="Nhập email của bạn">
	</div>

	<div class="form-group">
		<label for="">Mật khẩu <span style="color: red;">(*)</span></label>
		<input type="password" required name="passw" class="form-control" value="<?php if(isset($passWord)){ echo $passWord; }else{ } ?>" placeholder="*******" >
	</div>

	<div class="form-group">
		<label for="">Xác nhận lại mật khẩu <span style="color: red;">(*)</span></label><span style="color: red;"><?php if(isset($error_Pass)){ echo $error_Pass; } ?></span>
		<input type="password" required name="confirm_pass" class="form-control" value="<?php if(isset($repassWord)){ echo $repassWord; }else{ } ?>" placeholder="******">
	</div>

	<button type="submit" name="sm_register" class="btn btn-danger">Đăng ký </button>
	<span>Bạn đã có tài khoản <a href="index.php">Đăng nhập</a></span>

</form>