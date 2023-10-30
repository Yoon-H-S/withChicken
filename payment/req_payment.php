<?php
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $zip_code = $_POST["zip_code"];
    $address = $_POST["address"];
    $sub_address = $_POST["sub_address"];
    $request = $_POST["request"] ?? "";
    $cID = $_POST["cID"] ?? 0;
    $cName = $_POST["cName"] ?? 0;
    $poName = (int) $_POST["poName"] ?? 0;
    $poID = $_POST["poID"] ?? 0;
    $prod_price = $_POST["prod_price"];
    $del_price = $_POST["del_price"];
    $total_price = $_POST["total_price"];
?>