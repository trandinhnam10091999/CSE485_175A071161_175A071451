<form action="" method="POST" role="form">
	<legend>Thêm mới học viên</legend>

	<div class="form-group">
		<label for="">Họ tên<span style="color: red;"> *</span></label>
		<input type="text" required class="form-control" name="name"  value="<?php if(isset($name)){ echo $name; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Số điện thoại<span style="color: red;"> * <?php if(isset($error) && !empty($error)){ echo $error; } ?></span></label>
		<input type="number" required class="form-control" name="phone" placeholder=""value="<?php if(isset($phone)){ echo $phone; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="mail" class="form-control" name="e_mail" placeholder="" value="<?php if(isset($e_mail)){ echo $e_mail; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Địa chỉ<span style="color: red;"> *</span></label>
		<input type="text" required class="form-control" name="addres"  value="<?php if(isset($addres)){ echo $addres; } ?>" />
	</div>

	<button type="submit" name="add_member" class="btn btn-primary">Thêm mới</button>
</form>