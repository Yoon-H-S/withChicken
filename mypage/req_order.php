<?php
    $oID = $_GET["oID"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from orders o, members m where o.oID='$oID' and o.mID = m.id";
    $order_result = mysqli_query($con, $sql);
    $order_row = mysqli_fetch_array($order_result);

    $sql = "select * from order_products op, product p where op.oID='$oID' and op.pID = p.pID";
    $products_result = mysqli_query($con, $sql);
    mysqli_close($con);
?>