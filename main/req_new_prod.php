<?php
    $pID = $new_row["pID"];
    $pImage = $new_row["pImage"];
    $pName = $new_row["pName"];
    $pPrice = $new_row["pPrice"];
    $pSale = $new_row["pSale"] ?? 0;
    $pSalePrice = round($pPrice - ($pPrice*($pSale/100)),-2);

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select avg(grade) from product_review where pID='$pID'";
    $rev_allGrade = mysqli_query($con, $sql); // 총 평점
    $rev_allGrade_row = mysqli_fetch_array($rev_allGrade);

    $sql = "select count(*) from product_review where pID='$pID'";
    $rev_count = mysqli_query($con, $sql); // 총 개수
    $rev_count_row = mysqli_fetch_array($rev_count);

    mysqli_close($con);
?>