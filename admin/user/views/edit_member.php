

<form action="" method="POST">
	<legend>Sửa bài viết</legend>

	<div class="form-group">
		<label for="">Tên bài viết<span style="color: red;"> *</span></label>
		<input type="text" required class="form-control" name="name" value="<?php if (isset($rs)){ echo $rs['ten_baiviet']; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Ngày viết<span style="color: red;"> *</span></label>
		<input type="date" required class="form-control" name="ngayviet"  value="<?php if (isset($rs)){ echo $rs['ngayviet']; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Mô tả bài viết</label>
		<textarea class="form-control" name="description" id="description" cols="30" rows="10" value="123">
			<?php if (isset($rs)){ echo $rs['noidung']; } ?>
		</textarea>
		<script>
			CKEDITOR.replace('description');
		</script>
	</div>
	

	<button type="submit" name="update_member" class="btn btn-primary">Cập nhật</button>
</form>