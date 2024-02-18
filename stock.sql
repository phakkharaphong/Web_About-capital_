-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 04:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `id_admin` int(10) UNSIGNED ZEROFILL NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `adf_name` varchar(255) NOT NULL,
  `adl_name` varchar(255) NOT NULL,
  `ad_email` varchar(100) NOT NULL,
  `ad_phone` int(10) NOT NULL,
  `salary` float NOT NULL,
  `position` varchar(50) NOT NULL COMMENT 'ตำแหน่ง',
  `ad_birthday` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`id_admin`, `admin_username`, `admin_password`, `adf_name`, `adl_name`, `ad_email`, `ad_phone`, `salary`, `position`, `ad_birthday`) VALUES
(0000000003, 'phakkhara123', '112233', 'phakkharaphong', 'charoenphon', 'tyuoiuyt77@gmail.com', 994701286, 150000, 'หัวหน้าใหญ่', '2023-03-15 19:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'ลำดับที่',
  `order_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `p_id` varchar(11) NOT NULL COMMENT 'รหัสสินค้า',
  `orderPrice` float NOT NULL COMMENT 'ราคาสินค้า',
  `orderQty` int(11) NOT NULL COMMENT 'จำนวน',
  `Total` float NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `p_id`, `orderPrice`, `orderQty`, `Total`) VALUES
(99, 0000000071, '', 190, 0, 0),
(100, 0000000071, '', 190, 0, 0),
(101, 0000000071, '', 190, 0, 0),
(102, 0000000071, '', 190, 0, 0),
(103, 0000000071, '', 190, 0, 0),
(104, 0000000071, '', 190, 0, 0),
(105, 0000000072, '', 50, 0, 45),
(106, 0000000072, 'P06', 50, 1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `order_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'id ออเดอร์ลูกค้า',
  `id_user` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL COMMENT 'ชื่อจริง',
  `l_name` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `number_phone` int(10) NOT NULL,
  `address` text NOT NULL COMMENT 'ที่อยู่',
  `total_price` float NOT NULL COMMENT 'ราคารวม',
  `order_status` varchar(1) NOT NULL COMMENT 'สถานะ',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`order_id`, `id_user`, `f_name`, `l_name`, `number_phone`, `address`, `total_price`, `order_status`, `reg_date`) VALUES
(0000000071, 31, 'นาย ภัครพงศ์', 'เจริญผล', 994701286, 'บ้านกุดขอนแก่น บ้านเลขที่ 162 ตำบล. กุดขอนแก่น อำเภอ.ภูเวียง จังหวัด.ขอนแก่น', 0, '1', '2023-03-21 15:25:57'),
(0000000072, 31, 'นาย ภัครพงศ์', 'เจริญผล', 994701286, 'บ้านกุดขอนแก่น บ้านเลขที่ 162 ตำบล. กุดขอนแก่น อำเภอ.ภูเวียง จังหวัด.ขอนแก่น', 45, '1', '2023-03-21 15:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_money` double NOT NULL COMMENT 'จำนวนเงิน',
  `order_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `pay_date` date NOT NULL COMMENT 'วันที่ชำระ',
  `pay_time` time NOT NULL COMMENT 'เวลาชำระ',
  `pay_image` varchar(255) NOT NULL COMMENT 'รูปสลีป'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_money`, `order_id`, `pay_date`, `pay_time`, `pay_image`) VALUES
