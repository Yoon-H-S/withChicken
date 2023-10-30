<?php
	session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        header("Location:/withChicken/login_out/login.php");
        exit;
    }
    require("./req_del_info.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>주문>정보/배송지입력</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/payment/css/del_info.css">
    <script type="text/javascript" src="/withChicken/payment/js/del_info.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//d1p7wdleee1q2z.cloudfront.net/post/search.min.js"></script>
    <script>
        window.onload = function() {
            $(function() { $("#postcodify_search_button").postcodifyPopUp(); });
            
            $("#check").change(function(){
                if($("#check").is(":checked")) mem_in();
                else mem_out();
            });
            ready('<?=$name?>','<?=$phone?>','<?=$zip_code?>','<?=$address1?>','<?=$address2?>','<?=$point?>');
            totalPrice();
        }
    </script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>주문>정보/배송지입력</h2>
            </div>
            <div class="delivery_terms">
                <input name="cbx_chk" class="none" id="check" type="checkbox">
                <label class="check" for="check"></label>고객 기본 정보/주소 사용
            </div>
            <form name="delivery_form" method="post" action="./payment.php">
                <div class="info_input">
                    <div class="tr">
                        <div class="title">수령자&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="name" id="name"></div>
                    </div>
                    <div class="tr">
                        <div class="title">전화번호&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="phone" id="phone" placeholder="'-'없이 입력" maxlength="11"></div>
                    </div>
                    <div class="tr">
                        <div class="title">우편번호&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="zip_code" id="zip_code" class="postcodify_postcode5" value="" maxlength="5"></div>
                        <div>
                            <button type="button" id="postcodify_search_button"></button>
                            <label class="but" for="postcodify_search_button">우편번호찾기</label>
                        </div>
                    </div>
                    <div class="tr">
                        <div class="title">배송지&nbsp;:&nbsp;</div>
                        <div class="in_addr"><input type="text" name="address" id="address" placeholder="도로명주소" class="postcodify_address" value=""></div>
                    </div>
                    <div class="tr_addr">
                        <div class="title"></div>
                        <div class="in_addr"><input type="text" name="sub_address" id="sub_address" placeholder="상세주소" class="postcodify_details" value=""></div>
                    </div>
                    <div class="tr_req">
                        <div class="title">배송요청사항&nbsp;:&nbsp;</div>
                        <div class="in_addr"><input type="text" name="request" id="request" class="request" value=""></div>
                    </div>
                </div>
                <input type="hidden" name="cID" value=""><input type="hidden" name="cName" value="">
                <input type="hidden" name="prod_price" value=""><input type="hidden" name="del_price" value="">
                <input type="hidden" name="total_price" value=""><input type="hidden" name="poName" value="">
                <input type="hidden" name="poID" value="">
            </form>
            <div class="prod_cnt">주문상품 (<?=$count_row["count(*)"]?>)개</div>
            <div class="prod_info">
                <?php while($prod_row = mysqli_fetch_array($prod_result)) { ?>
                <div class="basket_container">
                    <div class="basket_img"><img src="<?=$prod_row["pImage"]?>"></div>
                    <div class="basket_name">
                        <?=$prod_row["pName"]?><br><span class="option">옵션 : <?=$prod_row["pOptionName"]?></span>
                    </div>
                    <div class="cnt"><?=$prod_row["pCount"]?>개</div> 
                    <div class="basket_price">
                        <span id="basket_price<?=$count?>"><?=number_format($prod_row["pOptionPrice"]*$prod_row["pCount"])?></span>
                        <span class="won">원</span>
                    </div>
                </div>
                <script>prod_ready(<?=$count?>,<?=$prod_row["pOptionPrice"]?>,<?=$prod_row["pCount"]?>,<?=$prod_row["pDelPrice"]?>);</script>
                <?php $count++;} ?>
            </div>
            <div class="coupon">
                <div class="title">쿠폰사용&nbsp;:&nbsp;</div>
                <div class="coupon_body">
                    <div id="cou_in">
                        <a id="cou_select" href="javascript:cou_open();">
                            <div id="cou_choice"></div>
                            <div><img id="list_img" src="./image/list_hi.jpg"></div>
                        </a>
                    </div>
                    <div id="coupon_list">
                        <ul class="list_ul">
                            <li><a href="javascript:cou_click('0','0');">
                            <p>사용안함</p>
                            </a></li>
                            <?php while($cou_row = mysqli_fetch_array($cou_result)) { $cPrice = $cou_row["cPrice"]; $cID = $cou_row["cID"];?>
                            <li><a href="javascript:cou_click('<?=$cPrice?>','<?=$cID?>');">
                                <p><?=$cPrice?>원</p>
                            </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="rule">사용 가능한 쿠폰 (<?=$cou_cnt_row["count(*)"]?>)개</div>
            </div>
            <div class="tr">
                <div class="title">포인트사용&nbsp;:&nbsp;</div>
                <div class="in"><input type="number" id="poName" onchange="usepo()"></div>
                <button type="button" id="all_point" onclick="allpo()"></button>
                <label class="but" for="all_point">모두 사용</label>
                <div class="rule">사용 가능한 포인트 (<?=$point?>)점</div>
            </div>
            <div id="total_pay"><span class="total">총가격 :</span><span id="total_price"></span><span class="won">원</span></div>
            <div class="ok_btn">
                <button id="del_info_ok" type="button" onclick="check_input()">입력완료</button>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>