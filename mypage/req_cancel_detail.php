<?php
    $caID = $_GET["caID"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from cancel ca, members m where ca.caID='$caID' and ca.mID = m.id";
    $order_result = mysqli_query($con, $sql);
    $order_row = mysqli_fetch_array($order_result);

    $sql = "select * from cancel_products cap, product p where cap.caID='$caID' and cap.pID = p.pID";
    $products_result = mysqli_query($con, $sql);
    mysqli_close($con);
?>