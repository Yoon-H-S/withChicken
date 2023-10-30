<?php
    $caDay = $_GET["caDay"] ?? 3;
    $caKind = $_GET["caKind"] ?? 0;
    $mID = $_SESSION["id"];
    
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    if ($caKind == 0) {
        $sql = "select count(*) from cancel where mID='$mID' and caRegist_day between date_add(now(), interval -'$caDay' month) and now()";
    } else {
        $sql = "select count(*) from cancel where mID='$mID' and caRegist_day between date_add(now(), interval -'$caDay' month) and now() and caKind='$caKind'";
    }
    $count_result = mysqli_query($con, $sql);
    $count_row = mysqli_fetch_array($count_result) ?? 0;


    if ($caKind == 0) {
        $sql = "select * from cancel where mID='$mID' and caRegist_day between date_add(now(), interval -'$caDay' month) and now() order by caRegist_day desc";
    } else {
        $sql = "select * from cancel where mID='$mID' and caRegist_day between date_add(now(), interval -'$caDay' month) and now() and caKind='$caKind' order by caRegist_day desc";
    }
    $order_result = mysqli_query($con, $sql);

    mysqli_close($con);
?>