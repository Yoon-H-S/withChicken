<?php
	session_start();
	$id = $_SESSION['id'];
    $oID = $_GET["oID"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "update orders set oKind=5 where oID='$oID'";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	$sql = "update members set point=point+(select earned_point from orders where oID='$oID') where id='$id'";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행


    mysqli_close($con);

    echo "
	    <script>
            alert('구매가 확정되었습니다.');
	        history.back();
	    </script>
	  ";
?>