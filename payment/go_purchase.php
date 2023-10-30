<?php
    session_start();
    $mID = $_SESSION["id"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "delete from purchase where mID='$mID'";
    mysqli_query($con, $sql);

    $sql = "select * from basket where mID='$mID'";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)) {
        $pID = $row["pID"];
        $pOptionName = $row["pOptionName"];
        $pOptionPrice = $row["pOptionPrice"];
        $pCount = $row["pCount"];
        $sql = "insert into purchase(pID, mID, pOptionName, pOptionPrice, pCount, basket_del) ";
        $sql .= "values('$pID', '$mID', '$pOptionName', '$pOptionPrice', '$pCount', '1')";
        mysqli_query($con, $sql);
    }
    mysqli_close($con);

    echo "
    <script>
        location.href = '/withChicken/payment/del_info.php';
    </script>
    ";
?>