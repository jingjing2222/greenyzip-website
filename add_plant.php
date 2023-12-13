<!--HTML & PHP 부분-->
<!DOCTYPE html>
<!--HTML5 선언-->
<html lang="en">
    <!--언어 속성 값으로 영어(en)를 사용-->

    <head>
        <!--head 태그 시작-->
        <meta charset="UTF-8">
        <!--문자 인코딩 설정-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--웹 페이지가 IE 브라우저와 호환되도록 설정-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--화면 너비에 맞게 조절 및 초기 화면 배율 설정-->
        <title>새로운 식물 추가</title>
        <!--문서의 제목-->
        <link
            rel="stylesheet"
            type="text/css"
            href="admin-forms1.css?<?php echo time(); ?>">
        <!--스타일시트 파일 연결 및 캐시 방지를 위한 시간 값 추가-->
        <script type="text/javascript" src="admin-forms1.js"></script>
        <!--자바스크립트 파일 연결-->
    </head>
    <!--head 태그 종료-->

    <!--바디-->

    <body>

        <!--헤더-->
        <header>

            <!--뒤로 가기 버튼-->
            <button class="back_button">
                <a href="admin.php"><img src="img/back.png" alt="Back Button" width="25px" height="25px"></a>
            </button>

            <!--폼 제목-->
            <h2>새로운 식물 추가</h2>

        </header>
        <!--헤더 끝-->

        <!--추가 폼-->
        <div class="background">
            <form id="form" method="post" action="code_plant.php">
                <!--POST 방식으로 데이터를 전송하며, 처리를 위한 PHP 파일 경로 지정-->
                <p>
                    <label>식물 이름:</label>
                    <!--라벨-->
                    <input
                        type="text"
                        placeholder="식물 이름 입력"
                        id="product_name"
                        name="product_name"
                        size="25"
                        autofocus="autofocus"><br>
                    <!--텍스트 입력 필드, placeholder 속성으로 기본값 설정, id와 name 속성으로 식별자 설정, autofocus 속성으로
                    자동으로 커서 위치 설정-->
                    <small id="helpText1"></small>
                    <!--작은 글씨로 도움말 텍스트-->
                </p>

                <p>
                    <label>종류:</label><br>
                    <!--라벨-->
                    <select name="category" id="category">
                        <!--선택 상자, id와 name 속성으로 식별자 설정-->
                        <option>Plants</option>
                        <!--옵션-->
                    </select><br>
                    <small id="helpText2"></small>
                    <!--작은 글씨로 도움말 텍스트-->
                </p>

                <p>
                    <label>수량:</label>
                    <!--라벨-->
                    <!-- 재고 입력 -->
                    <input
                        type="number"
                        placeholder="숫자 입력"
                        id="product_stock"
                        name="product_stock"
                        step="1"><br>
                    <small id="helpText3"></small>
                </p>

                <p>
                    <!-- 가격 입력 -->
                    <label>식물 가격:</label>
                    <input
                        type="number"
                        placeholder="가격 입력"
                        id="product_price"
                        name="product_price"
                        min="1"
                        step="1"><br>
                    <small id="helpText4"></small>
                </p>
                <p>
                    <!-- 이미지 1 -->
                    <label>
                        이미지 1:</label>
                    <input type="file" accept="image/*" id="product_pic1" name="product_pic1"><br>
                    <small id="helpText5"></small>
                </p>
                <p>
                    <!-- 이미지 2 -->
                    <label>
                        이미지 2:</label>
                    <input type="file" accept="image/*" id="product_pic2" name="product_pic2"><br>
                    <small id="helpText6"></small>
                </p>
                <p>
                    <!-- 이미지 3 -->
                    <label>
                        이미지 3:</label>
                    <input type="file" accept="image/*" id="product_pic3" name="product_pic3"><br>
                    <small id="helpText7"></small>
                </p>
                <p>
                    <!-- 이미지 4 -->
                    <label>
                        이미지 4:</label>
                    <input type="file" accept="image/*" id="product_pic4" name="product_pic4"><br>
                    <small id="helpText8"></small>
                </p>
                <p>
                    <!-- 이미지 5 -->
                    <label>
                        이미지 5:</label>
                    <input type="file" accept="image/*" id="product_pic5" name="product_pic5"><br>
                    <small id="helpText9"></small>
                </p>
                <p>
                    <!-- 전반적인 설명 -->
                    <label>설명:
                    </label><br>
                    <textarea
                        name="product_desc"
                        id="product_desc"
                        cols="50"
                        rows="5"
                        placeholder="식물에 대한 전반적인 설명 입력"></textarea><br>
                    <small id="helpText10"></small>
                </p>
                <p>
                    <!-- 습도 -->
                    <label>습도:
                    </label><br>
                    <textarea
                        name="product_humidity"
                        id="product_humidity"
                        cols="50"
                        rows="5"
                        placeholder="좋아하는 습도 입력"></textarea><br>
                    <small id="helpText11"></small>
                </p>
                <p>
                    <!-- 햇빛 -->
                    <label>햇빛:
                    </label><br>
                    <textarea
                        name="product_light"
                        id="product_light"
                        cols="50"
                        rows="5"
                        placeholder="좋아하는 햇빛 정도 입력"></textarea><br>
                    <small id="helpText12"></small>
                </p>
                <p>
                    <!-- 물 주는 양 -->
                    <label>물 주는 양:
                    </label><br>
                    <textarea
                        name="product_watering"
                        id="product_watering"
                        cols="50"
                        rows="5"
                        placeholder="좋아하는 물 주는 양 입력"></textarea><br>
                    <small id="helpText13"></small>
                </p>
                <!-- 제출 버튼 -->
                <div class="submit_area">
                    <input type="submit" id="submit" value="추가" name="add_product">
                    <input type="reset" id="reset" value="초기화">
                </div>
            </body>
        </form>
        <?php include('includes/admin-footer.html');?>

    </html>