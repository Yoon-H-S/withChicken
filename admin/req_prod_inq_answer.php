<?php
    $qID = $row2["qID"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from product_inquiry pi, product_inquiry_answer pia, admin a where pi.qID='$qID' and pi.qID = pia.qID and pia.aWriter = a.aID";
    $result4 = mysqli_query($con, $sql);
    $row4 = mysqli_fetch_array($result4);
    mysqli_close($con);
?>