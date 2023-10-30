<?php $oID = $_GET["oID"]; ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css" />
<style>
body {
    font-family: Pretendard;
}
div {
    text-align: center;
}
span {
    color: #ff0000;
}
p {
    font-size: 18px;
}
#btn {
    display: flex;
    justify-content: center;
}
#close {
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
#delete {
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
<title>상품 삭제</title>
</head>
<body>
<div>
<h2><span>!</span>경고<span>!</span></h2>
<p>
    주문을 취소하시면 영업일 2~3일 이내로 환불됩니다.<br>
    취소하시겠습니까?
</p>
<div id="btn">
   <button type="button" id="close" onclick="javascript:self.close()">아니오</button>
   <button type="button" id="delete" onclick="location.href='./order_cancel_db.php?oID=<?=$oID?>&kind=1'">확인</button>
</div>
</body>
</html>

