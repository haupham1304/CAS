<?php
require_once ('dbhelp.php');
	$s_fname = $s_email = $s_user = $s_pass = $s_repass = '';

	if (!empty($_POST)) {

		$error = array();

        if (isset($_POST['fname'])) {
			$s_fname = $_POST['fname'];
		}
	
		if (isset($_POST['email'])) {
			$s_email = $_POST['email'];
		}
	
		if (isset($_POST['user'])) {
			$s_user = $_POST['user'];
		}
	
		if (isset($_POST['pass'])) {
			$s_pass = $_POST['pass'];
		}
		
        if (isset($_POST['repass'])) {
			$s_repass = $_POST['repass'];
		}

		if (strcasecmp($s_pass, $s_repass) != 0) {
			$error['password'] = "Confirm password không đúng";
            echo '<script type="text/javascript">alert("Confirm password không đúng")</script>';
		}

    	$sql = "select * from user where username = '$s_user'";
    	$userList = executeResult($sql);
    	if ($userList != NULL) {
        	$error['username'] = "Username này đã được sử dụng";
        	echo '<script type="text/javascript">alert("Username này đã được sử dụng")</script>';
    	}

		$s_fname    = str_replace('\'', '\\\'', $s_fname);
		$s_email    = str_replace('\'', '\\\'', $s_email);
		$s_user     = str_replace('\'', '\\\'', $s_user);
		$s_pass     = str_replace('\'', '\\\'', $s_pass);

		if (empty($error)) {
			$s_pass = md5($s_pass);
			$sql = "insert into user(id, fullname, email, username, password) value('', '$s_fname', '$s_email', '$s_user', '$s_pass')";
			execute($sql);
			echo '<script type="text/javascript">alert("Đăng ký tài khoản thành công");',
				 'window.location = "../cas/signin.php?id=2";',
				 '</script>';
			die();
		}
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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
				<h2 class="text-center">Thêm người dùng mới</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="fn">Full Name:</label>
					  <input required="true" type="text" class="form-control" id="fn" name="fname">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="text" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
					  <label for="user">Username:</label>
					  <input required="true" type="text" class="form-control" id="user" name="user">
					</div>
					<div class="form-group">
					  <label for="pass">Password:</label>
					  <input required="true" type="password" class="form-control" id="pass" name="pass">
					</div>
                    <div class="form-group">
					  <label for="repass">Confirm Password:</label>
					  <input required="true" type="password" class="form-control" id="repass" name="repass">
					</div>
					<button class="btn btn-success">Đăng Ký</button>
                    <a class="btn btn-success" href="signin.php">
                        Đăng Nhập
                    </a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>