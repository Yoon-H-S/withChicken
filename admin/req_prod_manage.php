<?php
    $pID = $_SESSION["pID"];
    $height = $_GET["scroll"] ?? 0;
    $rev_list = $_GET["rev_list"] ?? 0;

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from product where pID='$pID'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    $row = mysqli_fetch_array($result);
    $pImage = $row["pImage"];
    $pImage2 = $row["pImage2"] ?? "";
    $pImage3 = $row["pImage3"] ?? "";
    $pName = $row["pName"];
    $pPrice = $row["pPrice"];
    $pSale = $row["pSale"] ?? 0;
    $pSalePrice = round($pPrice - ($pPrice*($pSale/100)),-2);
    $pDelivery = explode('|',$row["pDelivery"]);
    $pDelivery1 = $pDelivery[0];
    $pDelivery2 = $pDelivery[1] ?? "";
    $pDelPrice = $row["pDelPrice"] ?? 0;
    $pOption = explode('|',$row["pOption"]);
    $pOption2 = explode('|',$row["pOption2"]) ?? "";
    $pOption3 = explode('|',$row["pOption3"]) ?? "";
    $pOption4 = explode('|',$row["pOption4"]) ?? "";
    $pContent = $row["pContent"];
?>