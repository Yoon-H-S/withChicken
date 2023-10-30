<?php
	session_start();
    if (!empty($_SESSION["id"])) { //로그인 된 상태이면
        header("Location:/withChicken/main/main.php");
        exit;
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원가입>정보입력</title>
    <?php require("/xampp/htdocs/withChicken/index/style.php"); ?>
    <link rel="stylesheet" type="text/css" href="/withChicken/signup/css/signup_info.css">
    <script type="text/javascript" src="/withChicken/signup/js/signup_info.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//d1p7wdleee1q2z.cloudfront.net/post/search.min.js"></script>
</head>
<body>
    <?php require("/xampp/htdocs/withChicken/index/header.php"); ?>
    <main>
        <div class="main_inner">
            <div class="page_name">
                <h2>회원가입>정보입력</h2>
            </div>
            <form name="member_form" method="post" action="./signup_complete.php">
                <div class="info_input">
                    <div class="essential"><span class="pri_bold">*</span>&nbsp;필수입력사항</div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;아이디&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="id"></div>
                        <div>
                            <button type="button" id="dupchk" onclick="check_id()"></button>
                            <label class="but" for="dupchk">중복확인</label>
                        </div>
                        <div class="rule">6-12글자의 영문과 숫자 가능합니다.</div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;비밀번호&nbsp;:&nbsp;</div>
                        <div class="in"><input type="password" name="pw" maxlength="20"></div>
                        <div class="rule">최대 20글자 영문과 숫자, 특수문자를 포함할 수 있습니다.</div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;비밀번호확인&nbsp;:&nbsp;</div>
                        <div class="in"><input type="password" name="pwchk" maxlength="20"></div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;이름&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="name"></div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;전화번호&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="phone" placeholder="'-'없이 입력" maxlength="11"></div>
                        <div>
                            <button type="button" id="phonechk" onclick="check_phone()"></button>
                            <label class="but" for="phonechk">인증번호받기</label>
                        </div>
                    </div>
                    <div class="tr_plus">
                        <div class="sub_title"></div>
                        <input type="checkbox" id="adsms" name="ad_sms" value="1">
                        <label class="check" for="adsms"></label>
                        <div class="rule">광고 문자 수신 동의</div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;인증번호&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="chknum" maxlength="5"></div>
                        <div>
                            <button type="button" id="numchk" onclick="check_num()"></button>
                            <label class="but" for="numchk">확인하기</label>
                        </div>
                    </div>
                    <div class="tr">
                        <div class="title"><span class="pri_bold">*</span>&nbsp;이메일주소&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="email"></div>
                        <div>@</div>
                        <div>
                            <select name="email2">
                                <option></option>
                                <option>naver.com</option>
                                <option>daum.net</option>
                                <option>hanmail.net</option>
                                <option>nate.com</option>
                                <option>gmail.com</option>
                                <option>icloud.com</option>
                            </select>
                        </div>
                    </div>
                    <div class="tr_plus">
                        <div class="sub_title"></div>
                        <input type="checkbox" id="admail" name="ad_mail" value="1">
                        <label class="check" for="admail"></label>
                        <div class="rule">광고 메일 수신 동의</div>
                    </div>
                    <div class="tr">
                        <div class="title">우편번호&nbsp;:&nbsp;</div>
                        <div class="in"><input type="text" name="zip_code" class="postcodify_postcode5" value="" maxlength="5"></div>
                        <div>
                            <button type="button" id="postcodify_search_button"></button>
                            <label class="but" for="postcodify_search_button">우편번호찾기</label>
                        </div>
                    </div>
                    <div class="tr">
                        <div class="title">주소&nbsp;:&nbsp;</div>
                        <div class="in_addr"><input type="text" name="address" placeholder="도로명주소" class="postcodify_address" value=""></div>
                    </div>
                    <div class="tr_addr">
                        <div class="title"></div>
                        <div class="in_addr"><input type="text" name="sub_address" placeholder="상세주소" class="postcodify_details" value=""></div>
                    </div>
                    <div class="signup_btn">
                        <button id="btn_chksign" type="button" onclick="check_input()">회원가입</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php require("/xampp/htdocs/withChicken/index/footer.php"); ?>
</body>
</html>