<?php
    $listSize = 5;
    $inq_list = $_GET["inq_list"] ?? 1;
    $inq_start = ($inq_list - 1) * $listSize;
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from product_inquiry pi, members m where pi.pID='$pID' and pi.qWriter = m.id order by pi.qRegist_day desc limit $inq_start,$listSize";
    $inq_result = mysqli_query($con, $sql);
    $sql = "select count(*) from product_inquiry where pID='$pID'";
    $inq_count = mysqli_query($con, $sql);
    $inq_count_row = mysqli_fetch_array($inq_count);
    mysqli_close($con);
    $inq_number = ($inq_count_row["count(*)"] ?? 0) - (($inq_list - 1) * $listSize);
?>
<div id="prod_inq">
    <div class="inq_head">
        <div class="inq_title">상품문의<span class="inq_count">(<?=$inq_count_row["count(*)"]?>개)</span></div>
        <button class="inq_write" type="button" onclick="inq_write()">문의 작성</button>
    </div>
    <div class="inq_body">
        <?php while($inq_row = mysqli_fetch_array($inq_result) ?? 0) { ?>
        <div class="inq_container">
            <a id="inq_show<?=$inq_number?>" <?=($inq_row["qSecret"] || ($inq_row["qWriter"] == ($_SESSION["id"] ?? 0))) ? "href='javascript:inq_open(".$inq_number.");'" : ""?>>
                <div class="inq_container_head">
                    <div class="inq_num"><?=$inq_number?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_answer"><?=$inq_row["qAnswer"] ? "답변완료" : "답변대기"?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_option"><?=$inq_row["qOption"]?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_name"><?=($inq_row["qSecret"] || ($inq_row["qWriter"] == ($_SESSION["id"] ?? 0))) ? $inq_row["qTitle"] : "(비공개)"?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_writer"><?=($inq_row["qWriter"] == ($_SESSION["id"] ?? 0)) ? $inq_row["name"] : substr($inq_row["name"],0,3)."OO"?></div>
                    <div class="inq_|">|</div>
                    <div class="inq_date"><?=substr($inq_row["qRegist_day"],0,10)?></div>
                </div>
            </a>
            <div id="container_body<?=$inq_number?>" class="inq_container_body">
                <div class="inq_detail"><?=$inq_row["qContent"]?></div>
                <?php if($inq_row["qAnswer"]) { require("./req_inq_answer.php");?>
                <div class="admin_answer">
                    <div class="answer_head">
                        <div class="admin_name"><?=$inq_ans_row["aName"]?></div>
                        <div class="answer_date"><?=substr($inq_ans_row["aRegist_day"],0,10)?></div>
                    </div>
                    <div class="answer_body"><?=$inq_ans_row["aContent"]?></div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php $inq_number--; } ?>
    </div>
    <div  class="inq_paging">
        <?php
            $paginationSize = 5;
            $inq_firstLink = floor(($inq_list - 1) / $paginationSize) * $paginationSize + 1;
            $inq_lastLink = $inq_firstLink + $paginationSize - 1;
            
            $inq_numRecords = $inq_count_row["count(*)"];
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