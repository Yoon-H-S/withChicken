<?php
	session_start();

    $pID = $_SESSION["pID"];

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    $sql = "select * from product where pID='$pID'";
    $result = mysqli_query($con, $sql);

	$sql = "delete from product where pID='$pID'";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    $row = mysqli_fetch_array($result);
    $pContent = $row["pContent"];
    $pImage = $row["pImage"];
    $pImage2 = $row["pImage2"] ?? "";
    $pImage3 = $row["pImage3"] ?? "";

    unlink("/xampp/htdocs".$pContent);
    unlink("/xampp/htdocs".$pImage);
    if(!($pImage2 == ""))
        unlink("/xampp/htdocs".$pImage2);
    if(!($pImage3 == ""))
        unlink("/xampp/htdocs".$pImage3);

    mysqli_close($con);

    echo "
        <script>
            alert('상품이 삭제되었습니다.');
            opener.location.href = '/withChicken/admin/admin_page.php';
            window.close();
        </script>
    ";

?>