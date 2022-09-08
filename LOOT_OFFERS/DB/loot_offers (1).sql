-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 08:00 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loot_offers`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `ad_contact` bigint(20) NOT NULL,
  `ad_address` varchar(50) NOT NULL,
  `ad_email` varchar(30) NOT NULL,
  `ad_username` varchar(20) NOT NULL,
  `ad_password` varchar(150) NOT NULL,
  `ad_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_contact`, `ad_address`, `ad_email`, `ad_username`, `ad_password`, `ad_date`) VALUES
(24, 'Sanjana', 9482452100, 'Dharwad', 'sanjana94824@gmail.com', 'sj', 'QWRtaW5AMTIz', '2020-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cu_id` int(11) NOT NULL,
  `cu_name` varchar(30) NOT NULL,
  `cu_contact` bigint(20) NOT NULL,
  `cu_email` varchar(50) NOT NULL,
  `cu_address` varchar(50) NOT NULL,
  `cu_username` varchar(20) NOT NULL,
  `cu_password` varchar(150) NOT NULL,
  `cu_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cu_id`, `cu_name`, `cu_contact`, `cu_email`, `cu_address`, `cu_username`, `cu_password`, `cu_date`) VALUES
(4, 'Sanjana Patil', 9482452100, 'sanj@gmail.com', 'Dahrwad', 'sj', 'Sj123456789', '2020-03-09'),
(5, 'VidyaSri', 9591873487, 'v@gmail.com', 'Andhrapradesh', 'vid', 'admin123', '2020-03-06'),
(9, 'VENKATESH EMALA', 9019837348, 'vgemala23793@gmail.com', 'DWD', 'customer', 'Q3VzdG9tZXIkMTIzNA==', '2020-04-06'),
(10, 'Praveen K', 8660557946, 'praveenkallammanavar1999@gmail.com', 'Dharwad', 'pk24', 'UGlua3VAMTIz', '2020-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_details`
--

CREATE TABLE `customer_order_details` (
  `cod_id` int(11) NOT NULL,
  `cu_id` int(11) NOT NULL,
  `order_json` longtext NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_grand_total` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_tracking` longtext NOT NULL,
  `order_tracking_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order_details`
--

INSERT INTO `customer_order_details` (`cod_id`, `cu_id`, `order_json`, `order_no`, `order_date`, `order_grand_total`, `order_status`, `order_tracking`, `order_tracking_level`) VALUES
(1, 8, '{\"product_details\":{\"6 PD32\":{\"psd_id\":\"6 PD32\",\"id\":32,\"pc_id\":6,\"pt_id\":12,\"ps_id\":1,\"pd_size\":\"6\",\"name\":\"Slyde Chrome PU IDP Sneakers\",\"image\":\"IMG_1928061873.jpeg\",\"qty\":1,\"price\":2999,\"discount_percent\":0,\"sub_total\":2999,\"tax\":20,\"tax_amount\":600,\"totalamount\":3599,\"max_qty_allowed\":\"5\"},\"7 PD20\":{\"psd_id\":\"7 PD20\",\"id\":20,\"pc_id\":6,\"pt_id\":11,\"ps_id\":2,\"pd_size\":\"7\",\"name\":\"Spartan IDP Running Shoes   \",\"image\":\"IMG_1185734314.jpeg\",\"qty\":2,\"price\":3999,\"discount_percent\":0,\"sub_total\":7998,\"tax\":20,\"tax_amount\":1600,\"totalamount\":9598,\"max_qty_allowed\":\"5\"}},\"amount_details\":{\"total\":13197,\"delivery_charges\":0,\"grand_total\":13197},\"shipping_details\":{\"shipping_address\":\"1ST CROSS SAPTAPUR\",\"landmark\":\"SAPTAPUR\",\"contact_no\":\"9019837348\",\"payment_mode\":\"COD\",\"transaction_no\":0},\"customer_id\":{\"customer_id\":\"8\"}}', 224824, '2020-03-18', 13197, 'ORDER CONFIRMED', '', 0),
(2, 8, '{\"product_details\":{\"7 PD33\":{\"psd_id\":\"7 PD33\",\"id\":33,\"pc_id\":6,\"pt_id\":12,\"ps_id\":2,\"pd_size\":\"7\",\"name\":\"Icon IDP Canvas Shoes\",\"image\":\"IMG_1724673162.jpeg\",\"qty\":2,\"price\":3299,\"discount_percent\":0,\"sub_total\":6598,\"tax\":20,\"tax_amount\":1320,\"totalamount\":7918,\"max_qty_allowed\":\"5\"}},\"amount_details\":{\"total\":7918,\"delivery_charges\":0,\"grand_total\":7918},\"shipping_details\":{\"shipping_address\":\"1ST CROSS SAPTAPUR\",\"landmark\":\"SAPTAPUR\",\"contact_no\":\"9019837348\",\"payment_mode\":\"PHONEPE\",\"transaction_no\":\"P2345678901234567890123\"},\"customer_id\":{\"customer_id\":\"8\"}}', 770586, '2020-03-19', 7918, 'ORDER CONFIRMED', '', 0),
(3, 8, '{\"product_details\":{\"7 PD33\":{\"psd_id\":\"7 PD33\",\"id\":33,\"pc_id\":6,\"pt_id\":12,\"ps_id\":2,\"pd_size\":\"7\",\"name\":\"Icon IDP Canvas Shoes\",\"image\":\"IMG_1724673162.jpeg\",\"qty\":\"1\",\"price\":3299,\"discount_percent\":0,\"sub_total\":3299,\"tax\":20,\"tax_amount\":660,\"totalamount\":3959,\"max_qty_allowed\":\"5\"}},\"amount_details\":{\"total\":3959,\"delivery_charges\":0,\"grand_total\":3959},\"shipping_details\":{\"shipping_address\":\"1ST CROSS SAPTAPUR\",\"landmark\":\"SAPTAPUR\",\"contact_no\":\"9019837348\",\"payment_mode\":\"COD\",\"transaction_no\":0},\"customer_id\":{\"customer_id\":\"8\"}}', 634045, '2020-03-19', 3959, 'ORDER CONFIRMED', '{\"Warehouse Shipping\":{\"order_status\":\"Warehouse Shipping\",\"order_description\":\"WAREHOUSE\",\"order_date\":\"2020-03-19\"},\"Order Dispatched\":{\"order_status\":\"Order Dispatched\",\"order_description\":\"DISPATCHED\",\"order_date\":\"2020-03-19\"}}', 2),
(4, 9, '{\"product_details\":{\"6 PD43\":{\"psd_id\":\"6 PD43\",\"id\":43,\"pc_id\":6,\"pt_id\":14,\"ps_id\":1,\"pd_size\":\"6\",\"name\":\"Black, Maroon Sports Sandal\",\"image\":\"IMG_965279513.jpeg\",\"qty\":\"1\",\"price\":1999,\"discount_percent\":700,\"sub_total\":1299,\"tax\":20,\"tax_amount\":260,\"totalamount\":1559,\"max_qty_allowed\":\"5\"}},\"amount_details\":{\"total\":1559,\"delivery_charges\":0,\"grand_total\":1559},\"shipping_details\":{\"shipping_address\":\"1ST CROSS SAPTAPUR\",\"landmark\":\"SAPTAPUR\",\"contact_no\":\"9019837348\",\"payment_mode\":\"COD\",\"transaction_no\":0},\"customer_id\":{\"customer_id\":\"9\"}}', 592309, '2020-04-06', 1559, 'ORDER PLACED', '', 0),
(5, 9, '{\"product_details\":{\"6 PD43\":{\"psd_id\":\"6 PD43\",\"id\":43,\"pc_id\":6,\"pt_id\":14,\"ps_id\":1,\"pd_size\":\"6\",\"name\":\"Black, Maroon Sports Sandal\",\"image\":\"IMG_965279513.jpeg\",\"qty\":\"5\",\"price\":1999,\"discount_percent\":700,\"sub_total\":6495,\"tax\":20,\"tax_amount\":1299,\"totalamount\":7794,\"max_qty_allowed\":\"5\"},\"7 PD41\":{\"psd_id\":\"7 PD41\",\"id\":41,\"pc_id\":6,\"pt_id\":14,\"ps_id\":2,\"pd_size\":\"7\",\"name\":\"Olive Sandal\",\"image\":\"IMG_798864915.jpeg\",\"qty\":\"1\",\"price\":2699,\"discount_percent\":0,\"sub_total\":2699,\"tax\":20,\"tax_amount\":540,\"totalamount\":3239,\"max_qty_allowed\":\"5\"}},\"amount_details\":{\"total\":11033,\"delivery_charges\":0,\"grand_total\":11033},\"shipping_details\":{\"shipping_address\":\"1ST CROSS SAPTAPUR\",\"landmark\":\"SAPTAPUR\",\"contact_no\":\"9019837348\",\"payment_mode\":\"PHONEPE\",\"transaction_no\":\"P2345678901234567890123\"},\"customer_id\":{\"customer_id\":\"9\"}}', 843583, '2020-04-06', 11033, 'ORDER CONFIRMED', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `extra_charges`
--

CREATE TABLE `extra_charges` (
  `ec_id` int(11) NOT NULL,
  `ec_min_amount` int(11) NOT NULL,
  `ec_delivery_charges` int(11) NOT NULL,
  `ec_min_stock_qty` int(11) NOT NULL,
  `ec_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_charges`
--

INSERT INTO `extra_charges` (`ec_id`, `ec_min_amount`, `ec_delivery_charges`, `ec_min_stock_qty`, `ec_date`) VALUES
(20, 120, 60, 1, '2020-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(20) NOT NULL,
  `pc_discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pc_id`, `pc_name`, `pc_discount`) VALUES
(6, 'PUMA', 20),
(7, 'WOODLAND', 25),
(8, 'NIKE', 15),
(9, 'ADIDAS', 30),
(11, 'LEE COOPER', 30),
(12, 'FILA', 10),
(14, 'REEBOK', 25),
(15, 'BATA', 20),
(18, 'HRX', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `pd_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `pd_name` varchar(30) NOT NULL,
  `pd_image1` varchar(100) NOT NULL,
  `pd_image2` varchar(100) NOT NULL,
  `pd_image3` varchar(100) NOT NULL,
  `pd_image4` varchar(100) NOT NULL,
  `pd_description` text NOT NULL,
  `pd_price` float NOT NULL,
  `pd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`pd_id`, `pc_id`, `pt_id`, `pd_name`, `pd_image1`, `pd_image2`, `pd_image3`, `pd_image4`, `pd_description`, `pd_price`, `pd_date`) VALUES
(59, 6, 18, 'Lazy Slip On Graphic DP Sneake', 'IMG_1978973015.jpeg', 'IMG_28574305.jpeg', 'IMG_64000150.jpeg', 'IMG_1404495272.jpeg', '<p><strong>Puma</strong></p><ul><li>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</li></ul><p><strong>Covered in Warranty</strong></p><ul><li>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</li></ul><p><strong>Not Covered in Warranty</strong></p><ul><li>Wear &amp; tear</li></ul><div>Â </div>', 3299, '2020-04-25'),
(60, 6, 18, 'Court Point Vulc IDP Sneakers', 'IMG_793224968.jpeg', 'IMG_1397440392.jpeg', 'IMG_397067305.jpeg', 'IMG_718567283.jpeg', '<p><strong>Puma</strong></p><ul><li>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</li></ul><p><strong>Covered in Warranty</strong></p><ul><li>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</li></ul><p><strong>Not Covered in Warranty</strong></p><ul><li>Wear &amp; tear</li></ul><div>Â </div>', 3799, '2020-04-25'),
(61, 6, 18, 'one Prime Mid Sneakers', 'IMG_1261628673.jpeg', 'IMG_1284730270.jpeg', 'IMG_659666460.jpeg', 'IMG_2068594971.jpeg', '<p><strong>Puma</strong></p><ul><li>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</li></ul><p><strong>Covered in Warranty</strong></p><ul><li>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</li></ul><p><strong>Not Covered in Warranty</strong></p><ul><li>Wear &amp; tear</li></ul><div>Â </div>', 5999, '2020-04-25'),
(62, 6, 18, 'Trailfox Overland Sneakers', 'IMG_2049855087.jpeg', 'IMG_1662658988.jpeg', 'IMG_853591643.jpeg', 'IMG_2034004368.jpeg', '<p><strong>Puma</strong></p><ul><li>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</li></ul><p><strong>Covered in Warranty</strong></p><ul><li>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</li></ul><p><strong>Not Covered in Warranty</strong></p><ul><li>Wear &amp; tear</li></ul><div>Â </div>', 10999, '2020-04-25'),
(63, 6, 18, 'Rebound BBX Mesh IDP High Tops', 'IMG_2026247054.jpeg', 'IMG_579904104.jpeg', 'IMG_1124594310.jpeg', 'IMG_1459451085.jpeg', '<p><strong>Puma</strong></p><ul><li>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</li></ul><p><strong>Covered in Warranty</strong></p><ul><li>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</li></ul><p><strong>Not Covered in Warranty</strong></p><ul><li>Wear &amp; tear</li></ul><div>Â </div>', 4799, '2020-04-25'),
(64, 6, 17, 'Jedi Slip on IDP Walking Shoes', 'IMG_33591142.jpeg', 'IMG_1881018981.jpeg', 'IMG_1059580391.jpeg', 'IMG_396535119.jpeg', '<p><strong>Puma</strong></p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p><strong>Covered in Warranty</strong></p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p><strong>Not Covered in Warranty</strong></p><p>Wear &amp; tear</p><div>Â </div>', 3799, '2020-04-25'),
(65, 6, 17, 'ST Trainer Perf v IDP Training', 'IMG_1917296518.jpeg', 'IMG_1952125946.jpeg', 'IMG_559324550.jpeg', 'IMG_1615074086.jpeg', '<p><strong>Puma</strong></p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p><strong>Covered in Warranty</strong></p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p><strong>Not Covered in Warranty</strong></p><p>Wear &amp; tear</p><div>Â </div>', 3299, '2020-04-25'),
(66, 6, 17, 'Corode IDP Running Shoes', 'IMG_613981042.jpeg', 'IMG_162927097.jpeg', 'IMG_282168319.jpeg', 'IMG_206724256.jpeg', '<p><strong>Puma</strong></p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p><strong>Covered in Warranty</strong></p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p><strong>Not Covered in Warranty</strong></p><p>Wear &amp; tear</p><div>Â </div>', 4299, '2020-04-25'),
(67, 6, 17, 'SF Cell Ultimate Motorsport Sh', 'IMG_411782501.jpeg', 'IMG_1122739542.jpeg', 'IMG_1102348095.jpeg', 'IMG_196566437.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 6999, '2020-04-25'),
(68, 6, 19, 'Blue Sports Sandal', 'IMG_1777494766.jpeg', 'IMG_1811349577.jpeg', 'IMG_625185846.jpeg', 'IMG_278111518.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 2499, '2020-04-25'),
(69, 6, 19, 'Navy Sandal', 'IMG_106287456.jpeg', 'IMG_1772742671.jpeg', 'IMG_326807220.jpeg', 'IMG_2107417933.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 2499, '2020-04-25'),
(70, 6, 19, 'Grey Sports Sandal', 'IMG_1269828996.jpeg', 'IMG_946589350.jpeg', 'IMG_1186666803.jpeg', 'IMG_1563730175.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 2499, '2020-04-25'),
(71, 6, 19, ' Grey Sandal', 'IMG_1166620392.jpeg', 'IMG_1757195296.jpeg', 'IMG_894810902.jpeg', 'IMG_2111560596.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 2299, '2020-04-25'),
(72, 6, 19, 'Blue Sandal', 'IMG_1951264009.jpeg', 'IMG_2104712895.jpeg', 'IMG_397944984.jpeg', 'IMG_450820005.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 2399, '2020-04-25'),
(73, 6, 20, 'Black Flip Flops', 'IMG_1329615109.jpeg', 'IMG_1196658440.jpeg', 'IMG_457077326.jpeg', 'IMG_724482857.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 699, '2020-04-25'),
(74, 6, 20, 'Black Slides', 'IMG_742448992.jpeg', 'IMG_1957251339.jpeg', 'IMG_1455969957.jpeg', 'IMG_1091392448.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 2999, '2020-04-25'),
(75, 6, 20, 'Slides', 'IMG_1969656686.jpeg', 'IMG_663124884.jpeg', 'IMG_1602441054.jpeg', 'IMG_858506480.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 1699, '2020-04-25'),
(76, 6, 20, 'Oleum GU IDP Flip Flops', 'IMG_1339342101.jpeg', 'IMG_1227396650.jpeg', 'IMG_1575752987.jpeg', 'IMG_1712856884.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 1499, '2020-04-25'),
(77, 6, 20, 'Wrens GU IDP Slippers', 'IMG_338147392.jpeg', 'IMG_658413184.jpeg', 'IMG_235905622.jpeg', 'IMG_158706703.jpeg', '<p>Puma</p><p>This is a genuine product of Puma Sports India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p>', 1699, '2020-04-25'),
(78, 15, 21, 'AIR Canvas Shoes', 'IMG_1476342014.jpeg', 'IMG_306241583.jpeg', 'IMG_1455914552.jpeg', 'IMG_195829182.jpeg', '<p>BATA</p><p>This is a genuine product of Bata India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 499, '2020-04-25'),
(79, 15, 21, 'Blue Slip On Sneakers', 'IMG_917772580.jpeg', 'IMG_344046609.jpeg', 'IMG_1252849483.jpeg', 'IMG_163143362.jpeg', '<p>BATA</p><p>This is a genuine product of Bata India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 599, '2020-04-25'),
(80, 15, 21, 'Black Slip On Sneakers', 'IMG_1981291309.jpeg', 'IMG_1474775783.jpeg', 'IMG_444163140.jpeg', 'IMG_1963611387.jpeg', '<p>BATA</p><p>This is a genuine product of Bata India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 1444, '2020-04-25'),
(81, 15, 21, 'Mason Boots', 'IMG_1306583459.jpeg', 'IMG_1015853807.jpeg', 'IMG_804285904.jpeg', 'IMG_1497805522.jpeg', '<p>BATA</p><p>This is a genuine product of Bata India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 1999, '2020-04-25'),
(82, 15, 21, 'AFFLECK Boots', 'IMG_521360500.jpeg', 'IMG_1276509088.jpeg', 'IMG_1483799318.jpeg', 'IMG_348544124.jpeg', '<p>BATA</p><p>This is a genuine product of Bata India Pvt Ltd. The product comes with a standard brand warranty of 90 days.</p><p>Covered in Warranty</p><p>Manufacturing defects: stitching/ pasting issues, mesh quality, sole integrity. Exchange available within 90 days of purchase, provided the product is not inappropriately used as determined by the Brand.</p><p>Not Covered in Warranty</p><p>Wear &amp; tear</p><div>Â </div>', 2999, '2020-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `ps_id` int(11) NOT NULL,
  `ps_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`ps_id`, `ps_name`) VALUES
(1, '6'),
(2, '7'),
(3, '8'),
(5, '9'),
(6, '10');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `pt_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `pt_name` varchar(50) NOT NULL,
  `pt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`pt_id`, `pc_id`, `pt_name`, `pt_date`) VALUES
(13, 10, 'FORMAL SHOES', '2020-02-19'),
(17, 6, 'SPORTS SHOES', '2020-04-25'),
(18, 6, 'CASUAL SHOES', '2020-04-25'),
(19, 6, 'SANDALS', '2020-04-25'),
(20, 6, 'FLIP FLOPS', '2020-04-25'),
(21, 15, 'CASUAL SHOES', '2020-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `sd_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `ps_id` int(11) NOT NULL,
  `sd_avail_qty` int(11) NOT NULL,
  `sd_unitprice` int(11) NOT NULL,
  `sd_increment` int(11) NOT NULL,
  `sd_discount` int(11) NOT NULL,
  `sd_max_qty_order` int(11) NOT NULL,
  `sd_status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`sd_id`, `pd_id`, `pc_id`, `pt_id`, `ps_id`, `sd_avail_qty`, `sd_unitprice`, `sd_increment`, `sd_discount`, `sd_max_qty_order`, `sd_status`) VALUES
(54, 59, 6, 18, 2, 1, 3299, 0, 30, 1, 'IN STOCK'),
(55, 59, 6, 18, 5, 1, 3299, 0, 30, 1, 'IN STOCK'),
(56, 59, 6, 18, 6, 1, 3299, 0, 30, 1, 'IN STOCK'),
(57, 60, 6, 18, 3, 1, 3799, 0, 25, 1, 'IN STOCK'),
(58, 60, 6, 18, 6, 1, 3799, 0, 25, 1, 'IN STOCK'),
(59, 60, 6, 18, 1, 1, 3799, 0, 25, 1, 'IN STOCK'),
(60, 61, 6, 18, 2, 1, 5999, 0, 25, 1, 'IN STOCK'),
(61, 61, 6, 18, 5, 1, 5999, 0, 0, 1, 'IN STOCK'),
(62, 61, 6, 18, 3, 1, 5999, 0, 0, 1, 'IN STOCK'),
(63, 62, 6, 18, 1, 1, 10999, 0, 0, 1, 'IN STOCK'),
(64, 62, 6, 18, 6, 1, 10999, 0, 0, 1, 'IN STOCK'),
(65, 62, 6, 18, 2, 1, 10999, 0, 0, 1, 'IN STOCK'),
(66, 63, 6, 18, 1, 1, 4799, 0, 0, 1, 'IN STOCK'),
(67, 63, 6, 18, 2, 1, 4799, 0, 0, 1, 'IN STOCK'),
(68, 63, 6, 18, 3, 1, 4799, 0, 0, 1, 'IN STOCK'),
(69, 63, 6, 18, 6, 1, 4799, 0, 0, 1, 'IN STOCK'),
(70, 64, 6, 17, 2, 1, 3799, 0, 45, 1, 'IN STOCK'),
(71, 64, 6, 17, 3, 1, 3799, 0, 45, 1, 'IN STOCK'),
(72, 64, 6, 17, 5, 1, 3799, 0, 45, 1, 'IN STOCK'),
(73, 65, 6, 17, 2, 1, 3299, 0, 0, 1, 'IN STOCK'),
(74, 65, 6, 17, 3, 1, 3299, 0, 0, 1, 'IN STOCK'),
(75, 65, 6, 17, 6, 1, 3299, 0, 45, 1, 'IN STOCK'),
(76, 66, 6, 17, 1, 1, 4299, 0, 0, 1, 'IN STOCK'),
(77, 66, 6, 17, 2, 1, 4299, 0, 0, 1, 'IN STOCK'),
(78, 66, 6, 17, 6, 1, 4299, 0, 0, 1, 'IN STOCK'),
(79, 67, 6, 17, 2, 1, 6999, 0, 0, 1, 'IN STOCK'),
(80, 67, 6, 17, 5, 1, 6999, 0, 0, 1, 'IN STOCK'),
(81, 67, 6, 17, 6, 1, 6999, 0, 0, 1, 'IN STOCK'),
(82, 68, 6, 19, 1, 1, 2499, 0, 0, 1, 'IN STOCK'),
(83, 68, 6, 19, 2, 1, 2499, 0, 0, 1, 'IN STOCK'),
(84, 68, 6, 19, 6, 1, 2499, 0, 0, 1, 'IN STOCK'),
(85, 69, 6, 19, 1, 1, 2499, 0, 0, 1, 'IN STOCK'),
(86, 69, 6, 19, 3, 1, 2499, 0, 0, 1, 'IN STOCK'),
(87, 69, 6, 19, 6, 1, 2499, 0, 0, 1, 'IN STOCK'),
(88, 70, 6, 19, 2, 1, 2499, 0, 0, 1, 'IN STOCK'),
(89, 70, 6, 19, 1, 1, 2499, 0, 0, 1, 'IN STOCK'),
(90, 70, 6, 19, 6, 1, 2499, 0, 0, 1, 'IN STOCK'),
(91, 71, 6, 19, 1, 1, 2299, 0, 0, 1, 'IN STOCK'),
(92, 71, 6, 19, 3, 1, 2299, 0, 0, 1, 'IN STOCK'),
(93, 71, 6, 19, 6, 1, 2299, 0, 0, 1, 'IN STOCK'),
(94, 72, 6, 19, 2, 1, 2399, 0, 0, 1, 'IN STOCK'),
(95, 72, 6, 19, 5, 1, 2399, 0, 0, 1, 'IN STOCK'),
(96, 72, 6, 19, 6, 1, 2399, 0, 0, 1, 'IN STOCK'),
(97, 73, 6, 20, 2, 1, 699, 0, 0, 1, 'IN STOCK'),
(98, 73, 6, 20, 3, 1, 699, 0, 0, 1, 'IN STOCK'),
(99, 73, 6, 20, 6, 1, 699, 0, 0, 1, 'IN STOCK'),
(100, 74, 6, 20, 2, 1, 2999, 0, 0, 1, 'IN STOCK'),
(101, 74, 6, 20, 3, 1, 2999, 0, 0, 1, 'IN STOCK'),
(102, 74, 6, 20, 6, 1, 2999, 0, 0, 1, 'IN STOCK'),
(103, 75, 6, 20, 2, 1, 1699, 0, 0, 1, 'IN STOCK'),
(104, 75, 6, 20, 3, 1, 1699, 0, 0, 1, 'IN STOCK'),
(105, 75, 6, 20, 6, 1, 1699, 0, 0, 1, 'IN STOCK'),
(106, 76, 6, 20, 1, 1, 1499, 0, 0, 1, 'IN STOCK'),
(107, 76, 6, 20, 5, 1, 1499, 0, 0, 1, 'IN STOCK'),
(108, 76, 6, 20, 6, 1, 1499, 0, 0, 1, 'IN STOCK'),
(109, 77, 6, 20, 1, 1, 1699, 0, 0, 1, 'IN STOCK'),
(110, 77, 6, 20, 6, 1, 1699, 0, 0, 1, 'IN STOCK'),
(111, 77, 6, 20, 3, 1, 1699, 0, 0, 1, 'IN STOCK'),
(112, 78, 15, 21, 1, 1, 499, 0, 0, 1, 'IN STOCK'),
(113, 78, 15, 21, 5, 1, 499, 0, 0, 1, 'IN STOCK'),
(114, 78, 15, 21, 6, 1, 499, 0, 0, 1, 'IN STOCK'),
(115, 79, 15, 21, 1, 1, 599, 0, 0, 1, 'IN STOCK'),
(116, 79, 15, 21, 5, 1, 599, 0, 0, 1, 'IN STOCK'),
(117, 79, 15, 21, 6, 1, 599, 0, 0, 1, 'IN STOCK'),
(118, 80, 15, 21, 1, 1, 1444, 0, 0, 1, 'IN STOCK'),
(119, 80, 15, 21, 5, 1, 1444, 0, 0, 1, 'IN STOCK'),
(120, 80, 15, 21, 2, 1, 1444, 0, 0, 1, 'IN STOCK'),
(121, 81, 15, 21, 1, 1, 1999, 0, 0, 1, 'IN STOCK'),
(122, 81, 15, 21, 3, 1, 1999, 0, 0, 1, 'IN STOCK'),
(123, 81, 15, 21, 6, 1, 1999, 0, 0, 1, 'IN STOCK'),
(124, 82, 15, 21, 1, 1, 2999, 0, 0, 1, 'IN STOCK'),
(125, 82, 15, 21, 3, 1, 2999, 0, 0, 1, 'IN STOCK'),
(126, 82, 15, 21, 5, 1, 2999, 0, 0, 1, 'IN STOCK'),
(127, 82, 15, 21, 2, 1, 2999, 0, 0, 1, 'IN STOCK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `customer_order_details`
--
ALTER TABLE `customer_order_details`
  ADD PRIMARY KEY (`cod_id`);

--
-- Indexes for table `extra_charges`
--
ALTER TABLE `extra_charges`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`sd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_order_details`
--
ALTER TABLE `customer_order_details`
  MODIFY `cod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `extra_charges`
--
ALTER TABLE `extra_charges`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
