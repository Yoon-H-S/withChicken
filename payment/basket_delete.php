<?php
    $con = mysqli_connect("localhost", "root", "", "shop","3307");
    
    if(isset($_GET["checkCnt"])) {
        for($i = 1; $i <= $_GET["checkCnt"]; $i++) {
            $bID = $_GET["bID".$i];
            $sql = "delete from basket where bID='$bID'";
            mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
        }
    } else {
        $bID = $_GET["bID"];
        $sql = "delete from basket where bID='$bID'";
        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
        
    }
    mysqli_close($con);

    echo "
        <script>
            history.back();
        </script>
    ";
?>