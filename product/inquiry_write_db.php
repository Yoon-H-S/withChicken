<?php
    session_start();

    $pID = $_SESSION["pID"];
    $id = $_SESSION["id"];

    $qOption = $_POST["qOption"];
    $qTitle = str_replace(" ", "&nbsp;", $_POST["qTitle"]);
    $qContent = str_replace(" ", "&nbsp;", $_POST["qContent"]);
    $qContent = str_replace("\n", "<br>", $qContent);
    $qSecret = $_POST["qSecret"]; 

    $qRegist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "insert into product_inquiry(pID, qWriter, qOption, qTitle, qContent, qSecret, qRegist_day) ";
	$sql .= "values('$pID', '$id', '$qOption', '$qTitle', '$qContent', '$qSecret', '$qRegist_day')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	    <script>
            alert('문의가 등록되었습니다.');
            opener.location.reload();
            window.close();
	    </script>
	";
?>

   
