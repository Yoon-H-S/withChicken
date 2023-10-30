<?php
	session_start();
    if (!empty($_SESSION["id"])) { //로그인 된 상태이면
        header("Location:/withChicken/main/main.php");
        exit;
    }
    require("./req_signup_terms.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원가입>이용약관</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/signup/css/signup_terms.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="/withChicken/signup/js/signup_terms.js" ></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>회원가입>이용약관</h2>
            </div>
            <div class="terms">
                <div class="terms_sub">
                    <textarea readonly><?=$terms1?></textarea>
                </div>
                <p>
                    <input type="checkbox" id="check1" name="chk" value="1">
                    <label class="check" for="check1"></label>
                    <span>동의</span>
                </p>
                <div class="terms_sub">
                    <textarea readonly><?=$terms2?></textarea>
                </div>
                <p>
                    <input type="checkbox" id="check2" name="chk" value="1">
                    <label class="check" for="check2"></label>
                    <span>동의</span>
                </p>
                <div class="terms_sub">
                    <textarea readonly><?=$terms3?></textarea>
                </div>
                <p>
                    <input type="checkbox" id="check3" name="chk" value="1">
                    <label class="check" for="check3"></label>
                    <span>동의</span><br><br>
                    <input name="cbx_chkAll" id="check4" type="checkbox">
                    <label class="check" for="check4"></label>
                    <span>전체동의</span>
                </p>
                <div class="terms_btn">
                    <button id="btn_chkAll" type="button" disabled="disabled" onclick="location.href='./signup_info.php'">다음</button>
                </div>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>