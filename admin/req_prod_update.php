<?php
    $pID = $_SESSION["pID"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from product where pID='$pID'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    $row = mysqli_fetch_array($result);

    $pName = $row["pName"];
    $pKind = $row["pKind"];
    $pPrice = $row["pPrice"];
    $pSale = $row["pSale"] ?? 0;
    $pDelivery = $row["pDelivery"];
    $pDelPrice = $row["pDelPrice"] ?? 0;
    $pOption = $row["pOption"];
    $pOption2 = $row["pOption2"] ?? "";
    $pOption3 = $row["pOption3"] ?? "";
    $pOption4 = $row["pOption4"] ?? "";
    $pContent = $row["pContent"];
    $pImage = $row["pImage"];
    $pImage2 = $row["pImage2"] ?? "";
    $pImage3 = $row["pImage3"] ?? "";
?>