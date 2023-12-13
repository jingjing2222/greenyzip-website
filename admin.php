<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>한평정원:그린이집</title>
        <link rel="stylesheet" type="text/css" href="admin-style-sheet.css"><!--스타일시트 연결-->
    </head>
    <body>
        <header>

            <!--뒤로가기 버튼-->
            <button class="back_button">
                <a href="admin-home.php"><img src="img/back.png" alt="Back Button" title="Back Button" width="25px" height="25px"></a>
            </button>

            <!--로고-->
            <img src="img/logo.png" alt="한평정원:그린이집 Logo" title="한평정원:그린이집 Logo" width="70" height="70" class="logo">
           
            <!--검색창-->
            <form action="admin.php" method="post" autocomplete="on">
                <div class="searchbar">
                    <input  type="text" name="search" id="search" placeholder="Search by Product ID, Name, or Category" title="Search by Product ID, Name, or Category" size="25" autocomplete="on" value=""/>
                </div>  
                <input type="submit" name="search_button" value="검색" class="search_button" title="Search Button"/>
            </form>
            <!--검색창 끝-->

        </header>

        <main>
            <div class="panel_container">
                <div class="panel_title">
                    <p>식물 관리</p>
                    <!--세션 메시지와 피드백을 표시하기 위한 PHP 코드.-->
                    <?php
                        if (isset($_SESSION['success']) && $_SESSION['success'] !='')
                        {
                        echo '<p style="color: green;"> ' .$_SESSION['success']. '</p>';
                        unset ($_SESSION["success"]);
                        }
                        if (isset($_SESSION['status']) && $_SESSION['status'] !='')
                        {
                        echo '<p style="color: red;">' .$_SESSION["status"]." </p>";
                        unset ($_SESSION['status']);
                        }
                    ?>
                    <!--식물 추가 버튼-->
                    <a href="add_plant.php" class="add_button" name="add_button">+ 식물 추가</a>
                </div>

                <!--검색 결과 보여주는 부분-->
                <?php
                    if(isset($_POST['search_button']) )
                    {
                        $search_value = $_POST['search'];
                        $query = "SELECT * FROM products WHERE CONCAT(PID, PName, PCategory) LIKE '%".$search_value."%' AND PCategory = 'plants'";
                        $search_result = filterTable($query);
                    }
                    else
                    {
                    $query = "SELECT PID, PName, PPrice, PStock, PCategory, P_Description, Pic1, Pic2, Pic3, Pic4, Pic5 FROM products WHERE PCategory = 'plants'";
                    $search_result = filterTable($query);
                    }
                ?>

                <!--검색 결과와 식물을 보여주는 테이블-->
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>이름</th>
                            <th>가격</th>
                            <th>수량</th>
                            <th>카테고리</th>
                            <th>설명</th>
                            <th>사진</th>
                            <th>수정/삭제</th>
                        </tr>
                    </thead>

                    <tbody>
                    <!--데이터베이스에서 데이터를 가져오는 PHP 코드-->                      
                    <?php
                        if(mysqli_num_rows($search_result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($search_result))
                            {
                    ?>
                        <tr>
                            <td><?php echo $row['PID'];?></td>
                            <td><?php echo $row['PName'];?></td>
                            <td><?php echo $row['PPrice'];?></td>
                            <td><?php echo $row['PStock'];?></td>
                            <td><?php echo $row['PCategory'];?></td>
                            <td style=" text-overflow: ellipsis;
                                        overflow: hidden;
                                        white-space: nowrap;
                                        max-height: 10px;
                                        max-width: 30px;
                                        line-clamp: 3;" title="<?php echo $row['P_Description'];?>">
                                <?php echo $row['P_Description'];?></td>
                            <td style=" text-overflow: ellipsis;
                                        overflow: hidden;
                                        white-space: nowrap;
                                        max-height: 10px;
                                        max-width: 30px;
                                        line-clamp: 3;" title="<?php echo $row['Pic1']." ".$row['Pic2']." ".$row['Pic3']." ".$row['Pic4']." ".$row['Pic5']." ";?>">
                                        <?php echo $row['Pic1']." ".$row['Pic2']." ".$row['Pic3']." ".$row['Pic4']." ".$row['Pic5']." ";?></td>
                            <td>
                            <form action="edit_plant.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['PID'];?>">
                                <button type="submit" name="edit_button" class="edit_button">수정</a>
                            </form>
                            <form action="code_plant.php" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['PID'];?>">
                                <button type="submit" name="delete_button" class="delete_button" onclick="checker()">삭제</a>
                            </form>
                            <script>
                                function checker(){
                                    var result = confirm('정말 삭제하시겠습니까?');
                                    if (result == false){
                                        event.preventDefault();
                                    }
                                }
                            </script>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                        else{
                            echo "<p style='margin-left: 20px; color: grey;'>No Records Found.</p>";
                        }
                    function filterTable($query)
                    {
                        include('includes/db-con.php'); //DB 연결
                        $filter_result = mysqli_query($conn, $query);
                        return $filter_result;
                    }
                    ?>
                        </tbody>
                </table>
                
                

                <!--데이터베이스에서 식물 수/개수를 검색하는 PHP 코드입니다.--> 
                <div class="tinfo">식물 총 합
                    <?php
                        $query = "SELECT PID FROM products WHERE PCategory='plants' ORDER BY PID";
                        $search_result = filterTable($query);
                        $rowi = mysqli_num_rows($search_result);
                        echo '<p>'.$rowi.'개</p>';
                    ?>
                </div>
            </div>
            <div class="panel_container">
                <div class="panel_title">
                    <p>활동 관리</p>
                    <!--세션 메시지와 피드백을 표시하는 PHP 코드입니다.-->
                    <?php
                        if (isset($_SESSION['success']) && $_SESSION['success'] !='')
                        {
                        echo '<p style="color: green;"> ' .$_SESSION['success']. '</p>';
                        unset ($_SESSION["success"]);
                        }
                        if (isset($_SESSION['status']) && $_SESSION['status'] !='')
                        {
                        echo '<p style="color: red;">' .$_SESSION["status"]." </p>";
                        unset ($_SESSION['status']);
                        }
                    ?>
                    <!--활동 추가 버튼-->
                    <a href="add_work.php" class="add_button" name="add_button">+ 활동 추가</a>
                </div>

                <!--검색 결과를 표시하는 PHP 코드입니다.-->
                <?php
                    if(isset($_POST['search_button']) )
                    {
                        $search_value = $_POST['search'];
                        $query = "SELECT * FROM products WHERE CONCAT(PID, PName, PCategory) LIKE '%".$search_value."%' AND PCategory = 'works'";
                        
                        $search_result = filterTable($query);
                    }
                    else
                    {
                    $query = "SELECT PID, PName, PPrice, PStock, PCategory, P_Description, Pic1, Pic2, Pic3, Pic4, Pic5 FROM products WHERE PCategory = 'works'";
                    $search_result = filterTable($query);
                    }
                ?>

                <!--활동에 대한 테이블-->
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>이름</th>
                            <th>카테고리</th>
                            <th>설명</th>
                            <th>사진</th>
                            <th>수정/삭제</th>
                        </tr>
                    </thead>

                    <tbody>
                    <!--PHP 코드를 사용하여 데이터베이스에서 데이터를 가져옵니다.-->                      
                    <?php
                        if(mysqli_num_rows($search_result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($search_result))
                            {
                    ?>
                        <tr>
                            <td><?php echo $row['PID'];?></td>
                            <td><?php echo $row['PName'];?></td>
                            <td><?php echo $row['PCategory'];?></td>
                            <td style=" text-overflow: ellipsis;
                                        overflow: hidden;
                                        white-space: nowrap;
                                        max-height: 10px;
                                        max-width: 30px;
                                        line-clamp: 3;" title="<?php echo $row['P_Description'];?>">
                                <?php echo $row['P_Description'];?></td>
                            <td style=" text-overflow: ellipsis;
                                        overflow: hidden;
                                        white-space: nowrap;
                                        max-height: 10px;
                                        max-width: 30px;
                                        line-clamp: 3;" title="<?php echo $row['Pic1']." ".$row['Pic2']." ".$row['Pic3']." ".$row['Pic4']." ".$row['Pic5']." ";?>">
                                        <?php echo $row['Pic1']." ".$row['Pic2']." ".$row['Pic3']." ".$row['Pic4']." ".$row['Pic5']." ";?></td>
                            <td>
                            <form action="edit_works.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['PID'];?>">
                                <button type="submit" name="edit_button" class="edit_button">수정</a>
                            </form>
                            <form action="code_works.php" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['PID'];?>">
                                <button type="submit" name="delete_button" class="delete_button" onclick="checker()">삭제</a>
                            </form>
                            <script>
                                function checker(){
                                    var result = confirm('정말 삭제하시겠습니까?');
                                    if (result == false){
                                        event.preventDefault();
                                    }
                                }
                            </script>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                        else{
                            echo "<p style='margin-left: 20px; color: grey;'>No Records Found.</p>";
                        }
                        filterTable($query)
                    ?>
                        </tbody>
                </table>
                
                
                <!--데이터베이스에서 활동수를 검색하는 PHP 코드입니다.--> 
                <div class="tinfo">활동 총 합
                    <?php
                        $query = "SELECT PID FROM products WHERE PCategory='works' ORDER BY PID";
                        $search_result = filterTable($query);
                        $rowi = mysqli_num_rows($search_result);
                        echo '<p>'.$rowi.' 개</p>';
                    ?>
                </div>
            </div>
        </main>
    </body>

    <!--footer 포함--> 
    <?php include('includes/admin-footer.html');?>

</html>