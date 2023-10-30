<?php
    $qID = $inq_row["qID"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from product_inquiry pi, product_inquiry_answer pia, admin a where pi.qID='$qID' and pi.qID = pia.qID and pia.aWriter = a.aID";
    $inq_ans_result = mysqli_query($con, $sql);
    $inq_ans_row = mysqli_fetch_array($inq_ans_result);
    mysqli_close($con);
?>