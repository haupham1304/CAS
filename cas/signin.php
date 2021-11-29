<?php

	$id = '';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
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
			<?php
				$link = '';
				if ($id == 1) {
					$link = "../web1/signin.php";
				}
				else {
					$link = "../web2/signin.php";
				}

				echo '<form method="post" action='.$link.'>';
			?>
					<div class="form-group">
					  <label for="user">Username:</label>
					  <input required="true" type="text" class="form-control" id="user" name="user">
					</div>
                    <div class="form-group">
					  <label for="pass">Password:</label>
					  <input required="true" type="password" class="form-control" id="pass" name="pass">
					</div>
					<button class="btn btn-success">Đăng Nhập</button>
				<?php
					$link = '';
					if ($id == 1) {
						$link = "../web1/signup.php";
					}
					else {
						$link = "../web2/signup.php";
					}
					 
                    echo '<a class="btn btn-success" href="'.$link.'">Đăng Ký</a>';
				?>
				</form>
			</div>
		</div>
	</div>

</body>
</html>