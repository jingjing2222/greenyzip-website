<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- UTF-8로 인코딩합니다. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- IE 브라우저의 호환성을 지정합니다. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- 반응형 웹디자인을 위한 뷰포트 설정입니다. -->
    <link rel="stylesheet" href="./style.css"> <!-- CSS 스타일시트를 연결합니다. -->
    <title>한평정원:그린이집</title> <!-- 웹페이지 제목을 설정합니다. -->
</head>
<body>
    <?php include('includes/header.php'); ?> <!-- 헤더 파일을 포함시킵니다. -->
    <?php include('includes/db-con.php'); ?> <!-- 데이터베이스 연결 파일을 포함시킵니다. -->
    <section id="slogan"> 
        <div class="container">
            <div class="slogan-content" style="font-family: Fantasy;">
                <h4>관생의 심신 안정을 돕는 한평정원:그린이집</h4> <!-- 슬로건 문장을 출력합니다. -->
                <h1>그동안의 발자취, 여기서 확인하세요</h1> <!-- 주제 문장을 출력합니다. -->
                <a href="AllProductPage.php" class="slogan-button" type="button">구경하기</a> <!-- '구경하기' 버튼을 클릭하면 'AllProductPage.php' 페이지로 이동합니다. -->
            </div>
        </div>
    </section>
<section id="first">
    <div class="container">
        <div class="left">
            <h1>한평정원: <span>그린이집</span></h1> <!-- 서비스 이름을 출력합니다. -->
            <p>저희 한평정원:그린이집은 대학혁신사업단체에서 지원하는 비영리 활동 단체입니다. <br> <br> <span>저희 한평정원:그린이집은 생활관내 유휴 공간을 활용해 환경친화적인 공간을
                    조성해 관생들에게 힐링 공간을 만들어드리는 것 뿐만이 아닌,
                    여러가지 사업도 함께 진행하고 있습니다.</span></p> <!-- 한평정원:그린이집에 대한 설명을 출력합니다. -->
            <br><br><br>
            <a href="contact.php" class="button" type="button">더 알아보기</a> <!-- '더 알아보기' 버튼을 클릭하면 'contact.php' 페이지로 이동합니다. -->
        </div>
        <div class="right">
            <img src="img/1a.png" alt="1a"> <!-- 한평정원:그린이집 이미지를 출력합니다. -->
        </div>
    </div>
</section>

<section id="second">
        <div class="container">
    <h2 class="title">다른 식물 및 활동</h2>
    <div class="product-container">
    <?php 
        $sql = "SELECT * FROM Products ORDER BY PID DESC LIMIT 4;";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $pid = $row['PID'];
            $imgUrl = "img/".$row['Pic1'];
            $pname = $row['PName'];
            $pstock = $row['PStock'];

            echo "<div class='product-card'>
                <div class='product-img'>
                    <a href='productDetails.php?pid=".$pid."'><img src='$imgUrl' alt='$pname'></a>
                </div>
                <h3 class='card-name'>$pname</h3> 
                <input type='hidden' name='pname' value='$pname'>
                <input type='hidden' name='pimg' value='$imgUrl'>
                <input type='hidden' name='quantity' value='1'>
            </div>";
        }
    ?>
    </div>
</div>
</section>

<br><br><br><br>
<?php include('includes/footer.html'); ?> <!-- 푸터 파일을 포함시킵니다. -->
</body>
</html>