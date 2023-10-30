<?php
    session_start();
    $mID = $_SESSION["id"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $oName = $_POST["oName"];
    $oPhone = $_POST["oPhone"];
    $oZip_code = $_POST["oZip_code"];
    $address1 = $_POST["oAddress1"];
    $address2 = $_POST["oAddress2"];
    $oRequest = $_POST["oRequest"] ?? "";
    $cID = $_POST["cID"] ?? 0;
    $cPrice = $_POST["cPrice"] ?? 0;
    $poPrice = $_POST["poPrice"] ?? 0;
    $poPoint = $_POST["poPoint"] ?? 0;
    $oProd_price = $_POST["oProd_price"];
    $oDel_price = $_POST["oDel_price"];
    $oTotal_price = $_POST["oTotal_price"];
    $oMethod = $_POST["select"];

    $earned_point = round($oTotal_price * 0.03,0);
    $oAddress = $address1.' '.$address2;
    $oRegist_day = date("Y-m-d H:i:s");
    $remaining_point = $poPoint - $poPrice;

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "insert into orders(mID, oRegist_day, oMethod, oProd_price, oDel_price, cPrice, poPrice, oTotal_price, earned_point, dName, dPhone, dZip_code, dAddress, dRequest) ";
	$sql .= "values('$mID', '$oRegist_day', '$oMethod', '$oProd_price', '$oDel_price', '$cPrice', '$poPrice', '$oTotal_price', '$earned_point', '$oName', '$oPhone', '$oZip_code', '$oAddress', '$oRequest')";

    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    $sql = "select * from orders where mID='$mID' and oRegist_day='$oRegist_day'";
    $or_result = mysqli_query($con, $sql);
    $or_row = mysqli_fetch_array($or_result);
    $oID = $or_row["oID"];

    $isBasketDel = false;

    $sql = "select * from purchase where mID='$mID'";
    $pur_result = mysqli_query($con, $sql);
    while($pur_row = mysqli_fetch_array($pur_result)) {
        $pID = $pur_row["pID"];
        $pOption = $pur_row["pOptionName"];
        $pCount = $pur_row["pCount"];
        $pPrice = $pur_row["pOptionPrice"] * $pur_row["pCount"];
        $sql = "insert into order_products(oID, pID, doOption, doCount, doPrice) ";
        $sql .= "values('$oID', '$pID', '$pOption', '$pCount', '$pPrice')";

        if($pur_row["basket_del"] == 1) {
            $isBasketDel = true;
        }

        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

        $sql = "update product set pSell=pSell+1 where pID='$pID'";
        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    }

    $sql = "delete from purchase where mID='$mID'";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    if($isBasketDel) {
        $sql = "delete from basket where mID='$mID'";
        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    }

    if($cID != 0) {
        $sql = "delete from coupon where cID='$cID'";
        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    }
    
    if($poPoint != 0) {
        $sql = "update members set point='$remaining_point' where id='$mID'";
        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    }
    
    mysqli_close($con);

    echo "
    <script>
        location.href = '/withChicken/payment/pay_complete.php?oID=$oID';
    </script>
  ";
?>


