<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>한평정원:그린이집</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <script defer src="contact.js"></script>
    
</head>
<body>
    
<?php 
    include('includes/header.php'); //헤더 삽입
    include('includes/db-con.php'); //db연결 삽입
    ?>	
    <div class="contact-wrap">
        <div class="contact-in">
            <h1>Contact Info</h1>
            <h2><i class="fa fa-phone" aria-hidden="true"></i> Phone</h2>
            <p>010-7730-4966</p>
            <h2><i class="fa fa-envelope" aria-hidden="true"></i>Email</h2>
            <p>rlagudwjd1212@gmail.com</p>
            <h2><i class="fa fa-map-marker" aria-hidden="true"></i>주소</h2>
            <p>한국기술교육대학교 제1캠퍼스</p>
            <ul><!--인스타그램 이미지와 인스타그램 링크 연동-->
                <li><a href="https://www.instagram.com/greenyzip_1a/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              </ul>
        </div>
   
    
        
        <div class="contact-in"><!--구글 맵 API키를 이용해, 한국기술교육대학교 지도 출력-->
            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBfyUyzit2Sp5T_XXM9TS57M_e8Gshnzf4&q=36.763750,127.281611" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

    </div>
   
    <?php include('includes/footer.html');?>
     
</body>
</html>