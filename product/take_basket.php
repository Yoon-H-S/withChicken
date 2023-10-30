<?php
    session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        echo "
        <script>
            alert('장바구니에 상품을 추가하려면 로그인하세요.');
            opener.location.href = '/withChicken/login_out/login.php';
            window.close();
        </script>
        ";
        exit();
    }

    $pID = $_SESSION["pID"];
    $id = $_SESSION["id"];

    $pOptionName = $_GET["pOptionName"];
    $pOptionPrice = $_GET["pOptionPrice"];
    $pCount = $_GET["pCount"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "insert into basket(pID, mID, pOptionName, pOptionPrice, pCount) ";
	$sql .= "values('$pID', '$id', '$pOptionName', '$pOptionPrice', '$pCount')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
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
div {
    text-align: center;
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
    border: 1px solid #d5d5d5;
    background-color: #fafafa;
    border-radius: 5px;
    color: #333333;
    font-family: Pretendard;
    cursor: pointer;
}
#go_basket {
    width: 70px;
    height: 30px;
    border: none;
    background-color: #2E954E;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    font-family: Pretendard;
    margin-left: 30px;
    cursor: pointer;
}
</style>
<script>
    function go_basket() {
        opener.location.href='/withChicken/payment/basket.php';
        window.close();
    }
</script>
<title>장바구니 추가</title>
</head>
<body>
<div>
<h2>추가완료</h2>
<p>
    장바구니에 상품이 추가되었습니다.<br>
    바로 장바구니로 가시겠습니까?
</p>
<div id="btn">
   <button type="button" id="close" onclick="javascript:self.close()">아니오</button>
   <button type="button" id="go_basket" onclick="go_basket()">바로가기</button>
</div>
</body>
</html>

