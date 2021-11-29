<?php session_start(); ?>

<!DOCTYPE html>
<html>
<!-- Page header -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <title>Home</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <header>
        <h3 class="title">
            Web 1
        </h3>
    </header>
    <section class="table-infor">
        <article class="table">
            <div class="table-content">
                <div class="content">
                <?php
                    $link = '';
                    if (!empty($_SESSION)) {
                        $link = "signin.php";
                    }
                    else {
                        $link = "../cas/signin.php?id=1";
                    }
                    echo '<a class="signin" href="'.$link.'">Đăng Nhập</a>';
                ?>
                    <a class="signup" href="signup.php">Đăng Ký</a>
                </div>
            </div>
        </article>
    </section>
</body>

</html>