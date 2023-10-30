<?php
	session_start();
    if (empty($_SESSION["admin_id"])) { // 로그인 상태가 아니면
        header("Location:/withChicken/admin/admin_login.php");
        exit;
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>상품 등록</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/admin/css/product_insert.css">
    <script type="text/javascript" src="/withChicken/admin/js/product_insert.js"></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/admin/admin_index/admin_header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>상품 등록</h2>
            </div>
            <form name="product_form" method="post" enctype="multipart/form-data" action="./product_insert_db.php">
                <div class="info_input">
                    <div class="essential"><span class="pri_bold">*</span>&nbsp;필수입력사항</div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;상품명&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pName"></div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;상품카테고리&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pKind" placeholder="4자리 숫자"></div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;상품가격&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pPrice"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;할인율&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pSale" placeholder="기본값 0"></div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;상품정보&nbsp;:&nbsp;</div>
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
                        <div class="title"><span class="pri_bold">*</span>&nbsp;상품이미지&nbsp;:&nbsp;</div>
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
                        <div class="in"><input type="text" name="pOption" placeholder="팩수|가격|팩당가격"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;옵션2&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pOption2" placeholder="팩수|가격|팩당가격"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;옵션3&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pOption3" placeholder="팩수|가격|팩당가격"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;옵션4&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pOption4" placeholder="팩수|가격|팩당가격"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;배송방법&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pDelivery" placeholder="2개 이상 |로 구분"></div>
                    </div>
                    <div class="tr">
                        <div class="title">&nbsp;배송비&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="pDelPrice" placeholder="기본값 0"></div>
                    </div>
                    <div class="tr_bot">
                    </div>
                    <div class="signup_btn">
                        <button id="btn_chksign" type="button" onclick="check_input()">등록하기</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/admin/admin_index/admin_footer.php"); ?>
</body>
</html>