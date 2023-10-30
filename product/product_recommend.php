<?php
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from product order by rand() limit 5";
    $recom_result = mysqli_query($con, $sql);
    mysqli_close($con);
?>
<div class="recommend_prod">
    <div class="recom_prod_title">추천상품</div>
    <div class="recom_prod_body">
        <?php while($recom_row = mysqli_fetch_array($recom_result)) { ?>
        <div class="recom_prod_container">
            <a href="/withChicken/product/product_search.php?search=<?=$recom_row["pName"]?>">
                <div class="recom_img"><img src="<?=$recom_row["pImage"]?>"></div>
                <div class="recommend_prod_name"><?=$recom_row["pName"]?></div>
                <div class="recommend_prod_price">
                    <?=number_format(round($recom_row["pPrice"] - ($recom_row["pPrice"]*($recom_row["pSale"]/100)),-2));?><span class="won">원</span>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</div>