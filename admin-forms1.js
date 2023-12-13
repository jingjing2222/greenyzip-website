var product_name;
var product_price;
var product_stock;
var product_desc;
var category;
var product_pic1;
var product_pic2;
var product_pic3;
var product_pic4;
var product_pic5;

var helpText1;
var helpText2;
var helpText3;
var helpText4;
var helpText5;
var helpText6;
var helpText7;
var helpText8;
var helpText9;
var helpText10;

function init() {
    var form = document.getElementById("form");
    product_name = document.getElementById("product_name");
    product_price = document.getElementById("product_price");
    product_stock = document.getElementById("product_stock");
    product_desc = document.getElementById("product_desc");
    product_humidity = document.getElementById("product_humidity");
    product_light = document.getElementById("product_light");
    product_watering = document.getElementById("product_watering");
    category = document.getElementById("category");
    product_pic1 = document.forms['form']['product_pic1'];
    product_pic2 = document.forms['form']['product_pic2'];
    product_pic3 = document.forms['form']['product_pic3'];
    product_pic4 = document.forms['form']['product_pic4'];
    product_pic5 = document.forms['form']['product_pic5'];

    helpText1 = document.getElementById("helpText1");
    helpText2 = document.getElementById("helpText2");
    helpText3 = document.getElementById("helpText3");
    helpText4 = document.getElementById("helpText4");
    helpText5 = document.getElementById("helpText5");
    helpText6 = document.getElementById("helpText6");
    helpText7 = document.getElementById("helpText7");
    helpText8 = document.getElementById("helpText8");
    helpText9 = document.getElementById("helpText9");
    helpText10 = document.getElementById("helpText10");
    helpText11 = document.getElementById("helpText11");
    helpText12 = document.getElementById("helpText12");
    helpText13 = document.getElementById("helpText13");

    form.onsubmit = check;
    form.onreset = func2;
} // end function init

function check() {
    var pass = "";

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

    if (product_stock.value == "") {
        pass = "*수량은 필수입니다. 기입해주세요.<br/>";
        helpText3.innerHTML = pass;
        return false;
    }

    if (product_price.value == "") {
        pass = "*가격은 필수입니다. 기입해주세요.<br/>";
        helpText4.innerHTML = pass;
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
    if (product_humidity.value == "") {
        pass = "*습도는 필수입니다. 기입해주세요.<br/>";
        helpText11.innerHTML = pass;
        return false;
    }
    if (product_light.value == "") {
        pass = "*햇빛량은 필수입니다. 기입해주세요.<br/>";
        helpText12.innerHTML = pass;
        return false;
    }
    if (product_watering.value == "") {
        pass = "*물 주는 양은 필수입니다. 기입해주세요.<br/>";
        helpText13.innerHTML = pass;
        return false;
    }
}

function func2() {
    return confirm("초기화 하시겠습니까?");
}

window.addEventListener("load", init, false);