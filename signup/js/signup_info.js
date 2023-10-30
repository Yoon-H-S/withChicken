window.onload = function() {
    document.member_form.chknum.disabled = true;
    $(function() { $("#postcodify_search_button").postcodifyPopUp(); });
}

function check_id() {
    window.open("member_check_id.php?id=" + document.member_form.id.value,
        "IDcheck",
         "left=700,top=300,width=280,height=180");
}

var isid = false;
function id_ok() {
    isid = true;
    document.member_form.id.readOnly = true;
}

let num = Math.floor(Math.random()*(100000-10000)+10000);
function check_phone() {
    if(!document.member_form.phone.value){
        alert("전화번호를 입력하세요");
    } else {
        alert("인증번호는 "+ num +"입니다.");
        document.member_form.chknum.disabled = false;
    }
}

var isnum = false;
function check_num() {
    if (document.member_form.chknum.value == num) {
        alert("인증이 완료되었습니다.");
        isnum = true;
    } else if (!document.member_form.chknum.value){
        alert("인증번호를 입력해주세요");   
    } else {
        alert("인증번호가 다릅니다.");
    }

}

function check_input()
{
    if (!document.member_form.id.value) {
       alert("아이디를 입력하세요!");    
       document.member_form.id.focus();
       return;
   }

    if (!isid) {
        alert("아이디 중복확인을 하세요!");    
        document.member_form.id.focus();
        return;
    }

    if (!document.member_form.pw.value) {
       alert("비밀번호를 입력하세요!");    
       document.member_form.pw.focus();
       return;
   }

    if (!document.member_form.pwchk.value) {
       alert("비밀번호확인을 입력하세요!");    
       document.member_form.pwchk.focus();
       return;
   }

    if (document.member_form.pwchk.value) {
        if (document.member_form.pw.value != document.member_form.pwchk.value) {
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
            document.member_form.pwchk.focus();
            document.member_form.pwchk.select();
            return;
        }
   }

    if (!document.member_form.name.value) {
       alert("이름을 입력하세요!");    
       document.member_form.name.focus();
       return;
   }

    if (!document.member_form.phone.value) {
        alert("전화번호를 입력하세요!");    
        document.member_form.phone.focus();
        return;
    }

    if (!isnum) {
        alert("인증번호를 확인하세요!");    
        document.member_form.numchk.focus();
        return;
    }

    if (!document.member_form.email.value) {
       alert("이메일 주소를 입력하세요!");    
       document.member_form.email.focus();
       return;
   }

    if (!document.member_form.email2.value) {
       alert("이메일 주소를 입력하세요!");    
       document.member_form.email2.focus();
       return;
   }

   document.member_form.submit();
}