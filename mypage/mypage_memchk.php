<?php
	session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        header("Location:/withChicken/login_out/login.php");
        exit;
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>마이페이지>내 정보 수정</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/mypage/css/mypage_memchk.css">
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>마이페이지</h2>
            </div>
            <div class="content_div">
                <div class="list">
                    <ul>
                        <li><a href="./mypage_lookup.php">주문/배송 조회</a></li>
                        <li><a href="mypage_cancel.php">취소/반품/교환 조회</a></li>
                        <li><a href="">관심 상품</a></li>
                        <li><a class="highlights" href="./mypage_memchk.php">내 정보 관리</a></li>
                        <li><a href="">내 문의 관리</a></li>
                    </ul>
                </div>
                <div class="meminfo">
                    <h3>보안을 위해 비밀번호를 입력하세요.</h3>
                    <form action="./password_chk.php" method="post">
                        <div class="pw">
                            <input type="password" name="pw">
                        </div>
                        <button type="submit" class="btn">확인하기</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>