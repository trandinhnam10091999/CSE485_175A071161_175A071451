<form action="" method="POST" role="form">
	<legend>Thêm mới bài viết</legend>

	<div class="form-group">
		<label for="">Tên bài viết<span style="color: red;"> *</span></label>
		<input type="text" required class="form-control" name="name"  value="" />
	</div>

	<div class="form-group">
		<label for="">Ngày viết<span style="color: red;"> *</span></label>
		<input type="date" required class="form-control" name="ngayviet"  value="" />
	</div>

	<div class="form-group">
		<label for="">Mô tả bài viết</label>
		<textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
		<script>
			CKEDITOR.replace('description');
		</script>
	</div>

	<button type="submit" name="add_member" class="btn btn-primary">Thêm mới</button>
</form>