(7200, 0000000052, '2023-03-21', '16:08:00', 'b_641814513345e.png'),
(7200, 0000000053, '2023-03-23', '18:08:00', 'b_6418138fd305f.png'),
(495.45, 0000000058, '2023-03-21', '16:32:00', 'b_641979d38403d.png'),
(90, 0000000063, '2023-03-22', '18:00:00', 'b_64198de01e83e.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` varchar(11) NOT NULL COMMENT 'รหัสสินค้า',
  `p_name` varchar(255) NOT NULL COMMENT 'ชื่อสินค้า',
  `des` varchar(1000) NOT NULL COMMENT 'รายละเอียดสินค้า',
  `price` int(11) NOT NULL COMMENT 'ราคาสินค้า',
  `type_id` varchar(11) NOT NULL COMMENT 'FK',
  `amount` int(11) NOT NULL COMMENT 'จำนวนสินค้า',
  `p_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `des`, `price`, `type_id`, `amount`, `p_img`) VALUES
('P01', '   แมวยิ้มง่ายใช่ว่าแตกสลายไม่เป็น บทสนทนาว่าด้วยรอยขีดข่วนของยุคสมัย', 'แมวยิ้มง่ายใช่ว่าแตกสลายไม่เป็น บทสนทนาว่าด้วยรอยขีดข่วนของยุคสมัย แมวยิ้มง่ายใช่ว่าแตกสลายไม่เป็น บทสนทนาว่าด้วยรอยขีดข่วนของยุคสมัย ขอให้ได้เจอคนที่แอปพริซิเอทในตัวคุณ คนที่อยู่ด้วยแล้วไม่ต้องพรีเซนต์ตัวตนเยอะๆคนที่เพียงนั่งเงียบๆ แต่ไม่รู้สึกอึดอัด ไม่ต้องพยายามทำให้เขาสนุกเพื่อ', 295, 'T004', 17, 'b_641968bf44c51.png'),
('P02', '  แล้วเราจะเป็นตัวเองในแบบที่ดีขึ้น', 'แล้วเราจะเป็นตัวเองในแบบที่ดีขึ้น หากเรารู้แล้วว่า ทุกเรื่องในชีวิตมีบทเรียน แล้วเราเริ่มที่จะมองหา และเติบโตจากทุกบทเรียนในชีวิต', 285, 'T004', 43, 'b_641968cb2b269.png'),
('P03', ' ร้านกล่องดนตรีที่เสียงเพลงไม่เคยหลับใหล', 'นวนิยายอบอุ่นที่จะทำให้คุณไม่หลงลืมสิ่งสำคัญในหัวใจ ว่าด้วยเรื่องราวของผู้คนที่ได้รับการเยียวยาจากเสียงดนตรีที่ดังอยู่ในหัวใจของพวกเขา ณ ร้านขายกล่องดนตรีที่เงียบเชียบแห่งหนึ่งในเมืองเล็ก ๆ ทางภาคเหนือ เจ้าของร้านหนุ่มอ้างว่า เขาสามารถฟังเสียงเพลงที่ดังอยู่ในหัวใจของลูกค้าได้', 265, 'T004', 19, 'b_641968d862123.png'),
('P04', ' ร้านไม่สะดวกซื้อของคุณทกโก', '', 295, 'T004', 15, 'b_641968e543704.png'),
('P05', ' ยอดนักสืบจิ๋ว โคนัน ภาคเดอะมูฟวี่ ศึกชิงอัญมณีสีคราม เล่ม 1', 'ยอดนักสืบจิ๋ว โคนัน ภาคเดอะมูฟวี่ ศึกชิงอัญมณีสีคราม เล่ม 1 จอมโจรคิดใช้วิธีที่เหลือเชื่อบังคับพาโคนันไปสิงคโปร์! จุดประสงค์เพื่อบิ๊กจิวเวลรี่ ', 75, 'T01', 9, 'b_641968ec5ec11.png'),
('P06', '   BLUE LOCK ขังดวลแข้ง เล่ม 5', 'เรียนรู้ตัวเองและ “ปลุกให้ตื่นขึ้น” ซะ! ศึกปะทะกับทีม V อันดุเดือดรู้ผลแล้ว!! ทีม Z ไล่ตามตีเสมอทีม V ซึ่งแสดงประสิทธิภาพในการทําประตูของนางิ ผู้มีพรสวรรค์เหลือล้นออกมาได้ทันที่สกอร์ 3 ต่อ 3 ในนาทีที่ 15 ของครึ่งหลัง เหล่าผู้เล่นเริ่มถูก “ปลุกให้ตื่น” และค้นพบสไตล์การเล่นของตัวเองอีกครั้ง อิซางิเข้าใจความ “เปล่าประโยชน์” ที่ซ่อนอยู่ในสไตล์การเล่นของตัวเอง', 50, 'T001', 12, 'b_641968f8621f3.png'),
('P07', ' ผ่าพิภพไททัน เล่ม 34 (เล่มจบ)', '[แผ่นดินสะเทือน] ได้เหยียบย่ำทำลายดินแดนต่างๆ นอกจากเกาะพาราดี้ และได้แย่งชิงชีวิตของผู้คนไป ขณะเดียวกันอาร์มินกับพวกมิคาสะก็ได้รู้พื้นที่เป้าหมายในการโจมตีของเอเลนแล้ว ถึงแม้จะต้องเอาชีวิตของศัตรู สูญเสียพันธมิตร และเพื่อนพ้องไป แต่ในที่สุดก็ไล่ตามเอเลนจนทัน…', 75, 'T001', 34, 'b_641968feca979.png'),
('P08', ' MY HOME HERO เล่ม 12', 'การที่เท็ตสึโอะตัดสินใจบุกมาที่หมู่บ้านของคะเซ็น โดยพาเรย์กะมาด้วย กลับกลายเป็นการตัดสินใจที่ผิดพลาดมหันต์ นอกจากพวกเขาทั้ง 3 คนจะถูกจับแยกกันแล้ว เรย์กะยังถูกวางตัวให้เป็นผู้สืบทอดโอะกะมิเมะคนต่อไป ตามแผนการของโกอิจิโร่ ศาสดาประจำหมู่บ้าน!! นอกจากครอบครัวเท็ตสึโอะที่เดินทางมายังหมู่บ้านแล้ว ยังมีโอะซาวะอีกคนที่แอบลอบเข้ามาเคลื่อนไหวอย่างลับๆ โดยมีเป้าหมายสำคัญคือการฆ่าคุโบะเพื่อล้างแค้น!!', 69, 'T001', 28, 'b_6419690a530ba.png'),
('P09', '  ปานหยาดน้ำผึ้ง MILK AND HONEY', '', 279, 'T033', 15, 'b_6419698648820.png'),
('P10', ' กวีนิพนธ์ หิ่งห้อย', 'หิ่งห้อย นับเป็นหนังสืออมตะเล่มหนึ่ง ในบรรดาผลงานของท่าน รพินทรนาถ ฐากูร จัดพิมพ์ 2 ภาษา ในเล่มเดียวกัน คือ ภาษาอังกฤษอันเป็นต้นฉบับ และภาษาไทย เพื่อผู้อ่านที่สนใจ จะเทียบเคียงต้นฉบับเดิมก็สามารถทำได้โดยสะดวก อีกทั้งจะ เอื้อต่อการศึกษาผลงานมหากวีท่านนี้ให้ลึกซึ้งยิ่งขึ้น ซึ่งเท่ากับเปิดทางแก่ผู้สนใจศึกษา ไม่เพียงด้านปรัชญานิพนธ์เท่านั้น แต่ยังสามารถศึกษาด้านอักษรศาสตร์ วัฒนธรรม ศาสนา และปรัชญาอีกด้วย', 397, 'T003', 58, 'b_641969a03a45a.png'),
('P11', 'Rubaiyat : รุไบยาท', 'เป็นบทกวีภาษาเปอร์เซียที่ไพเราะ การเปรียบเปรยศาสนาของผู้นับถือในยุคสมัยนั้น การเชิญชวนมนุษย์ทั้งหลายให้รีบหาความสนุกและความสบายต่าง ๆ บนโลก ด้วยการเสพสุขที่มีทั้งรูป รส กลิ่น เสียง และสัมผัส', 152, 'T003', 33, 'b_6418508438326.png'),
('P12', 'Anatomy of My Mind', 'หนังสือรวมบทแปลกวีนิพนธ์และร้อยแก้วคัดเลือกที่มีอิทธิพลต่อความรู้สึกของผู้แปล ผู้เขียน และนักเรียนวรรณกรรมอย่าง Darlper รวบรวมผลงานจากหลากหลายนักเขียน กวี และศิลปินที่มีชื่อเสียงในยุคก่อน', 190, 'T003', 66, 'b_641850a72e4db.png'),
('P13', ' ที่จริงวันนี้ก็ดีนะ', 'แม้ไร้ซึ่งแสงสว่างหรือเสียงใดๆ แต่ร่างกายยังคงรับรู้ได้ มันบอกฉันว่าอย่าเพิ่งยอมแพ้…เรื่องราวเปี่ยมแรงบันดาลใจของคูคย็องซอน นักวาดภาพผู้สูญเสียการได้ยินและกำลังสูญเสียการมองเห็น เพราะเธอไม่มีโอกาสได้ยินเสียงใด ๆ บนโลกนี้ เธอจึงวาด “เบนนี่” กระต่ายน้อยขนปุยหูกางยาวใหญ่ ที่จะคอยรับฟังและบอกเล่าเรื่องราวดีๆ ในแต่ละวันมากมายแทนตัวเธอ ผ่านรูปวาดลายเส้นน่ารักสีสันสวยงามที่ถ่ายทอดเหตุการณ์และความรู้สึกออกมาได้อย่างชัดเจน', 260, 'T005', 20, 'b_64196a0c4a7fe.png'),
('P14', 'ที่ผ่านมา มนุษย์ไม่เคยไร้หัวใจ', 'ผลงานชิ้นเยี่ยมของ รุตเกอร์ เบรกแมน นักประวัติศาสตร์รุ่นใหม่ที่ได้รับการยกย่อง จาก The Guardian ว่าเป็นผู้นำทางความคิดรุ่นใหม่แห่งเนเธอร์แลนด์ และได้รับ การยกย่องจาก TED Talks ว่าเป็นหนึ่งในนักคิดรุ่นใหม่ที่น่าจับตามองของยุโรป', 475, 'T005', 8, 'b_6418517120908.png'),
('P15', '24 ชั่วโมงที่ดีเริ่มตั้งแต่นาทีแรกที่คุณตื่น', 'เคล็ดลับทางจิตวิทยาที่จะช่วยให้คุณได้พบเจอกับสิ่งดี ๆ ไปตลอดทั้งวันวันนี้จะเจอกับเรื่องดีหรือเรื่องร้าย? หลายคนคิดว่านั่นเป็นเรื่องของโชคชะตา...เป็นเรื่องที่เราไม่สามารถควบคุมได้ หารู้ไม่ว่าจริง ๆ แล้วเราสามารถ “ควบคุม” สิ่งที่จะเกิดขึ้นกับชีวิตของเราได้อย่างง่ายดาย... ตั้งแต่นาทีแรกที่เราตื่นขึ้นมาในตอนเช้า', 240, 'T005', 26, 'b_641851b574f8c.png'),
('P16', 'อย่าปล่อยให้อารมณ์ทำร้ายคุณ', 'ผลงานเล่มใหม่ของ ปรมาจารย์เหมียวเทพกระบี่ ผู้เขียนเรื่อง คนเก่งจริงจะไม่พ่ายแพ้ต่ออารมณ์ ที่มียอดขายทะลุ 1 ล้านเล่มที่ประเทศจีน... คนส่วนใหญ่ที่ล้มเหลวไม่ได้เกิดจากเพราะว่าพวกเขาขี้เกียจหากแต่เกิดจากการที่พวกเขาควบคุมอารมณ์ของตัวเองได้ไม่ดีพอ', 250, 'T005', 14, 'b_641851ec9fa0a.png'),
('P17', 'BIOLOGY ชีววิทยา (ปลาหมึก)', 'วิชาชีววิทยาจัดเป็นวิทยาศาสตร์สาขาหนึ่งที่เป็นพื้นฐานที่สำคัญสำหรับนักเรียนในระดับชั้นมัธยมศึกษา รวมไปถึงนิสิตนักศึกษาในสาขาวิทยาศาสตร์ประยุกต์ เช่น แพทย์ ทันตแพทย์ เภสัชศาสตร์ อย่างไรก็ตามตำราชีววิทยาที่เป็นภาษาไทยนั้นมีอยู่จำนวนน้อยในท้องตลาด และโดยทั่วไปมักเป็นตำราที่ลงลึกไปในแต่ละสาขาวิชาเฉพาะทาง นักเรียนและนักศึกษาจึงหาจึงหาตำราวิชาชีววิทยาที่มีเนื้อหาถูกต้อง ครอบคลุมทุกหัวข้อ และสามารถใช้้เป็นหลักอ้างอิงได้ค่อยข้างลำบาก ทางผู้เขียนตระหนักถึงปัญหานี้จึงได้ทำการรวบรวมจากประสบการณ์การเรียนการสอนในการตำรา Biology เล่มนี้ขึ้นมา เพื่อให้นักเรียน นักศึกษามีตำราที่สามารถใช้เป็นแหล่งอ้างอิง และใช้ตำราเพื่อการอ่านเตรียมความพร้อมในระดับการสอบเข้ามหาวิทยาลัย และการเรียนวิชาวิทยาพื้นฐานในระดับชั้นปีที่ 1 ได้ นอกจากนี้ตำราเล่มนี้ยังสามารถใช้เป็นตำราให้ครูผู้สอนนำไปใช้ในการอ้างอิงเนื้อหาและข้อมูลที่ถูกต้องสำหรับการสอนในห้องเรียนได้', 590, 'T006', 64, 'b_641852394f27b.png'),
('P18', ' ตะลุยโจทย์ VOCAB 1,000 ข้อ', 'ท้าทาย พิชิตศัพท์ ทุกแนวโจทย์!', 179, 'T006', 51, 'b_641969ad976a4.png'),
('P19', 'VACCINE+สุดยอดข้อสอบคณิตศาสตร์ดีๆ เพื่อเสริมภูมิคุ้มกันให้แข็งแรงก่อนเดินเข้าห้องสอบ', 'VACCINE+ สุดยอดข้อสอบคณิตศาสตร์ดีๆ เพื่อเสริมภูมิคุ้มกันให้แข็งแรงก่อนเดินเข้าห้องสอบ หนังสือเล่มนี้รวบรวมข้อสอบดีๆ จากหลายสนามสอบทั่วโลก ตรงตามแนวข้อสอบ PAT 1 และ 9 วิชา สามัญ ปีล่าสุดอัพเดทข้อสอบทุกข้อตามหลักสูตรใหม่ล่าสุดของ สสวท. (ปี 2560) VACCINE+ เล่มนี้พัฒนาสูตรและต่อยอดเทคนิคที่ช่วยน้องมาแล้วนับแสนคนผู้อ่านจะได้รับประโยชน์ มากมาย...', 275, 'T006', 78, 'b_641852c5d460f.png'),
('P20', ' คู่มือสำหรับสอบเข้าคณะสถาปัตยกรรมศาสตร์ ความถนัดทางสถาปัตยกรรม', 'เมื่อเพื่อนพ้องน้องพี่จากคณะสถาปัตยกรรมศาสตร์ในสถาบันต่างๆ ได้ร่วมกันถ่ายทอดเรื่องราว ประสบการณ์และความทรงจำของตนเองให้แก่น้องๆ ที่ต้องการจะก้าวเข้ามาเป็นส่วนหนึ่งของสังคมแห่งนี้ โดยมี ครูพี่ตึก เป็นผู้นำในการถ่ายทอดเรื่องราวต่างๆ รับรองว่าเมื่อหนังสือ ', 180, 'T006', 73, 'b_6419696221d40.png');

-- --------------------------------------------------------

--
-- Table structure for table `type_member`
--

CREATE TABLE `type_member` (
  `member_code` varchar(20) NOT NULL COMMENT 'รหัสสมาชิก',
  `member_name` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `member_detail` text NOT NULL COMMENT 'รายละเอียด',
  `discount` float NOT NULL COMMENT 'ส่วนลด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `type_member`
--

INSERT INTO `type_member` (`member_code`, `member_name`, `member_detail`, `discount`) VALUES
('V001', 'VIP', '********สามารถรับส่วนลดสินค้าได้สูงสุดถึง 10%********', 0.1),
('V002', 'สมาชิกทั่วไป', 'สามารถรับส่วนลด5%', 0.05),
('V003', 'สมาชิกธรรมดา', 'ไม่มีอะไร', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `type_id` varchar(11) NOT NULL COMMENT 'รหัสประเภท',
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`type_id`, `type_name`) VALUES
('T001', 'มังงะ'),
('T002', 'นิยาย'),
('T003', 'กวีนิพนธ์'),
('T004', 'วรรณกรรม'),
('T005', 'การพัฒนาตัวเอง'),
('T006', 'หนังสือเตรียมสอบ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED ZEROFILL NOT NULL COMMENT 'userid',
  `username` varchar(100) NOT NULL COMMENT 'username',
  `password` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL COMMENT 'fname',
  `l_name` varchar(255) NOT NULL COMMENT 'lname',
  `address` text NOT NULL COMMENT 'add',
  `number_phone` int(10) NOT NULL COMMENT 'phone',
  `email` varchar(255) NOT NULL,
  `birthday` date NOT NULL COMMENT 'วันเกิด',
  `member_code` varchar(20) NOT NULL COMMENT 'เมมเบอร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `f_name`, `l_name`, `address`, `number_phone`, `email`, `birthday`, `member_code`) VALUES
(00000000029, 'test1', 'd0970714757783e6cf17b26fb8e2298f', 'mo', 'mo', 'บ้านโป่ง', 994701286, 'asda@asdasd.com', '2023-03-19', 'V002'),
(00000000030, 'mo123', 'd0970714757783e6cf17b26fb8e2298f', 'phat', 'phon', 'บ้านกุดขอนแก่น บ้านเลขที่ 162 ตำบล. กุดขอนแก่น อำเภอ.ภูเวียง จังหวัด.ขอนแก่น', 994701286, 'nutthakit@gamil.com', '2023-03-18', 'V003'),
(00000000031, 'phakkharaphong', 'd0970714757783e6cf17b26fb8e2298f', 'นาย ภัครพงศ์', 'เจริญผล', 'บ้านกุดขอนแก่น บ้านเลขที่ 162 ตำบล. กุดขอนแก่น อำเภอ.ภูเวียง จังหวัด.ขอนแก่น', 994701286, 'tyuoiuyt77@gmail.com', '2023-03-14', 'V001'),
(00000000032, 'ufa191', '2b38c2df6a49b97f706ec9148ce48d86', 'ยูปฟ่า', 'เยสสส', 'ต. ในเมือง จ.ของแก่น รหัสไปรษณี 4009 บ้านเลขที่ 114', 943955615, 'asdad@adasd', '2023-03-15', 'V003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `type_member`
--
ALTER TABLE `type_member`
  ADD PRIMARY KEY (`member_code`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `id_admin` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับที่', AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `order_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'id ออเดอร์ลูกค้า', AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'userid', AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
