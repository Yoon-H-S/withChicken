<?php
	session_start();

    $id = $_SESSION["id"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "delete from members where id='$id'";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    mysqli_close($con);

    unset($_SESSION["id"]);

    echo "
        <script>
            alert('회원이 탈퇴되었습니다.');
            opener.location.href = '/withChicken/main/main.php';
            window.close();
        </script>
    ";

?>