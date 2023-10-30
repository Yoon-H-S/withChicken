let price;
let cnt = 1;
let page;
let height;

$(window).scroll(function () {
    height = $(document).scrollTop();
});

function ready(pr, ypos) {
    price = pr;
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

function count(type) {
    const resultElement = document.getElementById('count');

    let number = resultElement.value;

    if(type == 'plus'){
        number = parseInt(number) + 1;
    }else if(type == 'minus'){
        number = Math.max(parseInt(number) - 1,1);
    }
    cnt = number;

    resultElement.value = number;
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

function product_delete() {
    let popupX = (window.screen.width / 2) - 300;
    let popupY = (window.screen.height / 2) - 100;
    window.open("product_delete.php",
    "product_delete",
    "left=" + popupX + ",top= "+ popupY +",width=600,height=200,toolbar=no,menubar=no");
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

//문의
function inq_open(num) {
    document.getElementById('container_body'+num).style.display = 'block';
    document.getElementById('inq_show'+num).href = "javascript:inq_close("+num+");";
}

function inq_close(num) {
    document.getElementById('container_body'+num).style.display = 'none';
    document.getElementById('inq_show'+num).href = "javascript:inq_open("+num+");";
}

function answer_write(qid) {
    let popupX = (window.screen.width / 2) - 310;
    let popupY = (window.screen.height / 2) - 350;
    window.open("prod_inq_answer_write.php?qID=" + qid,
    "answer_write",
    "left=" + popupX + ",top="+ popupY +",width=620,height=700,toolbar=no,menubar=no");
}

function paging(p,i) {
    location.href = 'product_manage.php?page=' + page + '&' + p + 'list=' + i + '&scroll=' + Math.round(height);
}