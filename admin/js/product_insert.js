function addFiles(obj) {
    const maxFileCnt = 3;// 최대 파일 개수
    let curFileCnt = obj.files.length; // 추가할 파일 개수

    if (curFileCnt > maxFileCnt) {
        alert("최대 3개첨부 가능합니다.");
        document.getElementById('prod_img').value = "";
    } else {
        document.getElementById('files_list').innerHTML = "";
        for (const file of obj.files) {
            // 목록 추가
            let htmlData = '';
            htmlData += '<div class="filebox">';
            htmlData += '   <p class="name">' + file.name + '</p>';
            htmlData += '</div>';
            document.getElementById('files_list').innerHTML += htmlData;
        }
    }
}

function addFile(obj) {
    document.getElementById('file_list').innerHTML = "";
    for (const file of obj.files) {
        // 목록 추가
        let htmlData = '';
        htmlData += '<div class="filebox">';
        htmlData += '   <p class="name">' + file.name + '</p>';
        htmlData += '</div>';
        document.getElementById('file_list').innerHTML += htmlData;
    }
}

function check_input()
{
    if (!document.product_form.pName.value) {
       alert("상품명을 입력하세요!");
       document.product_form.pName.focus();
       return;
    }

    if (!document.product_form.pKind.value) {
       alert("상품카테고리를 입력하세요!");
       document.product_form.pKind.focus();
       return;
    }

    if (!document.product_form.pPrice.value) {
        alert("상품가격을 입력하세요!");
        document.product_form.pPrice.focus();
        return;
    }

    if (!document.product_form.pContent.value) {
        alert("상품정보를 첨부하세요!");
        document.product_form.pContent.focus();
        return;
    }

    if (!document.getElementById('prod_img').value) {
        alert("상품이미지를 최소 1개 첨부하세요!");
        document.getElementById('prod_img').focus();
        return;
    }

    if (!document.product_form.pOption.value) {
        alert("기본옵션을 입력하세요!");
        document.product_form.pOption.focus();
        return;
    }

    document.product_form.submit();
}