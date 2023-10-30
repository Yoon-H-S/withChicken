<?php
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select count(*) from orders where oKind=1";
    $result = mysqli_query($con, $sql);
    $row1 = mysqli_fetch_array($result);
    $sql = "select count(*) from orders where oKind=2 or oKind=3 or oKind=4";
    $result = mysqli_query($con, $sql);
    $row2 = mysqli_fetch_array($result);
    $sql = "select count(*) from cancel where caKind=6";
    $result = mysqli_query($con, $sql);
    $row3 = mysqli_fetch_array($result);
    $sql = "select count(*) from cancel where caKind=7";
    $result = mysqli_query($con, $sql);
    $row4 = mysqli_fetch_array($result);
    $sql = "select count(*) from cancel where caKind=9";
    $result = mysqli_query($con, $sql);
    $row5 = mysqli_fetch_array($result);

    $days = array();
    $mrow = array();
    for($i = 0; $i < 7; $i++) {
        $day = $i+1;
        $sql = "select count(*), sum(oTotal_price), date_add(now(), interval -'$day' day) from orders where oRegist_day between date_add(now(), interval -'$day' day) and date_add(now(), INTERVAL -'$i' day)";
        $result = mysqli_query($con, $sql);
        $mrow[$i] = mysqli_fetch_array($result);
        $days[$i] = $mrow[$i]["date_add(now(), interval -'$day' day)"];
    }
    mysqli_close($con);
?>