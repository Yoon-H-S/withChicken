<?php
    $qID = $_GET["qID"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from product_inquiry where qID='$qID'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    mysqli_close($con);
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css" />
<style>
body {
    font-family: Pretendard;
}
#h2 {
    text-align: center;
}
span {
    font-size: 18px;
    padding-right: 10px;
    width: 90px;
}
.title {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}
.title_text {
    width: 500px;
    height: 30px;
    border: 1px solid #d5d5d5;
    margin: 0px;
    display: flex;
    
}
.title input {
    border: none;
    outline: none;
    padding: 0px 0px 0px 5px;
    height: 100%;
    width: 495px;
    font-family: Pretendard;
}
.content {
    margin-bottom: 30px;
}
.content_text {
    width: 590px;
    height: 140px;
    border: 1px solid #d5d5d5;
    margin-top: 10px;
    padding: 5px;
    font-size: 14px;
}
.content textarea {
    border: none;
    outline: none;
    resize: none;
    width: 590px;
    height: 140px;
    font-family: Pretendard;
}
#btn {
    display: flex;
    justify-content: center;
}
#write {
    width: 70px;
    height: 30px;
    border: none;
    background-color: #2E954E;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    font-family: Pretendard;
    cursor: pointer;
}
#close {
    width: 70px;
    height: 30px;
    border: 1px solid #d5d5d5;
    background-color: #fafafa;
    border-radius: 5px;
    color: #333333;
    font-family: Pretendard;
    margin-left: 30px;
    cursor: pointer;
}
</style>
<script>
    function check_write() {
        if(!document.inq_answer_write.aContent.value) {
            alert("내용을 입력하세요!");
            document.inquiry_write.qContent.focus();
            return;
        }

        document.inq_answer_write.submit();
    }
</script>
<title>답변작성</title>
</head>
<body>
<div id="h2">
<h2>답변작성</h2>
</div>
<form name="inq_answer_write" action="./prod_inq_answer_write_db.php?qID=<?=$qID?>" method="post">
    <div class="title">
        <span>문의고객</span><div class="title_text"><input type="text" value="<?=$row["qWriter"]?>" readonly></div>
    </div>
    <div class="title">
        <span>문의종류</span><div class="title_text"><input type="text" value="<?=$row["qOption"]?>" readonly></div>
    </div>
    <div class="title">
        <span>문의제목</span><div class="title_text"><input type="text" value="<?=$row["qTitle"]?>" readonly></div>
    </div>
    <div class="content">
        <span>문의내용</span>
        <div class="content_text">
            <?=$row["qContent"]?>
        </div>
    </div>
    <div class="content">
        <span>답변내용</span>
        <div class="content_text">
            <textarea name="aContent"></textarea>
        </div>
    </div>
    <div id="btn">
        <button type="button" id="write" onclick="check_write()">답변완료</button>
        <button type="button" id="close" onclick="javascript:self.close()">답변취소</button>
    </div>
</form>
</body>
</html>

