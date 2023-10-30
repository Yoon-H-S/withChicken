<?php
    $pID = $_SESSION["pID"];

if (isset($_COOKIE["todayview"])) {
    $temp = explode(",",$_COOKIE["todayview"]);
    if (!in_array($pID, $temp)) {
        $tmp = "";
        if(sizeof($temp) >= 5) {
            for($i = 0; $i<4;$i++)
                $tmp .= ",".$temp[$i];
        } else {
            for($i = 0; $i<sizeof($temp);$i++)
                $tmp .= ",".$temp[$i];
        }
        setcookie("todayview",$pID.$tmp, time()+60*2,"/");
    } else {
        if($temp[0] == $pID)
            $tpID = str_replace($pID.",","",$_COOKIE["todayview"]);
        else
            $tpID = str_replace(",".$pID,"",$_COOKIE["todayview"]);
        setcookie("todayview",$pID.",".$tpID, time()+60*2,"/");
    }
} else {
    setcookie("todayview",$pID,time()+60*2,"/");
}

    $height = $_GET["scroll"] ?? 0;
    $rev_list = $_GET["rev_list"] ?? 0;
    
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from product where pID='$pID'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    $row = mysqli_fetch_array($result);
    $pKind1 = substr($row["pKind"],0,2);
    $pKind2 = substr($row["pKind"],2,2);
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