$(document).ready(function() {
    $("input[name=select]").click(function() {
        if($("#cards").is(":checked")) {
            document.getElementById('card').style.display = 'block';
            document.getElementById('deposit').style.display = 'none';
            document.getElementById('simple').style.display = 'none';
        }
        else if ($("#deposits").is(":checked")) {
            document.getElementById('card').style.display = 'none';
            document.getElementById('deposit').style.display = 'block';
            document.getElementById('simple').style.display = 'none';
        } else if ($("#simples").is(":checked")) {
            document.getElementById('card').style.display = 'none';
            document.getElementById('deposit').style.display = 'none';
            document.getElementById('simple').style.display = 'block';
        }
    });
});

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

function method_click(name,i) {
    document.getElementById('method_choice'+i).value = name;
    method_close(i);
}

function order() {
    if (!document.select_form.select.value) {
        alert("결제수단을 선택하세요!");    
        document.select_form.select.focus();
        return;
    } else {
        if (document.select_form.select.value == 1) {
            if (!document.select_form.card_sel.value) {
                alert("카드사를 선택하세요!");    
                document.select_form.card_sel.focus();
                return;
            }
            if (!document.select_form.card_ins.value) {
                alert("할부를 선택하세요!");    
                document.select_form.card_ins.focus();
                return;
            }
        } else if (document.select_form.select.value == 2) {
            if (!document.select_form.dep_sel.value) {
                alert("입금은행을 선택하세요!");    
                document.select_form.dep_sel.focus();
                return;
            }
            if (!document.select_form.dep_name.value) {
                alert("입금자명을 입력하세요!");    
                document.select_form.dep_name.focus();
                return;
            }
        } else if (document.select_form.select.value == 3) {
            if (!document.select_form.simple_sel.value) {
                alert("페이를 선택하세요!");    
                document.select_form.simple_sel.focus();
                return;
            }
        }
    }

    document.select_form.submit();
}