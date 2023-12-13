<?php 
if(isset($_POST['submit'])){ //submit 버튼이 눌린 경우

  include("includes/db-con.php");

  //유저 이름과, 패스이름 변수를 설정
  $username = $_POST['EID'];
  $password = $_POST['password'];

    //DB에서 admin의 정보를 가져옴
    $sql = "SELECT * FROM admin WHERE AdID= '". $username."';";
      $result = mysqli_query($conn, $sql);
      //admin 정보와 비교해봄
      if($row = mysqli_fetch_assoc($result)){
        if($password == $row['AdPassword']){
                
          header("Location: admin-home.php");
          exit();
        }
        //password 에러 출력
        else{
          header("Location: SignIn.php?problem=errorlogin");
          exit();
        }
      }
      //ID 에러 출력
      else{
        header("Location: SignIn.php?problem=nouser");
        exit();
      }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="SignInStyle.css">
  <!-- 자바스크립트와 연결 -->
  <script src="jsSignIn.js"></script>
  <title>Sign In</title>
</head>
<body>
  <img src="img/logo.png" alt="Logo">
    <div class="page">
      <div class="container">
        <div class="left">
          <div class="icon"><img src="img/icons8-user-64.png">
          <div class="login">Login</div></div>
          <!--아래 링크를 누르면 index.php로 돌아감-->
          <div class="eula">로그인은 관리자만 가능합니다. 만약 관리자가 아니라면 아래를 클릭해주세요. <a href="index.php">게스트로 계속</a></div>
        </div>
        <div class="right">
          <!--자바스크립트를 위한 부분-->
          <svg viewBox="0 0 320 300">
            <defs>
              <linearGradient
                inkscape:collect="always"
                id="linearGradient"
                x1="13"
                y1="193.49992"
                x2="307"
                y2="193.49992"
                gradientUnits="userSpaceOnUse">
                <stop
                  style="stop-color:#587c6e;"
                  offset="0"
                  id="stop876" />
                <stop
                  style="stop-color:#7cb99a;"
                  offset="1"
                  id="stop878" />
              </linearGradient>
            </defs>
            <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
          </svg>
          <!--회원가입 폼-->
          <div class="form">
            <form action="SignIn.php" method= "post" id="form">
            <label>Admin ID</label>
            <input type="text" id="EID" name="EID" >
            <label>Password</label>
            <input type="password" id="password" name="password" >
            <input type="submit" id="submit" name="submit" value="로그인">
          </form>
          <?php 
          //각각 상태에 따른 에러 메시지 출력
            if(isset($_GET['problem'])){
            
            if($_GET['problem'] == "errorlogin"){
                echo '<p><br><b>올바르지 않은 ID나 password입니다. 다시 시도해주세요. </b></p>';
            }
            if($_GET['problem'] == "nouser"){
              echo '<p><br><b>아이디가 존재하지 않습니다.</b></p>';
          }
            }        
          ?>
          <!-- 자바스크립트 유효성 검사 오류에 대한 클래스 -->
          <div id="helpText"></div>
          </div>
        </div>
      </div>
    </div>
    <!--자바스크립트 페이지와 연결-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js'></script>
    <script src="jsSignIn.js"></script>
  </body>
</html>