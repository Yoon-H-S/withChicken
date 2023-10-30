<?php
	session_start();
    if (empty($_SESSION["admin_id"])) { // 로그인 상태가 아니면
        header("Location:/withChicken/admin/admin_login.php");
        exit;
    }
    require('./req_admin_page.php');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>관리자페이지</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/admin/css/admin_page.css">
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/admin/admin_index/admin_header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>관리자 메인</h2>
            </div>
            <div class="admin_table"> <!-- 상품관련 테이블 -->
                <table>
                    <tr class="table_title"> 
                        <th>주문</th>
                        <th>배송</th>
                        <th>취소</th>
                        <th>반품</th>
                        <th>교환</th>
                    </tr>
                    <tr>
                        <td class="col1"><?=$row1["count(*)"] ?? 0 ?>건</td>
                        <td class="col1"><?=$row2["count(*)"] ?? 0 ?>건</td>
                        <td class="col1"><?=$row3["count(*)"] ?? 0 ?>건</td>
                        <td class="col1"><?=$row4["count(*)"] ?? 0 ?>건</td>
                        <td class="col1"><?=$row5["count(*)"] ?? 0 ?>건</td>
                    </tr>
                </table>
            </div>
            <div class="admin_table_02">  <!-- 최근7일 수익 테이블 -->
                <table>
                    <tr class="table_title"> 
                        <th>날짜</th>
                        <th>주문</th>
                    </tr>
                    <tr>
                        <td class="col2"><?=substr($days[0],5,2)?>월 / <?=substr($days[0],8,2)?>일</td>
                        <td class="col3">
                            <?=number_format($mrow[0]["sum(oTotal_price)"])?><span class="sub">원</span><br>
                            <span class="sub">(<?=$mrow[0]["count(*)"]?>건)</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col2"><?=substr($days[1],5,2)?>월 / <?=substr($days[1],8,2)?>일</td>
                        <td class="col3">
                            <?=number_format($mrow[1]["sum(oTotal_price)"])?><span class="sub">원</span><br>
                            <span class="sub">(<?=$mrow[1]["count(*)"]?>건)</span>

                        </td>
                    </tr>
                    <tr>
                        <td class="col2"><?=substr($days[2],5,2)?>월 / <?=substr($days[2],8,2)?>일</td>
                        <td class="col3">
                            <?=number_format($mrow[2]["sum(oTotal_price)"])?><span class="sub">원</span><br>
                            <span class="sub">(<?=$mrow[2]["count(*)"]?>건)</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col2"><?=substr($days[3],5,2)?>월 / <?=substr($days[3],8,2)?>일</td>
                        <td class="col3">
                            <?=number_format($mrow[3]["sum(oTotal_price)"])?><span class="sub">원</span><br>
                            <span class="sub">(<?=$mrow[3]["count(*)"]?>건)</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col2"><?=substr($days[4],5,2)?>월 / <?=substr($days[4],8,2)?>일</td>
                        <td class="col3">
                            <?=number_format($mrow[4]["sum(oTotal_price)"])?><span class="sub">원</span><br>
                            <span class="sub">(<?=$mrow[4]["count(*)"]?>건)</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col2"><?=substr($days[5],5,2)?>월 / <?=substr($days[5],8,2)?>일</td>
                        <td class="col3">
                            <?=number_format($mrow[5]["sum(oTotal_price)"])?><span class="sub">원</span><br>
                            <span class="sub">(<?=$mrow[5]["count(*)"]?>건)</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col2"><?=substr($days[6],5,2)?>월 / <?=substr($days[6],8,2)?>일</td>
                        <td class="col3">
                            <?=number_format($mrow[6]["sum(oTotal_price)"])?><span class="sub">원</span><br>
                            <span class="sub">(<?=$mrow[6]["count(*)"]?>건)</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="item_and_Notice">
                <a href="./product_insert.php" class="item_join">상품등록</a>
                <a href="" class="notice_join">공지사항 작성</a>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/admin/admin_index/admin_footer.php"); ?>
</body>
</html>