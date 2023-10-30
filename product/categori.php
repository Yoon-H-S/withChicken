<?php
	session_start();
    require("./req_categori.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>카테고리</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/product/css/categori.css">
    <script type="text/javascript" src="/withChicken/product/js/categori.js"></script>
    <script>
        window.onload = function() { ready(<?=$src?>, <?=$sub_leng?>, <?=$sub_src?>, <?=$sort?>); }
    </script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2><?=$name?></h2>
            </div>
            <div class="main_img"><img src="./image/카테고리_<?=$src?>.jpg"></div>
            <div class="sub_cate">
                <ul>
                    <?php for($i = 0; $i <= $sub_leng; $i++) { ?>
                    <li><a id="sub_cate_value<?=$i?>" class="li" href="categori.php?kind=<?=$src?>0<?=$i?>"></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="no">
                <div class="prod_cnt">총 <span style="color:#2e954f;font-weight:bold;"><?=$cnt_row["count(*)"]?>개</span> 상품이 있습니다.</div>
                <div class="sort">
                        <ul>
                            <li class="sort_li"><a id="sort1" href="categori.php?kind=<?=$kind?>&sort=1">추천순</a></li>
                            <li class="sort_li"><a id="sort2" href="categori.php?kind=<?=$kind?>&sort=2">구매순</a></li>
                            <li class="sort_li"><a id="sort3" href="categori.php?kind=<?=$kind?>&sort=3">가격높은순</a></li>
                            <li><a id="sort4" href="categori.php?kind=<?=$kind?>&sort=4">가격낮은순</a></li>
                        </ul>
                </div>
            </div>
            <div class="prods">
                <?php while($row = mysqli_fetch_array($result)) { require("./req_search_prod.php");?>
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
            <div class="paging">
                <?php
                    $paginationSize = 5;
                    $firstLink = floor(($list - 1) / $paginationSize) * $paginationSize + 1;
                    $lastLink = $firstLink + $paginationSize - 1;
                    
                    $numRecords = $cnt_row["count(*)"];
                    $numPages = ceil($numRecords / $listSize);
                    if ($lastLink > $numPages) {
                        $lastLink = $numPages;
                    }
                    
                    if ($firstLink > 1) {
                        $move = $firstLink - 1;
                        echo "<a href='categori.php?kind=$kind&list=$move&sort=$sort'>&lt</a> ";
                    }
                    
                    for ($i = $firstLink; $i <= $lastLink; $i++) {
                        if ($i == $list) {
                            echo "<a href='categori.php?kind=$kind&list=$i&sort=$sort'><u style='color:#2e954f'>$i</u></a> ";
                        } else {
                            echo "<a href='categori.php?kind=$kind&list=$i&sort=$sort'>$i</a> ";
                        }
                    }
                    
                    if ($lastLink < $numPages) {
                        $move = $lastLink + 1;
                        echo "<a href='categori.php?kind=$kind&list=$move&sort=$sort'>&gt</a> ";
                    }
                ?>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>