<?php
    $kind = $_GET["kind"];
    $sort = $_GET["sort"] ?? 1;
    $listSize = 12;
    $list = $_GET["list"] ?? 1;
    $start = ($list - 1) * $listSize;

    $src = substr($kind,0,2);
    $sub_src = substr($kind,3,1);

    $db_kind = $src;
    $db_kind .= substr($kind,2,2) == 00 ? '__' : substr($kind,2,2);

    switch($src) {
        case '01': $name = '닭가슴살';$sub_leng = 8;break;
        case '02': $name = '간편식';$sub_leng = 5;break;
        case '03': $name = '도시락';$sub_leng = 3;break;
        case '04': $name = '샐러드';$sub_leng = 4;break;
        case '05': $name = '비건';$sub_leng = 4;break;
        case '06': $name = '프로틴';$sub_leng = 4;break;
        case '07': $name = '건강식품';$sub_leng = 4;break;
    }

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select count(*) from product where pKind like '$db_kind'";
    $cnt_result = mysqli_query($con, $sql);
    $cnt_row = mysqli_fetch_array($cnt_result);

    switch($sort) {
        case 1:
            $sql = "select * from product where pKind like '$db_kind' order by pID limit $start,$listSize";
            break;
        case 2:
            $sql = "select * from product where pKind like '$db_kind' order by pSell desc limit $start,$listSize";
            break;
        case 3:
            $sql = "select * from product where pKind like '$db_kind' order by pPrice desc limit $start,$listSize";
            break;
        case 4:
            $sql = "select * from product where pKind like '$db_kind' order by pPrice limit $start,$listSize";
            break;
    }
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
?>