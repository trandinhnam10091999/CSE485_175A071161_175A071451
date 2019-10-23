<div class="table-responsive">
	<h4>DS học viên IT-Plus</h4>

	<form action="" method="POST">
	
		<div class="form-group">
			<input type="number" class="form-control" name="key" id="" placeholder="Nhập số điện thoại cần tìm..." value="<?php if(isset($key)){ echo $key; } ?>">
		</div>
	
		<button type="submit" class="btn btn-primary" name="search">Tìm kiếm</button>
	</form>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Họ tên</th>
				<th>SĐT</th>
				<th>Email</th>
				<th>Địa chỉ</th>
				<th>Chức năng</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$dem = 0;
				foreach ($rs as $key => $value) {
					$dem += 1;
			?>
					<tr>
						<td><?php echo $dem; ?></td>
						<td><?php echo $value['tenHV']; ?></td>
						<td><?php echo $value['phoneHV']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><?php echo $value['address']; ?></td>
						<td>
							<a href="index.php?method=edit&id=<?php echo $value['id_hocvien']; ?>">
								<button class="btn btn-primary">Sửa</button>
							</a>
							<a onclick="return confirm('Bạn có muốn xóa học viên này không?');" href="index.php?method=del&id=<?php echo $value['id_hocvien']; ?>">
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