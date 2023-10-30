<?php
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from product order by pSale desc limit 3";
    $sale_result = mysqli_query($con, $sql);

    $sql = "select * from product order by pRegist_day desc limit 3";
    $new_result = mysqli_query($con, $sql);

    $sql = "select * from product_review pr, product p where pr.pID = p.pID order by goodCount desc limit 3";
    $best_rev_result = mysqli_query($con, $sql); // 베스트리뷰 가져오기
    mysqli_close($con);

    $temp = isset($_COOKIE["todayview"]) ? explode(",",$_COOKIE["todayview"]) : "";
?>