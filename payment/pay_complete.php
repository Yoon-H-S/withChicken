<?php
	session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        header("Location:/withChicken/login_out/login.php");
        exit;
    }
    require("./req_complete.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>주문>완료</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/payment/css/pay_complete.css">
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>주문>완료</h2>
            </div>
                <div class="complete">주문이 성공적으로 완료되었습니다</div>
                <div class="prod_cnt">주문상품 (<?=$count_row["count(*)"]?>)개</div>
                <div class="prod_info">
                    <?php while($prod_row = mysqli_fetch_array($prod_result)) { ?>
                    <div class="basket_container">
                        <div class="basket_img"><img src="<?=$prod_row["pImage"]?>"></div>
                        <div class="basket_name">
                            <?=$prod_row["pName"]?><br><span class="option">옵션 : <?=$prod_row["doOption"]?></span>
                        </div>
                        <div class="cnt"><?=$prod_row["doCount"]?>개</div> 
                        <div class="basket_price">
                            <span id="basket_price"><?=number_format($prod_row["doPrice"])?></span>
                            <span class="won">원</span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div id="total_pay">
                    <span class="total">최종결제금액 :</span>
                    <span id="total_price"><?=number_format($oTotal_price)?></span>
                    <span class="won">원</span>
                </div>
                <div class="order_btn">
                    <button id="order_look" type="button" onclick="location.href='/withChicken/mypage/mypage_lookup.php'">주문 조회 페이지로 이동</button>
                </div>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>
