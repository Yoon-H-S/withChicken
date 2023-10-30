<?php
	session_start();
    if (!empty($_SESSION["admin_id"])) { //로그인 된 상태이면
        header("Location:/withChicken/admin/admin_page.php");
        exit;
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>관리자>로그인</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/admin/css/admin_login.css">
    <script type="text/javascript" src="/withChicken/admin/js/admin_login.js"></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/admin/admin_index/admin_header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="greeting">
                같이한닭 관리자 페이지입니다.<br>
                접근을 위해 로그인하세요.
            </div>
            <div class="login">
                <form name="admin_login_form" action="./admin_login_session.php" method="post">
                    <fieldset class="field_log">
                        <legend class="legend_hidden">로그인</legend>
                        <div><input type="text" name="admin_id" placeholder="아이디" tabindex="3" /></div>
                        <div><input type="password" name="admin_pw" placeholder="비밀번호" onkeypress="press()" tabindex="4" /></div>
                        <button type="button" onclick="check_input()" tabindex="5">관리자 로그인</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/admin/admin_index/admin_footer.php"); ?>
</body>
</html>