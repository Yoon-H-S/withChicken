<?php
    $oID = $_GET["oID"];
    switch($_GET["kind"]) {
        case 1: $caKind = 6; $text = "주문이 취소"; break;
        case 2: $caKind = 7; $text = "반품이 신청"; break;
        case 3: $caKind = 9; $text = "교환이 신청"; break;
    }

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from orders where oID='$oID'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $mID = $row["mID"];
    $oRegist_day = $row["oRegist_day"];
    $oMethod = $row["oMethod"];
    $oProd_price = $row["oProd_price"];
    $oDel_price = $row["oDel_price"];
    $cPrice = $row["cPrice"];
    $poPrice = $row["poPrice"];
    $oTotal_price = $row["oTotal_price"];
    $dName = $row["dName"];
    $dPhone = $row["dPhone"];
    $dZip_code = $row["dZip_code"];
    $dAddress = $row["dAddress"];
    $dRequest = $row["dRequest"];
    $caRegist_day = date("Y-m-d H:i:s");

    $sql = "insert into cancel (oID, mID, oRegist_day, oMethod, oProd_price, oDel_price, cPrice, poPrice, oTotal_price, dName, dPhone, dZip_code, dAddress, dRequest, caKind, caRegist_day) ";
	$sql .= "values('$oID', '$mID', '$oRegist_day', '$oMethod', '$oProd_price', '$oDel_price', '$cPrice', '$poPrice', '$oTotal_price', '$dName', '$dPhone', '$dZip_code', '$dAddress', '$dRequest', '$caKind', '$caRegist_day')";

    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    $sql = "select * from cancel where mID='$mID' and caRegist_day='$caRegist_day'";
    $ca_result = mysqli_query($con, $sql);
    $ca_row = mysqli_fetch_array($ca_result);
    $caID = $ca_row["caID"];

    $sql = "select * from order_products where oID='$oID'";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)) {
        $pID = $row["pID"];
        $doOption = $row["doOption"];
        $doCount = $row["doCount"];
        $doPrice = $row["doPrice"];
        $sql = "insert into cancel_products(caID, pID, doOption, doCount, doPrice) ";
        $sql .= "values('$caID', '$pID', '$doOption', '$doCount', '$doPrice')";

        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    }

    $sql = "delete from orders where oID='$oID'";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
    <script>
        alert('$text 되었습니다.');
        opener.location.href = 'mypage_cancel.php';
        window.close();
    </script>
";
?>