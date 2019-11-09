-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2019 lúc 03:42 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nlcsdata`
CREATE DATABASE IF NOT EXISTS `nlcsdata` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nlcsdata`;
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ad_tk` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT '',
  `ad_mk` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `ad_tk`, `ad_mk`) VALUES
(1, 'minhminh', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_sp_ddh`
--

CREATE TABLE `chitiet_sp_ddh` (
  `sp_ma` int(11) NOT NULL,
  `ddh_ma` int(11) NOT NULL DEFAULT 0,
  `sp_ddh_soluong` int(11) NOT NULL DEFAULT 0,
  `sp_ddh_dongia` decimal(12,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_sp_ddh`
--

INSERT INTO `chitiet_sp_ddh` (`sp_ma`, `ddh_ma`, `sp_ddh_soluong`, `sp_ddh_dongia`) VALUES
(1, 24, 2, '46000.00'),
(1, 25, 2, '46000.00'),
(2, 21, 2, '46000.00'),
(2, 23, 3, '46000.00'),
(2, 26, 2, '46000.00'),
(3, 20, 1, '48000.00'),
(4, 21, 1, '49000.00'),
(7, 22, 2, '42000.00'),
(10, 22, 1, '38000.00'),
(15, 2, 1, '38000.00'),
(15, 22, 1, '38000.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `ddh_ma` int(11) NOT NULL,
  `ddh_ngaylap` datetime NOT NULL,
  `ddh_noigiao` varchar(300) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ddh_trangthai` tinyint(1) NOT NULL DEFAULT 0,
  `kh_taikhoan` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`ddh_ma`, `ddh_ngaylap`, `ddh_noigiao`, `ddh_trangthai`, `kh_taikhoan`) VALUES
(2, '2019-10-30 00:28:06', '12, Trần Phú, Cần Thơ', 1, 'nhatminh'),
(20, '2019-11-05 00:09:08', 'Hà Nội', 1, 'linh ka'),
(21, '2019-11-05 00:10:35', 'Sky St, TP Thái Bình', 0, 'sontungmtp'),
(22, '2019-11-05 01:09:15', 'Sunny St, Hà Nội', 0, 'chipu'),
(23, '2019-11-05 02:30:57', 'TP Thái Bình', 0, 'sontungmtp'),
(24, '2019-11-05 02:37:07', 'Hà Tĩnh', 0, 'didi'),
(25, '2019-11-08 01:44:17', '23, đ. Trần Hưng Đạo, Quận Ninh Kiều, Tp Cần Thơ', 0, 'didi'),
(26, '2019-11-08 23:40:38', '12, đ. 3/2, P. Xuân Khánh, Q. Ninh Kiều, Tp Cần Thơ.', 0, 'kamj');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `hsp_ma` int(11) NOT NULL,
  `hsp_tentaptin` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sp_ma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhsanpham`
--

INSERT INTO `hinhsanpham` (`hsp_ma`, `hsp_tentaptin`, `sp_ma`) VALUES
(1, 'ts_toco.jpg', 1),
(2, 'ts_panda.jpg', 2),
(3, 'ts_baanhem.jpg', 3),
(4, 'ts_nhatdaudo.jpg', 4),
(5, 'ts_olong.jpg', 5),
(27, 'ts_tranchauhoanggia.jpg', 6),
(28, 'ts_raucau.jpg', 7),
(29, 'ts_bacha.jpg', 8),
(31, 'che_1.jpg', 10),
(32, 'che_2.jpg', 11),
(33, 'che_5.jpg', 12),
(35, 'che_13.jpg', 14),
(36, 'che_12.jpg', 13),
(37, 'ts_matcha.jpg', 9),
(38, 'fft_hongtravietquoc.jpg', 15),
(39, 'fft_sakurangannhi.jpg', 16),
(40, 'fft_tradautamphaletuyet.jpg', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `kh_taikhoan` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `kh_mk` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `kh_hoten` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `kh_sdt` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `kh_diachi` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `kh_email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`kh_taikhoan`, `kh_mk`, `kh_hoten`, `kh_sdt`, `kh_diachi`, `kh_email`) VALUES
('aaa', 'aaa', 'aaa', '0911999000', 'meocon', 'minhb1606911@student.ctu.edu.vn'),
('bbb', '202cb962ac59075b964b07152d234b70', 'bbb', '0911999000', 'bbb', 'minhb1606911@student.ctu.edu.vn'),
('chipu', 'chipu', 'thùy chi', '0999999999', 'hà nội', 'chipu@mail.vn'),
('didi', 'didi', 'dihi', '0900000000', 'aaa', 'didi@gmail.com'),
('kamj', 'khaiminh', 'khai minh', '0945159494', 'TP Bạc Liêu', 'kamj@gmail.com'),
('Linh Ka', 'linhka', 'Chu Diệu Linh', '0999000990', 'Hà Nội', 'linhka@gmail.com'),
('nhatminh', 'nhatminh', 'nhatminh', '0916990092', 'Tp Cần Thơ', 'minhb1606911@student.ctu.edu.vn'),
('sontungmtp', 'sontungmtp', 'Nguyễn Thanh Tùng', '0999000990', 'Thái Bình', 'septung@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `lsp_ma` int(11) NOT NULL,
  `lsp_ten` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `lsp_mota` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`lsp_ma`, `lsp_ten`, `lsp_mota`) VALUES
