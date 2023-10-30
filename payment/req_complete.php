<?php
    $oID = $_GET["oID"];
    
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from orders where oID='$oID'";
    $order_result = mysqli_query($con, $sql);
    $order_row = mysqli_fetch_array($order_result);
    $oTotal_price = $order_row["oTotal_price"];

	$sql = "select * from order_products op, product p where op.oID='$oID' and op.pID = p.pID";
    $prod_result = mysqli_query($con, $sql);

    $sql = "select count(*) from order_products where oID='$oID'";
    $count_result = mysqli_query($con, $sql);
    $count_row = mysqli_fetch_array($count_result);

    mysqli_close($con);
?>