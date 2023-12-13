<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 메타 데이터 -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 스타일시트 링크 -->
    <link rel="stylesheet" href="AllProducts.css">

    <!-- 페이지 타이틀 -->
    <title>한평정원:그린이집</title>
</head>
<body>
 <!-- 헤더와 데이터베이스 연결 포함 -->
<?php  include('includes/header.php'); ?> <!-- 헤더 포함 -->
<?php  include('includes/db-con.php'); ?> <!-- 데이터베이스 연결 포함 -->

<!-- 식물들 보기 섹션 -->
    <section id="second">
        <div class="container">
                <h2 class="title"; id="plants">식물들</h2> <!-- 식물 제품 타이틀 -->
                <div class="product-container">
        <?php 

        $sql = "SELECT * FROM Products where PCategory='Plants';"; //식물 카테고리 제품만 선택
        $result= mysqli_query($conn, $sql);
        $num=mysqli_num_rows($result);

        echo "<div style='display: grid; grid-template-columns: auto auto auto auto;'>"; //제품 카드를 위한 그리드

            for($i=1;$i<=$num;$i++){ // 식물 카드 생성
            $row = mysqli_fetch_assoc($result);
            $pid = $row['PID'];
            $imgUrl = "img/".$row['Pic1'];
            $pname = $row['PName'];
            $pstock= $row['PStock'];

        echo "
        <div style='margin-top: 20px' class='product-card'> <!-- 제품 카드 -->
                <div class='product-img'>
                    <a href='productDetails.php?pid=".$pid."'><img src=$imgUrl alt=$pname></a> <!-- 제품 이미지 -->
                </div>
                <h3 class='card-name'>$pname</h3> <!-- 제품 이름 -->
                <form action='AllProductPage.php?pid=".$pid."&pstock=".$pstock."' method='post' style='border:0px;'> <!-- 제품 페이지로 이동하는 폼 -->
                <input type='hidden' name='pname' value=$pname>
                <input type='hidden' name='pimg' value=$imgUrl>
                <input type='hidden' name='quantity' value=1>
                </form>
                <h4></h4></div>
                ";
        }
                    echo"</div>";
        ?>

        </div>

<!-- 활동들 보기 -->
        <br><br><br>
            <h2 class="title"; id="works">활동들</h2> <!-- 활동들 타이틀 -->
            <div class="product-container">
        
        <?php 

        $sql = "SELECT * FROM Products where PCategory='works';"; //활동 카테고리 제품만 선택 
        $result= mysqli_query($conn, $sql);
        $num=mysqli_num_rows($result);

        echo "<div style='display: grid; grid-template-columns: auto auto auto auto;'>"; // 활동 카드를 위한 그리드 

            for($i=1;$i<=$num;$i++){ //활동 카드 생성
            $row = mysqli_fetch_assoc($result);
            $pid = $row['PID'];
            $imgUrl = "img/".$row['Pic1'];
            $pname = $row['PName'];
            $pstock=$row['PStock'];

        echo "<div  style='margin-top: 20px' class='product-card'> <!-- 제품 카드 -->
                <div  class='product-img'>
                    <a href='productDetails.php?pid=".$pid."'><img src=$imgUrl alt=$pname></a> <!-- 제품 이미지 -->
                </div>
                <h3 class='card-name'>$pname</h3> <!-- 제품 이름 -->
                <form action='AllProductPage.php?pid=".$pid."&pstock=".$pstock."' method='post' style='border:0px;'> <!-- 제품 페이지로 이동하는 폼 -->
                <input type='hidden' name='pname' value=$pname>
                <input type='hidden' name='pimg' value=$imgUrl>
                <input type='hidden' name='quantity' value=1>
                </form>
                <h4></h4>
            </div>";
        }
            echo"</div>";
        ?>
            </div>     
    
    
    
    <br><br><br><br>
    <?php include('includes/footer.html'); ?> <!-- 푸터 포함 -->
</body>
</html>
