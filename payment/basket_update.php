<?php
    $bID = $_GET["bID"];
    $pCount = $_GET["pCount"];
	
	$con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "update basket set pCount='$pCount' where bID='$bID'";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
        <script>
            history.back();
        </script>
    ";
?>