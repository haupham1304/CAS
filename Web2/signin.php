<?php session_start(); ?>
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
	}

	$sql = "select * from user where username = '$u' and password = '$p'";
    $userList = executeResult($sql);
	if ($userList == NULL) {
        echo '<script type="text/javascript">alert("username hoặc password không đúng");',
			 'window.location = "../cas/signin.php?id=2";',
			 '</script>';
    }
	else {
		$_SESSION['id'] = "2";
		$_SESSION['user'] = $u;
		$_SESSION['pass'] = $p;
		header('Location: welcome.php');
		die();
	}

?>