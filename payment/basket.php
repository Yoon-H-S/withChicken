<?php
	session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        header("Location:/withChicken/login_out/login.php");
        exit;
    }
    require("./req_basket.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>장바구니</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/payment/css/basket.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="/withChicken/payment/js/basket.js"></script>
    <script>
        window.onload = function () {totalPrice();}
    </script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>장바구니</h2>
            </div>
            <?php if($count_row["count(*)"] > 0) { ?>
            <div class="basket">
                <div class="basket_top">
                    <div class="choice_all">
                        <input name="cbx_chkAll" class="none" id="checkAll" type="checkbox">
                        <label class="check" for="checkAll"></label> 전체선택
                    </div>
                    <button type="button" class="choice_delete" onclick="choice_delete()">선택삭제</button>
                </div>
                <div class="basket_body">
                    <div class="basket_info">
                        <?php while($row = mysqli_fetch_array($result)) { ?>
                        <div class="basket_container">
                            <input name="chk" class="none" id="check<?=$count?>" type="checkbox" value="<?=$row['bID']?>">
                            <label class="check" for="check<?=$count?>"></label>
                            <div class="basket_img"><img src="<?=$row["pImage"]?>"></div>
                            <div class="basket_name">
                                <?=$row["pName"]?><br><span class="option">옵션 : <?=$row["pOptionName"]?></span>
                            </div>
                            <div class="cnt">
                                <button type="button" onclick="count('minus','<?=$count?>','<?=$row['bID']?>');"><img src="./image/minus.jpg"></button>
                                <input id="count<?=$count?>" type="text" value="<?=$row["pCount"]?>">
                                <button type="button" onclick="count('plus','<?=$count?>','<?=$row['bID']?>');"><img src="./image/plus.jpg"></button>
                            </div> 
                            <div class="basket_price">
                                <span id="basket_price<?=$count?>"><?=number_format($row["pOptionPrice"]*$row["pCount"])?></span>
                                <span class="won">원</span>
                            </div>
                            <a class="basket_trash" href="./basket_delete.php?bID=<?=$row['bID']?>"><img src="./image/trash.jpg"></a>
                        </div>
                        <script>ready(<?=$count?>,<?=$row["pOptionPrice"]?>,<?=$row["pCount"]?>,<?=$row["pDelPrice"]?>);</script>
                        <?php $count++; } ?>
                    </div>
                </div>
                <div class="basket_under">
                    <div class="total_price">상품가격<p class="price"><span id="prod_price"></span><span class="won">원</span></p></div>
                    <div class="plus">+</div>
                    <div class="total_price">배송비<p class="price"><span id="del_price"></span><span class="won">원</span></p></div>
                    <div class="equal">=</div>
                    <div class="total_price">총가격<p class="price"><span id="total_price"></span><span class="won">원</span></p></div>
                    <button class="basket_order" onclick="location.href = 'go_purchase.php'">주문하기</button>
                </div>
                <div class="note">
                    상품에 따라 배송비가 차이가 있을 수 있습니다.<br>
                    총 가격에 따라 배송비가 차이가 있을 수 있습니다.
                </div>
            </div>
            <?php } else { ?>
            <div class="no_prod">
                <div class="error"><img src="./image/error.jpg"></div>
                <div class="error_message">장바구니에 담긴 상품이 없습니다.</div>
                <a class="go_shopping" href="/withChicken/main/main.php">쇼핑하러가기</a>
            </div>
            <?php } ?>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>