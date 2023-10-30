<?php
    $search = $_GET["search"] ?? "";
    $sort = $_GET["sort"] ?? 1;
    $listSize = 20;
    $list = $_GET["list"] ?? 1;
    $start = ($list - 1) * $listSize;

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select count(*) from product where pName like '%$search%'";
    $cnt_result = mysqli_query($con, $sql);
    $cnt_row = mysqli_fetch_array($cnt_result);

    switch($sort) {
        case 1:
            $sql = "select * from product where pName like '%$search%' order by pID limit $start,$listSize";
            break;
        case 2:
            $sql = "select * from product where pName like '%$search%' order by pSell desc limit $start,$listSize";
            break;
        case 3:
            $sql = "select * from product where pName like '%$search%' order by pPrice desc limit $start,$listSize";
            break;
        case 4:
            $sql = "select * from product where pName like '%$search%' order by pPrice limit $start,$listSize";
            break;
    }
    
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
?>