<?php
    $count = 0;
    $mID = $_SESSION["id"];
    
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from members where id='$mID'";
    $mem_result = mysqli_query($con, $sql);
    $mem_row = mysqli_fetch_array($mem_result);
    $name = $mem_row["name"];
    $phone = $mem_row["phone"];
    $zip_code = $mem_row["zip_code"] ?? "";
    $address = explode('&',$mem_row["address"]) ?? "";
    $address1 = $address[0] ?? "";
    $address2 = $address[1] ?? "";
    $point = $mem_row["point"] ?? 0;

	$sql = "select * from purchase pu, product p where pu.mID='$mID' and pu.pID = p.pID";
    $prod_result = mysqli_query($con, $sql);

    $sql = "select count(*) from purchase where mID='$mID'";
    $count_result = mysqli_query($con, $sql);
    $count_row = mysqli_fetch_array($count_result);

    $sql = "select * from coupon where mID='$mID'";
    $cou_result = mysqli_query($con, $sql);

    $sql = "select count(*) from coupon where mID='$mID'";
    $cou_cnt_result = mysqli_query($con, $sql);
    $cou_cnt_row = mysqli_fetch_array($cou_cnt_result);

    mysqli_close($con);
?>