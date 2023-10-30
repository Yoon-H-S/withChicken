<?php
	session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        header("Location:/withChicken/login_out/login.php");
        exit;
    }
    require("./req_payment.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>주문>결제</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/payment/css/payment.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="/withChicken/payment/js/payment.js"></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>주문>결제</h2>
            </div>
            <div class="total_pay">
                <div class="total_price">상품가격<p class="price"><?=number_format($prod_price)?><span class="won">원</span></p></div>
                <div class="plus">+</div>
                <div class="total_price">배송비<p class="price"><?=number_format($del_price)?><span class="won">원</span></p></div>
                <div class="minus">-</div>
                <div class="total_price">쿠폰할인<p class="price"><?=number_format($cName)?><span class="won">원</span></p></div>
                <div class="minus">-</div>
                <div class="total_price">포인트할인<p class="price"><?=number_format($poName)?><span class="won">원</span></p></div>
                <div class="equal">=</div>
                <div class="total_price">총가격<p class="price"><?=number_format($total_price)?><span class="won">원</span></p></div>
            </div>
            <form name="select_form" action="order_product.php" method="post">
                <div class="select_method">
                    <div class="method_container">
                        <div class="delivery_terms"><input class="none" id="cards" name="select" type="radio" value="1">신용카드</div>
                        <div id="card">
                            <div class="method">
                                <div class="title">카드사&nbsp;:&nbsp;</div>
                                <div class="method_body">
                                    <div id="method_in1" class="method_in">
                                        <a id="method_select1" class="method_select" href="javascript:method_open(1);">
                                            <input type="text" class="input_read" name="card_sel" id="method_choice1" value="" readonly>
                                            <div><img id="list_img1" src="./image/list_hi.jpg"></div>
                                        </a>
                                    </div>
                                    <div id="method_list1" class="method_list">
                                        <ul class="list_ul">
                                            <li><a href="javascript:method_click('우리카드',1);"><p>우리카드</p></a></li>
                                            <li><a href="javascript:method_click('NH농협카드',1);"><p>NH농협카드</p></a></li>
                                            <li><a href="javascript:method_click('하나카드',1);"><p>하나카드</p></a></li>
                                            <li><a href="javascript:method_click('국민카드',1);"><p>국민카드</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="method">
                                <div class="title">할부&nbsp;:&nbsp;</div>
                                <div class="method_body">
                                    <div id="method_in2" class="method_in">
                                        <a id="method_select2" class="method_select" href="javascript:method_open(2);">
                                            <input type="text" class="input_read" name="card_ins" id="method_choice2" value="" readonly>
                                            <div><img id="list_img2" src="./image/list_hi.jpg"></div>
                                        </a>
                                    </div>
                                    <div id="method_list2" class="method_list">
                                        <ul class="list_ul">
                                            <li><a href="javascript:method_click('일시불',2);"><p>일시불</p></a></li>
                                            <li><a href="javascript:method_click('1개월',2);"><p>1개월</p></a></li>
                                            <li><a href="javascript:method_click('2개월',2);"><p>2개월</p></a></li>
                                            <li><a href="javascript:method_click('3개월',2);"><p>3개월</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="method_container">
                        <div class="delivery_terms"><input class="none" id="deposits" name="select" type="radio" value="2">무통장입금</div>
                        <div id="deposit">
                            <div class="method">
                                <div class="title">은행&nbsp;:&nbsp;</div>
                                <div class="method_body">
                                    <div id="method_in3" class="method_in">
                                        <a id="method_select3" class="method_select" href="javascript:method_open(3);">
                                            <input type="text" class="input_read" name="dep_sel" id="method_choice3" value="" readonly>
                                            <div><img id="list_img3" src="./image/list_hi.jpg"></div>
                                        </a>
                                    </div>
                                    <div id="method_list3" class="method_list">
                                        <ul class="list_ul">
                                            <li><a href="javascript:method_click('우리',3);"><p>우리</p></a></li>
                                            <li><a href="javascript:method_click('NH농협',3);"><p>NH농협</p></a></li>
                                            <li><a href="javascript:method_click('하나',3);"><p>하나</p></a></li>
                                            <li><a href="javascript:method_click('국민',3);"><p>국민</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="method">
                                <div class="title">입금자명&nbsp;:&nbsp;</div>
                                <div id="method_in" class="method_in"><input type="text" name="dep_name" class="method_input"></div>
                            </div>
                        </div>
                    </div>
                    <div class="method_container">
                        <div class="delivery_terms"><input class="none" id="simples" name="select" type="radio" value="3">간편결제</div>
                        <div id="simple">
                            <div class="method">
                                <div class="title">페이&nbsp;:&nbsp;</div>
                                <div class="method_body">
                                    <div id="method_in4" class="method_in">
                                        <a id="method_select4" class="method_select" href="javascript:method_open(4);">
                                            <input type="text" class="input_read" name="simple_sel" id="method_choice4" value="" readonly>
                                            <div><img id="list_img4" src="./image/list_hi.jpg"></div>
                                        </a>
                                    </div>
                                    <div id="method_list4" class="method_list">
                                        <ul class="list_ul">
                                            <li><a href="javascript:method_click('카카오페이',4);"><p>카카오페이</p></a></li>
                                            <li><a href="javascript:method_click('토스페이',4);"><p>토스페이</p></a></li>
                                            <li><a href="javascript:method_click('네이버페이',4);"><p>네이버페이</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment_btn">
                    <button id="payment_go" type="button" onclick="order()">결제하기</button>
                </div>
                <input type="hidden" name="oName" value="<?=$name?>">
                <input type="hidden" name="oPhone" value="<?=$phone?>">
                <input type="hidden" name="oZip_code" value="<?=$zip_code?>">
                <input type="hidden" name="oAddress1" value="<?=$address?>">
                <input type="hidden" name="oAddress2" value="<?=$sub_address?>">
                <input type="hidden" name="oRequest" value="<?=$request?>">
                <input type="hidden" name="cID" value="<?=$cID?>">
                <input type="hidden" name="cPrice" value="<?=$cName?>">
                <input type="hidden" name="poPrice" value="<?=$poName?>">
                <input type="hidden" name="poPoint" value="<?=$poID?>">
                <input type="hidden" name="oProd_price" value="<?=$prod_price?>">
                <input type="hidden" name="oDel_price" value="<?=$del_price?>">
                <input type="hidden" name="oTotal_price" value="<?=$total_price?>">
            </form>
        </div>
</main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>
