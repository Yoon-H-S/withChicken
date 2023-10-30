<?php
    session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        echo "
        <script>
            alert('구매하려면 로그인하세요.');
            location.href = '/withChicken/login_out/login.php';
        </script>
        ";
        exit();
    }

    $pID = $_SESSION["pID"];
    $mID = $_SESSION["id"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "delete from purchase where mID='$mID'";
    mysqli_query($con, $sql);

    $pOptionName = $_GET["pOptionName"];
    $pOptionPrice = $_GET["pOptionPrice"];
    $pCount = $_GET["pCount"];

    $sql = "insert into purchase(pID, mID, pOptionName, pOptionPrice, pCount, basket_del) ";
    $sql .= "values('$pID', '$mID', '$pOptionName', '$pOptionPrice', '$pCount', '0')";

    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
    <script>
        location.href = '/withChicken/payment/del_info.php';
    </script>
    ";
?>