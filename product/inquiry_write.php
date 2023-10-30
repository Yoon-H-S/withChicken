<?php
    session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        echo "
        <script>
            alert('문의를 작성하려면 로그인하세요.');
            opener.location.href = '/withChicken/login_out/login.php';
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
<link rel="stylesheet" type="text/css" href="/withChicken/product/css/inquiry_write.css">
<style>
</style>
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

    function method_click(name) {
        document.getElementById('method_choice').value = name;
        method_close();
    }

    function check_write() {
        if(!document.inquiry_write.qOption.value) {
            alert("문의종류를 선택하세요!");
            document.inquiry_write.qOption.focus();
            return;
        }

        if(!document.inquiry_write.qTitle.value) {
            alert("제목을 입력하세요!");
            document.inquiry_write.qTitle.focus();
            return;
        }

        if(!document.inquiry_write.qContent.value) {
            alert("내용을 입력하세요!");
            document.inquiry_write.qContent.focus();
            return;
        }

        document.inquiry_write.submit();
    }
</script>
<title>문의작성</title>
</head>
<body>
    <div id="h2">
        <h2>문의작성</h2>
    </div>
    <form name="inquiry_write" action="./inquiry_write_db.php" method="post">
        <div class="method">
            <div class="title">문의종류</div>
            <div class="method_body">
                <div id="method_in" class="method_in">
                    <a id="method_select" class="method_select" href="javascript:method_open();">
                        <input type="text" class="input_read" name="qOption" id="method_choice" value="" readonly>
                        <div><img id="list_img" src="./image/list_hi.jpg"></div>
                    </a>
                </div>
                <div id="method_list" class="method_list">
                    <ul class="list_ul">
                        <li><a href="javascript:method_click('상품문의');"><p>상품문의</p></a></li>
                        <li><a href="javascript:method_click('배송문의');"><p>배송문의</p></a></li>
                        <li><a href="javascript:method_click('취소문의');"><p>취소문의</p></a></li>
                        <li><a href="javascript:method_click('반품문의');"><p>반품문의</p></a></li>
                        <li><a href="javascript:method_click('교환문의');"><p>교환문의</p></a></li>
                        <li><a href="javascript:method_click('기타문의');"><p>기타문의</p></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="title">
            <div class="title">문의제목</div>
            <div id="title_text"><input type="text" name="qTitle"></div>
        </div>
        <div id="content">
            <span>문의내용</span>
            <div id="content_text">
                <textarea name="qContent"></textarea>
            </div>
        </div>
        <label><input type="radio" name="qSecret" value="1">공개</label>
        <label><input type="radio" name="qSecret" value="0" checked>비공개</label><br><br>
        <div id="btn">
            <button type="button" id="write" onclick="check_write()">작성완료</button>
            <button type="button" id="close" onclick="javascript:self.close()">작성취소</button>
        </div>
    </form>
</body>
</html>

