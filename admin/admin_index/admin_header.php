<header>
        <div class="header_inner">
            <div class="util">
                <?php if (!empty($_SESSION["admin_id"])) { //로그인 된 상태이면 ?>
                <a href="/withChicken/admin/admin_logout.php" class="util_text">로그아웃</a>
                <?php } else { // 로그인 안된 상태이면 ?>
                <a href="/withChicken/admin/admin_login.php" class="util_text">로그인</a>
                <?php } ?>
                <a href="" class="util_text">공지사항</a>
                <a href="" class="util_text">이벤트</a>
                <a href="" class="util_text">고객센터</a>
            </div>
            <div class="logo"><a href="/withChicken/admin/admin_page.php"><img src="/withChicken/index/image/logo.jpg"/></a></div>
            <form action="/withChicken/admin/product_search.php">
                <fieldset class="field_se">
                    <legend class="legend_hidden">검색</legend>
                    <div class="search">
                        <input type="text" name="search" maxlength="225" tabindex="1" placeholder="상품명 입력시 관리 페이지 이동" />
                        <button type="submit" tabindex="2"><img src="/withChicken/index/image/search.jpg"></button>
                    </div>
                </fieldset>
            </form>
            <div class="gnb_wrap">
                <div class="categori">
                    <a class="cate_btn">카테고리</a>
                    <nav class="all_categori">
                        <ul class="cate_dep">
                            <li><a href="">닭가슴살</a></li>
                            <li><a href="">간편식</a></li>
                            <li><a href="">도시락</a></li>
                            <li><a href="">샐러드</a></li>
                            <li><a href="">비건</a></li>
                            <li><a href="">프로틴</a></li>
                            <li><a href="">건강식품</a></li>
                        </ul>
                    </nav>
                </div>
                <nav class="gnb">
                    <ul>
                        <li><a href="">인기상품</a></li>
                        <li><a href="">할인상품</a></li>
                        <li><a href="">나의식단</a></li>
                        <li><a href="">1팩담기</a></li>
                        <li><a href="">이벤트</a></li>
                        <li><a href="">게시판</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>