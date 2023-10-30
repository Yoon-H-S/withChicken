<?php
	session_start();
    if (!empty($_SESSION["id"])) { //로그인 된 상태이면
        echo "<script>history.back();</script>";
        exit;
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>로그인</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/login_out/css/login.css">
    <script type="text/javascript" src="/withChicken/login_out/js/login.js"></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="greeting">
                닭가슴살 전문 쇼핑몰 같이한닭입니다.<br>
                환영합니다. 어서오세요.
            </div>
            <div class="login">
                <form name="login_form" action="./login_session.php" method="post">
                    <fieldset class="field_log">
                        <legend class="legend_hidden">로그인</legend>
                        <div><input type="text" name="id" placeholder="아이디" tabindex="3" /></div>
                        <div><input type="password" name="pw" placeholder="비밀번호" onkeypress="press()" tabindex="4" /></div>
                        <button type="button" onclick="check_input()" tabindex="5">로그인</button>
                    </fieldset>
                </form>
                <button class="go_sign" type="button" onclick="location.href='/withChicken/signup/signup_terms.php'" tabindex="6">회원가입</button>
                <div class="find_idpw">
                    <a href="">ID 찾기</a>|<a href="">PW 찾기</a>
                </div>
                <div class="sns_log">
                    <div class="naver_log"><a href="/"><img src="./image/naver.png"/></a></div>
                    <div class="kakao_log"><a href="/"><img src="./image/kakao.jpg"/></a></div>
                    <div class="facebook_log"><a href="/"><img src="./image/facebook.png"/></a></div>
                </div>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>