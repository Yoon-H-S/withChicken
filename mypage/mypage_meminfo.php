<?php
	session_start();
    if (empty($_SESSION["id"])) { // 로그인 안된 상태이면
        header("Location:/withChicken/login_out/login.php");
        exit;
    }
    require("./req_member.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>마이페이지>내 정보 수정</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/mypage/css/mypage_meminfo.css">
    <script type="text/javascript" src="/withChicken/mypage/js/mem_update.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//d1p7wdleee1q2z.cloudfront.net/post/search.min.js"></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>마이페이지</h2>
            </div>
            <div class="content_div">
                <div class="list">
                    <ul>
                        <li><a href="./mypage_lookup.php">주문/배송 조회</a></li>
                        <li><a href="mypage_cancel.php">취소/반품/교환 조회</a></li>
                        <li><a href="">관심 상품</a></li>
                        <li><a class="highlights" href="./mypage_meminfo.php">내 정보 관리</a></li>
                        <li><a href="">내 문의 관리</a></li>
                    </ul>
                </div>
                <div class="meminfo">
                    <form name="member_update" action="./member_update.php" method="post">
                        <div class="info_update">
                            <div class="tr">
                                <div class="title">&nbsp;아이디&nbsp;:&nbsp;</div>
                                <div class="in"><input type="text" name="id" value="<?=$id?>" readonly></div>
                            </div>
                            <div class="tr">
                                <div class="title">&nbsp;비밀번호&nbsp;:&nbsp;</div>
                                <div class="in"><input type="password" name="pw"></div>
                                <div class="rule">최대 20글자 영문과 숫자, 특수문자를 포함할 수 있습니다.</div>
                            </div>
                            <div class="tr">
                                <div class="title">&nbsp;비밀번호확인&nbsp;:&nbsp;</div>
                                <div class="in"><input type="password" name="pwchk"></div>
                            </div>
                            <div class="tr">
                                <div class="title">&nbsp;이름&nbsp;:&nbsp;</div>
                                <div class="in"><input type="text" name="name" value="<?=$name?>" readonly></div>
                            </div>
                            <div class="tr">
                                <div class="title">&nbsp;전화번호&nbsp;:&nbsp;</div>
                                <div class="in"><input type="text" name="phone" placeholder="'-'없이 입력" class="<?=$phone?>" value="<?=$phone?>"></div>
                                <div>
                                    <button type="button" id="phonechk" onclick="check_phone()"></button>
                                    <label class="but" for="phonechk">인증번호받기</label>
                                </div>
                            </div>
                            <div class="tr_plus">
                                <div class="sub_title"></div>
                                <input type="checkbox" id="adsms" name="ad_sms" value="1" <?=$adsms?>>
                                <label class="check" for="adsms"></label>
                                <div class="rule">광고 문자 수신 동의</div>
                            </div>
                            <div class="tr">
                                <div class="title">&nbsp;인증번호&nbsp;:&nbsp;</div>
                                <div class="in"><input type="text" name="chknum"></div>
                                <div>
                                    <button type="button" id="numchk" onclick="check_num()"></button>
                                    <label class="but" for="numchk">확인하기</label>
                                </div>
                            </div>
                            <div class="tr">
                                <div class="title">&nbsp;이메일주소&nbsp;:&nbsp;</div>
                                <div class="in"><input type="text" name="email" value="<?=$email1?>"></div>
                                <div>@</div>
                                <div>
                                    <select name="email2">
                                        <option <?php if($email2 == "naver.com") echo "SELECTED";?>>naver.com</option>
                                        <option <?php if($email2 == "daum.net") echo "SELECTED";?>>daum.net</option>
                                        <option <?php if($email2 == "hanmail.net") echo "SELECTED";?>>hanmail.net</option>
                                        <option <?php if($email2 == "nate.com") echo "SELECTED";?>>nate.com</option>
                                        <option <?php if($email2 == "gmail.com") echo "SELECTED";?>>gmail.com</option>
                                        <option <?php if($email2 == "icloud.com") echo "SELECTED";?>>icloud.com</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tr_plus">
                                <div class="sub_title"></div>
                                <input type="checkbox" id="admail" name="ad_mail" value="1" <?=$admail?>>
                                <label class="check" for="admail"></label>
                                <div class="rule">광고 메일 수신 동의</div>
                            </div>
                            <div class="tr">
                            <div class="title">우편번호&nbsp;:&nbsp;</div>
                                <div class="in"><input type="text" name="zip_code" class="postcodify_postcode5" value="<?=$zip_code?>" maxlength="5"></div>
                                <div>
                                    <button type="button" id="postcodify_search_button"></button>
                                    <label class="but" for="postcodify_search_button">우편번호찾기</label>
                                </div>
                            </div>
                            <div class="tr">
                                <div class="title">주소&nbsp;:&nbsp;</div>
                                <div class="in_addr"><input type="text" name="address" placeholder="도로명주소" class="postcodify_address" value="<?=$address1?>"></div>
                            </div>
                            <div class="tr_addr">
                                <div class="title"></div>
                                <div class="in_addr"><input type="text" name="sub_address" placeholder="상세주소" class="postcodify_details" value="<?=$address2?>"></div>
                            </div>
                            <div class="update_btn">
                                <button id="btn_chkup" type="submit">정보수정</button>
                                <button id="btn_memdrawal" type="button" onclick="location.href='member_delete.php'">회원탈퇴</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>