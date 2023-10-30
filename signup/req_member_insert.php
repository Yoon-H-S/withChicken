<?php
    $id   = $_POST["id"];
    $pass = $_POST["pw"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $adsms = $_POST["ad_sms"] ?? "";
    $email1  = $_POST["email"];
    $email2  = $_POST["email2"];
    $admail = $_POST["ad_mail"] ?? "";
    $zip = $_POST["zip_code"] ?? "";
    $address1 = $_POST["address"] ?? "";
    $address2 = $_POST["sub_address"] ?? "";

    $email = $email1."@".$email2;
    $address = $address1.'&'.$address2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

              
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "insert into members(id, pass, name, phone, adsms, email, admail, zip_code, address, regist_day) ";
	$sql .= "values('$id', '$pass', '$name', '$phone', '$adsms', '$email', '$admail', '$zip', '$address', '$regist_day')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);
?>

   
