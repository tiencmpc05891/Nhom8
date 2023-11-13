-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2023 at 03:37 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camerashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ContactID` int NOT NULL,
  `ContactName` varchar(50) NOT NULL,
  `ContactEmail` varchar(30) NOT NULL,
  `ContactPhone` int NOT NULL,
  `ContactDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ContactID`, `ContactName`, `ContactEmail`, `ContactPhone`, `ContactDesc`) VALUES
(17, 'Phạm Trương Ngọc Huy', 'ngochuy@yahoo.com', 1998078087, 'Welcome to CameraShop Online\r\nAdmin: Ngoc Huy'),
(18, 'Ngoc Huy Pham', 'ngochuypham@gmail.com', 901234567, 'Hello! CameraShop');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int NOT NULL,
  `ProductID` int NOT NULL,
  `ProductPrice` double(10,0) NOT NULL,
  `Quantity` int NOT NULL,
  `Totals` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderID`, `ProductID`, `ProductPrice`, `Quantity`, `Totals`) VALUES
(1, 48, 10254600, 1, 10254600),
(2, 19, 17808400, 2, 35616800),
(3, 19, 17808400, 2, 35616800),
(4, 19, 17808400, 2, 35616800),
(5, 19, 17808400, 2, 35616800),
(6, 48, 10254600, 1, 10254600),
(7, 48, 10254600, 1, 10254600),
(8, 69, 107399000, 1, 107399000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderTotal` int NOT NULL,
  `UserID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `OrderTotal`, `UserID`) VALUES
(1, '2013-10-26', 10254600, 15),
(2, '2013-10-26', 35616800, 19),
(3, '2013-10-26', 143015800, 19),
(4, '2013-10-26', 250414800, 19),
(5, '2013-10-26', 262135850, 19),
(6, '2013-10-26', 10254600, 19),
(7, '2013-10-26', 10254600, 19),
(8, '2013-10-26', 107399000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductImage` varchar(255) DEFAULT NULL,
  `ProductPrice` double(10,0) NOT NULL,
  `ProductDesc` text NOT NULL,
  `ProductCategory` varchar(50) NOT NULL,
  `ProductBrand` varchar(50) NOT NULL,
  `ProductGroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `ProductImage`, `ProductPrice`, `ProductDesc`, `ProductCategory`, `ProductBrand`, `ProductGroup`) VALUES
