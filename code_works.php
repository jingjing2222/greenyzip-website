
<?php
session_start();

include('includes/db-con.php'); // 데이터베이스 연결 포함 

//Edit 부분
if (isset($_POST['update'])) {
    $id = $_POST['product_ID'];
    $pname = $_POST['product_name'];
    $pprice = 0;
    $pstock = 0;
    $pcate = $_POST['category'];
    $pdesc = $_POST['product_desc'];
    $phumidity = "";
    $plight = "";
    $pwatering = "";

    //이미지 교체 부분 img1, img2는 필수이다
    $files1 = $_FILES['product_pic1']['tmp_name'];
    $image1 = addslashes(file_get_contents($_FILES['product_pic1']['tmp_name']));
    $image_name1 = addslashes($_FILES['product_pic1']['name']);
    move_uploaded_file($_FILES["product_pic1"]["tmp_name"], "img/" . $_FILES["product_pic1"]["name"]);
    $location1 = $_FILES["product_pic1"]["name"];

    $files2 = $_FILES['product_pic2']['tmp_name'];
    $image2 = addslashes(file_get_contents($_FILES['product_pic2']['tmp_name']));
    $image_name2 = addslashes($_FILES['product_pic2']['name']);
    move_uploaded_file($_FILES["product_pic2"]["tmp_name"], "img/" . $_FILES["product_pic2"]["name"]);
    $location2 = $_FILES["product_pic2"]["name"];

    
    //이미지 교체 부분 img3~5는 등록을 안할경우, 다른 이미지로 대체한다
    $files3 = $_FILES['product_pic3']['tmp_name'];
    if (!empty($files3)) {
        $image3 = addslashes(file_get_contents($files3));
        $image_name3 = addslashes($_FILES['product_pic3']['name']);
        move_uploaded_file($_FILES["product_pic3"]["tmp_name"], "img/" . $_FILES["product_pic3"]["name"]);
        $location3 = $_FILES["product_pic3"]["name"];
    } else {
        $image3 = file_get_contents('img/noimage.png');
        $image_name3 = 'noimage.png';
        $location3 = 'noimage.png';
    }

    $files4 = $_FILES['product_pic4']['tmp_name'];
    if (!empty($files4)) {
        $image4 = addslashes(file_get_contents($files4));
        $image_name4 = addslashes($_FILES['product_pic4']['name']);
        move_uploaded_file($_FILES["product_pic4"]["tmp_name"], "img/" . $_FILES["product_pic4"]["name"]);
        $location4 = $_FILES["product_pic4"]["name"];
    } else {
        $image4 = file_get_contents('img/noimage.png');
        $image_name4 = 'noimage.png';
        $location4 = 'noimage.png';
    }

    $files5 = $_FILES['product_pic5']['tmp_name'];
    if (!empty($files5)) {
        $image5 = addslashes(file_get_contents($files5));
        $image_name5 = addslashes($_FILES['product_pic5']['name']);
        move_uploaded_file($_FILES["product_pic5"]["tmp_name"], "img/" . $_FILES["product_pic5"]["name"]);
        $location5 = $_FILES["product_pic5"]["name"];
    } else {
        $image5 = file_get_contents('img/noimage.png');
        $image_name5 = 'noimage.png';
        $location5 = 'noimage.png';
    }

    //DB에 업데이트한다
    $query = "UPDATE products SET PName='$pname', PPrice='$pprice', PStock='$pstock', P_Description='$pdesc', PCategory='$pcate', Pic1='$location1', Pic2='$location2', Pic3='$location3', Pic4='$location4', Pic5='$location5', Phumidity='$phumidity', Plight='$plight',Pwatering='$pwatering' WHERE PID='$id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = "성공적으로 업데이트 되었습니다!";
        header('Location: admin.php');
    } else {
        $_SESSION['status'] = "업데이트에 실패했습니다.";
        header('Location: admin.php');
    }
}


//삭제 부분
if (isset($_POST['delete_button'])) { //delete_button이 눌러졌을 경우
    $id = $_POST['delete_id']; //POST 방식으로 delete_id가 가져와진다면,

    $query = "DELETE FROM products WHERE products.PID='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = "성공적으로 업데이트 되었습니다!";
        header('Location: admin.php');
    } else {
        $_SESSION['status'] = "업데이트에 실패했습니다.";
        header('Location: admin.php');
    }
}

$max_pid_query = "SELECT MAX(PID) AS max_pid FROM products";
$max_pid_result = mysqli_query($conn, $max_pid_query);
$max_pid_row = mysqli_fetch_assoc($max_pid_result);
$next_pid = $max_pid_row['max_pid'] + 1;

// 추가 부분
if (isset($_POST['add_product'])) {
    $pname = $_POST['product_name'];
    $pprice = 0;
    $pstock = 0;
    $pdesc = $_POST['product_desc'];
    $pcate = $_POST['category'];
    $ppic1 = $_POST['product_pic1'];
    $ppic2 = $_POST['product_pic2'];
    $ppic3 = $_POST['product_pic3'];
    $ppic4 = $_POST['product_pic4'];
    $ppic5 = $_POST['product_pic5'];
    $phumidity = "";
    $plight = "";
    $pwatering = "";

    // img3~5가 비어있는지 확인하고 비어있으면 대체 이미지 삽입
    if (empty($ppic3)) {
        $ppic3 = "noimage.png";
    }
    if (empty($ppic4)) {
        $ppic4 = "noimage.png";
    }
    if (empty($ppic5)) {
        $ppic5 = "noimage.png";
    }


//DB에 업데이트
    $query = "INSERT INTO products (PID, PName, PPrice, PStock, PCategory, P_Description, Pic1, Pic2, Pic3, Pic4, Pic5, Phumidity, Plight, Pwatering) 
              VALUES ('$next_pid', '$pname', '$pprice', '$pstock', '$pcate', '$pdesc', '$ppic1', '$ppic2', '$ppic3', '$ppic4', '$ppic5', '$phumidity', '$plight', '$pwatering')";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo 'Saved';
        $_SESSION['success'] = "성공적으로 업데이트 되었습니다!";
        header('Location: admin.php');
    } else {
        echo 'Not Saved';
        $_SESSION['status'] = "업데이트에 실패했습니다.";
        header('Location: admin.php');
    }
}
?>