(1, 'Trà sữa', NULL),
(2, 'Chè', NULL),
(3, 'Fresh Fruit Tea', NULL),
(4, 'Macchiato', NULL),
(5, 'Special Drink', NULL),
(6, 'Kem', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_ma` int(11) NOT NULL,
  `sp_ten` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sp_gia` decimal(12,2) NOT NULL DEFAULT 0.00,
  `sp_mota` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `lsp_ma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sp_ma`, `sp_ten`, `sp_gia`, `sp_mota`, `lsp_ma`) VALUES
(1, 'Trà Sữa ToCo', '46000.00', 'Sản phẩm là sự kết hợp hài hòa giữa hương thơm của hồng trà, vị bùi bùi của đậu đỏ, giòn sần sật của thạch kim cương và dẻo dai của trân châu.', 1),
(2, 'Trà Sữa Panda', '46000.00', 'Khi thưởng thức trà sữa Panda, khách hàng có thể cảm nhận rõ hương trà nhài thơm mát cùng vị ngọt ngậy béo của trà và sữa kết hợp cùng sợi trân châu dẻo dai.', 1),
(3, 'Trà Sữa Ba Anh Em', '48000.00', 'Bộ 3 “bằng hữu” trong đồ uống này chính là các loại topping đặc biệt: trân châu đen dẻo bùi đượm vị mật ong, thạch sương sáo mềm mịn thanh mát và pudding béo ngậy, thơm ngon.', 1),
(4, 'Trà Nhật Đậu Đỏ', '49000.00', 'Từng hạt đậu đỏ tươi được chế biến công phu, thơm mùi đậu, vị bùi bùi kết hợp với hương vị trà nổi tiếng của Nhật chiều lòng được cả những vị khách khó tính nhất.', 1),
(5, 'Trà Sữa Ô Long', '45000.00', 'Hương trà Ô long thơm mát, kết hợp vị sữa ngậy, độ ngọt vừa phải, hậu vị trà chát ngọt.', 1),
(6, 'Trà Sữa Trân Châu Hoàng Gia', '45000.00', 'Rất khó để cưỡng lại vị nồng từ hồng trà, vị sữa ngậy, không quá chát, không quá ngọt, cứ hòa quyện, hài hòa.Thêm trân châu dai dai, giòn giòn, ngon khó tả.', 1),
(7, 'Trà Sữa Rau Câu', '42000.00', 'Trà sữa rau câu đậm vị trà, thơm vị sữa kết hợp với sự thanh mát của sương sáo.', 1),
(8, 'Trà Sữa Bạc Hà', '40000.00', 'Vị bạc hà thanh mát, cay dịu vừa đủ, thêm vị sữa ngậy ngậy, tất cả như hòa quyện, đọng lại đầu lưỡi, thật khó một từ ngữ nào có thể diễn tả, chỉ biết hương vị ấy quyến rũ một cách lạ kì.', 1),
(9, 'Trà Sữa Matcha', '40000.00', 'Đậm hương vị Matcha kết hợp vị sữa ngậy béo để lại hậu vị chát ngọt đặc trưng.', 1),
(10, 'Xueshan1', '38000.00', 'Sản phẩm là sự kết hợp hài hòa giữa các thành phần cho cảm nhận mùi vị rất thật cửa khoai môn, khoai lang nhưng lại mang đến trải nghiệm trạng thái dẻo dai như trân châu khi nhai cùng hạt sen bùi thơm, vị thanh, ngọt mát của sương sáo và đá bào thảo mộc, quyện với creamer ngọt thơm béo ngậy.', 2),
(11, 'Xueshan2', '38000.00', 'Sản phẩm là sự kết hợp hài hòa giữa các thành phần ho cảm nhận mùi vị thơm đặc trưng của khoai viên, trân châu, vị thanh, ngọt mát của sương sáo và đá bào thảo mộc, ý dĩ, đậu đỏ thơm, bùi quyện với creamer ngọt thơm béo ngậy.', 2),
(12, 'Xueshan5', '35000.00', 'Sản phẩm là sự kết hợp hài hòa giữa các thành phần cho cảm nhận mùi thơm đặc trưng của khoai viên, trân châu, vị thanh mát của sương sáo, giòn sần sật của thạch conjac okinawa, bùi của ý dĩ và đậm vị matcha của matcha viên quyện với nước creamer ngọt thơm béo ngậy.', 2),
(13, 'Xueshan12', '38000.00', 'Sản phẩm là sự kết hợp hài hòa giữa các thành phần cho cảm nhận mùi thơm đặc trưng khoai viên, nếp viên và trân châu. Vị thanh ngọt mát của sương sáo đá bào thảo mộc, pudding thơm ngậy quyện với nước creamer ngọt thơm béo ngậy.', 2),
(14, 'Xueshan13', '35000.00', 'Sản phẩm là sự kết hợp hài hòa giữa các thành phần cho cảm nhận mùi thơm đặc trưng của khoai viên, vị thanh mát của sương sáo và đá bào thảo mộc, pudding thơm mềm, thạch okinawa giòn sần sật và đậm vị chát của matcha viên quyện với creamer ngọt thơm béo ngậy.', 2),
(15, 'Hồng Trà Việt Quất', '38000.00', 'Chút chát rất nhẹ từ hồng trà, thêm vị chua dịu, ngọt, thơm của việt quất và rau câu dừa mềm mềm, thanh mát, quả là 1 sự kết hợp vô cùng ăn ý.', 3),
(16, 'Sakura Ngân Nhĩ', '46000.00', 'Hương thơm hoa anh đào hòa quyện cùng hương chanh vàng đem lại cảm giác thanh mát. Vị chua ngọt của sản phẩm kết hợp với nhân ngân nhĩ đường phèn giòn sần sật đem lại trải nghiệm mới lạ.', 3),
(17, 'Trà Dâu Tằm Pha Lê Tuyết', '42000.00', 'Mứt dâu khi được hòa quyện cùng nước trà xanh tưởng chừng đối nghịch giữa ngọt – chát nhưng hóa ra lại bổ trợ tương hỗ cho nhau không ngờ, tạo nên một thức uống vừa quen vừa lạ.', 3),
(18, 'Trà Dứa Hồng Hạc', '38000.00', 'Khi thưởng thức “cô nàng” này bạn sẽ cảm nhận được hương vị đậm đà, tươi mát được tạo nên từ sự kết hợp của vị chua của dứa, dâu tây quyện cùng thạch băng tuyệt ngọt ngào.', 3),
(19, 'Trà Dứa Nhiệt Đới', '38000.00', 'Vị ngọt thanh chua chua ở đầu lưỡi mang lại sự pha trộn hài hòa giữa vị chua và ngọt, kết hợp với thạch băng tuyết ngọt ngào tạo nên cơn lốc thổi bat nóng nực.', 3),
(20, 'Trà Xanh', '29000.00', 'Ngọt ngào cùng hương vị trà xanh của Nhật Bản.', 3),
(21, 'Trà Xanh Chanh Leo', '36000.00', 'Hành trình đầy đam mê và tâm huyết này sẽ tiếp tục nhân rộng để lan tỏa những ly trà thuần khiết nông sản Việt đến mọi miền trên Việt Nam và thế giới.', 3),
(22, 'Trà Xanh Kiwi Chanh Leo', '44000.00', 'Sản phẩm là sự kết hợp tuyệt hảo giữa vị chua dịu của chanh leo, ngọt thanh mát của kiwi và vị chát nhẹ đặc trưng của trà xanh nhài, thêm rau câu dừa mềm mềm, hương kiwi đọng mãi về sau.', 3),
(23, 'Trà Xanh Xoài', '36000.00', 'Mùi vị thơm lừng của xoài chín kết hợp với vị chát ngọt của trà xanh cùng cảm giác rau câu mát mượt tan chảy trong miệng.', 3),
(24, 'Dâu Tằm Kem Phô Mai', '48000.00', 'Vị chát ngọt của trà kết hợp với vị chua ngọt từ mứt dâu tằm, hoà quyện cùng một chút ngậy ngậy của kem phô mai chắc chắn sẽ mang đến một hành trình trải nghiệm hoàn toàn mới lạ cho vị giác của bạn.', 4),
(25, 'Socola Kem Phô Mai', '49000.00', 'Lớp kem phô mai trắng bông, tương phản lớp socola phía dưới, nhìn cực \" kích thích\". Uống một ngụm, vị kem béo ngậy, mằn mặn, nồng nồng vị phô mai hòa quyện vị socola ngọt ngào, thoảng thoảng đắng nhẹ, cứ đọng mãi đầu lưỡi cái hương vị khó quên ấy.', 4),
(26, 'Matcha Kem Phô Mai', '49000.00', 'Lớp kem sữa phô mai đánh bông phía trên mềm mịn, béo ngậy, mằn mặn, ngọt dịu. Thêm vị matcha thơm nồng, chát nhẹ. Cả vị ngọt của kem, vị mặn, thơm nồng của phô mai và vị chát của trà tan ra nơi đầu lưỡi.', 4),
(27, 'Hồng Trà Kem Phô Mai', '45000.00', 'Hồng trà kem phô mai được lòng fan nhờ sự kết hợp ăn ý giữ vị hồng trà truyền thống chát nhẹ và kem phô mai mằn mặn, sóng sánh, ngọt dịu.', 4),
(28, 'Trà Xanh Kem Phô Mai', '45000.00', 'Vị ban đầu là kem phô mai mặn ngậy béo khi uống lẫn hỗn hợp phô mai và trà xanh có vị ngậy hài hòa cùng hương thơm đặc trưng thanh mát của trà xanh.', 4),
(29, 'Ô Long Kem Phô Mai', '49000.00', 'Vị ban đầu là kem phô mai mặn ngậy béo khi uống lẫn hỗn hợp phô mai và ô long có vị ngậy hài hòa cùng hương thơm đặc trưng thanh mát của ô long.', 4),
(30, 'Yakult Chanh leo', '42000.00', 'Với 2 thành phần chính là sữa chua uống Yakult thần thánh của Nhật Bản và nước cốt chanh leo tươi giàu vitamin C, tốt cho sức khỏe.', 5),
(31, 'Yakult Trà Xanh', '42000.00', 'Thoang thoảng vị nhài và chút chát đặc trưng của những búp trà xanh ướp hương nhài, vị chua dịu của yakult cùng rau câu dừa mềm mềm, thanh mát, Yakult Trà xanh như mang trong mình cái dư vị thanh tao của đồng nội, như làm dịu lại cái nắng oi ả của những ngày hè.', 5),
(32, 'Yakult Xoài', '42000.00', 'Vị xoài thơm thật thơm, ngọt vừa phải, kết hợp với yakult chua dịu dịu, cùng rau câu dừa mềm mát, đảm bảo thử 1 lần sẽ nghiện.', 5),
(33, 'Sữa Tươi Trân Châu Đường Hổ', '49000.00', 'Tiger Sugar là sự kết hợp hoàn hảo giữa vị ngọt đặc trưng của siro đường hổ quyện với vị ngậy béo của sữa tươi cùng trân châu dẻo dai uống rồi lại muốn thêm ly nữa.', 5),
(34, 'Hồng Trà Latte', '48000.00', 'Hồng trà Latte của TocoToco được cải tiến từ Latte truyền thống vốn được làm từ cà phê, sữa tươi và bọt sữa.', 5),
(35, 'Trà Xanh Sữa Vị Nhài', '38000.00', 'Vị thanh mát hơi chát đặc trưng của lá trà quyện trong hương thơm nhẹ của hoa nhài. Vị trà sữa ngọt mát ngậy béo cùng hương thơm đặc trưng của trà cùng những hạt trân châu dẻo ngọt mang lại trải nghiệm ngon miệng hấp dẫn khó cưỡng.', 5),
(36, 'Ô Long Thái Cực', '45000.00', 'Sản phẩm là sự kết hợp giữa trà ô long cùng 2 loại topping: trân châu đen và kim cương trắng. Ô long thái cực có vị chát nhẹ đặc trưng của trà ô long, chứa nhiều chất dinh dưỡng tốt cho sức khoẻ.', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitiet_sp_ddh`
--
ALTER TABLE `chitiet_sp_ddh`
  ADD PRIMARY KEY (`sp_ma`,`ddh_ma`),
  ADD KEY `sanpham_donhang_sanpham_idx` (`sp_ma`),
  ADD KEY `sanpham_donhang_dondathang_idx` (`ddh_ma`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`ddh_ma`),
  ADD KEY `kh_taikhoan` (`kh_taikhoan`);

--
-- Chỉ mục cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`hsp_ma`),
  ADD KEY `sp_ma` (`sp_ma`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`kh_taikhoan`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`lsp_ma`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_ma`),
  ADD KEY `lsp_ma` (`lsp_ma`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `ddh_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `hsp_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `lsp_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_sp_ddh`
--
ALTER TABLE `chitiet_sp_ddh`
  ADD CONSTRAINT `FK_chitiet_sp_ddh_dondathang` FOREIGN KEY (`ddh_ma`) REFERENCES `dondathang` (`ddh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_chitiet_sp_ddh_sanpham` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `FK__khachhang` FOREIGN KEY (`kh_taikhoan`) REFERENCES `khachhang` (`kh_taikhoan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD CONSTRAINT `FK__sanpham` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sanpham_loaisanpham` FOREIGN KEY (`lsp_ma`) REFERENCES `loaisanpham` (`lsp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