(1, 'Canon Speedlight 430EX II, New 100% fullbox', '430_EXII.jpg', 11212121, 'Đèn flash Canon Speedlite 430EX II thuộc dòng đèn flash rời có đế gắn lên thân máy EOS, được tích hợp nhiều tính năng hiện đại tương tự như người anh em 580 EX II. Được thiết kế hỗ trợ đầy đủ các tính năng cho các dòng máy DSLR EOS, hoặc dòng G-series của', 'Đèn flash', 'Canon', 'Phụ kiện máy ảnh'),
(3, 'Nikon Speedlight SB 700, New 100% Fullbox', 'flash3.jpg', 6399630, 'èn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3Đèn flash3', 'Đèn flash', 'Nikon', 'Phụ kiện máy ảnh'),
(4, 'Canon Speedlite 600EX-RT New 100%', 'dkfjdf.jpg', 11183000, 'Cùng với mẫu 5D Mark III, Canon hôm nay còn giới thiệu thêm một số phụ kiện khác dành cho dòng máy ống kính rời EOS cũng như riêng cho sản phẩm này. Đầu tiên là mẫu đèn Speedlite 600EX-RT tương thích với tất cả các máy thuộc dòng EOS. Mẫu sản phẩm này có ', 'Đèn flash', 'Canon', 'Phụ kiện máy ảnh'),
(6, 'Nikon Speedlight SB 700, New 100% Fullbox (Hàng ch', 'flash4.jpg', 7499995, 'Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đèn flash 4Đè', 'Đèn flash', 'Nikon', 'Phụ kiện máy ảnh'),
(7, 'Nikon SB-N5 mới 100% (Hàng chính hãng)', 'flash5.jpg', 3312700, 'Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đèn flash 5Đè', 'Đèn flash', 'Nikon', 'Phụ kiện máy ảnh'),
(10, 'Nikon Speedlight SB-910 New 100% (Hàng chính hãng)', 'flash1.jpg', 10288360, 'Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon', 'Đèn flash', 'Nikon', 'Phụ kiện máy ảnh'),
(11, 'Nikon Speedlight SB-910 New 100%', 'flash2.jpg', 9180610, 'Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon Đèn flash Nikon', 'Đèn flash', 'Nikon', 'Phụ kiện máy ảnh'),
(12, 'Flash YongNuo 568EX for Canon New 100%', 'yn568ex1.jpg', 3419044, 'Được sản xuất đi kèm hệ thống HSS, có đầy đủ các chức năng cơ bản của 1 đèn flash chuyên nghiệp : E-TTL, Multi, S1/S2, Slave, Manual , Sc/Sn', 'Đèn flash', 'Canon', 'Phụ kiện máy ảnh'),
(13, 'Yongnuo Flash 467 for Canon/Nikon, New 100% fullbo', '467-1.jpg', 1582500, 'Flashyn-467 tương thích với Nikon của E-TTL II hệ thống đo sáng tự động, kiểm soát ánh sáng đèn flash với độ chính xác cao hơn và ổn định. Cóthểđược điều chỉnh + / - 1.5 EV trong phạm vi 1 / 2 EV bước, nó sẽ rất hữu ích cho các nhiếp ảnh.', 'Đèn flash', 'Canon', 'Phụ kiện máy ảnh'),
(14, 'YONGNUO FLASH YN-560II, New 100%', 'ny.jpg', 1624700, 'Nhận xét chung của chúng tôi, đây chỉ là một sản phẩm trung gian hay quá độ trước khi một sản phẩm hoàn thiện hơn ra đời. Chiếc đèn ngoài bổ sung màn hình LCD và chế độ phát sáng nhiều lần không hề có những thay đổi quá lớn, để đầu tư hay đổi mới các thiế', 'Đèn flash', 'Canon', 'Phụ kiện máy ảnh'),
(15, 'YongNuo Flash YN-468 II for Canon/Nikon, New 100%', 'yn46822.jpg', 1877900, 'Cải thiện bộ cảm ứng Slave ( đánh đèn rời phụ), bộ cảm biến nằm phía dưới lớp kính nhựa màu đỏ: Chế độ S1 được sử dụng với đèn chỉnh tay hoặc đèn Studio, chế độ S2 được thiết kế cho đèn đánh TTL. Điều đặc biệt ở chế độ này là khả năng phát hiện các ánh sá', 'Đèn flash', 'Canon', 'Phụ kiện máy ảnh'),
(16, 'YongNuo Flash 465 for Nikon/Canon, New 100% fullbo', 'yn465.jpg', 1392600, 'Thiết lập độ sáng đèn flash theo yêu thích của bạn, mức độ sáng sẽ được hiển thị bằng chỉ số độ sáng\r\nYN-465 có 7 mức công suất khác nhau flash (1/1, 1/2, 1/4, 1/8, 1/16, 1/32, 1/64)để bạn dễ dàng điều chỉnh.', 'Đèn flash', 'Khác', 'Phụ kiện máy ảnh'),
(17, 'Canon EF 70-300mm f/4-5.6 IS USM New 100%', 'canon_EF_70-300.jpg', 8018000, 'Với sự ra đời của Canon EF 70-300mm f/4-5.6 IS USM, Canon đã thay thế một trong những ống kính phổ biến nhất của nó và hình ảnh đầu tiên của nó qua mặt ống kính Canon EF 75-300mm f/4.5-5.6 IS. 75-300mm IS - ống kính đã được phổ biến vì chiều dài hữu ích d', 'Lens', 'Nikon', 'Phụ kiện máy ảnh'),
(18, 'Canon EF 40mm f/2.8 Lens STM, New 100%', '113407734194fea942b19edb.jpg', 4198900, 'Ống kính Canon 40 F2.8 từ Canon là một sự chào mừng của Canon cho dòng ống kính EF. Đây là ống kính nhẹ nhất (cùng với ống kính 50mm f/1.8 II) trong gia đình EF. Canon 40 F2.8 dài ít hơn một inch, do đó, nó sẽ không bao giờ thu hút sự chú ý không mong muố', 'Lens', 'Canon', 'Phụ kiện máy ảnh'),
(19, 'Canon EF 17-40mm f/4 L USM New 100% (Hàng chính hã', '31257_30960_1513306401_EF 17-40mm F4L USM.jpg', 17808400, 'Amstelveen, Hà Lan, 22 Tháng 8, 2005: Canon, một nhà lãnh đạo trong và hình ảnh công nghệ chụp ảnh, hôm nay công bố sự ra mắt của ống kính chuyên nghiệp L-series mới nhất: sự nhẹ Canon 24-105 với ổn định hình ảnh.  Bụi và chống ẩm và kết hợp các tiêu chuẩ', 'Lens', 'Canon', 'Phụ kiện máy ảnh'),
(20, 'Canon EF 70-200mm f/4 L IS USM New 100%', '30866_70-200mm IS USM.jpg', 20499916, 'Giống như mọi Canon tự động lấy nét ống kính \"L\", Canon 70-200 F4 IS USM cung cấp hiệu suất quang học bằng tương tự như ống kính độ dài tiêu cự cố định, với im lặng, tốc độ cao tập trung và tập trung hướng dẫn sử dụng đầy đủ thời gian ghi đè lên công suất', 'Lens', 'Canon', 'Phụ kiện máy ảnh'),
(21, 'Canon 55-250mm f/4-5.6 IS II New 100%', 'EFs55-250.jpg', 3629200, 'Sau 3 năm có mặt trên thị trường, ống kính tele tầm trung của Canon là Canon 55-250mm f/4-5.6 IS đã có phiên bản II thay thế. Phiên bản mới Canon 55-250mm f/4-5.6 IS II cùng với EF-S 18-55mm f/3.5-5.6 IS II sẽ tạo thành bộ đôi ống kính hoàn hảo cho người ', 'Lens', 'Canon', 'Phụ kiện máy ảnh'),
(22, 'Canon EF 75-300mm f/4-5.6 III Mới 100%', '41KD00SN1gL._AA300_PIbundle-1,TopRight,0,0AA300_SH20_.jpg', 3165000, 'Nhỏ gọn và trọng lượng nhẹ 4x ống kính zoom lý tưởng chụp hình các môn thể thao, chân dung, và các loài động vật hoang dã. Canon 75-300mm rất phù hợp cho các môn thể thao và các ứng dụng khác đòi hỏi phải nhanh chóng AF. Một động cơ DC được sử dụng AF. Ph', 'Lens', 'Canon', 'Phụ kiện máy ảnh'),
(23, 'Canon EF 135mm f/2 L USM New 100% (Hàng chính hãng', 'Canon-EF-135mm135838899250f75f0099e8f.jpg', 21986200, 'Canon EF 135mm f/2.0 L USM được thiết kế để đáp ứng các nhu cầu của người sử dụng Một công thức quang học 10 phần tử với hai yếu tố UD-thủy tinh phục vụ để sửa chữa quang sai dư, dẫn đến độ sắc nét tuyệt vời và chất lượng hình ảnh cao. Nó cũng có thể để c', 'Chân máy ảnh', 'Canon', 'Phụ kiện máy ảnh'),
(26, 'Canon EF 35mm F/2.0 New 100% (Hàng chính hãng)', '12119_(1).jpg', 6399630, 'EF 35mm f2 của Canon là một trong số ít ống kính được sản xuất từ năm 1990 nhưng đến nay không có phiên bản thay thế.\r\nỐng kính Canon EF 35mm f2 có thiết kế khá gọn nhé với kích thước chỉ 67 x 42 mm và trọng lượng 210g. Ống kính này của Canon sử dụng kính', 'Lens', 'Canon', 'Phụ kiện máy ảnh'),
(27, 'Lens2scope - Biến Ống kính thành ống nhòm', '145.jpg', 3165000, 'Kenko mới đây đã cho ra mắt bộ ngàm chuyển đổi mang tên Lens2scope dành cho các ống kính của cả Nikon và Canon. Thiết bị này có thể giúp các ống kính trở thành kính viễn vọng, ống nhòm với độ phóng đại 10x.', 'Đồ chơi tổng hợp', 'Khác', 'Phụ kiện máy ảnh'),
(28, 'Dù đen-trắng', 'U41-2P_01.JPG', 145678, 'Dù Đen - Trắng: giúp làm dịu ánh sáng của đèn Flash, tạo ra ánh sáng nhẹ nhàng, trải đều trên chủ thể cần chụp\r\n-Mặt trắng: cho ánh sáng đi xuyên qua,\r\n-Mặt đen: phản ánh sáng\r\n', 'Đồ chơi tổng hợp', 'Khác', 'Phụ kiện máy ảnh'),
(29, 'Gray Card', '31B1-WG8RcL._SL500_SS500_.jpg', 316500, '\"Gray Card\" là một tấm giấy cứng màu xám trung tính (neutral gray) của quang phổ (spectrum). Sản phẩm này có 2 mặt - xám với 18% của độ phản chiếu của quang phổ (màu sắc nhìn được bởi mắt thường) và mặt kia màu trắng với 90% của độ phản chiếu.', 'Đồ chơi tổng hợp', 'Nikon', 'Phụ kiện máy ảnh'),
(30, 'Dây treo máy ảnh Benro', 'day deo chan may.jpg', 738500, 'Dây đeo máy ảnh có trang bị lỏi thép mang lại khả năng chống cắt. tính linh động trong sử dụng rất cao nhờ có vòng bi xoay và thiết kế chắc chắn.', 'Đồ chơi tổng hợp', 'Khác', 'Phụ kiện máy ảnh'),
(31, 'Canon 6D (Body) Mới 100%', 'image_gallery (2).jpg', 36988300, 'Nhìn từ phía trước, Canon 6D có thiết kế khá đơn giản, ở phần trên nơi có lăng kính kính ngắm hơi gồ ra cùng với logo Canon, trông như một cái trán dô. Không hề có flash tích hợp, điều không bình thường đối với một máy ảnh dành cho người dùng cao cấp, nhưng phù hợp với máy ảnh full-frame Canon. Cổng hồng ngoại được đặt ngay trên phần báng cầm tay, một đèn hẹn giờ (không phải đèn hỗ trợ lấy nét AF) nằm giữa phần báng cầm và ống kính. Nằm hơi chếch bên dưới phía trái của ngàm ống kính là nút xem t', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(32, 'Canon EOS Kiss X5/ Rebel T3i/ 600D +kit 18-55is II', '31191_753762.jpg', 12248550, 'Canon 600D được trang bị cảm biến CMOS chất lượng cao18 megapixel và bộ xử lý hình ảnh DIGIC 4 cực kỳ mạnh mẽ, cho hình ảnh chất lượng cao. Các tính năng như Tự động lựa chọn cảnh thông minh, Basic+ và chức năng Hướng dẫn sẽ giúp bạn sử dụng các chức năng sáng tạo của máy một cách đơn giản. Tính năng Sáng tạo cải tiến cũng như ghi video Full HD và chụp hình từ Video đều được tích hợp trong Canon 600D. Ghi hình Full HD tốc độ 24, 25 và 30 fps', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(33, 'Canon EOS 5D mark II mới 100% (Body only)', '213287858774f33a9d51c08d13289297164f35dbb4d4ade.jpg', 35511300, 'Dân mê nhiếp ảnh đã chờ đón 5D Mark II từ rất lâu, bởi chiếc 5D đã hiện diện trên thị trường suốt từ ba năm qua mà vẫn chưa có người kế tục. Đến khi được chính thức giới thiệu tại triển lãm Photokina hồi tháng 9 vừa qua, nó đã không làm những người yêu mến thương hiệu Canon phải thất vọng.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(35, 'Canon EOS Rebel T3 (1100D) + 18-55mm IS II New 100', 'eos1100d-b3135522594150c71b55d8318.png', 8988600, 'Canon 1100D là dòng máy ảnh DSLR phổ thông của Canon dành cho những người dùng mới chuyển từ máy ảnh số du lịch sang sử dụng dòng bán chuyên nghiệp.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(36, 'Canon EOS 650D (Body only) mới 100% (Hàng chính hã', '33866_canon-9011-06114-1-zoom.jpg', 16880000, 'Canon vừa chính thức giới thiệu chiếc DSLR mới nhất của mình: canon 650D (còn có tên là Rebel T4i ở Bắc Mỹ). Canon 650D sử dụng cảm biến 18 megapixel và là máy DSLR đầu tiên của Canon có màn hình cảm ứng lẫn tính năng lấy nét lai. Máy vẫn giữ hệ thống AF 9 điểm (toàn bộ là điểm cross-type) của EOS 60D và có thể chụp liên tục 5 ảnh trong một giây. Canon đã bổ sung cho Canon 650D micro stero để hỗ trợ cho việc quay phim Full-HD được tốt hơn. Người dùng có thể tùy chọn nhiều tốc độ cho việc ghi hìn', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(37, 'Canon EOS 650D + kit 18-55 is II mới 100%', 'd.jpg', 14495700, 'Canon vừa chính thức giới thiệu chiếc DSLR mới nhất của mình: canon 650D (còn có tên là Rebel T4i ở Bắc Mỹ). Canon 650D sử dụng cảm biến 18 megapixel và là máy DSLR đầu tiên của Canon có màn hình cảm ứng lẫn tính năng lấy nét lai. Máy vẫn giữ hệ thống AF 9 điểm (toàn bộ là điểm cross-type) của EOS 60D và có thể chụp liên tục 5 ảnh trong một giây. Canon đã bổ sung cho Canon 650D micro stero để hỗ trợ cho việc quay phim Full-HD được tốt hơn. Người dùng có thể tùy chọn nhiều tốc độ cho việc ghi hìn', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(38, 'Canon EOS Kissx6i/ Rebel T4i (650D) + kit 18-55 is', 'd1.jpg', 13997740, 'Canon vừa chính thức giới thiệu chiếc DSLR mới nhất của mình: canon 650D (còn có tên là Rebel T4i ở Bắc Mỹ). Canon 650D sử dụng cảm biến 18 megapixel và là máy DSLR đầu tiên của Canon có màn hình cảm ứng lẫn tính năng lấy nét lai. Máy vẫn giữ hệ thống AF 9 điểm (toàn bộ là điểm cross-type) của EOS 60D và có thể chụp liên tục 5 ảnh trong một giây. Canon đã bổ sung cho Canon 650D micro stero để hỗ trợ cho việc quay phim Full-HD được tốt hơn. Người dùng có thể tùy chọn nhiều tốc độ cho việc ghi hìn', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(39, 'Canon 60D (Body only) mới 100%', 'd3.jpg', 14987330, 'Dòng hai số của Canon (xxD) từ trước đến nay luôn đạt được những thành công đáng kể nếu so với đối thủ \"truyền kiếp\" Nikon. Tuy nhiên, những nâng cấp từ model Canon 50D lên Canon 60D  sẽ chẳng khó để những người dùng lâu năm đoán biết nếu như không có xuất hiện của Canon 7D.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(40, 'Canon 7D Body', '30734_30699_Canon EOS 7D.jpg', 21100000, 'Canon 7D là câu trả lời mà \"ông trùm ảnh số\" hàng đầu thế giới dành cho Nikon sau một thời gian dài bị những model bán chuyên của đối thủ như D300 và D300s lấn sân. Quyết không từ bỏ cuộc đua đọ chấm, Canon đã trang bị cho model DSLR mới nhất của mình những \"vũ khí\" tối thượng, như cảm biến APS-C 18 Megapixel, vi xử lý kép Dual DIGIC 4, hệ thống lấy nét cực nhanh 19 điểm, ISO trong dải 100-12.800, tốc độ chụp liên tiếp đạt tới 8 hình mỗi giây cùng một loạt tính năng cao cấp khác.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(41, 'Canon EOS 7D mới 100% (Hàng chính hãng) (Body only', '7_D_b.jpg', 26698252, 'Canon 7D là câu trả lời mà \"ông trùm ảnh số\" hàng đầu thế giới dành cho Nikon sau một thời gian dài bị những model bán chuyên của đối thủ như D300 và D300s lấn sân. Quyết không từ bỏ cuộc đua đọ chấm, Canon đã trang bị cho model DSLR mới nhất của mình những \"vũ khí\" tối thượng, như cảm biến APS-C 18 Megapixel, vi xử lý kép Dual DIGIC 4, hệ thống lấy nét cực nhanh 19 điểm, ISO trong dải 100-12.800, tốc độ chụp liên tiếp đạt tới 8 hình mỗi giây cùng một loạt tính năng cao cấp khác.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(42, 'Canon 5D Mark III (Body Only) mới 100%', 'dd.jpg', 61401000, 'Canon 5D Mark III  trang bị cảm biến CMOS full-frame kích thước 36x24mm có độ phân giải nhỉnh hơn Mark II một chút, 22.3 Megapixel. Tuy vậy, chất lượng hình ảnh được đánh giá rõ nét hơn, tuyệt vời hơn người tiền nhiệm Mark II do cảm biến mới có nhiêu cải tiến về cấu trúc transistor, cũng như khả năng giảm nhiễu ngay trên chip mà Canon trang bị cho con cưng mới.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(43, 'Canon 7D Mark II (Body) Mới 100%', 'canon-7d-Mark-II-Body.jpg', 12934500, 'Canonrumors mới đây đã tiết lộ các thông tin đầu tiên về phần cứng của mẫu Canon 7D Mark II (tên tạm gọi model nâng cấp của EOS 7D hiện tại). Tuy nhiên, trang web này cũng cho biết các dữ liệu được một nguồn tin khá mới báo cáo nên chưa thể xác nhận được độ chính xác hoàn toàn.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(44, 'Canon EOS 60D + Lens EF-S 18-135mm', 'ddd.jpg', 21775200, 'Dòng hai số của Canon (xxD) từ trước đến nay luôn đạt được những thành công đáng kể nếu so với đối thủ \"truyền kiếp\" Nikon. Tuy nhiên, những nâng cấp từ model Canon 50D lên Canon 60D  sẽ chẳng khó để những người dùng lâu năm đoán biết nếu như không có xuất hiện của Canon 7D.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(45, 'Canon EOS 60D mới 100% (Hàng chính hãng) (Body onl', 'dddd.jpg', 18990000, 'Canon 60D không có quá nhiều công nghệ mang tính đột phá nhưng là lựa chọn hoàn hảo ở tầm 25 đến 30 triệu đồng cho các tính năng mà máy sở hữu', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(46, 'Canon 5D Mark III (Body only) mới 100% (Hàng chính', 'dddddddddddd.jpg', 67498900, '5D Mark III  trang bị cảm biến CMOS full-frame kích thước 36x24mm có độ phân giải nhỉnh hơn Mark II một chút, 22.3 Megapixel. Tuy vậy, chất lượng hình ảnh được đánh giá rõ nét hơn, tuyệt vời hơn người tiền nhiệm Mark II do cảm biến mới có nhiêu cải tiến về cấu trúc transistor, cũng như khả năng giảm nhiễu ngay trên chip mà Canon trang bị cho con cưng mới.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(47, 'Canon EOS 7D + Lens 28-135mm f/3.5-5.6 IS USM', '113287874164f33afd84ce99.jpg', 27852000, 'Canon 7D là câu trả lời mà \"ông trùm ảnh số\" hàng đầu thế giới dành cho Nikon sau một thời gian dài bị những model bán chuyên của đối thủ như D300 và D300s lấn sân. Quyết không từ bỏ cuộc đua đọ chấm, Canon đã trang bị cho model DSLR mới nhất của mình những \"vũ khí\" tối thượng, như cảm biến APS-C 18 Megapixel, vi xử lý kép Dual DIGIC 4, hệ thống lấy nét cực nhanh 19 điểm, ISO trong dải 100-12.800, tốc độ chụp liên tiếp đạt tới 8 hình mỗi giây cùng một loạt tính năng cao cấp khác.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(48, 'Canon EOS Kiss X5/ Rebel T3i/ 600D (Body only) mới', '31572_31191_IMG_194458.jpg', 10254600, 'Canon 600D được trang bị cảm biến CMOS chất lượng cao18 megapixel và bộ xử lý hình ảnh DIGIC 4 cực kỳ mạnh mẽ, cho hình ảnh chất lượng cao. Các tính năng như Tự động lựa chọn cảnh thông minh, Basic+ và chức năng Hướng dẫn sẽ giúp bạn sử dụng các chức năng sáng tạo của máy một cách đơn giản. Tính năng Sáng tạo cải tiến cũng như ghi video Full HD và chụp hình từ Video đều được tích hợp trong EOS 600D. Ghi hình Full HD tốc độ 24, 25 và 30 fps', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(49, 'Canon EOS 1100D + 18-55mm IS II New 100% (Hàng chí', '31573_IMG_233821.jpg', 11689400, 'Canon 1100D là dòng máy ảnh DSLR phổ thông của Canon dành cho những người dùng mới chuyển từ máy ảnh số du lịch sang sử dụng dòng bán chuyên nghiệp.', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(50, 'Canon EOS 650D (Body only) mới 100%', 'canon-9011-06114-1-zoom.jpg', 12660000, 'Canon vừa chính thức giới thiệu chiếc DSLR mới nhất của mình: canon 650D (còn có tên là Rebel T4i ở Bắc Mỹ). Canon 650D sử dụng cảm biến 18 megapixel và là máy DSLR đầu tiên của Canon có màn hình cảm ứng lẫn tính năng lấy nét lai. Máy vẫn giữ hệ thống AF 9 điểm (toàn bộ là điểm cross-type) của EOS 60D và có thể chụp liên tục 5 ảnh trong một giây. Canon đã bổ sung cho Canon 650D micro stero để hỗ trợ cho việc quay phim Full-HD được tốt hơn. Người dùng có thể tùy chọn nhiều tốc độ cho việc ghi hìn', 'Máy ảnh canon', 'Canon', 'Máy ảnh'),
(51, 'Nikon D600 mới 100% (Hàng Chính Hãng)', '1868049013475369345051c826df8ca.jpg', 40090000, 'Máy FF nhỏ gọn Nikon D600 trình làng Sau ba năm rưỡi kể từ khi giới thiệu model D700, Nikon đã trình làng cặp đôi D800/ D800E với nhiều cải tiến độc đáo. Chiếc máy ảnh full-frame này cũng là máy DSLR FF đầu tiên và duy nhất cho đến nay có cảm biến khủng 36.3 megapixel. Tuy nhiên không dừng lại ở đó. Nikon lần đầu tiên đưa ra 1 mẫu máy FF nhỏ gọn, hướng đến thiết kế dòng máy cơ bản dễ sử dụng', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(52, 'Nikon D5200 + Kit 18-55mm Mới 100%', 'Nikon_D5200_5.jpg', 16795600, 'Nikon D5200 cung cấp các phụ bản lề màn hình đa góc giống như Nikon D5100 cho phép ngắm chụp linh hoạt từ bất kỳ góc độ, cao hay thấp, làm cho ngay cả những chân dung tự họa có thể. Đó là một mô hình nhập cảnh cấp đáp ứng nhu cầu của những người đam mê hình ảnh cho khả năng chụp ảnh quy mô đầy đủ với bộ cảm biến mới của Nikon CMOS định dạng DX với một số điểm ảnh hiệu quả của khoảng 24 triệu điểm ảnh cũng như tương đương với động cơ xử lý hình ảnh EXPEED 3 được xây dựng vào cao cấp Nikon D4, D80', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(53, 'Nikon D3200 + kit 18-55 VR New 100%', 'nikon_d3200_slr_18_55_mm_vr_kit_0.jpg', 11710500, 'Điểm nổi bật nhất ở sản phẩm này chính là khả năng tương thích với bộ phụ kiện kết nối Wi-Fi là WU-1a. Cùng với thiết bị này, Nikon D3200 có thể hỗ trợ tải lên hình ảnh trực tiếp, điều khiển từ xa hoặc chụp từ xa thông qua một ứng dụng miễn phí trên máy chạy Android (phiên bản 2.3 hoặc mới hơn). Riêng phiên bản dành cho hệ điều hành iOS sẽ sớm được giới thiệu vào cuối năm nay.Sau một số tin đồn, Nikon hôm nay chính thức ra mắt mẫu D3200 thuộc dòng entry-level dành cho người mới chơi. Mẫu máy này', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(54, 'Nikon D90 (Body+kit 18-105 VR) New 100%', 'D9013289269474f35d0e33eef0.jpg', 17724000, 'Camera ống kính rời mới nhất của Nikon cũng vừa ra mắt với cảm biến 12,3 megapixel, 11 điểm lấy nét, màn hình LCD 3 inch, đạt 4,5 khung hình/giây, chế độ quay video độ nét cao 1280 x 720 pixel, giá 1000 USD cho thân máy.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(55, 'Nikon D5100 + AFs 18-55mm VR New 100%', '11349148760506a605813211.jpg', 11717463, 'Nikon D5100 Nổi bật với màn hình đa góc ngắm, lật ngang linh hoạt kiểu mới, chế độ quay phim full-HD cùng với menu trực quan thân thiện dễ sử dụng với người dùng.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(56, 'Nikon D7000 + kit 18-105 VR new 100%', 'Nikon_D7000.png', 23948500, 'Nikon D7000 ra mắt . Phiên bản này thuộc khoảng giữa D90 và D300s.\r\nĐúng như các hình ảnh và một số cấu hình lộ diện, Nikon D7000 là bản nâng cấp cho D90 và D5000, đứng vào khoảng giữa D90 và D300s.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(57, 'Nikon D3000 (Body) mới 100% (Hàng chính hãng)', '33935_gea1303871337.jpg', 6203400, 'máy ảnh Nikon D3000 là hậu duệ của máy ảnh nikon D40 ra mắt 2 năm trước với cải tiến ở cảm biến APS-C 10,2 Megapixel, màn hình LCD 3 inch cùng dải ISO rộng. Thân máy Nikon D3000 đã được thiết kế lại, nhưng hình dáng và trọng lượng không khác mấy so với \"tiền bối\" D40 - kích cỡ 126 x 97 x 64 mm và nặng 485 gram so với D40 là 126 x 64 x 94 mm và 475g. Nikon D3000 cũng giữ lại phần lớn những nút điều khiển và các tùy chỉnh đã có ở máy ảnh nikon D40. Nút thay đổi chế độ phía trên đỉnh máy được thiết', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(58, 'Nikon D3100 + kit 18-55 VR mới 100%', '31189_D3100_n.jpg', 9199600, ' D3100 trang bị cảm biến ảnh CMOS 14.2 megapixels (D3000: cảm biến CCD, 10.2 megapixels), và công nghệ xử lý hình ảnh EXPEED 2 mới nhất của Nikon cho chất lượng hình ảnh vượt trội. Hỗ trợ dải nhạy sáng ISO cao 100-3200 (ở D3000: ISO 100-1600) và có thể mở rộng tối đa ở mức Hi 2 (tương đương với ISO 12800), điều này giúp máy ảnh có khả năng chụp hình tốt trong các điều kiện thiếu sáng (như cảnh đêm, trong nhà), hay khi chụp hình thể thao với các đội tượng di chuyển nhanh liên tục. ', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(59, 'Nikon D90 (Body+kit 18-105 VR) New 100% (Hàng Chín', '113477852455055921d7879a.jpg', 20256000, 'Nikon D90 là máy ảnh ống kính rời đầu tiên trên thế giới tích hợp chế độ quay video. Tin này có vẻ không đáng quan tâm đối với dân chuyên chụp DSLR nhưng có vẻ thích hợp với người không muốn mang theo máy quay hoặc máy ảnh số du lịch bên mình trong các chuyến dã ngoại.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(60, 'Nikon D5200 + Kit 18-55mm Mới 100% (Hàng Chính Hãn', 'Nikon_D5200_5 (1).jpg', 0, 'Nikon D5200 cung cấp các phụ bản lề màn hình đa góc giống như Nikon D5100 cho phép ngắm chụp linh hoạt từ bất kỳ góc độ, cao hay thấp, làm cho ngay cả những chân dung tự họa có thể. Đó là một mô hình nhập cảnh cấp đáp ứng nhu cầu của những người đam mê hình ảnh cho khả năng chụp ảnh quy mô đầy đủ với bộ cảm biến mới của Nikon CMOS định dạng DX với một số điểm ảnh hiệu quả của khoảng 24 triệu điểm ảnh cũng như tương đương với động cơ xử lý hình ảnh EXPEED 3 được xây dựng vào cao cấp Nikon D4, D80', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(61, 'Nikon D800E (Hàng chính hãng) Mới 100%', 'Nikon-D800.jpg', 69897970, 'Đúng như những tin đồn trước đây, Nikon hôm nay đã trình làng bộ đôi máy ảnh DSLR mới nhất của mình mang tên D800 và Nikon D800E thay thế D700 với cảm biến độ phân giải siêu lớn lên tới 36,3 Megapixel định dạng FX. Nikon cũng cho biết phiên bản đắt tiền hơn là D800E sẽ được loại bỏ bộ lọc chống răng cưa anti-aliasing (AA) và nhắm vào các nhiếp ảnh gia chuyên nghiệp sử dụng trong studio hoặc ảnh phong cảnh. Các thông số kỹ thuật còn lại của Nikon D800E không khác so với D800 bản thường.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(62, 'Nikon D3100 (Body only) mới 100%', '109256_83548.jpg', 7406100, ' D3100 trang bị cảm biến ảnh CMOS 14.2 megapixels (D3000: cảm biến CCD, 10.2 megapixels), và công nghệ xử lý hình ảnh EXPEED 2 mới nhất của Nikon cho chất lượng hình ảnh vượt trội. Hỗ trợ dải nhạy sáng ISO cao 100-3200 (ở D3000: ISO 100-1600) và có thể mở rộng tối đa ở mức Hi 2 (tương đương với ISO 12800), điều này giúp máy ảnh có khả năng chụp hình tốt trong các điều kiện thiếu sáng (như cảnh đêm, trong nhà), hay khi chụp hình thể thao với các đội tượng di chuyển nhanh liên tục.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(63, 'Nikon D3200 + kit 18-55 VR New 100% (Hàng Chính Hã', '32049_hung.jpg', 13904900, 'Điểm nổi bật nhất ở sản phẩm này chính là khả năng tương thích với bộ phụ kiện kết nối Wi-Fi là WU-1a. Cùng với thiết bị này, Nikon D3200 có thể hỗ trợ tải lên hình ảnh trực tiếp, điều khiển từ xa hoặc chụp từ xa thông qua một ứng dụng miễn phí trên máy chạy Android (phiên bản 2.3 hoặc mới hơn). Riêng phiên bản dành cho hệ điều hành iOS sẽ sớm được giới thiệu vào cuối năm nay.Sau một số tin đồn, Nikon hôm nay chính thức ra mắt mẫu D3200 thuộc dòng entry-level dành cho người mới chơi. Mẫu máy này', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(64, 'Nikon D400 (Body) Mới 100%', '109256_83548w.jpg', 0, 'Nikon D400 (Body) Mới 100%', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(65, 'Nikon D600 mới 100%', '33218_1868049013475369345051c826df8ca.jpg', 36081000, 'Máy FF nhỏ gọn Nikon D600 trình làng Sau ba năm rưỡi kể từ khi giới thiệu model D700, Nikon đã trình làng cặp đôi D800/ D800E với nhiều cải tiến độc đáo. Chiếc máy ảnh full-frame này cũng là máy DSLR FF đầu tiên và duy nhất cho đến nay có cảm biến khủng 36.3 megapixel. Tuy nhiên không dừng lại ở đó. Nikon lần đầu tiên đưa ra 1 mẫu máy FF nhỏ gọn, hướng đến thiết kế dòng máy cơ bản dễ sử dụng', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(66, 'Nikon D4 Mới 100% (Hàng chính Hãng)', 'D4_50_1.4_front34l-992x1024.jpg', 124949980, 'Tạp chi ảnh của Pháp là Réponses Photo tối qua bất ngờ cho đăng tải những hình ảnh chính thức của máy ảnh Nikon D4. Với hai trang viết về sản phẩm này bằng tiếng Pháp cho thấy các thông số mẫu máy DSLR mới của Nikon khá giống so với những tin đồn trước đây.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(67, 'Nikon D300s (Body) New 100%', 'nikon-d300s-body.jpg', 27008000, 'Nikon D300s được xây dựng trên thành công của D300, bổ sung thêm khả năng quay video HD 720p và khả năng chụp liên tiếp 7 hình mỗi giây. Nikon D300s là mẫu máy DSLR bán chuyên mới nhất của Nikon nhắm tới người dùng đam mê nhiếp ảnh và những người muốn nâng cấp từ phân khúc DSLR bình dân. Nikon D300s được xây dựng dựa trên thành công vang dội trước đó 2 năm của nikon D300.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(68, 'Nikon D3X Mới 100% (Hàng chính hãng)', '12.jpg', 168800000, 'DNikon D3x là mẫu DSLR cao cấp nhất của Nikon hiện nay, có giá bán dự kiến lên tới 8.000 USD cho thân máy. Máy được trang bị cảm biến có độ phân giải 24,5 Megapixel - cao nhất trên thị trường, cùng nhiều thông số \"khủng\" khác.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(69, 'Nikon D3s Body New 100% (Hàng chính hãng)', '4.jpg', 107399000, 'Chủ tịch Michio Kariya của tập đoàn Nikon vui mừng thông báo máy ảnh kỹ thuật số ống kính rời Nikon D3 vinh dự được nhận giải thưởng thiết kế Châu Á DFA 2009 ( 2009 Design for Asia Bronze Award).', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(70, 'Nikon D800 (Body Only) New 100%', '32942_113310265614f55da8107ec0.jpg', 55493000, 'Nikon D800 có Độ nhạy sáng ISO cao (100-6400), mở rộng lên đến 25600, sử dụng các thiết lập Hi2. Cho phép tốc độ màn trập nhanh cho hình ảnh mịn chi tiết hơn với tiếng ồn tối thiểu khi bạn chụp các các đối tượng chuyển động nhanh hoặc chụp ảnh trong điều kiện ánh sáng yếu.', 'Máy ảnh Nikon', 'Nikon', 'Máy ảnh'),
(71, 'Sony NEX-5R + 16-50mm Mới 100% (Hàng Chính Hãng)', 'Sony-Nex-5R-18-55.jpg', 16584600, 'Sonny Nex - 5R với Kết hợp một thiết kế, phong cách, trọng lượng nhẹ và tự do của ống kính hoán đổi cho nhau với chất lượng hình ảnh cảm biến lớn, tốc độ AF và giới thiệu những khả năng Wi-Fi, Sony NEX-5R máy ảnh hệ thống nhỏ gọn cung cấp tất cả các lợi ích của hình ảnh theo phong cách DSLR- một gói di động thuận tiện hơn với kết nối thêm.', 'Các loại máy ảnh khác', 'Sony', 'Máy ảnh'),
(72, 'Sony NEX 5N + Lens 18-55mm Mới 100%', '81784813327550654f703a795a97a.jpg', 11721050, 'Sony NEX-5N  sở hữu thân máy 23.3mm* gọn nhẹ, điều mà hầu hết các máy ảnh có thể thay đổi ống kính chỉ có thể mơ tưởng đến. Không dừng lại ở đó,  Sony NEX 5N còn được trang bị đầy đủ những chức năng tiên tiến của một máy ảnh DSLR chuyên nghiệp. Với trọng lượng chỉ đạt 210g – đây được xem là chiếc máy nhẹ nhất trong dòng sản phẩm này, Sony NEX 5N còn là người bạn đồng hành tuyệt vời mọi lúc mọi nơi. Thiết kế tối giản, thanh lịch cùng những chức năng tuyệt vời trên hẳn đã lý giải phần nào cho mơ ư', 'Các loại máy ảnh khác', 'Sony', 'Máy ảnh'),
(73, 'Olympus OM-D E-M5 + Lens 12-50 Mới 100%', 'Olympus_OM_M5_4.jpg', 29118000, 'Olympus OM-D E-M5 làm sống lại cả tên tuổi và hình ảnh của một dòng máy ảnh thành công trong quá khứ của công ty để thu hút cảm giác hoài cổ trong một model máy ảnh kỹ thuật số hiện đại.', 'Các loại máy ảnh khác', 'Khác', 'Máy ảnh'),
(74, 'Pentax K5 II + 18-55mm Mới 100% (Hàng chính hãng)', 'Pentax_K_5_II_18-55mm.jpg', 32916000, 'Pentax K-5 II sau thiết kế DSLR thông thường trong việc có một chế độ chụp quay số trên góc trên bên trái của máy ảnh, cho phép bạn chọn một trong hai chế độ nâng cao như độ mở ống kính ưu tiên, ưu tiên màn trập và hướng dẫn sử dụng, hoặc chế độ tự động và Chương trình point-and-shoot. Không có chế độ chụp cảnh trên máy ảnh này, báo hiệu ý định của mình như một công cụ chụp ảnh nghiêm trọng. Bạn ngay lập tức sẽ nhận thấy rằng K-5 II đã có một vài chế độ chụp khác thường mà bạn sẽ không phải nhìn', 'Các loại máy ảnh khác', 'Khác', 'Máy ảnh'),
(75, 'Pentax K5 II (Body) (Hàng chính hãng)', 'Pentax_K_5_II_body135513021550c5a567b0059.jpg', 25900250, 'Pentax K-5 II là một máy ảnh DSLR bán chuyên nghiệp mới, dựa trên thiết kế cùng một cơ thể như Pentax K-5 và các hình ảnh 16,3 megapixel cảm biến tương tự như  trong máy ảnh Nikon D7000 và Sony A55. Các tính năng chính bao gồm một mô-đun mới SAFOX X AF vẫn còn hoạt động xuống đến-3EV, một thuật toán AF nâng cấp, ISO khoảng 80-51.200, video Full HD 1080p ở 25fps, 7fps chụp liên tục, nâng cấp 11-điểm SAFOX IX + hệ thống AF với rộng hơn vùng phủ sóng và tốc độ nhanh hơn, cải thiện chế độ cao Dynami', 'Các loại máy ảnh khác', 'Khác', 'Máy ảnh'),
(76, 'Pentax K-30 (Body only)', '32442_32441_pentax-k-30-dslr-camera-0.jpg', 29880000, 'Máy không tăng độ nhạy sáng với sản phẩm của ba năm trước với mức ISO hỗ trợ là từ 100 đến 25.600 nhưng đã có thể quay video độ phân giải Full HD tốc độ 30 khung hình mỗi giây. Ngoài ra, Pentax K30 cũng có thể chụp liên tiếp tốc độ 6 hình mỗi giây.', 'Các loại máy ảnh khác', 'Khác', 'Máy ảnh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Permissions` varchar(10) NOT NULL,
  `Avatar` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `FullName`, `Email`, `Permissions`, `Avatar`, `Address`, `Phone`) VALUES
(15, 'admin', 'admin', 'Ngọc Huy Phạm', 'ngochuy@yahoo.com', 'admin', '', '391A Nam Kỳ Khởi Nghĩa, Quận 3,TP.HCM', 1998078087),
(16, 'huyptnps00863', '123456', 'Phạm Trương Ngọc Huy', 'ngochuypham@gmail.com', 'admin', '', '123 admin,Quận admin,TP.admin', 901987654),
(17, 'Guest01', 'abc', 'User Guest 01', 'guest01@yahoo.com', 'user', '', '456 user, Quận user,TP.user', 901654321),
(18, 'Guest02', 'lamgico', 'User Guest02', 'guest02@yahoo.com', 'user', '', '789 user, Quan user, TP.user', 909873210),
(19, 'admin', 'admin', 'Administrator', 'admin@gmail.com', 'admin', '', '123456 admin,Quận admin, TP.admin', 987654321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ContactID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `PKMA_ID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD UNIQUE KEY `Order_ID` (`OrderID`),
  ADD KEY `Order_ID_2` (`OrderID`),
  ADD KEY `User_ID` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `PKMA_Image` (`ProductImage`),
  ADD KEY `PKMA_Image_2` (`ProductImage`),
  ADD KEY `PKMA_Image_3` (`ProductImage`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ContactID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
