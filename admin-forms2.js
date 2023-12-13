// 각 입력 필드와 도움말 텍스트를 위한 변수 선언
var product_name;
var product_desc;
var category;
var product_pic1;
var product_pic2;
var product_pic3;
var product_pic4;
var product_pic5;
var helpText1;
var helpText2;
var helpText5;
var helpText6;
var helpText7;
var helpText8;
var helpText9;
var helpText10;

// 페이지 로드 시 실행되는 초기화 함수
function init() {
    // 폼 요소를 가져오고, 각 입력 필드를 해당 변수에 연결합니다.
    var form = document.getElementById("form");
    product_name = document.getElementById("product_name");
    product_desc = document.getElementById("product_desc");
    category = document.getElementById("category");
    product_pic1 = document.forms['form']['product_pic1'];
    product_pic2 = document.forms['form']['product_pic2'];
    product_pic3 = document.forms['form']['product_pic3'];
    product_pic4 = document.forms['form']['product_pic4'];
    product_pic5 = document.forms['form']['product_pic5'];

    // 각 도움말 텍스트를 해당 변수에 연결합니다.
    helpText1 = document.getElementById("helpText1");
    helpText2 = document.getElementById("helpText2");
    helpText5 = document.getElementById("helpText5");
    helpText6 = document.getElementById("helpText6");
    helpText7 = document.getElementById("helpText7");
    helpText8 = document.getElementById("helpText8");
    helpText9 = document.getElementById("helpText9");
    helpText10 = document.getElementById("helpText10");

    // 폼 제출 이벤트에 check 함수를 연결하고, 폼 리셋 이벤트에 func2 함수를 연결합니다.
    form.onsubmit = check;
    form.onreset = func2;
}

// 제출 전 유효성 검사를 하는 함수
function check() {
    var pass = ""; // 오류 메시지를 담을 변수

    // 각 입력 필드가 비어있는지 확인하고, 비어있다면 도움말 텍스트에 오류 메시지를 표시합니다.
    // 각 입력 필드의 유효성 검사 후에, 유효하지 않다면 false를 반환하여 폼 제출을 중지합니다.
    if (product_name.value == "") {
        pass = "*식물 이름은 필수입니다. 기입해주세요.<br/>";
        helpText1.innerHTML = pass;
        return false;
    }
    if (category.value == "") {
        pass = "*카테고리는 필수입니다. <br/>";
        helpText2.innerHTML = pass;
        return false;
    }

    if (product_pic1.value == "") {
        pass = "*이미지1은 필수입니다. 기입해주세요.<br/>";
        helpText5.innerHTML = pass;
        return false;
    }

    if (product_pic2.value == "") {
        pass = "*이미지2는 필수입니다. 기입해주세요.<br/>";
        helpText6.innerHTML = pass;
        return false;
    }

    if (product_pic3.value == "") {
        product_pic3.value = "image/noimage.png";
    }

    if (product_pic4.value == "") {
        product_pic4.value = "image/noimage.png";
    }

    if (product_pic5.value == "") {
        product_pic5.value = "image/noimage.png";
    }

    if (product_desc.value == "") {
        pass = "*설명은 필수입니다. 기입해주세요.<br/>";
        helpText10.innerHTML = pass;
        return false;
    }

    
}

// 폼을 초기화하기 전에 사용자에게 확인을 요청하는 함수
function func2() {
    return confirm("초기화 하시겠습니까?");
}

// 페이지 로드 시 init 함수를 호출합니다.
window.addEventListener("load", init, false);
