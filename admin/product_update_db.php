<?php
	session_start();
    $pID = $_SESSION["pID"];
    $pName = $_POST["pName"];
    $pKind = $_POST["pKind"];
    $pPrice = $_POST["pPrice"];
    $pSale = $_POST["pSale"] ?? "";
    $pOption = $_POST["pOption"];
    $pOption2 = $_POST["pOption2"] ?? "";
    $pOption3 = $_POST["pOption3"] ?? "";
    $pOption4 = $_POST["pOption4"] ?? "";
    $pDelivery = $_POST["pDelivery"] ?? "";
    $pDelPrice = $_POST["pDelPrice"] ?? "";

    $con = mysqli_connect("localhost", "root", "", "shop","3307");

	$sql = "update product set pName='$pName', pKind='$pKind', pPrice='$pPrice', pSale='$pSale', pOption='$pOption', pOption2='$pOption2', pOption3='$pOption3', pOption4='$pOption4', pDelivery='$pDelivery', pDelPrice='$pDelPrice' where pID='$pID'";
	
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    $sql = "select * from product where pID='$pID'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $pKind1 = substr($pKind,0,2);
    $pKind2 = substr($pKind,2,2);
    $src0 = '/xampp/htdocs';
    $src = '/withChicken/product_img/'.$pKind1.'/'.$pKind2.'/';

    if($_FILES["pContent"]["name"]) {
        $pContent_upload = false;

        $pContent = $src.$_FILES["pContent"]["name"];
        $fullSrc = $src0.$pContent;
    
        if (move_uploaded_file($_FILES["pContent"]["tmp_name"], "$fullSrc")){
            $pContent_upload = true;
        }
        unlink($row["pContent"]);

        $sql = "update product set pContent='$pContent' where pID='$pID'";
        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    }

    if($_FILES["pImage"]["name"][0]) {
        $pImage_upload = false;

        for($i=0; $i < 3; $i++) {
            if ($_FILES["pImage"]["name"][$i]) {
                $pImage[$i] = $src.$_FILES["pImage"]["name"][$i];
                $fullSrc = $src0.$pImage[$i];
    
                if (move_uploaded_file($_FILES["pImage"]["tmp_name"][$i], "$fullSrc")){
                    if($i == count($_FILES["pImage"]["name"])-1) {$pImage_upload = true;}
                }
            } else {
                $pImage[$i] = "";
            }
        }
        unlink($row["pImage"]);
        unlink($row["pImage2"]);
        unlink($row["pImage3"]);

        $sql = "update product set pImage='$pImage[0]', pImage2='$pImage[1]', pImage3='$pImage[2]' where pID='$pID'";
        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    }

    mysqli_close($con);

    echo "
	    <script>
            alert('상품이 수정되었습니다.');
	        location.href = '/withChicken/admin/product_search.php?search=$pName';
	    </script>
	  ";
// 
?>