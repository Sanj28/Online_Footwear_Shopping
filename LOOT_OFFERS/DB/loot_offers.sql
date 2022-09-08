-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 09:14 AM
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
(23, 'Sanjana Patil', 9482452100, 'DWD', 'sanjana94824@gmail.com', 'sanj', 'Q3VzdG9tZXIkMTIzNA==', '2020-04-06');

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
(9, 'VENKATESH EMALA', 9019837348, 'vgemala23793@gmail.com', 'DWD', 'customer', 'Q3VzdG9tZXIkMTIzNA==', '2020-04-06');

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
(20, 120, 60, 40, '2020-03-10');

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
(10, 'SPARX', 50),
(11, 'LEE COOPER', 30),
(12, 'FILA', 10),
(13, 'RED TAPE', 20),
(14, 'REEBOK', 25),
(15, 'BATA', 20),
(16, 'CLARKS', 15),
(17, 'VANS', 25),
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
(9, 6, 11, 'PUMA  BLACK WHITE ORIGINAL', 'IMG_1668472581.jpeg', 'IMG_155461965.jpeg', 'IMG_925556796.jpeg', 'IMG_333803931.jpeg', 'RUNNING SHOES', 4000, '2020-02-21'),
(13, 6, 11, 'SF Future Kart Cat Motorsport ', 'IMG_252836366.jpeg', 'IMG_1967545929.jpeg', 'IMG_27766024.jpeg', 'IMG_1944274367.jpeg', 'ASDFGH', 1000, '2020-03-12'),
(14, 6, 11, 'Enzo KNIT NM Running Shoes ', 'IMG_924186549.jpeg', 'IMG_893915664.jpeg', 'IMG_726207386.jpeg', 'IMG_1728655527.jpeg', '', 6999, '2020-02-23'),
(15, 6, 11, 'Persist XT Knit Running Shoes', 'IMG_110323787.jpeg', 'IMG_885879615.jpeg', 'IMG_504347944.jpeg', 'IMG_2045350343.jpeg', '', 4999, '2020-02-23'),
(16, 6, 11, 'Concave Pro X IDP Running Shoe', 'IMG_810352516.jpeg', 'IMG_92715624.jpeg', 'IMG_327616306.jpeg', 'IMG_2115507232.jpeg', '', 3499, '2020-02-23'),
(17, 6, 11, 'Pace Walking Shoes  ', 'IMG_512640197.jpeg', 'IMG_2086392719.jpeg', 'IMG_484833582.jpeg', 'IMG_251350952.jpeg', '', 3499, '2020-02-23'),
(18, 6, 11, 'Pacer IDP Sneakers', 'IMG_2033206776.jpeg', 'IMG_1639503772.jpeg', 'IMG_1480026952.jpeg', 'IMG_1641424350.jpeg', '', 2999, '2020-02-23'),
(19, 6, 11, 'Seawalk IDP Running Shoes', 'IMG_1269121356.jpeg', 'IMG_1223732509.jpeg', 'IMG_1971086439.jpeg', 'IMG_534612252.jpeg', '', 3999, '2020-02-23'),
(20, 6, 11, 'Spartan IDP Running Shoes   ', 'IMG_1185734314.jpeg', 'IMG_1083380296.jpeg', 'IMG_159320858.jpeg', 'IMG_439097285.jpeg', 'Grey is the colour most men love when it comes to shoes. Crafted in a similar smart Grey shade are these Sports Shoes Red Tape. With an EVA sole these shoes are best on surface traction and shock cushioning while the textile upper makes them a breathable pair. To get the best experience ever try these shoes when you\'re Gymming.', 3999, '2020-02-23'),
(21, 6, 11, 'Leader VT Bold Training & Gym ', 'IMG_126454466.jpeg', 'IMG_1469499125.jpeg', 'IMG_1047591671.jpeg', 'IMG_1855651735.jpeg', '', 5499, '2020-02-23'),
(22, 6, 11, 'Cell Descend Weave Running Sho', 'IMG_2114510998.jpeg', 'IMG_2028289833.jpeg', 'IMG_1923463571.jpeg', 'IMG_281383084.jpeg', '', 7499, '2020-02-23'),
(23, 6, 12, 'Cappela IDP Sneakers', 'IMG_2131162518.jpeg', 'IMG_1944348278.jpeg', 'IMG_1925048266.jpeg', 'IMG_29254847.jpeg', '', 3299, '2020-02-23'),
(25, 6, 12, 'Rider Slip On IDP Slip On Snea', 'IMG_1225939318.jpeg', 'IMG_936767101.jpeg', 'IMG_682058164.jpeg', 'IMG_1003077892.jpeg', '', 2999, '2020-02-23'),
(26, 6, 12, 'Slyde NU IDP Sneakers', 'IMG_350508224.jpeg', 'IMG_658013974.jpeg', 'IMG_967377469.jpeg', 'IMG_1655817795.jpeg', '', 2999, '2020-02-23'),
(27, 6, 12, 'Rigel IDP Sneakers', 'IMG_1899132536.jpeg', 'IMG_2040698290.jpeg', 'IMG_1060760670.jpeg', 'IMG_765058566.jpeg', '', 2799, '2020-02-23'),
(28, 6, 12, 'Lazy Slip On II DP Sneakers', 'IMG_2022439644.jpeg', 'IMG_101020652.jpeg', 'IMG_2087301186.jpeg', 'IMG_355972010.jpeg', '', 2799, '2020-02-23'),
(29, 6, 12, 'Icon IDP Sneakers', 'IMG_1618556069.jpeg', 'IMG_1650654884.jpeg', 'IMG_641225314.jpeg', 'IMG_1690502996.jpeg', '', 3299, '2020-02-23'),
(30, 6, 12, 'Apollo IDP Sneakers', 'IMG_1366629894.jpeg', 'IMG_669278182.jpeg', 'IMG_489346684.jpeg', 'IMG_182178759.jpeg', '', 2799, '2020-02-23'),
(31, 6, 12, 'Procyon Slip-on IDP Sneakers', 'IMG_1452234236.jpeg', 'IMG_2006752132.jpeg', 'IMG_1244524234.jpeg', 'IMG_941868293.jpeg', '', 3299, '2020-02-23'),
(32, 6, 12, 'Slyde Chrome PU IDP Sneakers', 'IMG_1928061873.jpeg', 'IMG_1669944700.jpeg', 'IMG_1864672245.jpeg', 'IMG_1055583444.jpeg', '', 3299, '2020-02-23'),
(33, 6, 12, 'Icon IDP Canvas Shoes', 'IMG_1724673162.jpeg', 'IMG_303516764.jpeg', 'IMG_268063137.jpeg', 'IMG_286759909.jpeg', '', 2499, '2020-02-23'),
(34, 6, 14, 'Blue Sports Sandal', 'IMG_1444345719.jpeg', 'IMG_1430571354.jpeg', 'IMG_391576915.jpeg', 'IMG_1683520571.jpeg', '', 2499, '2020-02-23'),
(35, 6, 14, 'Beige Casual Sandal', 'IMG_1651335341.jpeg', 'IMG_128736741.jpeg', 'IMG_70220488.jpeg', 'IMG_280065893.jpeg', '', 2499, '2020-02-23'),
(36, 6, 14, 'Green Sports Sandal', 'IMG_1175129320.jpeg', 'IMG_365842068.jpeg', 'IMG_1206447754.jpeg', 'IMG_1079339198.jpeg', '', 2499, '2020-02-23'),
(37, 6, 14, 'Grey, Navy Sports Sandal', 'IMG_239419678.jpeg', 'IMG_1400013848.jpeg', 'IMG_941060870.jpeg', 'IMG_456562772.jpeg', '', 1999, '2020-02-23'),
(38, 6, 14, 'Blue, Green Casual Sandal', 'IMG_1786589922.jpeg', 'IMG_1510436224.jpeg', 'IMG_273014140.jpeg', 'IMG_1302949403.jpeg', '', 2699, '2020-02-23'),
(39, 6, 14, 'Blue, Grey Sports Sandal', 'IMG_1589226141.jpeg', 'IMG_1290826323.jpeg', 'IMG_279435262.jpeg', 'IMG_2008944205.jpeg', '', 2499, '2020-02-23'),
(40, 6, 14, 'Sky Blue, Grey Sports Sandal', 'IMG_1396697889.jpeg', 'IMG_1689457907.jpeg', 'IMG_272874382.jpeg', 'IMG_1730021893.jpeg', '', 2699, '2020-02-23'),
(41, 6, 14, 'Olive Sandal', 'IMG_798864915.jpeg', 'IMG_666112376.jpeg', 'IMG_2086361092.jpeg', 'IMG_1082799257.jpeg', '', 1999, '2020-02-23'),
(42, 6, 14, 'Grey, Green Sports Sandal', 'IMG_1508831594.jpeg', 'IMG_490148935.jpeg', 'IMG_1687304810.jpeg', 'IMG_1099617368.jpeg', '', 1999, '2020-02-23'),
(43, 6, 14, 'Black, Maroon Sports Sandal', 'IMG_965279513.jpeg', 'IMG_1987649798.jpeg', 'IMG_831228332.jpeg', 'IMG_371810435.jpeg', '', 1999, '2020-02-23'),
(45, 6, 15, 'Epsom IDP Flip Flops', 'IMG_1669240078.jpeg', 'IMG_1109497090.jpeg', 'IMG_1984955945.jpeg', 'IMG_1096047682.jpeg', '', 699, '2020-02-23'),
(46, 6, 15, 'Block IDP Flip Flops', 'IMG_2139376911.jpeg', 'IMG_296884214.jpeg', 'IMG_1940603962.jpeg', 'IMG_1302754531.jpeg', '', 899, '2020-02-23'),
(47, 6, 15, 'Oleum GU IDP Flip Flops', 'IMG_971107671.jpeg', 'IMG_563635354.jpeg', 'IMG_1112724833.jpeg', 'IMG_341327498.jpeg', '', 1499, '2020-02-23'),
(48, 6, 15, 'Shore GU IDP Flip Flops', 'IMG_915815769.jpeg', 'IMG_2119383625.jpeg', 'IMG_825955533.jpeg', 'IMG_343692934.jpeg', '', 699, '2020-02-27'),
(49, 6, 15, 'Gypsum GU IDP Slippers', 'IMG_1120145683.jpeg', 'IMG_1567283013.jpeg', 'IMG_218489321.jpeg', 'IMG_1052548177.jpeg', '', 1199, '2020-02-27'),
(50, 6, 15, 'Breeze Duo IDP Slippers', 'IMG_1776261906.jpeg', 'IMG_560017152.jpeg', 'IMG_508387492.jpeg', 'IMG_243731612.jpeg', '', 1699, '2020-02-27'),
(51, 6, 15, 'Blink Duo IDP Slippers', 'IMG_531180278.jpeg', 'IMG_806949857.jpeg', 'IMG_231675792.jpeg', 'IMG_138717968.jpeg', '', 1699, '2020-02-27'),
(52, 6, 15, 'Purecat Flip Flops', 'IMG_307124288.jpeg', 'IMG_813783530.jpeg', 'IMG_1136394999.jpeg', 'IMG_1384943931.jpeg', '', 1699, '2020-02-27'),
(53, 6, 15, 'Ketava III DP Slippers', 'IMG_137200342.jpeg', 'IMG_141996759.jpeg', 'IMG_1240069166.jpeg', 'IMG_1271363371.jpeg', '', 1699, '2020-02-27'),
(54, 6, 15, 'Varaka IDP Flip Flops', 'IMG_1210411261.jpeg', 'IMG_1528826265.jpeg', 'IMG_1561333727.jpeg', 'IMG_1646828597.jpeg', '', 799, '2020-02-27');

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
(3, '8');

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
(11, 6, 'SPORTS SHOES', '2020-03-11'),
(12, 6, 'CASUAL SHOES', '2020-02-20'),
(13, 10, 'FORMAL SHOES', '2020-02-19'),
(14, 6, 'SANDALS & FLOATERS', '2020-02-13');

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
(11, 10, 6, 11, 2, 53, 4000, 0, 0, 5, 'IN STOCK'),
(14, 14, 6, 11, 2, 100, 6999, 0, 0, 5, 'IN STOCK'),
(15, 15, 6, 11, 1, 40, 4999, 0, 0, 4, 'IN STOCK'),
(16, 16, 6, 11, 1, 40, 3499, 0, 0, 5, 'IN STOCK'),
(17, 17, 6, 11, 2, 50, 3499, 0, 0, 5, 'IN STOCK'),
(18, 18, 6, 11, 2, 50, 2999, 0, 0, 5, 'IN STOCK'),
(19, 19, 6, 11, 2, 50, 3999, 0, 0, 5, 'IN STOCK'),
(20, 20, 6, 11, 2, 50, 3999, 0, 0, 5, 'IN STOCK'),
(21, 21, 6, 11, 2, 50, 5499, 0, 0, 5, 'IN STOCK'),
(22, 22, 6, 11, 1, 50, 7499, 0, 0, 5, 'OUT OF STOCK'),
(23, 23, 6, 12, 1, 40, 3299, 0, 0, 5, 'IN STOCK'),
(24, 25, 6, 12, 2, 40, 2999, 0, 0, 5, 'IN STOCK'),
(25, 26, 6, 12, 1, 50, 2999, 0, 0, 5, 'IN STOCK'),
(26, 27, 6, 12, 2, 50, 2799, 0, 0, 5, 'IN STOCK'),
(27, 28, 6, 12, 1, 50, 2799, 0, 0, 5, 'IN STOCK'),
(28, 29, 6, 12, 2, 50, 3299, 0, 0, 5, 'IN STOCK'),
(29, 30, 6, 12, 1, 50, 2799, 0, 0, 5, 'IN STOCK'),
(30, 31, 6, 12, 2, 50, 3299, 0, 0, 5, 'IN STOCK'),
(31, 32, 6, 12, 1, 40, 2999, 0, 0, 5, 'IN STOCK'),
(32, 33, 6, 12, 2, 45, 3299, 0, 0, 5, 'IN STOCK'),
(33, 34, 6, 14, 1, 40, 2499, 0, 0, 6, 'IN STOCK'),
(34, 35, 6, 14, 1, 40, 2499, 0, 0, 5, 'IN STOCK'),
(35, 36, 6, 14, 2, 60, 2499, 0, 0, 6, 'IN STOCK'),
(36, 37, 6, 14, 2, 60, 2499, 0, 0, 6, 'IN STOCK'),
(37, 38, 6, 14, 2, 60, 1999, 0, 0, 6, 'IN STOCK'),
(38, 39, 6, 14, 2, 60, 2699, 0, 0, 4, 'IN STOCK'),
(39, 40, 6, 14, 1, 50, 2499, 0, 0, 6, 'IN STOCK'),
(40, 41, 6, 14, 2, 59, 2699, 0, 0, 5, 'IN STOCK'),
(41, 42, 6, 14, 2, 60, 1999, 0, 700, 5, 'IN STOCK'),
(42, 43, 6, 14, 1, 45, 1999, 0, 700, 5, 'IN STOCK'),
(43, 45, 6, 15, 1, 60, 699, 0, 0, 6, 'IN STOCK'),
(44, 46, 6, 15, 2, 60, 899, 0, 0, 5, 'IN STOCK'),
(45, 47, 6, 15, 2, 50, 1499, 0, 0, 6, 'IN STOCK'),
(46, 48, 6, 15, 2, 60, 699, 0, 0, 6, 'IN STOCK'),
(47, 49, 6, 15, 1, 60, 1199, 0, 0, 6, 'IN STOCK'),
(48, 50, 6, 15, 2, 60, 1699, 0, 0, 5, 'IN STOCK'),
(49, 51, 6, 15, 2, 60, 1699, 0, 0, 6, 'IN STOCK'),
(50, 52, 6, 15, 1, 60, 1699, 0, 0, 6, 'IN STOCK'),
(51, 53, 6, 15, 1, 60, 1299, 0, 0, 6, 'IN STOCK'),
(52, 54, 6, 15, 1, 60, 799, 0, 0, 6, 'IN STOCK'),
(53, 9, 6, 10, 1, 100, 4000, 0, 0, 5, 'IN STOCK');

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
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
