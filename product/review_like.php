<?php
    session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        echo "
        <script>
            alert('리뷰를 추천하려면 로그인하세요.');
            opener.location.href = '/withChicken/login_out/login.php';
            window.close();
        </script>
        ";
        exit();
    }
    
    $mID = $_SESSION["id"];
    $rID = $_GET["rID"];
    $cnt = $_GET["cnt"];
    $cnt++;

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from review_like where rID='$rID' and mID='$mID'";
    $result = mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    if($row = mysqli_fetch_array($result)) {
        echo "
        <script>
            alert('이미 추천한 리뷰입니다.');
            window.close();
        </script>
        ";
        exit();
    }

	$sql = "insert into review_like(rID, mID) ";
	$sql .= "values('$rID', '$mID')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    $sql = "update product_review set goodCount='$cnt' where rID='$rID'";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    
    mysqli_close($con);

    echo "
	    <script>
            alert('추천하였습니다.');
            opener.location.href='product_info.php?page=2&scroll=1200';
            window.close();
	    </script>
	";
?>

   
