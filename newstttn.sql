-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 05:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newstttn`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `username`, `password`, `avatar`, `display_name`, `phone`, `create_at`, `update_at`) VALUES
(1, 'tiendat@gmail.com', '6df73cc169278dd6daab5fe7d6cacb1fed537131', './dist/img/avatar.png', 'Tiến Đạt', '0123456789', '2021-09-19 14:41:39', '2021-09-19 14:41:39'),
(2, 'linhchi@gmail.com', '6df73cc169278dd6daab5fe7d6cacb1fed537131', './dist/img/avatar.png', 'Linh Chi', '0123456789', '2021-09-19 14:41:39', '2021-09-19 14:41:39'),
(7, 'hoangdieu@gmail.com', '6df73cc169278dd6daab5fe7d6cacb1fed537131', './dist/img/avatar.png', 'Lương Văn Minh', '0987654321', '2021-09-25 21:20:05', '2021-09-25 21:20:05'),
(9, 'hdieu@gmail.com', '6df73cc169278dd6daab5fe7d6cacb1fed537131', './dist/img/avatar.png', 'Lương Minh', '098765432', '2021-09-25 21:30:24', '2021-09-25 22:35:56'),
(10, 'dieuhoang@gmail.com', '6df73cc169278dd6daab5fe7d6cacb1fed537131', './dist/img/avatar.png', 'Diệu Hoàng', '0987654321', '2021-09-26 20:34:39', '2021-09-26 20:37:01'),
(12, 'test@gmail.com', '6df73cc169278dd6daab5fe7d6cacb1fed537131', './dist/img/avatar.png', 'Test', '0987654321', '2021-09-27 13:16:06', '2021-09-27 13:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Thể thao', '2021-09-19 14:42:02', '2021-09-26 20:39:31'),
(4, 'Khoa học', '2021-09-25 20:04:24', '2021-09-25 20:04:36'),
(7, 'Xã hội', '2021-09-26 20:32:12', '2021-09-26 20:32:12'),
(8, 'Đời sống', '2021-09-26 20:32:26', '2021-09-26 20:32:26'),
(10, 'Bóng đá', '2021-09-26 20:39:46', '2021-09-26 20:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_news`, `email`, `content`, `create_at`, `update_at`) VALUES
(5, 5, 'test@gmail.com', 'test                                ', '2021-09-26 19:54:45', '2021-09-26 19:54:45'),
(6, 10, 'test1@gmail.com', '1. Bạn đừng bao giờ ghét những người hay đố kỵ với bạn. Hãy kính trọng sự đố kỵ đó, vì những người ấy chính là người nghĩ rằng bạn giỏi hơn họ.                                ', '2021-09-26 20:48:46', '2021-09-26 20:48:46'),
(7, 5, 'ht@gmail.com', 'Với phác đồ tiêm 2 liều tiêm tiêu chuẩn, được chứng minh an toàn và hiệu quả trong việc ngăn ngừa COVID-19, vắc xin AstraZeneca (Vương quốc Anh) đã được phê duyệt sử dụng khẩn cấp tại Việt Nam.                                ', '2021-09-26 21:28:37', '2021-09-26 21:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `banner_image` text NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `id_author`, `id_category`, `banner_image`, `title`, `content`, `create_at`, `update_at`) VALUES
(5, 10, 8, 'dist/img/banners/txvncovid.jpg', 'Dịch COVID-19: Mỹ, Nga có số ca nhiễm và tử vong cao nhất qua 24h giờ', '                                                                                                <h1><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Theo trang thống kê worldometers.info, tính đến 8h30 sáng 26/9, thế giới ghi nhận tổng cộng 232.248.399 ca bệnh COVID-19, trong đó có 4.756.524 ca tử vong.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">208.856.598 bệnh nhân đã bình phục và vẫn còn 18.635.277 bệnh nhân đang được điều trị.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Trong 24 giờ qua, toàn thế giới có thêm 379.729 ca mắc COVID-19 và 5.933 ca tử vong. Mỹ là nước có số ca mắc mới cao nhất thế giới, với 54.114 ca, trong khi Nga ghi nhận số ca tử vong cao nhất, với 822 trường hợp.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Tại châu Mỹ, Peru lần đầu tiên phát hiện ba trường hợp nhiễm biến thể Delta Plus. Một trong ba bệnh nhân là nhân viên y tế đã được tiêm vaccine ngừa COVID-19.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Nhằm tránh để xảy ra làn sóng lây nhiễm thứ ba, Peru đang đẩy mạnh chiến dịch tiêm vaccine ngừa&nbsp;<a href=\"https://www.vietnamplus.vn/tags/COVID-19.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">COVID-19</span></a>. Hiện nước này đã tiêm được khoảng gần 25 triệu liều vaccine.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Tại châu Á, Ấn Độ là nước có số ca mắc mới cao nhất trong khu vực, với 28.149 trường hợp nhiễm bệnh trong 24 giờ qua. Hiện quốc gia Nam Á này vẫn là nước chịu ảnh hưởng nặng nề bởi dịch bệnh lớn thứ hai trên thế giới, sau Mỹ, với 33.651.221 ca mắc, trong đó có 446.948 trường hợp không qua khỏi.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\"><span style=\"font-weight: bolder; font-size: 1.6rem; line-height: 2.6rem;\"><a href=\"https://www.vietnamplus.vn/vaccine-sinovac-hieu-qua-voi-nguoi-cao-tuoi-giam-nguy-co-benh-nang/743107.vnp\" rel=\"\" class=\"cms-relate\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\">[Vaccine Sinovac hiệu quả với người cao tuổi, giảm nguy cơ bệnh nặng]</a></span></p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Trong khi đó, Iran ghi nhận số&nbsp;<a href=\"https://www.vietnamplus.vn/tags/ca-t%e1%bb%ad-vong.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">ca tử vong</span></a>&nbsp;cao nhất khu vực, với 290 trường hợp, đưa số ca tử vong tại nước này lên 119.082 trong tổng số 5.519.728 ca mắc.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Trong 24 giờ qua, Singapore ghi nhận thêm 1.443 ca mắc mới, trong đó có 1.053 ca lây nhiễm trong cộng đồng, 371 người sống trong các khu nhà dành cho lao động nhập cư và 19 ca nhập cảnh.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Singapore là một trong những nước có tỷ lệ tiêm chủng cao trên thế giới. Tính đến ngày 24/9, 82% người dân quốc gia&nbsp;<a href=\"https://www.vietnamplus.vn/tags/%c4%90%c3%b4ng-Nam-%c3%81.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">Đông Nam Á</span></a>&nbsp;này đã được tiêm phòng đầy đủ.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Trong khi đó, bang Victoria đông dân của Australia cũng đã ghi nhận thêm 779 ca mắc, giảm nhẹ so với mức cao kỷ lục 847 ca của một ngày trước đó, song đây vẫn là mức cao thứ hai kể từ khi dịch bệnh bùng phát.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Nhằm góp phần thúc đẩy việc tiêm vaccine ngừa COVID-19 trên thế giới, Tổng thống Pháp Emmanuel Macron tuyên bố sẽ viện trợ 120 triệu liều vaccine ngừa COVID-19 cho các nước nghèo, gấp đôi cam kết trước đây.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Theo ông, thế giới vẫn đang chứng kiến sự bất bình đẳng về&nbsp;<a href=\"https://www.vietnamplus.vn/tags/vaccine-ng%e1%bb%aba-COVID-19.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">vaccine ngừa COVID-19</span></a>, rõ ràng tỷ lệ tiêm vaccine tại nhiều khu vực vẫn còn thấp. Tại châu Phi, mới chỉ có 3% dân số đã được tiêm vaccine ngừa COVID-19, do đó, thế giới cần đẩy nhanh chiến dịch này./.</p></h1>\r\n                                                                                        ', '2021-09-26 07:10:41', '2021-09-26 20:58:54'),
(10, 1, 7, 'dist/img/banners/photo4.jpg', 'Tăng cường duy trì hiện diện và thực thi pháp luật trên biển', '                                                                                                                                                <h1><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Với đường bờ biển dài hơn 3.260km, hơn 3.000 đảo lớn, nhỏ cùng với vùng đặc quyền kinh tế và thềm lục địa rộng lớn, biển đảo đã mang lại nguồn lợi đóng góp to lớn vào sự phát triển kinh tế của Việt Nam.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Ở một khía cạnh khác, đây cũng là mối nguy cơ của việc gia tăng tình hình vi phạm, tội phạm trên biển.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\"><span style=\"font-weight: bolder; font-size: 1.6rem; line-height: 2.6rem;\"><a href=\"https://www.vietnamplus.vn/luat-canh-sat-bien-viet-nam-chia-khoa-de-giu-gin-bien-dao-to-quoc/737032.vnp\" rel=\"\" class=\"cms-relate\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\">[Luật Cảnh sát biển Việt Nam: Chìa khóa để giữ gìn biển đảo Tổ quốc]</a></span></p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Từ khi Luật <a href=\"https://www.vietnamplus.vn/tags/c%e1%ba%a3nh-s%c3%a1t-bi%e1%bb%83n.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">Cảnh sát biển</span></a> Việt Nam có hiệu lực thi hành, lực lượng Cảnh sát biển Việt Nam đã tăng cường duy trì sự hiện diện và thực thi pháp luật trên biển hiệu quả, góp phần bảo vệ vững chắc chủ quyền, an ninh, trật tự, an toàn cho các vùng <a href=\"https://www.vietnamplus.vn/tags/bi%e1%bb%83n-%c4%91%e1%ba%a3o.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">biển đảo</span></a> của <a href=\"https://www.vietnamplus.vn/tags/T%e1%bb%95-qu%e1%bb%91c.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">Tổ quốc</span></a>./.</p><p style=\"margin-bottom: 15px; font-size: 16px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\"><img style=\"width: 680px;\" src=\"/demo_news/admin/dist/img/contents/bien_dao1.jpg\" data-filename=\"filename\"><br></p></h1>\r\n                                                                                                                                    ', '2021-09-26 08:17:48', '2021-09-28 23:03:09'),
(15, 9, 10, 'dist/img/banners/football.jpg', 'Salah cán mốc lịch sử trong ngày Liverpool hòa đội bóng tân binh', '<p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Mohamed Salah tiếp tục thi đấu ấn tượng và đóng góp một bàn thắng vào lưới&nbsp;Brentford ở vòng 6 Premier League.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Cụ thể với bàn thắng vào lưới&nbsp;<a href=\"https://www.vietnamplus.vn/tags/Brentford.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">Brentford</span></a>, tiền đạo người Ai Cập đã đi vào lịch sử khi cán cột mốc ghi 100 bàn cho Liverpool tại đấu trường Premier League, sau 151 lần ra sân.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Trong lịch sử đội bóng, không có cầu thủ nào khoác áo Liverpool làm được điều này với số trận ít như Salah.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Tuy nhiên, niềm vui của Salah không trọn vẹn khi Liverpool để cho đội bóng tân binh Brentford cầm hòa 3-3 sau màn rượt đuổi tỷ số vô cùng hấp dẫn.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\"><span style=\"font-weight: bolder; font-size: 1.6rem; line-height: 2.6rem;\"><a href=\"https://www.vietnamplus.vn/premier-league-man-city-ha-chelsea-mu-bai-tran-tren-san-nha/743106.vnp\" rel=\"\" class=\"cms-relate\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\">[Premier League: Man City hạ Chelsea, M.U bại trận trên sân nhà]</a></span></p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Tại&nbsp;Brentford Community, Brentford bất ngờ vươn lên dẫn trước 1-0 ở phút 27 sau pha dứt điểm của Toney. Tuy nhiên, lợi thế đó chỉ tồn tại trong ít phút trước khi Dioo Jota bật cao đánh đầu tung lưới Brentford, gỡ hòa 1-1 cho Liverpool.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\"><img src=\"/demo_news/admin/dist/img/contents/liverpool2609.jpg\" style=\"width: 620px;\" data-filename=\"filename\"></p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Sang hiệp 2,&nbsp;<a href=\"https://www.vietnamplus.vn/tags/Mohamed-Salah.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">Mohamed Salah</span></a>&nbsp;và&nbsp;Curtis Jones hai lần đưa The Kop vươn lên dẫn trước, nhưng họ đã không bảo vệ được thành quả khi để&nbsp;Janelt và Wissa thay nhau lập công gỡ hòa 3-3 cho đội chủ nhà.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Chỉ giành được 1 điểm trước&nbsp;Brentford,&nbsp;<a href=\"https://www.vietnamplus.vn/tags/Liverpool.vnp\" style=\"text-decoration-line: underline; color: rgb(19, 63, 106); transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">Liverpool</span></a>&nbsp;vươn lên bảng xếp hạng Premier League với 14 điểm, nhiều hơn các đội bóng cạnh tranh là Manchester City, Chelsea và Manchester United 1 điểm.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Trong khi đó, Brentford có trong tay 9 điểm sau 6 trận đã đấu, tạm đứng ở vị trí thứ 9 trên bảng xếp hạng.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: bolder; line-height: 2.6rem; background-color: rgb(255, 231, 206);\"><font color=\"#000000\" style=\"\">Kết quả vòng 6 Premier League</font></span></p><p style=\"margin-bottom: 15px; line-height: 2.6rem; font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: bolder; line-height: 2.6rem;\"><font color=\"#000000\" style=\"background-color: rgb(255, 231, 206);\"><span style=\"font-weight: 400;\">Brentford - Liverpool 3-3</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Everton - Norwich City 2-0</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Leeds United - West Ham1-2</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Leicester City - Burnley 2-2</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Watford - Newcastle1-1</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Chelsea - Manchester City 0-1</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Manchester United - Aston Villa 0-1</span></font><br></span><br></p>                                                                                                                                                <p>                                                </p><h1></h1><p></p>                                                                                                                                    ', '2021-09-26 08:46:43', '2021-09-26 21:13:56'),
(17, 1, 1, 'dist/img/banners/photo4.jpg', 'Cần thiết công nhận ', '                                                                                                <h1 style=\"text-align: center; \"><u>Heading Of Message</u></h1>\r\n                                                <ol><li>Subheading</li></ol>\r\n                                                <p style=\"text-align: justify; \">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain\r\n                                                    was born and I will give you a complete account of the system, and expound the actual teachings\r\n                                                    of the great explorer of the truth, the master-builder of human happiness. No one rejects,\r\n                                                    dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know\r\n                                                    how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again\r\n                                                    is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,\r\n                                                    but because occasionally circumstances occur in which toil and pain can procure him some great\r\n                                                    pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,\r\n                                                    except to obtain some advantage from it? But who has any right to find fault with a man who\r\n                                                    chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that\r\n                                                    produces no resultant pleasure? On the other hand, we denounce with righteous indignation and\r\n                                                    dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so\r\n                                                    blinded by desire, that they cannot foresee</p>\r\n                                                <ul>\r\n                                                    <li>List item one</li>\r\n                                                    <li>List item two</li>\r\n                                                    <li>List item three</li>\r\n                                                    <li>List item four</li></ul><p><b><u>Table:</u></b></p><table class=\"table table-bordered\"><tbody><tr><td>header 1</td><td>header 2</td></tr><tr><td>value 1</td><td>value 2</td></tr></tbody></table><p><b><u>Ảnh</u></b></p><p><img style=\"width: 813px;\" src=\"/demo_news/admin/dist/img/contents/login-bg.jpg\" data-filename=\"filename\"></p><p>thêm 1 ảnh nữa nè</p><p><img style=\"width: 813px;\" src=\"/demo_news/admin/dist/img/contents/photo4.jpg\" data-filename=\"filename\"><b><u><br></u></b></p><ul>\r\n                                                </ul>\r\n                                                <p>Thank you,</p>\r\n                                                <p>John Doe</p>\r\n                                                                                        ', '2021-09-26 15:54:08', '2021-09-28 23:01:25'),
(18, 2, 7, 'dist/img/banners/toanhacaoochanoi.jpg', 'Cá nhân, doanh nghiệp bị ảnh hưởng Covid-19 được giảm 30% tiền thuê đất', '                                                                                                                                                                                                <h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; font-family: inherit; font-weight: inherit; display: inline; font-size: inherit; line-height: inherit; color: inherit;\">Thủ tướng Chính phủ vừa ban hành Quyết định số 27 về việc giảm tiền thuê đất của năm 2021 cho tổ chức, đơn vị, doanh nghiệp, hộ gia đình, cá nhân bị ảnh hưởng bởi dịch Covid-19. update</h2><h1 class=\"dt-news__title\" style=\"margin-bottom: 12px; font-family: \" noto=\"\" serif\",=\"\" serif;=\"\" font-weight:=\"\" 600;=\"\" font-size:=\"\" 32px;=\"\" line-height:=\"\" 40px;=\"\" color:=\"\" rgb(22,=\"\" 22,=\"\" 22);\"=\"\"><div class=\"dt-news__sapo\" style=\"font-weight: 400; margin-bottom: 24px; font-size: 17px; line-height: 1.6;\"></div><div class=\"dt-news__content\" style=\"font-size: 17px; line-height: 1.6; font-weight: 400;\"><p style=\"margin-bottom: 24px;\">Đối tượng áp dụng là tổ chức, đơn vị, doanh nghiệp, hộ gia đình, cá nhân đang được Nhà nước cho thuê đất trực tiếp theo quyết định hoặc hợp đồng của cơ quan nhà nước có thẩm quyền dưới hình thức trả tiền thuê đất hàng năm (người thuê đất).</p><p style=\"margin-bottom: 24px;\">Quy định này áp dụng cho cả trường hợp người thuê đất không thuộc đối tượng miễn, giảm tiền thuê đất và trường hợp người thuê đất đang được giảm tiền thuê đất theo quy định của pháp luật về đất đai và pháp luật khác có liên quan.</p><p style=\"margin-bottom: 24px;\"><img src=\"/demo_news/admin/dist/img/contents/toanhacaoochanoi.jpg\" style=\"width: 660px;\" data-filename=\"filename\"></p><p style=\"margin-bottom: 24px;\"><img src=\"/demo_news/admin/dist/img/contents/hoa-nghe-tayafghanistanafp-1632798295462.jpg\" style=\"width: 660px;\" data-filename=\"filename\"><br></p><p style=\"margin-bottom: 24px;\">Quyết định quy định giảm 30% tiền thuê đất phải nộp của năm 2021 đối với người thuê đất quy định ở trên; không thực hiện giảm trên số tiền thuê đất còn nợ của các năm trước năm 2021 và tiền chậm nộp (nếu có).</p><p style=\"margin-bottom: 24px;\">Mức giảm tiền thuê đất quy định ở trên được tính trên số tiền thuê đất phải nộp của năm 2021 theo quy định của pháp luật. Trường hợp người thuê đất đang được giảm tiền thuê đất theo quy định thì mức giảm 30% tiền thuê đất được tính trên số tiền thuê đất phải nộp sau khi đã được giảm theo quy định của pháp luật.</p><p style=\"margin-bottom: 24px;\"><span style=\"font-weight: 600;\">Trình tự, thủ tục giảm tiền thuê đất</span></p><p style=\"margin-bottom: 24px;\">Người thuê đất nộp một bộ hồ sơ đề nghị giảm tiền thuê đất (bằng phương thức điện tử hoặc phương thức khác) cho cơ quan thuế, Ban Quản lý Khu kinh tế, Ban Quản lý Khu công nghệ cao, cơ quan khác theo quy định của pháp luật kể từ ngày 25/9/2021 đến hết ngày 31/12/2021; trường hợp nộp hồ sơ từ ngày 1/1/2022 trở về sau thì không được giảm tiền thuê đất theo quy định.</p><p style=\"margin-bottom: 24px;\">Căn cứ hồ sơ giảm tiền thuê đất do người thuê đất nộp theo quy định; không quá 30 ngày kể từ ngày nhận đủ hồ sơ hợp lệ theo quy định, cơ quan có thẩm quyền xác định số tiền thuê đất được giảm và ban hành quyết định giảm tiền thuê đất theo quy định tại pháp luật về thu tiền thuê đất.</p><p style=\"margin-bottom: 24px;\">Trường hợp người thuê đất đã được cơ quan có thẩm quyền quyết định giảm tiền thuê đất theo quy định của quyết định này nhưng sau đó cơ quan quản lý nhà nước phát hiện qua thanh tra, kiểm tra việc người thuê đất không thuộc trường hợp được giảm tiền thuê đất theo quy định thì người thuê đất phải hoàn trả ngân sách nhà nước số tiền thuê đất đã được giảm và tiền chậm nộp tính trên số tiền được giảm theo quy định của pháp luật về quản lý thuế.</p><p style=\"margin-bottom: 24px;\">Trường hợp người thuê đất đã nộp tiền thuê đất của năm 2021 mà sau khi cơ quan có thẩm quyền xác định và quyết định giảm tiền thuê đất có phát sinh thừa tiền thuê đất thì được trừ số tiền đã nộp thừa vào tiền thuê đất của kỳ sau hoặc năm tiếp theo quy định của pháp luật về quản lý thuế và pháp luật khác có liên quan; trường hợp không còn kỳ phải nộp tiền thuê đất tiếp theo thì thực hiện bù trừ hoặc hoàn trả số tiền nộp thừa theo quy định của pháp luật về quản lý thuế và pháp luật khác có liên quan.</p></div></h1>\r\n                                                                                                                                                                                ', '2021-09-28 09:19:12', '2021-09-29 16:01:00'),
(19, 2, 10, 'dist/img/banners/hoa-nghe-tayafghanistanafp-1632798295462.jpg', 'Nữ chủ nhân \"kho vàng đỏ\" của Afghanistan thách thức Taliban', '                                                <p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\"><img src=\"http://localhost/demo_news/admin/dist/img/contents/liverpool2609.jpg\" data-filename=\"filename\" style=\"font-size: 1rem; width: 620px;\"><br></p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Sang hiệp 2,&nbsp;<a href=\"https://www.vietnamplus.vn/tags/Mohamed-Salah.vnp\" style=\"color: rgb(19, 63, 106); text-decoration-line: underline; transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">Mohamed Salah</span></a>&nbsp;và&nbsp;Curtis Jones hai lần đưa The Kop vươn lên dẫn trước, nhưng họ đã không bảo vệ được thành quả khi để&nbsp;Janelt và Wissa thay nhau lập công gỡ hòa 3-3 cho đội chủ nhà.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Chỉ giành được 1 điểm trước&nbsp;Brentford,&nbsp;<a href=\"https://www.vietnamplus.vn/tags/Liverpool.vnp\" style=\"color: rgb(19, 63, 106); text-decoration-line: underline; transition: all 0.2s ease-out 0s; display: inline; font-size: 1.6rem; line-height: 2.6rem;\"><span style=\"font-size: 1.6rem; line-height: 2.6rem;\">Liverpool</span></a>&nbsp;vươn lên bảng xếp hạng Premier League với 14 điểm, nhiều hơn các đội bóng cạnh tranh là Manchester City, Chelsea và Manchester United 1 điểm.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; color: rgb(51, 51, 51); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(247, 247, 247);\">Trong khi đó, Brentford có trong tay 9 điểm sau 6 trận đã đấu, tạm đứng ở vị trí thứ 9 trên bảng xếp hạng.</p><p style=\"margin-bottom: 15px; line-height: 2.6rem; font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: bolder; line-height: 2.6rem; background-color: rgb(255, 231, 206);\"><font color=\"#000000\">Kết quả vòng 6 Premier League</font></span></p><p style=\"margin-bottom: 15px; line-height: 2.6rem; font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: bolder; line-height: 2.6rem;\"><font color=\"#000000\" style=\"background-color: rgb(255, 231, 206);\"><span style=\"font-weight: 400;\">Brentford - Liverpool 3-3</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Everton - Norwich City 2-0</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Leeds United - West Ham1-2</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Leicester City - Burnley 2-2</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Watford - Newcastle1-1</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Chelsea - Manchester City 0-1</span><br style=\"line-height: 2.6rem; font-weight: 400;\"><span style=\"font-weight: 400;\">Manchester United - Aston Villa 0-1</span></font><br></span></p>\r\n                                            ', '2021-09-29 03:01:07', '2021-09-29 03:01:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
