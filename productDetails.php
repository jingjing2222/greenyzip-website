<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./product.css">
    <title>한평정원:그린이집</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <!--스타일시트 연결-->
</head>
<!--DB에서 데이터를 읽어오는 부분-->
<body>
    <?php 
    include('includes/header.php'); //헤더 포함
    include('includes/db-con.php'); //DB 연결 포함
    ?>	

    <?php 
            $pid = $_GET['pid'];
            $sql = "SELECT * FROM Products WHERE PID= $pid;";
            $result= mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $imgUrl = "img/".$row['Pic1'];
            $PDes = $row['P_Description'];
            $PName = $row['PName'];
            $PStock = $row['PStock'];
            $PCategory = $row['PCategory'];
            $Phumidity = $row['Phumidity'];
            $Plight = $row['Plight'];
            $Pwatering = $row['Pwatering'];
            //읽어온 데이터를 작은 게시판으로 출력하는 부분
    echo "
        <section class='product-section'>
        <div class='left'>
        <div class='big-img'>
            <img src=$imgUrl alt=$PName>
            </div>";

        $sql = "SELECT Pic2, Pic3, Pic4, Pic5 FROM products WHERE PID= $pid;";
        $result= mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        
        //이미지를 작게 표시함 누르면 위치가 바뀌며 커짐
        echo "<div class='images'>";
        for($i=0 ; $i<=3; $i++){
            echo"
                <div class='smll-img'>
                    <img src='img/".$row[$i]."' onclick='showImg(this.src)' >
                </div>";
        }
        //이름 및 설명 출력
        echo "        
        </div> 
        </div> 
        
            <div class='product-detail' style='width: 50vw;'>
                <h1 class='product-title'> $PName </h1>
                <p class='product-des'> $PDes</p>
                <div class='quantity' style='width: 12.5vw;'>
                 </div>

            </div>
        </section> ";
        ?>

        <!--특성부 출력 부분-->
    <?php if (strcmp($PCategory,"Plants")==0) { ?>
  <section class="details-des">
        <h1 class="titles"><i class="fa fa-heart" aria-hidden="true"></i> <?php echo $PName; ?> 특성!<br></h1><br><br>
        <table class="table-venues">
        
            <tr>
            <th class="section-title">좋아하는 습도</th>
            <th class="section-title">조명 정도</th>
            <th class="section-title">물주는 정도</th>
           </tr>
            <tr >
                <td class="des"><?php echo $Phumidity; ?></td>
                <td class="des"><?php echo $Plight; ?></td>
                <td class="des"><?php echo $Pwatering; ?></td>
            </tr>
        </table>
    </section>

    <?php } ?>
        <br><br><br><br>
     
   
        <!--다른 식물 및 활동 출력 부분 가장 최근 4개만 가져온다.-->

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
    <!--footer 포함-->
    <?php include('includes/footer.html'); ?>
    <script >
         let bigImg= document.querySelector('.big-img img');
         function showImg(pic){
            bigImg.src = pic;
        }
    </script>
    <script src="qty.js"></script>

</body>
</html>