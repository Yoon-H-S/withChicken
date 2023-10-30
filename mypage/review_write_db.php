<?php
    session_start();

    $id = $_SESSION["id"];

    $pID = $_POST["pID"];
    $doID = $_POST["doID"];
    $doOption = $_POST["option"];
    $grade = $_POST["star"];

    $rContent = str_replace(" ", "&nbsp;", $_POST["rContent"]);
    $rContent = str_replace("\n", "<br>", $rContent);

    $rRegist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    if($_FILES["rImage"]["name"]) {
        $rImage_upload = false;

        $src0 = '/xampp/htdocs';
        $src = '/withChicken/review_img/';
        $rImage = $src.$_FILES["rImage"]["name"];
        $fullSrc = $src0.$rImage;

        if (move_uploaded_file($_FILES["rImage"]["tmp_name"], "$fullSrc")){
            $rImage_upload = true;
        }

        if(!($rImage_upload)) {
            echo "
                <script>
                    alert('이미지 업로드 실패, 다시 시도하세요.');
                    history.back();
                </script>
            ";
            exit;
        }
    }

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

    if($_FILES["rImage"]["name"]) {
        $sql = "insert into product_review(pID, doID, rWriter, doOption, grade, rImage, rContent, rRegist_day) ";
        $sql .= "values('$pID', '$doID', '$id', '$doOption', '$grade', '$rImage', '$rContent', '$rRegist_day')";
    } else {
        $sql = "insert into product_review(pID, doID, rWriter, doOption, grade, rContent, rRegist_day) ";
        $sql .= "values('$pID', '$doID', '$id', '$doOption', '$grade', '$rContent', '$rRegist_day')";
    }
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	    <script>
            alert('리뷰가 등록되었습니다.');
            opener.location.reload();
            window.close();
	    </script>
	";
?>

   
