
<form action="" method="POST">
	<legend>Sửa thông tin học viên</legend>

	<div class="form-group">
		<label for="">Họ tên<span style="color: red;"> *</span></label>
		<input type="text" required class="form-control" name="name" value="<?php if (isset($rs)){ echo $rs['tenHV']; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Số điện thoại<span style="color: red;"> * <?php if(isset($error) && !empty($error)){ echo $error; } ?></span></label>
		<input type="number" required class="form-control" name="phone"  value="<?php if (isset($rs)){ echo $rs['phoneHV']; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="mail" class="form-control" name="e_mail"  value="<?php if (isset($rs)){ echo $rs['email']; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Địa chỉ<span style="color: red;"> *</span></label>
		<input type="text" required class="form-control" name="addres"  value="<?php if (isset($rs)){ echo $rs['address']; } ?>" />
	</div>

	<button type="submit" name="update_member" class="btn btn-primary">Cập nhật</button>
</form>