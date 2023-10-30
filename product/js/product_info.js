let price, kind1, kind2, opName;
let cnt = 1;
let page;
let height;

window.onkeydown = function() {
    var kcode = event.keyCode;
    if(kcode == 116) {
        window.location = window.location.href.split("?")[0];
    }
}

$(window).scroll(function () {
    height = $(document).scrollTop();
});

const pKind = {
    01: {
        01: '닭가슴살>소스닭가슴살',
        02: '닭가슴살>수비드닭가슴살',
        03: '닭가슴살>스팀닭가슴살',
        04: '닭가슴살>슬라이스닭가슴살',
        05: '닭가슴살>큐브닭가슴살',
        06: '닭가슴살>생닭가슴살',
        07: '닭가슴살>닭가슴살스테이크',
        08: '닭가슴살>닭안심살',
    },
    02: {
        01: '간편식>핫도그',
        02: '간편식>만두',
        03: '간편식>소시지',
        04: '간편식>브리또',
        05: '간편식>너겟',
    },
    03: {
        01: '도시락>다이어트도시락',
        02: '도시락>닭가슴살볶음밥',
        03: '도시락>곤약볶음밥',
    },
    04: {
        01: '샐러드>닭가슴살샐러드',
        02: '샐러드>야채샐러드',
        03: '샐러드>과일샐러드',
        04: '샐러드>샐러드소스',
    },
    05: {
        01: '비건>비건도시락',
        02: '비건>콩고기',
        03: '비건>냉동식품',
        04: '비건>상온식품',
    },
    06: {
        01: '프로틴>프로틴쉐이크',
        02: '프로틴>프로틴음료',
        03: '프로틴>보충제',
        04: '프로틴>프로틴바',
    },
    07: {
        01: '건강식품>종합비타민',
        02: '건강식품>다이어트보조제',
        03: '건강식품>홍삼/인삼',
        04: '건강식품>건강즙',
    },
}

function ready(pr, k1, k2, name, ypos) {
    price = pr;
    opName = name;
    kindselect(k1, k2);
    totalPrice();
    imgchange();
    window.scrollTo(0, ypos);
}

function imgchange() {
    let bigimg = document.querySelector(".bigimg");
    let subimg = document.querySelectorAll(".subimg");

    for(var i = 0; i < subimg.length; i++){
        subimg[i].addEventListener("click", changeimg);
    }

    function changeimg() {
        var subimgAttribute = this.getAttribute("src");
        bigimg.setAttribute("src", subimgAttribute);
    }
}

function kindselect(k1, k2) {
    const kind = pKind[k1][k2];
    document.getElementById('kind').innerHTML = kind;
}

function count(type) {
    if(type == 'plus'){
        cnt++;
    }else if(type == 'minus'){
        cnt = Math.max(cnt - 1,1);
    }

    document.getElementById('count').value = cnt;
    totalPrice();
}

function op_open() {
    document.getElementById('option_list').style.display = 'block';
    document.getElementById('op_sel').style.border = '1px solid #888888';
    document.getElementById('op_select').href = "javascript:op_close();";
    document.getElementById('option_img').src = "./image/option_bye.jpg";
}

function op_close() {
    document.getElementById('option_list').style.display = 'none';
    document.getElementById('op_sel').style.border = '1px solid #d5d5d5';
    document.getElementById('op_select').href = "javascript:op_open();";
    document.getElementById('option_img').src = "./image/option_hi.jpg";
}

function op_click(name, pr) {
    opName = name;
    document.getElementById('op_pak').innerHTML = name;
    price = pr;
    totalPrice();
    op_close();
}

function totalPrice() {
    let totalPrice = price * cnt;
    htmlData = totalPrice.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById('high').innerHTML = htmlData;
}

function take_basket() {
    let popupX = (window.screen.width / 2) - 250;
    let popupY = (window.screen.height / 2) - 100;
    window.open("take_basket.php?pOptionName="+opName+"&pOptionPrice="+price+"&pCount="+cnt,
    "take_basket",
    "left=" + popupX + ",top= "+ popupY +",width=500,height=200,toolbar=no,menubar=no");
}

