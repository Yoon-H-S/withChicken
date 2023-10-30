$(document).ready(function() {
    $("input[name=chk]").click(function() {
        var total = $("input[name=chk]").length;
        var checked = $("input[name=chk]:checked").length;
        
        if(total != checked) {
            $("#btn_chkAll").prop("disabled", true);
        }
        else {
            $("#btn_chkAll").prop("disabled", false);
        }
    });
});

function del() {
    let popupX = (window.screen.width / 2) - 300;
    let popupY = (window.screen.height / 2) - 100;
    window.open("member_delete_war.php",
    "product_delete_war",
    "left=" + popupX + ",top= "+ popupY +",width=600,height=200,toolbar=no,menubar=no");
}