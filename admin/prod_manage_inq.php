<?php
    $listSize = 5;
    $inq_list = $_GET["inq_list"] ?? 1;
    $inq_start = ($inq_list - 1) * $listSize;
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from product_inquiry pi, members m where pID='$pID' and pi.qWriter = m.id order by pi.qRegist_day desc limit $inq_start,$listSize";
    $result2 = mysqli_query($con, $sql);
    $sql = "select count(*) from product_inquiry where pID='$pID'";
    $result3 = mysqli_query($con, $sql);
    $count = mysqli_fetch_array($result3);
    mysqli_close($con);
    $number = ($count["count(*)"] ?? 0) - (($inq_list - 1) * $listSize);
?>
<div id="prod_inq">
    <div class="inq_head">
        <div class="inq_title">상품문의<span class="inq_count">(<?=$count["count(*)"]?>개)</span></div>
    </div>
    <div class="inq_body">
        <?php while($row2 = mysqli_fetch_array($result2) ?? 0) { ?>
        <div class="inq_container">
            <a id="inq_show<?=$number?>" href='javascript:inq_open(<?=$number?>);'>
                <div class="container_head">
                    <div class="inq_num"><?=$number?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_answer"><?=$row2["qAnswer"] ? "답변완료" : "답변대기"?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_option"><?=$row2["qOption"]?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_name"><?=$row2["qTitle"]?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_writer"><?=$row2["name"]?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_date"><?=substr($row2["qRegist_day"],0,10)?></div>
                </div>
            </a>
            <div id="container_body<?=$number?>" class="container_body">
                <div class="inq_detail"><?=$row2["qContent"]?></div>
                <?php if($row2["qAnswer"]) { require("./req_prod_inq_answer.php");?>
                <div class="admin_answer">
                    <div class="answer_head">
                        <div class="admin_name"><?=$row4["aName"]?></div>
                        <div class="answer_date"><?=substr($row4["aRegist_day"],0,10)?></div>
                    </div>
                    <div class="answer_body"><?=$row4["aContent"]?></div>
                </div>
                <?php } else {?>
                <div class="admin_answer">
                    <button class="answer_write" type="button" onclick="answer_write(<?=$row2['qID']?>)">답변 작성</button>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php $number--; } ?>
    </div>
    <div  class="inq_paging">
        <?php
            $paginationSize = 5;
            $inq_firstLink = floor(($inq_list - 1) / $paginationSize) * $paginationSize + 1;
            $inq_lastLink = $inq_firstLink + $paginationSize - 1;
            
            $inq_numRecords = $count["count(*)"];
            $inq_numPages = ceil($inq_numRecords / $listSize);
            if ($inq_lastLink > $inq_numPages) {
                $inq_lastLink = $inq_numPages;
            }
            
            if ($inq_firstLink > 1) {
                $inq_move = $inq_firstLink - 1;
                echo "<a href=javascript:paging('inq_','$inq_move');>&lt</a> ";
            }
            
            for ($i = $inq_firstLink; $i <= $inq_lastLink; $i++) {
                if ($i == $inq_list) {
                    echo "<a href=javascript:paging('inq_','$i');><u style='color:#2e954f'>$i</u></a> ";
                } else {
                    echo "<a href=javascript:paging('inq_','$i');>$i</a> ";
                }
            }
            
            if ($inq_lastLink < $inq_numPages) {
                $inq_move = $inq_lastLink + 1;
                echo "<a href=javascript:paging('inq_','$inq_move');>&gt</a> ";
            }
        ?>
    </div>
</div>