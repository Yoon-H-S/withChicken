<?php
    session_start();
    $id = $_SESSION["id"];
    $pass = $_POST["pw"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from members where id='$id' and pass='$pass'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    while( $row = mysqli_fetch_array($result) ) {
        echo "
        <script>
            location.href = '/withChicken/mypage/mypage_meminfo.php';
        </script>
        ";
        exit;
    }

    echo "
        <script>
            alert('비밀번호가 틀렸습니다.');
            history.back();
        </script>
    ";
?>