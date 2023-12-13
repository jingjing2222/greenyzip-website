<!--HTML 및 PHP 부분-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식물 수정</title>
    <link rel="stylesheet" type="text/css" href="admin-forms1.css">
    <script type="text/javascript" src="admin-forms1.js"></script>
    <!--스타일시트에 대한 링크-->
</head>

<body>

    <header>

        <!--뒤로 가기 버튼-->
        <button class="back_button">
            <a href="admin.php"><img src="img/back.png" alt="Back Button" width="25px" height="25px"></a>
        </button>

        <!--폼 제목-->
        <h2>식물 수정</h2>
    </header>
    <!--헤더 종료-->

    <!--데이터베이스에서 데이터를 검색하는 PHP 코드-->
    <?php
    include('includes/db-con.php'); //데이터베이스 연결
    if (isset($_POST['edit_button'])) {
        $id = $_POST['edit_id'];
        $query = "SELECT * FROM products WHERE PID ='$id'";
        $query_run = mysqli_query($conn, $query);
        foreach ($query_run as $row) {
            ?>
            ```

            <div class="background">
                <form method="post" id="form" action="code_plant.php" enctype="multipart/form-data">
                    <p>
                        <input type="hidden" placeholder="식물의 ID를 입력해주세요" id="product_ID"  name="product_ID" size="25"
                            value="<?php echo $row['PID'];?>">

                <label>식물 이름:</label>
                <input type="text" placeholder="식물의 이름을 입력해주세요" id="product_name" name="product_name" size="25"
                    value="<?php echo $row['PName'];?>" autofocus> <br>
                <small id="helpText1"></small>
            </p>

            <p>
                <label>식물 종류:</label>
                <select name="category" id="category">
                    <option Value="Plants"> Plants</option>
                </select>
                <small id="helpText2"></small>
            </p>

            <p>
                <label>수량 입력:</label>
                <input type="number" placeholder="수량을 입력하세요" id="product_stock" name="product_stock" step="1"
                    value="<?php echo $row['PStock'];?>"><br>
                    <small id="helpText3"></small>
            </p>

            <p>
                <label>가격 입력:</label>
                <input type="number" placeholder="가격을 입력하세요"  id="product_price" name="product_price"
                    value="<?php echo $row['PPrice'];?>"><br>
                    <small id="helpText4"></small>
            </p>

            <p><label> 이미지 1 선택:</label>
                <input type="file" accept="image/*" id="product_pic1" name="product_pic1" value="<?php echo $row['Pic1'];?>"><br>
                <span><?php echo " ".$row['Pic1'];?></span>
                <small id="helpText5"></small>
            </p>

            <p><label> 이미지 2 선택:</label>
                <input type="file" accept="image/*" id="product_pic2" name="product_pic2" value="<?php echo $row['Pic2'];?>"><br>
                <span><?php echo " ".$row['Pic2'];?></span>
                <small id="helpText6"></small>
            </p>

            <p><label> 이미지 3 선택:</label>
                <input type="file" accept="image/*"  id="product_pic3" name="product_pic3" value="<?php echo $row['Pic3'];?>"><br>
                <span><?php echo " ".$row['Pic3'];?></span>
                <small id="helpText7"></small>
            </p>

            <p><label> 이미지 4 선택:</label>
                <input type="file" accept="image/*" id="product_pic4" name="product_pic4" value="<?php echo $row['Pic4'];?>"><br>
                <span><?php echo " ".$row['Pic4'];?></span>
                <small id="helpText8"></small>
            </p>

            <p><label> 이미지 5 선택:</label>
                <input type="file" accept="image/*" id="product_pic5" name="product_pic5" value="<?php echo $row['Pic5'];?>"><br>
                <span><?php echo " ".$row['Pic5'];?></span>
                <small id="helpText9"></small>
            </p>

            <p>
                <label>설명: </label><br>
                <textarea name="product_desc" id="product_desc"cols="50" rows="5"><?php echo $row['P_Description'];?></textarea><br>
                <small id="helpText10"></small>

            </p>
            <p>
                <label>습도: </label><br>
                <textarea name="product_humidity" id="product_humidity"cols="50" rows="5"><?php echo $row['Phumidity'];?></textarea><br>
                <small id="helpText11"></small>

            </p>
            <p>
                <label>햇빛: </label><br>
                <textarea name="product_light" id="product_light"cols="50" rows="5"><?php echo $row['Plight'];?></textarea><br>
                <small id="helpText12"></small>

            </p>
            <p>
                <label>물 주는 양: </label><br>
                <textarea name="product_watering" id="product_watering"cols="50" rows="5"><?php echo $row['Pwatering'];?></textarea><br>
                <small id="helpText13"></small>

            </p>

            <div class="submit_area">
                <input type="submit" id="submit" value="업데이트" name="update">
            </div>
        </form>
        <?php
            }
        }                   
    ?>
    </div>
</body>
<!--footer 삽입-->
<?php include('includes/admin-footer.html');?>

</html>