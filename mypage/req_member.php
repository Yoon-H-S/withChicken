<?php
    $id = $_SESSION["id"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from members where id='$id'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    $row = mysqli_fetch_array($result);
    $name = $row["name"];
    $phone = $row["phone"];
    $email = explode('@',$row["email"]);
    $email1 = $email[0];
    $email2 = $email[1];
    $adsms = $row["adsms"] ? "checked" : "";
    $admail = $row["admail"] ? "checked" : "";
    $zip_code = $row["zip_code"] ?? "";
    $address = explode('&',$row["address"]) ?? "";
    $address1 = $address[0] ?? "";
    $address2 = $address[1] ?? "";
?>