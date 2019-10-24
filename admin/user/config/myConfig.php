<?php  
	class Connect{
		private $localhost = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "cse485";
		protected $conn = null;

		function __construct(){
			$this->conn = mysqli_connect($this->localhost, $this->user, $this->pass, $this->db);

			if(!$this->conn){
				echo "Can't connect database";
				exit();
			}else{
				mysqli_set_charset($this->conn, 'utf8');
			}

		}

	}
?>