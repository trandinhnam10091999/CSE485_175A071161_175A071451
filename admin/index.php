<?php 
	session_start();

	if (isset($_SESSION['id'])) {
		header("Location: admin/");
	}
	include_once 'config/myConfig.php'; 

 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		
	</head>
	<body>
		<div class="container">
			
			<div class="row" style="margin-top: 150px;">
				<div class="col-md-6 col-md-push-3">
					<?php 

						if (isset($_GET['page'])) {  
							$page = $_GET['page'];
						}else{ $page = 'login'; }

						switch ($page) {
							case 'register':
								include 'views/register.php';
								break;
							
							case 'login':
								include 'views/login.php';
								break;

							default:
								echo "<h3 style='color: red;'>EROR 404 trang không tồn tại!</h3>";
								break;
						}

					 ?>
				</div>
			</div>

		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>