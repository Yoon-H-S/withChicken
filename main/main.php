<?php
	session_start();
    require("./req_main.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>같이한닭</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/main/css/main_img.css">
    <link rel="stylesheet" type="text/css" href="/withChicken/main/css/main_concent.css">
    <link rel="stylesheet" type="text/css" href="/withChicken/main/css/main_sidebar.css">
    <link rel="stylesheet" type="text/css" href="/withChicken/main/css/main_bestreview.css">
    <script type="text/javascript" src="/withChicken/main/js/main.js"></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <section id="slider">
            <img src="./image/main_img.jpg"/>
            <img src="./image/main_img_2.jpg"/>
            <img src="./image/main_img_3.jpg"/>
            <img src="./image/main_img_4.jpg"/>
            <img src="./image/main_img_5.jpg"/>
        </section>
        <div class="main_inner">
            <div class="concent">
                <div class="event_prod">
                    <div class="sale_prod">
                        <h2>일일 특가</h2>
                        <div class="prod_set">
                            <?php while($sale_row = mysqli_fetch_array($sale_result)) { require("./req_sale_prod.php");?>
                            <div class="product">
                                <div class="prod_img">
                                    <a href="/withChicken/product/product_search.php?search=<?=$pName?>"><img src="<?=$pImage?>"></a>
                                </div>
                                <div class="prod_info">
                                    <p>
                                        <span class="star"><img src="./image/star.jpg"></span>
                                        <span class="grade"><?=round($rev_allGrade_row["avg(grade)"],1)?></span>
                                        <span class="count">(<?=$rev_count_row["count(*)"]?>)</span>
                                    </p>
                                    <a href="/withChicken/product/product_search.php?search=<?=$pName?>" class="prod_name"><?=$pName?></a>
                                    <span class="price"><strong><?=number_format($pSalePrice)?></strong>원</span>
                                    <span class="cost"><?=number_format($pPrice)?>원</span>
                                    <span class="sale_per"><strong><?=$pSale?></strong>%</span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="new_prod">
                        <h2>신상품</h2>
                        <div class="prod_set">
                            <?php while($new_row = mysqli_fetch_array($new_result)) { require("./req_new_prod.php");?>
                            <div class="product">
                                <div class="prod_img">
                                    <a href="/withChicken/product/product_search.php?search=<?=$pName?>"><img src="<?=$pImage?>"></a>
                                </div>
                                <div class="prod_info">
                                    <p>
                                        <span class="star"><img src="./image/star.jpg"></span>
                                        <span class="grade"><?=round($rev_allGrade_row["avg(grade)"],1)?></span>
                                        <span class="count">(<?=$rev_count_row["count(*)"]?>)</span>
                                    </p>
                                    <a href="/withChicken/product/product_search.php?search=<?=$pName?>" class="prod_name"><?=$pName?></a>
                                    <span class="price"><strong><?=number_format($pSalePrice)?></strong>원</span>
                                    <?php if($pSale != 0) { ?>
                                    <span class="cost"><?=number_format($pPrice)?>원</span>
                                    <span class="sale_per"><strong><?=$pSale?></strong>%</span>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="side_bar">
                    <div class="delivery"><a href=""><img src="./image/Frame 3.jpg"></a></div>
                    <div class="main_event"><a href=""><img src="./image/이벤트.jpg"></a></div>
                    <div class="recent_list">
                        <h4>최근 본 상품</h4>
                        <ul>
                            <?php
                                if($temp) {
                                    for($i = 0; $i<sizeof($temp);$i++) {
                                        $con = mysqli_connect("localhost", "root", "", "shop","3307");
                                        $sql = "select * from product where pID='$temp[$i]'";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($result)
                            ?>
                            <li>
                                <a href="/withChicken/product/product_search.php?search=<?=$row['pName']?>">
                                    <div class="recent_prod">
                                        <img src="<?=$row["pImage"]?>">
                                        <span><?=$row["pName"]?></span>
                                    </div>
                                </a>
                            </li>
                            <?php }} else { ?>
                            <li style="color:#888888;">최근 본 상품이 없습니다.</li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_be_rev">
                <h2>베스트 리뷰 <span><a href="">더보기 ></a></span></h2>
                <?php while($rev_row = mysqli_fetch_array($best_rev_result)) { $pName = $rev_row["pName"]?>
                <div class="best_review">
                    <div class="rev_img"><img src="<?= $rev_row["rImage"] ? $rev_row["rImage"] : "./image/no_review_img.jpg" ?>"></div>
                    <div class="rev_info">
                        <div class="be_re_prod"><?=$pName?></div>
                        <div class="re_grade"><img src="./image/star_<?=$rev_row["grade"]?>.jpg"></div>
                        <div class="good_count"><img src="./image/Frame 4.jpg"><?=$rev_row["goodCount"]?></div>
                        <div class="be_re_write"><?=$rev_row["rContent"]?></div>
                        <div class="go_prod"><a href="/withChicken/product/product_search.php?search=<?=$pName?>">상품으로 이동 ></a></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>