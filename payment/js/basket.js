let delPrice = [];
let price = [];
let pCount = [];

$(document).ready(function() {
    $("input[name=chk]").prop("checked", false);
    $("input[name=cbx_chkAll]").click(function() {
        if($("input[name=cbx_chkAll]").is(":checked")) {
            $("input[name=chk]").prop("checked", true);
        }
        else {
            $("input[name=chk]").prop("checked", false);
        }
    });
    
    $("input[name=chk]").click(function() {
        var total = $("input[name=chk]").length;
        var checked = $("input[name=chk]:checked").length;
        
        if(total != checked) {
            $("input[name=cbx_chkAll]").prop("checked", false);
        }
        else {
            $("input[name=cbx_chkAll]").prop("checked", true); 
        }
    });
});

function choice_delete() {
    var check;
    var checkCnt = 0;
    var get = '?';
    var total = $("input[name=chk]").length;

    if($("input[name=chk]:checked").length == 0) {
        return;
    }

    for(var i = 0; i < total; i++) {
        if ($("input[id=check"+i+"]").is(":checked")){
            check = document.getElementById('check'+i).value;
            checkCnt++;
            get += 'bID' + checkCnt + '=' + check + '&';
        }
    }
    get += 'checkCnt=' + checkCnt;
    location.href = 'basket_delete.php' + get;
}

function ready(cnt, pr, pCnt, delPr) {
    price[cnt] = pr;
    pCount[cnt] = pCnt;
    delPrice[cnt] = delPr;
}

function count(type, cnt, bID) {
    if(type == 'plus'){
        pCount[cnt]++;
    }else if(type == 'minus'){
        pCount[cnt] = Math.max(pCount[cnt] - 1,1);
    }

    location.href = 'basket_update.php?bID='+bID+'&pCount='+pCount[cnt];
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
        total_price = prodPrice;
    } else {
        del_price = 0;
        for(var j = 0; j < delPrice.length; j++) {
            if(del_price[j] != 0) {
                del_price = 3000;
                break;
            }
        }
        total_price = prodPrice + del_price;
    }

    proddata = prodPrice.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    deldata = del_price.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    totaldata = total_price.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById('prod_price').innerHTML = proddata;
    document.getElementById('del_price').innerHTML = deldata;
    document.getElementById('total_price').innerHTML = totaldata;
}