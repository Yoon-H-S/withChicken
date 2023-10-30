function press() {
    if (event.keyCode == 13) {
        check_input();
    }
}

function check_input()
{
    if (!document.login_form.id.value) {
       alert("아이디를 입력하세요!");    
       document.login_form.id.focus();
       return;
   }

    if (!document.login_form.pw.value) {
       alert("비밀번호를 입력하세요!");    
       document.login_form.pw.focus();
       return;
   }

   document.login_form.submit();
}