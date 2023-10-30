<?php
	session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        header("Location:/withChicken/login_out/login.php");
        exit;
    }
    require("./req_lookup.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>주문 조회</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/mypage/css/mypage_lookup.css">
    <script type="text/javascript" src="/withChicken/mypage/js/lookup.js"></script>
    <script>
        window.onload = function() {ready(<?=$oDay?>, <?=$oKind?>);}
    </script>
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
                        <li><a class="highlights" href="./mypage_lookup.php">주문/배송 조회</a></li>
                        <li><a href="mypage_cancel.php">취소/반품/교환 조회</a></li>
                        <li><a href="">관심 상품</a></li>
                        <li><a href="./mypage_memchk.php">내 정보 관리</a></li>
                        <li><a href="">내 문의 관리</a></li>
                    </ul>
                </div>
                <div class="look_info">
                    <div class="look_head">
                        <div class="cnt">조회된 주문 (<?=$count_row["count(*)"]?>)개</div>
                        <div class="method">
                            <div class="method_body">
                                <div id="method_in1" class="method_in">
                                    <a id="method_select1" class="method_select" href="javascript:method_open(1);">
                                        <input type="text" class="input_read" name="card_sel" id="method_choice1" value="" readonly>
                                        <div><img id="list_img1" src="./image/list_hi.jpg"></div>
                                    </a>
                                </div>
                                <div id="method_list1" class="method_list">
                                    <ul class="list_ul">
                                        <li><a href="javascript:method_click('3',1);"><p>최근 3개월</p></a></li>
                                        <li><a href="javascript:method_click('6',1);"><p>최근 6개월</p></a></li>
                                        <li><a href="javascript:method_click('9',1);"><p>최근 9개월</p></a></li>
                                        <li><a href="javascript:method_click('12',1);"><p>최근 1년</p></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="method">
                            <div class="method_body">
                                <div id="method_in2" class="method_in">
                                    <a id="method_select2" class="method_select" href="javascript:method_open(2);">
                                        <input type="text" class="input_read" name="card_sel" id="method_choice2" value="" readonly>
                                        <div><img id="list_img2" src="./image/list_hi.jpg"></div>
                                    </a>
                                </div>
                                <div id="method_list2" class="method_list">
                                    <ul class="list_ul">
                                        <li><a href="javascript:method_click('0',2);"><p>전체</p></a></li>
                                        <li><a href="javascript:method_click('1',2);"><p>주문완료</p></a></li>
                                        <li><a href="javascript:method_click('2',2);"><p>배송대기</p></a></li>
                                        <li><a href="javascript:method_click('3',2);"><p>배송중</p></a></li>
                                        <li><a href="javascript:method_click('4',2);"><p>배송완료</p></a></li>
                                        <li><a href="javascript:method_click('5',2);"><p>구매확정</p></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="look_body">
                        <?php while($order_row = mysqli_fetch_array($order_result)) { $oID = $order_row["oID"];?>
                        <div class="look_container">    
                            <div class="look_con_head">
                                <div class="oKind">
                                    <?php switch($order_row["oKind"]) {
                                        case 1: echo "주문완료"; break;
                                        case 2: echo "배송대기"; break;
                                        case 3: echo "배송중"; break;
                                        case 4: echo "배송완료"; break;
                                        case 5: echo "구매확정"; break;
                                    }?>
                                </div>
                                <div>|</div>
                                <div class="oDay"><?=substr($order_row["oRegist_day"],0,16)?></div>
                                <div>|</div>
                                <div class="oID">주문번호 : <?=$order_row["oID"]?></div>
                                <div class="go_detail"><a href="order_detail.php?oID=<?=$oID?>">주문상세보기></a></div>
                            </div>
                            <div class="look_con_body">
                                <?php
                                    $con = mysqli_connect("localhost", "root", "", "shop","3307");
                                    $sql = "select * from order_products op, product p where op.oID='$oID' and op.pID = p.pID";
                                    $products_result = mysqli_query($con, $sql);
                                    mysqli_close($con);
                                    while($products_row = mysqli_fetch_array($products_result)) {
                                ?>
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
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>