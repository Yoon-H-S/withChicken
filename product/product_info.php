<?php
	session_start();
    require("./req_product.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$pName?></title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/product/css/product_info.css">
    <link rel="stylesheet" type="text/css" href="/withChicken/product/css/product_inquiry.css">
    <link rel="stylesheet" type="text/css" href="/withChicken/product/css/product_review.css">
    <link rel="stylesheet" type="text/css" href="/withChicken/product/css/purchase_info.css">
    <link rel="stylesheet" type="text/css" href="/withChicken/product/css/product_recommend.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="/withChicken/product/js/product_info.js"></script>
    <script>
        window.onload = function () {
            ready(<?=$pSalePrice?>,<?=$pKind1?>,<?=$pKind2?>,'<?=$pOption[0]?>',<?=$height?>);
            switch(<?=$_GET["page"] ?? 1?>) {
                case 1: content_open(); break;
                case 2: review_open(); break;
                case 3: inquiry_open(); break;
                case 4: purchase_open(); break;
            }
            if(<?=$rev_list?>) {
                review_tab('all_review');
            }
        }
    </script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2 id="kind"></h2>
            </div>
            <div class="prod_head">
                <div class="prod_img">
                    <div class="main_img">
                        <img class="bigimg" src="<?=$pImage?>"/>
                    </div>
                    <div class="sub_img">
                        <div class="sub1"><img class="subimg" src="<?=$pImage?>"/></div>
                        <?php if($pImage2) { ?>
                        <div class="sub2"><img class="subimg" src="<?=$pImage2?>"/></div>
                        <?php } if ($pImage3) { ?>
                        <div class="sub3"><img class="subimg" src="<?=$pImage3?>"/></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="prod_info">
                    <div class="prod_info_in">
                        <div class="prod_info_head">
                            <div class="prod_name"><?=$pName?></div>
                            <div class="share"><img src="./image/share.jpg" /></div>
                            <div class="love"><img src="./image/heart.jpg" /></div>
                        </div>
                        <div class="prod_price">
                            <span class="price"><strong><?=number_format($pSalePrice)?></strong>원</span>
                            <?php if(!($pSale == 0)) { ?>
                                <span class="cost"><?=number_format($pPrice)?>원</span>
                                <span class="sale_per"><strong><?=$pSale?></strong>%</span>
                            <?php } ?>
                            </div>
                        <div class="point">
                                결제금액의 3% 포인트 적립
                        </div>
                        <div class="tr">
                            <div class="title">배송방법</div>
                            <div class="in">
                                <?php if(!$pDelivery1) { ?>
                                    일반배송
                                <?php } else if($pDelivery1 == "후다닭배송") { ?>
                                    <span class="primary"><?=$pDelivery1?></span>
                                <?php } else { ?>
                                    <?=$pDelivery1?>
                                <?php } if ($pDelivery2) { ?>
                                    &nbsp;| <?=$pDelivery2?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tr">
                            <div class="title">배송비</div>
                            <div class="in">
                                <?php if($pDelPrice == 0) { ?>
                                    무료배송
                                <?php } else { ?>
                                    <?=number_format($pDelPrice)?>원<span class="sub_font">30,000원 이상 결제시 무료배송</span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tr">
                            <div class="title">개수</div>
                            <div class="in">
                                <div class="cnt">
                                    <button type="button" onclick="count('minus');"><img src="./image/minus.jpg"/></button>
                                    <input id="count" type="text" value="1">
                                    <button type="button" onclick="count('plus');"><img src="./image/plus.jpg"/></button>
                                </div>
                            </div>
                        </div>
                        <div class="option">
                            <div class="op_name">옵션</div>
                            <div id="op_sel">
                                <a id="op_select" href="javascript:op_open();">
                                    <div id="op_pak"><?=$pOption[0]?></div>
                                    <div><img id="option_img" src="./image/option_hi.jpg"></div>
                                </a>
                            </div>
                            <div id="option_list">
                                <ul class="list_ul">
                                    <li>
                                        <a href="javascript:op_click('<?=$pOption[0]?>',<?=$pOption[1]?>);">
                                            <p><?=$pOption[0]?></p>
                                            <p>
                                                <span class="li_price"><?=number_format($pOption[1])?></span><span class="li_won">원</span>&nbsp;
                                                <span class="li_sub">(팩당&nbsp;<?=number_format($pOption[2])?>원)</span>
                                            </p>
                                        </a>
                                    </li>
                                    <?php if($pOption2[0]) { ?>
                                        <li>
                                        <a href="javascript:op_click('<?=$pOption2[0]?>',<?=$pOption2[1]?>);">
                                            <p><?=$pOption2[0]?></p>
                                            <p>
                                                <span class="li_price"><?=number_format($pOption2[1])?></span><span class="li_won">원</span>&nbsp;
                                                <span class="li_sub">(팩당&nbsp;<?=number_format($pOption2[2])?>원)</span>
                                            </p>
                                        </a>
                                    </li>
                                    <?php } if($pOption3[0]) { ?>
                                        <li>
                                        <a href="javascript:op_click('<?=$pOption3[0]?>',<?=$pOption3[1]?>);">
                                            <p><?=$pOption3[0]?></p>
                                            <p>
                                                <span class="li_price"><?=number_format($pOption3[1])?></span><span class="li_won">원</span>&nbsp;
                                                <span class="li_sub">(팩당&nbsp;<?=number_format($pOption3[2])?>원)</span>
                                            </p>
                                        </a>
                                    </li>
                                    <?php } if($pOption4[0]) { ?>
                                        <li>
                                        <a href="javascript:op_click('<?=$pOption4[0]?>',<?=$pOption4[1]?>);">
                                            <p><?=$pOption4[0]?></p>
                                            <p>
                                                <span class="li_price"><?=number_format($pOption4[1])?></span><span class="li_won">원</span>&nbsp;
                                                <span class="li_sub">(팩당&nbsp;<?=number_format($pOption4[2])?>원)</span>
                                            </p>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="total">
                            <div class="to_in"><span id="high"></span>원</div>
                            <div class="to_title">총가격</div>
                        </div>
                        <div class="btn">
                            <div class="buy">
                                <button type="button" onclick="take_payment()">바로구매</button>
                            </div>
                            <div class="cart">
                                <button type="button" onclick="take_basket()">장바구니</button>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <?php require("./product_recommend.php"); ?>
            <div class="menu">            
                <ul class="prod_menu">
                    <a class="menu_li" href="javascript:content_open();"><li id="prod_01">상품정보</li></a>
                    <a class="menu_li" href="javascript:review_open();"><li id="prod_02">상품리뷰</li></a>
                    <a class="menu_li" href="javascript:inquiry_open();"><li id="prod_03">상품문의</li></a>
                    <a class="menu_li" href="javascript:purchase_open();"><li id="prod_04">구매정보</li></a>
                </ul>
            </div>
            <div id="prod_info_img">
                <img src="<?=$pContent?>">
            </div>
            <?php require("./product_inquiry.php"); ?>
            <?php require("./product_review.php"); ?>
            <?php require("./purchase_info.php"); ?>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>