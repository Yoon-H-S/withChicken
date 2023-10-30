<?php
    $search = $_GET["search"] ?? "";

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from product where pName='$search'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    while ( $row = mysqli_fetch_array($result) ) {
        session_start();
        $_SESSION["pID"] = $row["pID"];

        header("Location:/withChicken/admin/product_manage.php");
        exit;
    }

    echo "
        <script>
            alert('검색한 이름과 맞는 상품이 없습니다.');
            history.back();
        </script>
    ";
?>