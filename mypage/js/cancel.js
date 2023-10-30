var day, kind;

const dName = {
    3:'최근 3개월',
    6:'최근 6개월',
    9:'최근 9개월',
    12:'최근 1년',
}

const kName = {
    0:'전체',
    6:'취소완료',
    7:'반품대기',
    8:'반품완료',
    9:'교환대기',
    10:'교환완료',
}

function ready(d, k) {
    day = d;
    kind = k;
    document.getElementById('method_choice1').value = dName[d];
    document.getElementById('method_choice2').value = kName[k];
}

function method_open(i) {
    document.getElementById('method_list'+i).style.display = 'block';
    document.getElementById('method_in'+i).style.border = '1px solid #888888';
    document.getElementById('method_select'+i).href = "javascript:method_close("+i+");";
    document.getElementById('list_img'+i).src = "./image/list_bye.jpg";
}

function method_close(i) {
    document.getElementById('method_list'+i).style.display = 'none';
    document.getElementById('method_in'+i).style.border = '1px solid #d5d5d5';
    document.getElementById('method_select'+i).href = "javascript:method_open("+i+");";
    document.getElementById('list_img'+i).src = "./image/list_hi.jpg";
}

function method_click(name, i) {
    if(i == 1) {
        day = name;
    } else {
        kind = name;
    }
    location.href = "mypage_cancel.php?caDay="+day+"&caKind="+kind;
}