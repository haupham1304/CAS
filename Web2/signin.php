<?php
require_once ('dbhelp.php');

	$u = $p = '';

	if (!empty($_POST)) {

        if (isset($_POST['user'])) {
			$u = $_POST['user'];
		}
	
		if (isset($_POST['pass'])) {
			$p = $_POST['pass'];
		}

		$p = md5($p);

		$sql = "select * from user where username = '$u' and password = '$p'";
    	$userList = executeResult($sql);
		if ($userList == NULL) {
        	echo '<script type="text/javascript">alert("username hoặc password không đúng")</script>';
    	}
		else {
			header('Location: welcome.php');
			die();
		}
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Đăng Nhập</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="user">Username:</label>
					  <input required="true" type="text" class="form-control" id="user" name="user">
					</div>
                    <div class="form-group">
					  <label for="pass">Password:</label>
					  <input required="true" type="password" class="form-control" id="pass" name="pass">
					</div>
					<button class="btn btn-success">Đăng Nhập</button>
                    <a class="btn btn-success" href="signup.php">
                        Đăng Ký
                    </a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>