<?php
	session_start();
    if (!empty($_SESSION["id"])) { //로그인 된 상태이면
        header("Location:/withChicken/main/main.php");
        exit;
    }
    require("./req_member_insert.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원가입>완료</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/signup/css/signup_complete.css">
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>회원가입>완료</h2>
            </div>
            <div class="greeting">
                <?=$name?>고객님의 같이한닭 <span>회원가입이 완료</span>되었습니다.
            </div>
            <div class="btn">
                <button class="go_login" type="button" onclick="location.href='/withChicken/login_out/login.php'">로그인 페이지로 이동</button>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>