var oID;

function ready(kind, oi) {
    oID = oi
    id = document.getElementById('kind');
    switch(kind) {
        case 1:
            id.innerHTML = '주문 취소';
            id.setAttribute("onclick","cancel()");
            break;
        case 2:
            id.style.display = 'none';
            break;
        case 3:
            id.innerHTML = '배송 조회';
            id.setAttribute("onclick","window.open('https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=1&ie=utf8&query=%EB%B0%B0%EC%86%A1%EC%A1%B0%ED%9A%8C');");
            break;
        case 4:
            id.innerHTML = '반품/교환 신청';
            id.setAttribute("onclick","ReEx()");
            break;
        case 5:
            id.innerHTML = '리뷰 작성';
            id.setAttribute("onclick","review_write()");
            break;
    }
}

function review_write() {
    let popupX = (window.screen.width / 2) - 310;
    let popupY = (window.screen.height / 2) - 325;
    window.open("review_write.php?oID="+oID,
    "review_write",
    "left=" + popupX + ",top="+ popupY +",width=620,height=650,toolbar=no,menubar=no");
}

function cancel() {
    let popupX = (window.screen.width / 2) - 300;
    let popupY = (window.screen.height / 2) - 100;
    window.open("order_cancel.php?oID="+oID,
    "order_cancel",
    "left=" + popupX + ",top= "+ popupY +",width=600,height=200,toolbar=no,menubar=no");
}

function ReEx() {
    let popupX = (window.screen.width / 2) - 300;
    let popupY = (window.screen.height / 2) - 100;
    window.open("order_ReEx.php?oID="+oID,
    "order_ReEx",
    "left=" + popupX + ",top= "+ popupY +",width=600,height=200,toolbar=no,menubar=no");
}