<?php
	session_start();
    require("./req_search.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>검색</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/product/css/search.css">
    <script>
        window.onload = function() {
            document.getElementById("sort"+<?=$sort?>).style.color = '#333333';
            document.getElementById("sort"+<?=$sort?>).style.fontWeight = 'bold';
        }
    </script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>"<?=$search?>" 검색결과 <span class="sub"><?=$cnt_row["count(*)"]?>건<span></h2>
                <div class="sort">
                        <ul>
                            <li class="sort_li"><a id="sort1" href="search.php?search=<?=$search?>&sort=1">추천순</a></li>
                            <li class="sort_li"><a id="sort2" href="search.php?search=<?=$search?>&sort=2">구매순</a></li>
                            <li class="sort_li"><a id="sort3" href="search.php?search=<?=$search?>&sort=3">가격높은순</a></li>
                            <li><a id="sort4" href="search.php?search=<?=$search?>&sort=4">가격낮은순</a></li>
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
                        echo "<a href='search.php?search=$search&list=$move&sort=$sort'>&lt</a> ";
                    }
                    
                    for ($i = $firstLink; $i <= $lastLink; $i++) {
                        if ($i == $list) {
                            echo "<a href='search.php?search=$search&list=$i&sort=$sort'><u style='color:#2e954f'>$i</u></a> ";
                        } else {
                            echo "<a href='search.php?search=$search&list=$i&sort=$sort'>$i</a> ";
                        }
                    }
                    
                    if ($lastLink < $numPages) {
                        $move = $lastLink + 1;
                        echo "<a href='search.php?search=$search&list=$move&sort=$sort'>&gt</a> ";
                    }
                ?>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>