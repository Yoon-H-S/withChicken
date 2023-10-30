<?php
	session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        header("Location:/withChicken/login_out/login.php");
        exit;
    }
    require("./req_order.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>주문 상세 내역</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/mypage/css/order_detail.css">
    <script type="text/javascript" src="/withChicken/mypage/js/order_detail.js"></script>
    <script>
        window.onload = function() {ready(<?=$order_row["oKind"]?>,<?=$order_row["oID"]?>);}
    </script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>마이페이지>주문상세내역</h2>
            </div>
            <div class="prod_head">     
                <div class="prod_kind">
                    <?php switch($order_row["oKind"]) {
                        case 1: echo "주문완료"; break;
                        case 2: echo "배송대기"; break;
                        case 3: echo "배송중"; break;
                        case 4: echo "배송완료"; break;
                        case 5: echo "구매확정"; break;
                    }?>
                </div>
                <div class="prod_btn">
                    <?php if($order_row["oKind"] == 4) { ?>
                    <button onclick="location.href='conf.php?oID=<?=$oID?>'">구매 확정</button>
                    <?php } ?>
                    <button id="kind" onclick=""></button>
                </div>
            </div>
            <div class="prod_info">
                <?php while($products_row = mysqli_fetch_array($products_result)) { ?>
                <div class="prod_container">
                    <div class="prod_img"><img src="<?=$products_row["pImage"]?>"></div>
                    <div class="prod_name">
                    <?=$products_row["pName"]?><br><span class="option">옵션 : <?=$products_row["doOption"]?></span>
                    </div>
                    <div class="prod_cnt"><?=$products_row["doCount"]?>개</div> 
                    <div class="prod_price">
                        <span id="prod_price"><?=number_format($products_row["doPrice"])?></span>
                        <span class="won">원</span>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="info_title">주문정보</div>
            <div class="info_input">
                <div class="tr">
                    <div class="title">주문번호</div>
                    <div class="in"><?=$order_row["oID"]?></div>
                </div>
                <div class="tr">
                    <div class="title">주문일자</div>
                    <div class="in"><?=substr($order_row["oRegist_day"],0,16)?></div>
                </div>
                <div class="tr">
                    <div class="title">주문자</div>
                    <div class="in"><?=$order_row["name"]?></div>
                </div>
            </div>
            <div class="info_title">결제정보</div>
            <div class="info_input">
                <div class="tr">
                    <div class="title">결제수단</div>
                    <div class="in">
                        <?php switch($order_row["oMethod"]) {
                            case 1: echo "신용카드"; break;
                            case 2: echo "무통장입금"; break;
                            case 3: echo "간편결제"; break;
                        }?>
                    </div>
                </div>
                <div class="tr">
                    <div class="title">상품가격</div>
                    <div class="in"><?=number_format($order_row["oProd_price"])?><span class="won">원</span></div>
                </div>
                <div class="tr">
                    <div class="title">배송비</div>
                    <div class="in">+<?=number_format($order_row["oDel_price"])?><span class="won">원</span></div>
                </div>
                <div class="tr">
                    <div class="title">쿠폰할인</div>
                    <div class="in">-<?=number_format($order_row["cPrice"])?><span class="won">원</span></div>
                </div>
                <div class="tr">
                    <div class="title">포인트할인</div>
                    <div class="in">-<?=number_format($order_row["poPrice"])?><span class="won">원</span></div>
                </div>
                <div class="tr">
                    <div class="title">총 주문가격</div>
                    <div class="in"><?=number_format($order_row["oTotal_price"])?><span class="won">원</span></div>
                </div>
            </div>
            <div class="info_title">결제정보</div>
            <div class="info_input">
                <div class="tr">
                    <div class="title">수령자</div>
                    <div class="in"><?=$order_row["dName"]?></div>
                </div>
                <div class="tr">
                    <div class="title">전화번호</div>
                    <div class="in"><?=preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/","\\1-\\2-\\3" ,$order_row["dPhone"])?></div>
                </div>
                <div class="tr">
                    <div class="title">우편번호</div>
                    <div class="in"><?=$order_row["dZip_code"]?></div>
                </div>
                <div class="tr">
                    <div class="title">주소</div>
                    <div class="in"><?=$order_row["dAddress"]?></div>
                </div>
                <div class="tr">
                    <div class="title">배송요청사항</div>
                    <div class="in"><?=$order_row["dRequest"]?></div>
                </div>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>