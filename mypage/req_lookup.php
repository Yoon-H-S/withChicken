<?php
    $oDay = $_GET["oDay"] ?? 3;
    $oKind = $_GET["oKind"] ?? 0;
    $mID = $_SESSION["id"];
    
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    if ($oKind == 0) {
        $sql = "select count(*) from orders where mID='$mID' and oRegist_day between date_add(now(), interval -'$oDay' month) and now()";
    } else {
        $sql = "select count(*) from orders where mID='$mID' and oRegist_day between date_add(now(), interval -'$oDay' month) and now() and oKind='$oKind'";
    }
    $count_result = mysqli_query($con, $sql);
    $count_row = mysqli_fetch_array($count_result) ?? 0;


    if ($oKind == 0) {
        $sql = "select * from orders where mID='$mID' and oRegist_day between date_add(now(), interval -'$oDay' month) and now() order by oRegist_day desc";
    } else {
        $sql = "select * from orders where mID='$mID' and oRegist_day between date_add(now(), interval -'$oDay' month) and now() and oKind='$oKind' order by oRegist_day desc";
    }
    $order_result = mysqli_query($con, $sql);

    mysqli_close($con);
?>