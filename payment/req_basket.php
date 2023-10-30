<?php
    $count = 0;
    $mID = $_SESSION["id"];
    
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from basket b, product p where b.mID='$mID' and b.pID = p.pID";
    $result = mysqli_query($con, $sql);

    $sql = "select count(*) from basket where mID='$mID'";
    $count_result = mysqli_query($con, $sql);
    $count_row = mysqli_fetch_array($count_result);
    mysqli_close($con);
?>