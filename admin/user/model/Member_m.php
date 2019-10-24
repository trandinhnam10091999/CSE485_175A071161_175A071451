<?php  
	include_once 'config/myConfig.php';

	
	class Member_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct(); // parent từ khóa gọi tới hàm được kế thừa từ cha, lớp cha ở đây là Connect. Hàm tự động chạy thì chúng ta luôn có được biến $this->conn (kết nối lên db)
		}

		// Tất cả các hàm truy vấn tới database

		// Lấy ra thông tin học viên
		public function getAll_member(){

			$sql = "SELECT *FROM tbl_baiviet ";
			$query = mysqli_query($this->conn, $sql);
			$result = array();
			/*$row = mysqli_fetch_array($query);*/

			while ($row = mysqli_fetch_array($query)) {
				$result[] = array(
					'id_baiviet'	=> $row['id'],
					'ten_baiviet'	=> $row['name'],
					'noidung'		=> $row['des'],
					'ngayviet'		=> $row['ngayviet']
				);
			}
			return $result;
		}

		// Hàm xử lý thêm thông tin
		public function addMember($ten_baiviet,$ngayviet, $noidung){
			$sql = "INSERT INTO tbl_baiviet(name, ngayviet, des) VALUES('$ten_baiviet','$ngayviet' ,'$noidung')";
			return mysqli_query($this->conn, $sql);
		}

		// Lấy ra thông tin học viên theo id
		public function getMember_id($id){
			$sql = "SELECT *FROM tbl_baiviet WHERE id = $id";
			$query = mysqli_query($this->conn, $sql);
			$result = array();

			$row = mysqli_fetch_array($query);
			$result = array(
				'id_baiviet'	=> $row['id'],
				'ten_baiviet'	=> $row['name'],
				'noidung'		=> $row['des'],
				'ngayviet'		=> $row['ngayviet']
			);

			return $result;
		}

		// Cập nhật thông tin học viên
		public function update_member($id_baiviet,$ten_baiviet, $ngayviet, $noidung){
			$sql = "UPDATE tbl_baiviet SET name = '$ten_baiviet', ngayviet = '$ngayviet', des = '$noidung' WHERE id = $id_baiviet";
			return mysqli_query($this->conn, $sql);
		}

		// Tìm kiếm
		public function search($key){
			$sql = "SELECT *FROM tbl_baiviet WHERE name LIKE '%$key%'";
			$query = mysqli_query($this->conn, $sql);
			$result = array();

			while ($row = mysqli_fetch_array($query)) {
				$result[] = array(
					'id_baiviet'	=> $row['id'],
					'ten_baiviet'	=> $row['name'],
					'ngayviet'		=> $row['ngayviet'],
					'noidung'		=> $row['des']
					
				);
			}
			return $result;
		}

		// Xóa học viên
		public function del_member($id){
			$sql = "DELETE FROM tbl_baiviet WHERE id = $id";
			return mysqli_query($this->conn, $sql);
		}

	}

?>