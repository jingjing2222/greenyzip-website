<!-- HTML & PHP 부분 -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- 문서의 문자 인코딩을 UTF-8로 설정합니다. -->
        <meta charset="UTF-8">
        <!-- Internet Explorer에서 최신 렌더링 모드를 사용하도록 설정합니다. -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- 반응형 웹 디자인을 위해 뷰포트를 설정합니다. -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- 웹페이지의 타이틀을 설정합니다. -->
        <title>새로운 활동 추가</title>
        <!-- CSS 스타일시트를 링크합니다.-->
        <link
            rel="stylesheet"
            type="text/css"
            href="admin-forms2.css?<?php echo time(); ?>">
        <!-- 자바스크립트 파일을 링크합니다. -->
        <script type="text/javascript" src="admin-forms2.js"></script>
    </head>

    <body>
        <!-- 헤더 시작 -->
        <header>
            <!-- 뒤로가기 버튼 -->
            <button class="back_button">
                <a href="admin.php"><img src="img/back.png" alt="Back Button" width="25px" height="25px"></a>
            </button>
            <!-- 폼 제목 -->
            <h2>새로운 활동 추가</h2>
        </header>
        <!-- 헤더 종료 -->

        <!-- 폼 시작 -->
        <div class="background">
            <!-- form 태그 내부에 정보를 입력받습니다. 입력된 정보는 code_works.php로 전송됩니다. -->
            <form id="form" method="post" action="code_works.php">
                <!-- 제품명 입력 -->
                <p>
                    <label>활동 이름:</label>
                    <input
                        type="text"
                        placeholder="활동 이름 입력"
                        id="product_name"
                        name="product_name"
                        size="25"
                        autofocus="autofocus"><br>
                    <small id="helpText1"></small>
                </p>

                <!-- 카테고리 선택 -->
                <p>
                    <label>종류:</label><br>
                    <select name="category" id="category">
                        <option>Works</option>
                    </select><br>
                    <small id="helpText2"></small>
                </p>

                <!-- 이미지 업로드 입력 -->
                <p>
                    <label>
                        이미지 1:</label>
                    <input type="file" accept="image/*" id="product_pic1" name="product_pic1"><br>
                    <small id="helpText5"></small>
                </p>
                <p>
                    <label>
                        이미지 2:</label>
                    <input type="file" accept="image/*" id="product_pic2" name="product_pic2"><br>
                    <small id="helpText6"></small>
                </p>
                <p>
                    <label>
                        이미지 3:</label>
                    <input type="file" accept="image/*" id="product_pic3" name="product_pic3"><br>
                    <small id="helpText7"></small>
                </p>
                <p>
                    <label>
                        이미지 4:</label>
                    <input type="file" accept="image/*" id="product_pic4" name="product_pic4"><br>
                    <small id="helpText8"></small>
                </p>
                <p>
                    <label>
                        이미지 5:</label>
                    <input type="file" accept="image/*" id="product_pic5" name="product_pic5"><br>
                    <small id="helpText9"></small>
                </p>

                <!-- 제품 설명 입력 -->
                <p>
                    <label>설명:
                    </label><br>
                    <textarea
                        name="product_desc"
                        id="product_desc"
                        cols="50"
                        rows="5"
                        placeholder="활동에 대한 전반적인 설명 입력"></textarea><br>
                    <small id="helpText10"></small>
                </p>

                <!-- 제출 및 초기화 버튼 -->
                <div class="submit_area">
                    <input type="submit" id="submit" value="추가" name="add_product">
                    <input type="reset" id="reset" value="초기화">
                </div>
            </form>
            <!-- 폼 종료 -->
        </div>
    </body>

    <!-- 푸터 -->
    <?php include('includes/admin-footer.html');?>

</html>