function take_payment() {
    location.href = "/withChicken/payment/take_payment.php?pOptionName="+opName+"&pOptionPrice="+price+"&pCount="+cnt;
}

// 상품헤더 아래
function content_open() {
    enable(document.getElementById('prod_01'));
    disable(document.getElementById('prod_02'));
    disable(document.getElementById('prod_03'));
    disable(document.getElementById('prod_04'));

    document.getElementById('prod_info_img').style.display = 'block';
    document.getElementById('prod_inq').style.display = 'none';
    document.getElementById('prod_review').style.display = 'none';
    document.getElementById('pur_info').style.display = 'none';
    page = 1;
}

function review_open() {
    enable(document.getElementById('prod_02'));
    disable(document.getElementById('prod_01'));
    disable(document.getElementById('prod_03'));
    disable(document.getElementById('prod_04'));

    document.getElementById('prod_review').style.display = 'block';
    document.getElementById('prod_info_img').style.display = 'none';
    document.getElementById('prod_inq').style.display = 'none';
    document.getElementById('pur_info').style.display = 'none';
    page = 2;
}

function inquiry_open() {
    enable(document.getElementById('prod_03'));
    disable(document.getElementById('prod_01'));
    disable(document.getElementById('prod_02'));
    disable(document.getElementById('prod_04'));

    document.getElementById('prod_inq').style.display = 'block';
    document.getElementById('prod_info_img').style.display = 'none';
    document.getElementById('prod_review').style.display = 'none';
    document.getElementById('pur_info').style.display = 'none';
    page = 3;
}

function purchase_open() {
    enable(document.getElementById('prod_04'));
    disable(document.getElementById('prod_01'));
    disable(document.getElementById('prod_02'));
    disable(document.getElementById('prod_03'));

    document.getElementById('pur_info').style.display = 'block';
    document.getElementById('prod_info_img').style.display = 'none';
    document.getElementById('prod_review').style.display = 'none';
    document.getElementById('prod_inq').style.display = 'none';
    page = 4;
}

function enable(id) {
    id.style.backgroundColor = 'white';
    id.style.color = '#444444';
    id.style.fontWeight = 'bold';
}

function disable(id) {
    id.style.backgroundColor = '#fafafa';
    id.style.color = '#888888';
    id.style.fontWeight = 'normal';
}

// 리뷰
function review_tab(id) {
    if (id == 'best_review') noId = 'all_review';
    else if (id == 'all_review') noId = 'best_review';
    document.getElementById(id).style.fontWeight = 'bold';
    document.getElementById(id).style.fontSize = '24px';
    document.getElementById(id).style.color = '#333333';
    document.getElementById(id + '_body').style.display = 'block';

    document.getElementById(noId).style.fontWeight = 'normal';
    document.getElementById(noId).style.fontSize = '16px';
    document.getElementById(noId).style.color = '#d5d5d5';
    document.getElementById(noId + '_body').style.display = 'none';
}

function like_review(rID,cnt) {
    let popupX = (window.screen.width / 2) - 250;
    let popupY = (window.screen.height / 2) - 100;
    window.open("review_like.php?rID="+rID+"&cnt="+cnt,
    "review_like",
    "left=" + popupX + ",top="+ popupY +",width=500,height=200,toolbar=no,menubar=no");
}

// 문의
function inq_open(num) {
    document.getElementById('container_body'+num).style.display = 'block';
    document.getElementById('inq_show'+num).href = "javascript:inq_close("+num+");";
}

function inq_close(num) {
    document.getElementById('container_body'+num).style.display = 'none';
    document.getElementById('inq_show'+num).href = "javascript:inq_open("+num+");";
}

function inq_write() {
    let popupX = (window.screen.width / 2) - 310;
    let popupY = (window.screen.height / 2) - 275;
    window.open("inquiry_write.php",
    "inquiry_write",
    "left=" + popupX + ",top="+ popupY +",width=620,height=550,toolbar=no,menubar=no");
}

function paging(p,i) {
    location.href = 'product_info.php?page=' + page + '&' + p + 'list=' + i + '&scroll=' + Math.round(height);
}


