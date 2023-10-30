<?php
    $listSize = 5;
    $rev_list = $_GET["rev_list"] ?? 1;
    $rev_start = ($rev_list - 1) * $listSize;
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from product_review pr, members m where pr.pID='$pID' and pr.rWriter = m.id order by goodCount desc limit 3";
    $best_rev_result = mysqli_query($con, $sql); // 베스트리뷰 가져오기

    $sql = "select * from product_review pr, members m where pr.pID='$pID' and pr.rWriter = m.id order by rRegist_Day desc  limit $rev_start,$listSize";
    $all_rev_result = mysqli_query($con, $sql); // 전체리뷰 가져오기

    $sql = "select avg(grade) from product_review where pID='$pID'";
    $rev_allGrade = mysqli_query($con, $sql); // 총 평점
    $rev_allGrade_row = mysqli_fetch_array($rev_allGrade);

    $sql = "select count(*) from product_review where pID='$pID'";
    $rev_count = mysqli_query($con, $sql); // 총 개수
    $rev_count_row = mysqli_fetch_array($rev_count);

    $rev_counts = array();
    $rev_counts_row = array();
    $star_bar = array();
    for ($i = 1; $i <= 5; $i++) {
        $sql = "select count(*) from product_review where pID='$pID' and grade='$i'";
        $rev_counts[$i-1] = mysqli_query($con, $sql); // 별점 당 개수
        $rev_counts_row[$i-1] = mysqli_fetch_array($rev_counts[$i-1]);
        if ($rev_count_row["count(*)"] == 0) {
            $star_bar[$i-1] = 0;
        } else {
            $star_bar[$i-1] = round(($rev_counts_row[$i-1]["count(*)"] / $rev_count_row["count(*)"])*100,0);
        } 
    }
    mysqli_close($con);
    $rev_number = 0;
?>
<div id="prod_review">
    <div class="total_grade_container">
        <div class="total_grade">
            <h1 class="star_grade"><?=round($rev_allGrade_row["avg(grade)"],1)?></h1><span class="total_count">총 <?=$rev_count_row["count(*)"]?>개</span> 
        </div>
        <div class="star_num">
            <div>★5</div>
            <div>★4</div>
            <div>★3</div>
            <div>★2</div>
            <div>★1</div>
        </div>
        <div class="star_bar">
            <div class="star_bar_back">
                <div class="back_bar"></div>
                <div class="back_bar"></div>
                <div class="back_bar"></div>
                <div class="back_bar"></div>
                <div class="back_bar"></div>
            </div>
            <div class="star_bar_front">
                <div class="star_bar_5" style="width: <?=$star_bar[4]?>%"></div>
                <div class="star_bar_4" style="width: <?=$star_bar[3]?>%"></div>
                <div class="star_bar_3" style="width: <?=$star_bar[2]?>%"></div>
                <div class="star_bar_2" style="width: <?=$star_bar[1]?>%"></div>
                <div class="star_bar_1" style="width: <?=$star_bar[0]?>%"></div>
            </div>
        </div>
        <div class="grade_count">
            <div>(<?=$rev_counts_row[4]["count(*)"]?>)</div>
            <div>(<?=$rev_counts_row[3]["count(*)"]?>)</div>
            <div>(<?=$rev_counts_row[2]["count(*)"]?>)</div>
            <div>(<?=$rev_counts_row[1]["count(*)"]?>)</div>
            <div>(<?=$rev_counts_row[0]["count(*)"]?>)</div>
        </div>
    </div>
    <div class="review_head">
        <a id="best_review" href="javascript:review_tab('best_review')">베스트리뷰</a>&nbsp;|&nbsp;
        <a id="all_review" href="javascript:review_tab('all_review')">전체리뷰</a>
    </div>
    <div id="best_review_body">
        <?php while($rev_row = mysqli_fetch_array($best_rev_result) ?? 0) { ?>
        <div class="review_container">
            <div class="rev_img"><img src="<?= $rev_row["rImage"] ? $rev_row["rImage"] : "./image/no_review_img.jpg" ?>"></div>
            <div class="rev_container_info">
                <div class="rev_info_head">
                    <div class="rWriter"><?=$rev_row["name"]?></div>
                    <div class="rDay"><?=substr($rev_row["rRegist_day"],0,10)?></div>
                    <div class="doOption">옵션 : <?=$rev_row["doOption"]?></div>
                    <div class="grade"><img src="./image/star_<?=$rev_row["grade"]?>.jpg"></div>
                </div>
                <div class="rev_content"><?=$rev_row["rContent"]?></div>
            </div>
            <div class="rev_like">
                <span class="like_count"><img src="./image/like.jpg"><?=$rev_row["goodCount"]?></span>
            </div>
        </div>
        <?php $rev_number++; if($rev_number >= 3) break; } ?>
    </div>
    <div id="all_review_body">
        <div class="all_review_body">
            <?php while($rev_row = mysqli_fetch_array($all_rev_result) ?? 0) { ?>
            <div class="review_container">
                <div class="rev_img"><img src="<?= $rev_row["rImage"] ? $rev_row["rImage"] : "./image/no_review_img.jpg" ?>"></div>
                <div class="rev_container_info">
                    <div class="rev_info_head">
                        <div class="rWriter"><?=$rev_row["name"]?></div>
                        <div class="rDay"><?=substr($rev_row["rRegist_day"],0,10)?></div>
                        <div class="doOption">옵션 : <?=$rev_row["doOption"]?></div>
                        <div class="grade"><img src="./image/star_<?=$rev_row["grade"]?>.jpg"></div>
                    </div>
                    <div class="rev_content"><?=$rev_row["rContent"]?></div>
                </div>
                <div class="rev_like">
                    <span class="like_count"><img src="./image/like.jpg"><?=$rev_row["goodCount"]?></span>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="all_review_paging">
            <?php
                $paginationSize = 5;
                $rev_firstLink = floor(($rev_list - 1) / $paginationSize) * $paginationSize + 1;
                $rev_lastLink = $rev_firstLink + $paginationSize - 1;
                
                $rev_numRecords = $rev_count_row["count(*)"];
                $rev_numPages = ceil($rev_numRecords / $listSize);
                if ($rev_lastLink > $rev_numPages) {
                    $rev_lastLink = $rev_numPages;
                }
                
                if ($rev_firstLink > 1) {
                    $rev_move = $rev_firstLink - 1;
                    echo "<a href=javascript:paging('rev_','$rev_move');>&lt</a> ";
                }
                
                for ($i = $rev_firstLink; $i <= $rev_lastLink; $i++) {
                    if ($i == $rev_list) {
                        echo "<a href=javascript:paging('rev_','$i');><u style='color:#2e954f'>$i</u></a> ";
                    } else {
                        echo "<a href=javascript:paging('rev_','$i');>$i</a> ";
                    }
                }
                
                if ($rev_lastLink < $rev_numPages) {
                    $rev_move = $rev_lastLink + 1;
                    echo "<a href=javascript:paging('rev_','$rev_move');>&gt</a> ";
                }
            ?>
        </div>
    </div>
</div>