<?php  
	include_once 'model/Member_m.php';

	/**
	 * 
	 */
	class Member_c extends Member_m
	{
		
		private $mem;

		function __construct()
		{
			$this->mem = new Member_m();
		}

		public function member(){

			// Điều hướng, liệt kê, thêm - sửa - xóa thông tin học viên
			$method = 'list';
			if (isset($_GET['method'])) {
				$method = $_GET['method'];
			}else{ }

			switch ($method) {

				case 'list':
					$key = '';
					if (isset($_POST['search'])) {
						$key = $_POST['key'];
						$rs = $this->mem->search($key);
					}else{
						$rs = $this->mem->getAll_member();
					}

					include_once 'views/list_member.php';
					break;

				case 'add':
					if (isset($_POST['add_member'])) {
						$ten_baiviet = $_POST['name'];
						$ngayviet=$_POST['ngayviet'];
						$noidung = $_POST['description'];
						

						$add = $this->mem->addMember($ten_baiviet,$ngayviet, $noidung);
						if ($add) {
							echo "<script>alert('Thêm mới thành công!');";
							echo "location.href='index.php?method=list';</script>";
						}else{
							echo "Thêm mới thất bại!";
						}
					}

					include_once 'views/add_member.php';
					break;

				case 'edit':
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
					}else{
						header("Location: index.php");
					}
					$rs = $this->mem->getMember_id($id);

					if (isset($_POST['update_member'])) {
						$ten_baiviet = $_POST['name'];
						$ngayviet = $_POST['ngayviet'];
						$noidung = $_POST['description'];
						

						$check = $this->mem->update_member($id ,$ten_baiviet, $ngayviet, $noidung);
						if ($check) {
							echo "<script>alert('Cập nhật thành công!');";
							echo "location.href='index.php?method=list';</script>";
						}else{
							echo "Lỗi cập nhật";
						}
					}

					include_once 'views/edit_member.php';
					break;

				case 'del':
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
					}else{
						header("Location: index.php");
					}

					$this->mem->del_member($id);
					/*header("Location: index.php");*/
					echo "<script>alert('Xóa thành công!');";
					echo "location.href='index.php?method=list';</script>";
					break;

				default:
					# code...
					break;
			}
		}

	}

?>