SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `greenyzip_1a`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admin`
--

CREATE TABLE `admin` (
  `AdID` int(6) NOT NULL,  -- 관리자 ID
  `AdName` varchar(255) NOT NULL,  -- 관리자 이름
  `AdPassword` varchar(255) NOT NULL  -- 관리자 비밀번호
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블 `admin`의 데이터 덤프
--

INSERT INTO `admin` (`AdID`, `AdName`, `AdPassword`) VALUES
(800001, 'Kim','admin123');  -- 초기 관리자 정보 입력

-- --------------------------------------------------------

--
-- 테이블 구조 `products`
--

CREATE TABLE `products` (
  `PID` int(11) NOT NULL,  -- 제품 ID
  `PName` varchar(30) NOT NULL,  -- 제품 이름
  `PPrice` decimal(10,0),  -- 제품 가격
  `PStock` int(11),  -- 제품 재고
  `PCategory` varchar(30) NOT NULL,  -- 제품 카테고리
  `P_Description` varchar(1000) NOT NULL,  -- 제품 설명
  `Pic1` varchar(30) NOT NULL,  -- 제품 이미지1
  `Pic2` varchar(30) NOT NULL,  -- 제품 이미지2
  `Pic3` varchar(30) NOT NULL,  -- 제품 이미지3
  `Pic4` varchar(30) NOT NULL,  -- 제품 이미지4
  `Pic5` varchar(30) NOT NULL,  -- 제품 이미지5
  `Phumidity` varchar(500),  -- 제품에 필요한 습도
  `Plight` varchar(500) ,  -- 제품에 필요한 빛
  `Pwatering` varchar(500)  -- 제품에 필요한 물 주기
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블 `products`의 데이터 덤프
--
-- 제품들의 정보 입력

-- 테이블 인덱스
--

--
-- 테이블 `admin`에 대한 인덱스
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdID`);  -- `AdID`를 기본키로 설정

--
-- 테이블 `products`에 대한 인덱스
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PID`);  -- `PID`를 기본키로 설정

--
-- 자동 증가 ID 설정
--

--
-- in thread.
--
-- 테이블 `admin`의 자동 증가 ID
--
ALTER TABLE `admin`
  MODIFY `AdID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=800002;  -- `AdID`를 자동 증가 설정

--
-- 테이블 `products`의 자동 증가 ID
--
ALTER TABLE `products`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT;  -- `PID`를 자동 증가 설정
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

