<?php
    $admin_id   = $_POST["admin_id"];
    $admin_pass = $_POST["admin_pw"];
              
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "select * from admin where aID='$admin_id' and aPw='$admin_pass'";

	$result = mysqli_query($con, $sql);
    mysqli_close($con);

    while( $row = mysqli_fetch_array($result) ) {
        session_start();
        $_SESSION["admin_id"] = $row["aID"];

        header("Location:/withChicken/admin/admin_page.php");
        exit;
    }

    echo "
        <script>
            alert('아이디 또는 비밀번호가 틀렸습니다.');
            history.back();
        </script>
    ";
?>