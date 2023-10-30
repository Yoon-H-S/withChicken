<?php
    session_start();

    $qID = $_GET["qID"];
    $aID = $_SESSION["admin_id"];

    $aContent = str_replace(" ", "&nbsp;", $_POST["aContent"]);
    $aContent = str_replace("\n", "<br>", $aContent);

    $aRegist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "insert into product_inquiry_answer(qID, aWriter, aContent, aRegist_day) ";
	$sql .= "values('$qID', '$aID', '$aContent', '$aRegist_day')";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    $sql = "update product_inquiry set qAnswer=1 where qID='$qID'";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    
    mysqli_close($con);

    echo "
	    <script>
            alert('답변이 등록되었습니다.');
            opener.location.href = '/withChicken/admin/product_manage.php';
            window.close();
	    </script>
	";
?>

   
