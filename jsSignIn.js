// 초기화
var current = null;
var form;
var aid;
var pass;
var helpText;

function init() {
  form = document.getElementById("form"); // form 요소 가져오기
  aid = document.getElementById("EID"); // ID 입력란 요소 가져오기
  pass = document.getElementById("password"); // 비밀번호 입력란 요소 가져오기
  helpText = document.getElementById("helpText"); // 도움말 요소 가져오기
  form.onsubmit = check; // 제출할 때 check 함수 호출
}

// 유효성 검사
function check() {
  var fields = "";

  // ID가 비어있는 경우
  if (aid.value == "") {
    fields = "<br><br><b>ID는 비워둘 수 없습니다.</b>";
  }

  // 비밀번호가 비어있는 경우
  if (pass.value == "") {
    fields = fields + "<br><b>비밀번호는 비워둘 수 없습니다.</b>";
  }

  // 필드가 비어있는 경우
  if (fields != "") {
    helpText.innerHTML = fields;
    return false; // 제출 취소
  } else {
    return true; // 제출
  }
}

window.addEventListener("load", init, false); // 페이지 로드 시 init 함수 호출

// ID 입력란에 focus가 갔을 때 애니메이션 실행
document.querySelector("#EID").addEventListener("focus", function (e) {
  if (current) current.pause(); // 현재 애니메이션이 실행 중인 경우 일시 중지
  current = anime({
    targets: "path",
    strokeDashoffset: {
      value: 0,
      duration: 700,
      easing: "easeOutQuart"
    },
    strokeDasharray: {
      value: "240 1386",
      duration: 700,
      easing: "easeOutQuart"
    }
  });
});

// 비밀번호 입력란에 focus가 갔을 때 애니메이션 실행
document.querySelector("#password").addEventListener("focus", function (e) {
  if (current) current.pause(); // 현재 애니메이션이 실행 중인 경우 일시 중지
  current = anime({
    targets: "path",
    strokeDashoffset: {
      value: -336,
      duration: 700,
      easing: "easeOutQuart"
    },
    strokeDasharray: {
      value: "240 1386",
      duration: 700,
      easing: "easeOutQuart"
    }
  });
});

// 제출 버튼에 focus가 갔을 때 애니메이션 실행
document.querySelector("#submit").addEventListener("focus", function (e) {
  if (current) current.pause(); // 현재 애니메이션이 실행 중인 경우 일시 중지
  current = anime({
    targets: "path",
    strokeDashoffset: {
      value: -730,
      duration: 700,
      easing: "easeOutQuart"
    },
    strokeDasharray: {
      value: "530 1386",
      duration: 700,
      easing: "easeOutQuart"
    }
  });
});
