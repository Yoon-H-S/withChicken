<?php
    $pContent_upload = false;
    $pImage_upload = false;

    $pName = $_POST["pName"];
    $pKind = $_POST["pKind"];
    $pPrice = $_POST["pPrice"];
    $pSale = $_POST["pSale"] ?? "";
    $pOption = $_POST["pOption"];
    $pOption2 = $_POST["pOption2"] ?? "";
    $pOption3 = $_POST["pOption3"] ?? "";
    $pOption4 = $_POST["pOption4"] ?? "";
    $pDelivery = $_POST["pDelivery"] ?? "일반배송";
    $pDelPrice = $_POST["pDelPrice"] ?? "";

    $pRegist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $pKind1 = substr($pKind,0,2);
    $pKind2 = substr($pKind,2,2);

    $src0 = '/xampp/htdocs';
    $src = '/withChicken/product_img/'.$pKind1.'/'.$pKind2.'/';
    $pContent = $src.$_FILES["pContent"]["name"];
    $fullSrc = $src0.$pContent;

    if (move_uploaded_file($_FILES["pContent"]["tmp_name"], "$fullSrc")){
        $pContent_upload = true;
    }

    for($i=0; $i < 3; $i++) {
        if (isset($_FILES["pImage"]["name"][$i])) {
            $pImage[$i] = $src.$_FILES["pImage"]["name"][$i];
            $fullSrc = $src0.$pImage[$i];

            if (move_uploaded_file($_FILES["pImage"]["tmp_name"][$i], "$fullSrc")){
                if($i == count($_FILES["pImage"]["name"])-1) {$pImage_upload = true;}
            }
        } else {
            $pImage[$i] = "";
        }
    }

    if(!($pContent_upload && $pImage_upload)) {
        echo "
            <script>
                alert('이미지 업로드 실패, 다시 시도하세요.');
                history.back();
            </script>
        ";
        exit;
    }
              
    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "insert into product(pName, pKind, pPrice, pSale, pContent, pImage, pImage2, pImage3, pOption, pOption2, pOption3, pOption4, pDelivery, pDelPrice, pRegist_day) ";
	$sql .= "values('$pName', '$pKind', '$pPrice', '$pSale', '$pContent', '$pImage[0]', '$pImage[1]', '$pImage[2]', '$pOption', '$pOption2', '$pOption3', '$pOption4', '$pDelivery', '$pDelPrice', '$pRegist_day')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	    <script>
            alert('상품이 등록되었습니다.');
	        location.href = '/withChicken/admin/product_search.php?search=$pName';
	    </script>
	  ";

?>