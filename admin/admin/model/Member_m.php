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

			$sql = "SELECT *FROM tbl_hocvien";
			$query = mysqli_query($this->conn, $sql);
			$result = array();

			while ($row = mysqli_fetch_array($query)) {
				$result[] = array(
					'id_hocvien'	=> $row['id_hocvien'],
					'tenHV'			=> $row['tenHV'],
					'phoneHV'		=> $row['phoneHV'],
					'email'			=> $row['email'],
					'address'		=> $row['adress'],
					'stt'			=> $row['stt']
				);
			}
			return $result;
		}

		// Hàm xử lý thêm thông tin
		public function addMember($id_khoa, $tenHV, $phoneHV, $email, $address){
			$sql = "INSERT INTO tbl_hocvien(id_khoa, tenHV, phoneHV, email, adress) VALUES($id_khoa, '$tenHV', '$phoneHV', '$email', '$address')";
			return mysqli_query($this->conn, $sql);
		}

		// Lấy ra thông tin học viên theo id
		public function getMember_id($id){
			$sql = "SELECT *FROM tbl_hocvien WHERE id_hocvien = $id";
			$query = mysqli_query($this->conn, $sql);
			$result = array();

			$row = mysqli_fetch_array($query);
			$result = array(
				'id_hocvien'	=> $row['id_hocvien'],
				'tenHV'			=> $row['tenHV'],
				'phoneHV'		=> $row['phoneHV'],
				'email'			=> $row['email'],
				'address'		=> $row['adress'],
				'stt'			=> $row['stt']
			);

			return $result;
		}

		// Cập nhật thông tin học viên
		public function update_member($id_hocvien, $tenHV, $phoneHV, $email, $address){
			$sql = "UPDATE tbl_hocvien SET tenHV = '$tenHV', phoneHV = '$phoneHV', email = '$email', adress = '$address' WHERE id_hocvien = $id_hocvien";
			return mysqli_query($this->conn, $sql);
		}

		// Tìm kiếm
		public function search($key){
			$sql = "SELECT *FROM tbl_hocvien WHERE phoneHV LIKE '%$key%'";
			$query = mysqli_query($this->conn, $sql);
			$result = array();

			while ($row = mysqli_fetch_array($query)) {
				$result[] = array(
					'id_hocvien'	=> $row['id_hocvien'],
					'tenHV'			=> $row['tenHV'],
					'phoneHV'		=> $row['phoneHV'],
					'email'			=> $row['email'],
					'address'		=> $row['adress'],
					'stt'			=> $row['stt']
				);
			}
			return $result;
		}

		// Xóa học viên
		public function del_member($id){
			$sql = "DELETE FROM tbl_hocvien WHERE id_hocvien = $id";
			return mysqli_query($this->conn, $sql);
		}

	}

?>