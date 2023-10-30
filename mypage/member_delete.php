<?php
	session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        header("Location:/withChicken/login_out/login.php");
        exit;
    }
    require("./req_delete.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>마이페이지>회원탈퇴</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/mypage/css/member_delete.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="/withChicken/mypage/js/member_delete.js"></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>마이페이지>회원탈퇴</h2>
            </div>
            <div class="terms">
                <div class="terms_sub">
                    <textarea readonly><?=$terms?></textarea>
                </div>
                <p>
                    <input type="checkbox" id="check1" name="chk" value="1">
                    <label class="check" for="check1"></label>
                    <span>해당 내용을 모두 확인했으며, 회원 탈퇴에 동의합니다.</span>
                </p>
                <div class="terms_btn">
                    <button id="btn_chkAll" type="button" disabled="disabled" onclick="del()">탈퇴하기</button>
                </div>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>