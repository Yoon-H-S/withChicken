window.onload = function() {
    document.member_update.chknum.disabled = true;
    $(function() { $("#postcodify_search_button").postcodifyPopUp(); });
}

let num = Math.floor(Math.random()*(100000-10000)+10000);
function check_phone() {
    if(document.member_update.phone.value == document.member_update.phone.className){
        alert("인증된 전화번호입니다.")
        return;
    }

    if(!document.member_update.phone.value){
        alert("전화번호를 입력하세요!");
    } else {
        alert("인증번호는 "+ num +"입니다.");
        document.member_update.chknum.disabled = false;
    }
}

var isnum = false;
function check_num() {
    if (document.member_update.chknum.value == num){
        alert("인증이 완료되었습니다.");
        isnum = true;
    } else if (!document.member_update.chknum.value){
        alert("인증번호를 입력해주세요!");   
    } else {
        alert("인증번호가 다릅니다!");
    }

}

function check_input()
{
    if (document.member_update.pw.value) {
        if (!document.member_update.pwchk.value) {
            alert("비밀번호확인을 입력하세요!");    
            document.member_update.pwchk.focus();
            return;
        }

        if (document.member_update.pw.value != document.member_update.pwchk.value) {
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
            document.member_update.pwchk.focus();
            document.member_update.pwchk.select();
            return;
        }
   }

   if (document.member_update.pwchk.value) {
        if (document.member_update.pw.value != document.member_update.pwchk.value) {
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
            document.member_update.pwchk.focus();
            document.member_update.pwchk.select();
            return;
        }
    }

    if (document.member_update.phone.value != document.member_update.phone.className) {
        if (!isnum) {
            alert("전화번호를 변경하려면 인증번호를 확인하세요!");    
            document.member_update.numchk.focus();
            return;
        }
    }

    if (!document.member_update.email.value) {
       alert("이메일 주소를 입력하세요!");    
       document.member_update.email.focus();
       return;
   }

   document.member_update.submit();
}