<div class="table-responsive">
	<h4>DS bài viết</h4>

	<form action="" method="POST">
	
		<div class="form-group">
			<input type="test" class="form-control" name="key" id="" placeholder="Nhập tên bài viết cần tìm..." value="<?php if(isset($key)){ echo $key; } ?>">
		</div>
	
		<button type="submit" class="btn btn-primary" name="search">Tìm kiếm</button>
	</form>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên bài viết</th>
				<th>Nội dung</th>
				<th>Ngày viết</th>
				<th>Chức năng</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$dem = 0;
				
				/*echo "<pre>";
				print_r($rs);
				echo "</pre>";*/
				foreach ($rs as $key => $value) {
					$dem += 1;
			?>
					<tr>
						<td><?php echo $dem; ?></td>
						<td><?php echo $value['ten_baiviet']; ?></td>
						<td><?php echo $value['noidung']; ?></td>
						<td><?php echo $value['ngayviet']; ?></td>

						<td>
							<a href="index.php?method=edit&id=<?php echo $value['id_baiviet']; ?>">
								<button class="btn btn-primary">Sửa</button>
							</a>
							<a onclick="return confirm('Bạn có muốn xóa bài viết này không?');" href="index.php?method=del&id=<?php echo $value['id_baiviet']; ?>">
								<button class="btn btn-danger">Xóa</button>
							</a>
						</td>
					</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>