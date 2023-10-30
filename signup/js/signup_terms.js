$(document).ready(function() {
    $("input[name=cbx_chkAll]").click(function() {
        if($("input[name=cbx_chkAll]").is(":checked")) {
            $("input[name=chk]").prop("checked", true);
            $("#btn_chkAll").prop("disabled", false);
        }
        else {
            $("input[name=chk]").prop("checked", false);
            $("#btn_chkAll").prop("disabled", true);
        }
    });
    
    $("input[name=chk]").click(function() {
        var total = $("input[name=chk]").length;
        var checked = $("input[name=chk]:checked").length;
        
        if(total != checked) {
            $("input[name=cbx_chkAll]").prop("checked", false);
            $("#btn_chkAll").prop("disabled", true);
        }
        else {
            $("input[name=cbx_chkAll]").prop("checked", true); 
            $("#btn_chkAll").prop("disabled", false);
        }
    });
});