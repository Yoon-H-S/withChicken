<?php
    $pID = $row["pID"];
    $pImage = $row["pImage"];
    $pName = $row["pName"];
    $pPrice = $row["pPrice"];
    $pSale = $row["pSale"] ?? 0;
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