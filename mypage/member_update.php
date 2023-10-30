<?php
	session_start();

	$id = $_POST["id"];
	$pass = $_POST["pw"] ?? "";
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
	
	$con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "update members set phone='$phone', adsms='$adsms', email='$email', admail='$admail', zip_code='$zip', address='$address' where id='$id'";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    if($pass) {
        $sql = "update members set pass='$pass' where id='$id'";
        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    }
    mysqli_close($con);

    echo "
        <script>
            alert('수정이 완료되었습니다.');
            history.back();
        </script>
    ";
?>