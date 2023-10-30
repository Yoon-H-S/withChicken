<?php
    session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        echo "
        <script>
            alert('리뷰를 작성하려면 로그인하세요.');
            opener.location.href = '/withChicken/login_out/login.php';
            window.close();
        </script>
        ";
        exit();
    }
    $oID = $_GET["oID"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select count(*) from order_products where oID='$oID'";
    $cnt_result = mysqli_query($con, $sql);
    $cnt_row = mysqli_fetch_array($cnt_result);
    $maxCount = $cnt_row["count(*)"];
    $minCount = 0;
    $doIDs = array();
    $count = 0;
    
    $sql = "select * from order_products where oID='$oID'";
    $order_result = mysqli_query($con, $sql);
    while($order_row = mysqli_fetch_array($order_result)) {
        $doID = $order_row["doID"];
        $sql = "select count(*) from product_review where doID='$doID'";
        $do_result = mysqli_query($con, $sql);
        $do_row = mysqli_fetch_array($do_result);
        if($do_row["count(*)"] == 1) {
            $minCount++;
        } else {
            $doIDs[$count] = $doID;
            $count++;
        }
    }
    mysqli_close($con);
    if($maxCount == $minCount) {
        echo "
        <script>
            alert('이미 리뷰를 작성하였습니다.');
            window.close();
        </script>
        ";
        exit();
    }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css" />
<link rel="stylesheet" type="text/css" href="/withChicken/mypage/css/review_write.css">
<script>
function method_open() {
    document.getElementById('method_list').style.display = 'block';
    document.getElementById('method_in').style.border = '1px solid #888888';
    document.getElementById('method_select').href = "javascript:method_close();";
    document.getElementById('list_img').src = "./image/list_bye.jpg";
}

function method_close() {
    document.getElementById('method_list').style.display = 'none';
    document.getElementById('method_in').style.border = '1px solid #d5d5d5';
    document.getElementById('method_select').href = "javascript:method_open();";
    document.getElementById('list_img').src = "./image/list_hi.jpg";
}

function method_click(name,op,pi,doi) {
    document.getElementById('method_choice').value = name;
    document.getElementById('option').value = op;
    document.getElementById('pID').value = pi;
    document.getElementById('doID').value = doi;
    method_close();
}
const drawStar = (target) => {
  document.querySelector(`.star span`).style.width = `${target.value * 20}%`;
}
function addFile(obj) {
    document.getElementById('file_list').innerHTML = "";
    for (const file of obj.files) {
        // 목록 추가
        let htmlData = '';
        htmlData += '<div class="filebox">';
        htmlData += '   <p class="name">' + file.name + '</p>';
        htmlData += '</div>';
        document.getElementById('file_list').innerHTML += htmlData;
    }
}
function check_write() {
    if(!document.review_write.pName.value) {
        alert("상품을 선택하세요!");
        document.review_write.qTitle.focus();
        return;
    }
    if(document.review_write.star.value == 0) {
        alert("별점을 입력하세요!");
        document.review_write.star.focus();
        return;
    }
    if(!document.review_write.rContent.value) {
        alert("내용을 입력하세요!");
        document.review_write.rContent.focus();
        return;
    }
    document.review_write.submit();
}
</script>
<title>리뷰작성</title>
</head>
<body>
    <div id="h2">
        <h2>리뷰작성</h2>
    </div>
    <form name="review_write" action="./review_write_db.php" method="post" enctype="multipart/form-data">
        <div class="method">
            <div class="title">상품선택</div>
            <div class="method_body">
                <div id="method_in" class="method_in">
                    <a id="method_select" class="method_select" href="javascript:method_open();">
                        <input type="text" class="input_read" name="pName" id="method_choice" value="" readonly>
                        <div><img id="list_img" src="./image/list_hi.jpg"></div>
                    </a>
                </div>
                <div id="method_list" class="method_list">
                    <ul class="list_ul">
                        <?php
                            for($i = 0; $i < $count; $i++) {
                                $id = $doIDs[$i];
                                $con = mysqli_connect("localhost", "root", "", "shop","3307");
                                $sql = "select * from order_products op, product p where op.doID='$id' and op.pID=p.pID";
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_array($result);
                                $name = $row["pName"];
                                $pID = $row["pID"];
                                $option = $row["doOption"];
                        ?>
                        <li><a href="javascript:method_click('<?=$name?>','<?=$option?>','<?=$pID?>','<?=$id?>');"><p><?=$name?></p></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="title">
            <div class="title">옵션</div>
            <div id="title_text"><input class="read" name="option" id="option" value="" readonly></div>
        </div>
        <div id="title">
            <div class="title">별점</div>
            <span class="star">★★★★★
                <span>★★★★★</span>
                <input type="range" name="star" oninput="drawStar(this)" value="0" step="1" min="0" max="5">
            </span>
        </div>
        <div id="content">
            <span>리뷰내용</span>
            <div id="content_text">
                <textarea name="rContent"></textarea>
            </div>
        </div>
        <div id="title">
            <div class="title">리뷰이미지</div>
            <div class="rule">최대 1개첨부 가능</div>
            <div class="in_file">
                <input type="file" id="prod_con" name="rImage" onchange="addFile(this)"/>
                <label class="files" for="prod_con">업로드</label>
            </div>
        </div>
        <div class="tr_plus">
            <div class="sub_title1"></div>
            <div id="file_list"></div>
        </div>
        <div id="btn">
            <button type="button" id="write" onclick="check_write()">작성완료</button>
            <button type="button" id="close" onclick="javascript:self.close()">작성취소</button>
        </div>
        <input type="hidden" id="pID" name="pID" value="">
        <input type="hidden" id="doID" name="doID" value="">
    </form>
</body>
</html>