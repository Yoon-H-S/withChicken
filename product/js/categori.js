const ca = {
    01: {
        00: '전체',
        01: '소스닭가슴살',
        02: '수비드닭가슴살',
        03: '스팀닭가슴살',
        04: '슬라이스닭가슴살',
        05: '큐브닭가슴살',
        06: '생닭가슴살',
        07: '닭가슴살스테이크',
        08: '닭안심살',
    },
    02: {
        00: '전체',
        01: '핫도그',
        02: '만두',
        03: '소시지',
        04: '브리또',
        05: '너겟',
    },
    03: {
        00: '전체',
        01: '다이어트도시락',
        02: '닭가슴살볶음밥',
        03: '곤약볶음밥',
    },
    04: {
        00: '전체',
        01: '닭가슴살샐러드',
        02: '야채샐러드',
        03: '과일샐러드',
        04: '샐러드소스',
    },
    05: {
        00: '전체',
        01: '비건도시락',
        02: '콩고기',
        03: '냉동식품',
        04: '상온식품',
    },
    06: {
        00: '전체',
        01: '프로틴쉐이크',
        02: '프로틴음료',
        03: '보충제',
        04: '프로틴바',
    },
    07: {
        00: '전체',
        01: '종합비타민',
        02: '다이어트보조제',
        03: '홍삼/인삼',
        04: '건강즙',
    },
}

function ready(s1, s2, s3, sort) {
    for(var i=0; i<=s2; i++) {
        document.getElementById("sub_cate_value"+i).innerHTML = ca[s1][0+i];
    }
    document.getElementById("sub_cate_value"+s3).style.color = '#333333';
    document.getElementById("sub_cate_value"+s3).style.fontWeight = 'bold';

    document.getElementById("sort"+sort).style.color = '#333333';
    document.getElementById("sort"+sort).style.fontWeight = 'bold';
}