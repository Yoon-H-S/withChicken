<?php
	session_start();
    if (empty($_SESSION["admin_id"])) { // 로그인 상태가 아니면
        header("Location:/withChicken/admin/admin_login.php");
        exit;
    }
    require("./req_prod_update.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>상품 수정</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/admin/css/product_update.css">
    <script type="text/javascript" src="/withChicken/admin/js/product_update.js"></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/admin/admin_index/admin_header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>상품 수정</h2>
            </div>
            <form name="product_update_form" method="post" enctype="multipart/form-data" action="./product_update_db.php">
                <div class="info_update">
                    <div class="essential"><span class="pri_bold">*</span>&nbsp;필수입력사항</div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;상품명&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pName" value="<?=$pName?>"></div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;상품카테고리&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pKind" placeholder="4자리 숫자" value="<?=$pKind?>"></div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;상품가격&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pPrice" value="<?=$pPrice?>"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;할인율&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pSale" placeholder="기본값 0" value="<?=$pSale?>"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;기존정보&nbsp;:&nbsp;</div>
                        <div class="in_image"><img src="<?=$pContent?>" onclick="window.open(this.src)"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;상품정보&nbsp;:&nbsp;</div>
                        <div class="rule">최대 1개첨부 가능</div>
                        <div class="in_file">
                            <input type="file" id="prod_con" name="pContent" onchange="addFile(this)">
                            <label class="files" for="prod_con">업로드</label>
                        </div>
                    </div>
                    <div class="tr_plus">
                        <div class="sub_title1"></div>
                        <div id="file_list"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;기존이미지&nbsp;:&nbsp;</div>
                        <div class="in_image"><img src="<?=$pImage?>" onclick="window.open(this.src)"></div>
                        <div class="in_image"><img src="<?=$pImage2?>" onclick="window.open(this.src)"></div>
                        <div class="in_image"><img src="<?=$pImage3?>" onclick="window.open(this.src)"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;상품이미지&nbsp;:&nbsp;</div>
                        <div class="rule">최대 3개첨부 가능</div>
                        <div class="in_file">
                            <input type="file" id="prod_img" multiple name="pImage[]" onchange="addFiles(this)">
                            <label class="files" for="prod_img">업로드</label>
                        </div>
                    </div>
                    <div class="tr_plus">
                        <div class="sub_title2"></div>
                        <div id="files_list"></div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;기본옵션&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pOption" value="<?=$pOption?>"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;옵션2&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pOption2" value="<?=$pOption2?>"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;옵션3&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pOption3" value="<?=$pOption3?>"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;옵션4&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pOption4" value="<?=$pOption4?>"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;배송방법&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pDelivery" value="<?=$pDelivery?>"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;배송비&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pDelPrice" placeholder="기본값 0" value="<?=$pDelPrice?>"></div>
                    </div>
                    <div class="tr_bot">
                    </div>
                    <div class="signup_btn">
                        <button id="btn_chksign" type="button" onclick="check_update()">수정하기</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/admin/admin_index/admin_footer.php"); ?>
</body>
</html>