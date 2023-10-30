var mName, phone, zip_code, addr1, addr2, point;
var cName = 0, cID = 0, usePoint = 0;
let delPrice = [];
let price = [];
let pCount = [];

function ready(n, p, z, a1, a2, po) {
    mName = n;
    phone = p;
    zip_code = z;
    addr1 = a1;
    addr2 = a2;
    point = po
}

function prod_ready(cnt, pr, pCnt, delPr) {
    price[cnt] = pr;
    pCount[cnt] = pCnt;
    delPrice[cnt] = delPr;
}

function mem_in() {
    document.getElementById('name').value = mName;
    document.getElementById('phone').value = phone;
    document.getElementById('zip_code').value = zip_code;
    document.getElementById('address').value = addr1;
    document.getElementById('sub_address').value = addr2;
}

function mem_out() {
    document.getElementById('name').value = '';
    document.getElementById('phone').value = '';
    document.getElementById('zip_code').value = '';
    document.getElementById('address').value = '';
    document.getElementById('sub_address').value = '';
}

function cou_open() {
    document.getElementById('coupon_list').style.display = 'block';
    document.getElementById('cou_in').style.border = '1px solid #888888';
    document.getElementById('cou_select').href = "javascript:cou_close();";
    document.getElementById('list_img').src = "./image/list_bye.jpg";
}

function cou_close() {
    document.getElementById('coupon_list').style.display = 'none';
    document.getElementById('cou_in').style.border = '1px solid #d5d5d5';
    document.getElementById('cou_select').href = "javascript:cou_open();";
    document.getElementById('list_img').src = "./image/list_hi.jpg";
}

function cou_click(cN,cI) {
    if(cN == 0) {
        document.getElementById('cou_choice').innerHTML = '사용안함';
    } else {
        document.getElementById('cou_choice').innerHTML = cN + '원';
    }
    cName = cN;
    cID = cI;
    cou_close();
    totalPrice();
}

function usepo() {
    if(Number(document.getElementById('poName').value) > Number(point)) {
        alert('보유 포인트보다 많이 사용할 수 없습니다.');
        document.getElementById('poName').value = 0;
        return;
    }

    if(Number(document.getElementById('poName').value) > Number(pointPr)) {
        alert('총가격의 10%만 사용할 수 있습니다.\n사용가능 포인트 : ' + pointPr);
        document.getElementById('poName').value = 0;
        return;
    }
    usePoint = document.getElementById('poName').value;
    totalPrice();
}

function allpo() {
    if (Number(point) > Number(pointPr)) {
        usePoint = pointPr;
    } else if (Number(point) <= Number(pointPr)) {
        usePoint = point;
    }
    document.getElementById('poName').value = usePoint;
    totalPrice();
}
let pocnt = 0;
let pointPr
function point_price() {
    if(pocnt == 0) {
        pointPr = total_price*0.1;
        pocnt++;
    }
}

let prodPrice;
let del_price;
let total_price;
function totalPrice() {
    prodPrice = 0;
    del_price = 0;
    total_price = 0;
    for(var i= 0; i < price.length; i++) {
        prodPrice += price[i] * pCount[i];
    }
    if(prodPrice >= 30000) {
        del_price = 0;
    } else {
        del_price = 0;
        for(var j = 0; j < delPrice.length; j++) {
            if(del_price[j] != 0) {
                del_price = 3000;
                break;
            }
        }
    }
    total_price = prodPrice + del_price - cName - usePoint;
    point_price();

    totaldata = total_price.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById('total_price').innerHTML = totaldata;
}

function check_input()
{
    if (!document.delivery_form.name.value) {
       alert("수령자명을 입력하세요!");    
       document.delivery_form.name.focus();
       return;
    }

    if (!document.delivery_form.phone.value) {
        alert("전화번호를 입력하세요!");    
        document.delivery_form.phone.focus();
        return;
    }

    if (!document.delivery_form.zip_code.value) {
        alert("우편번호를 입력하세요!");    
        document.delivery_form.zip_code.focus();
        return;
    }

    if (!document.delivery_form.address.value) {
        alert("주소를 입력하세요!");    
        document.delivery_form.address.focus();
        return;
    }

    document.delivery_form.prod_price.value = prodPrice;
    document.delivery_form.del_price.value = del_price;
    document.delivery_form.cName.value = cName;
    document.delivery_form.total_price.value = total_price;
    document.delivery_form.cID.value = cID;
    document.delivery_form.poName.value = usePoint;
    document.delivery_form.poID.value = point;

    document.delivery_form.submit();
}