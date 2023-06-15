-- MySQL dump 10.16  Distrib 10.1.48-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: fdb21.awardspace.net    Database: 3091031_ichoice
-- ------------------------------------------------------
-- Server version	5.7.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` text NOT NULL,
  `admin_email` text NOT NULL,
  `admin_pass` text NOT NULL,
  `admin_contact` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_job` text NOT NULL,
  `admin_image` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Anushka Lakshan','lakshan1996@ichoice.lk','Anushka1234','132465','Maharagama,Sri lanka','Web developer','anushka.jpg');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (23,'111.223.170.155',2,''),(19,'116.206.244.197',1,''),(23,'116.206.244.197',1,''),(22,'112.135.6.212',1,'');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Samsung','All Samsung product in one place..'),(2,'Apple','Your favorite all Apple products in one place.  '),(3,'Acer','Acer laptops'),(4,'Asus','Asus laptop'),(5,'HP','HP products'),(6,'Dell','Dell products'),(7,'Other','All other categories'),(8,'Huawei','world most popular mobile brand now on our web'),(9,'xiaomi','all xiaomi products');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_orders`
--

LOCK TABLES `customer_orders` WRITE;
/*!40000 ALTER TABLE `customer_orders` DISABLE KEYS */;
INSERT INTO `customer_orders` VALUES (1,9,20,4123,1,'2019-07-06 15:25:36','pending'),(2,6,22,1843,1,'2019-07-21 04:55:28','pending');
/*!40000 ALTER TABLE `customer_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `cus_addr` text NOT NULL,
  `cus_contact` text NOT NULL,
  `cus_img` text NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `customer_ip` int(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (6,'Anushka Lakshan','Anu123',' maharagama','0123465798','my-cartoon.jpg','anushka@ichoice.lk',0),(9,'Dasun','dasun123','dasun7575@gmail.com','789465132','thumb-1920-523395.jpg','Dhananjaya',112134);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL,
  `other` varchar(255) NOT NULL,
  `order_id` int(10) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_orders`
--

LOCK TABLES `pending_orders` WRITE;
/*!40000 ALTER TABLE `pending_orders` DISABLE KEYS */;
INSERT INTO `pending_orders` VALUES (1,9,4123,'24',1,'pending'),(2,6,1843,'23',1,'pending');
/*!40000 ALTER TABLE `pending_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `p_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'Tablet','Buy your latest tablet pc from us..\r\n'),(2,'Mobile Phones','Latest mobile phones for cheapest price'),(3,'Laptop Computers','Best laptop computers for cheapest price in island'),(4,'Mobile Accessories','original best quality mobile accessories for cheapest price'),(5,'PC Accessories','high quality PC accessories for cheapest price');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(12) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,1,2,'2019-04-20 21:45:15','Apple iPad Pro','tab1.jpg','tab2.jpg','tab3.jpg',820,'<ul>\r\n<li>11-Inch edge-to-edge Liquid Retina display with Promotion, true Tone, and wide Color</li>\r\n<li>A12X Bionic chip with Neural Engine</li>\r\n<li>Face ID for secure authentication and Apple Pay</li>\r\n<li>12MP back camera, 7MP True Depth front camera</li>\r\n<li>Four speaker Audio with wider Stereo sound</li>\r\n<li>802. 11AC Wi-Fi and gigabit-class LTE cellular data</li>\r\n<li>Up to 10 hours of battery life</li>\r\n</ul>\r\n<div aria-live=\"polite\">\r\n<div aria-expanded=\"true\">\r\n<ul>\r\n<li>Usb-c connector for charging and accessories</li>\r\n<li>IOS 12 with group FaceTime, shared augmented reality experiences, screen time, and more</li>\r\n</ul>\r\n</div>\r\n</div>','apple ipad'),(3,2,1,'2019-06-16 18:15:40','Samsung Galaxy S10','61GUOlgK7GL._SL1500_.jpg','61YZLn2vMdL._SL1500_.jpg','61HlCGsB1aL._SL1500_.jpg',830,'<ul><li>An immersive Cinematic Infinity Display, Pro-grade Camera and Wireless PowerShare The next generation is here</li><li>Ultrasonic in-display fingerprint ID protects and unlocks with the first touch</li><li>Pro-grade Camera effortlessly captures epic, pro-quality images of the world as you see it</li><li>Intelligently accesses power by learning how and when you use your phone</li><li>&nbsp;</li></ul>','samsung galaxy s10,galaxy 128gb,samsung'),(4,2,1,'2019-04-21 08:47:07','Samsung Galaxy Note 9','712Yz4O8k6L._SL1500_.jpg','61VZBPlExtL._SL1500_.jpg','71I5EpMzOhL._SL1500_.jpg',720,'<ul><li>The largest battery in a note, ever When you have a long-lasting battery, you really can go all day and all night</li><li>The Note9 has twice as much storage as the Note8, which means more music, more videos, more pictures, and less worry when it comes to space on your phone</li><li>The Note9 gives you a quick network connection for incredibly fast streaming and downloading, so you can do more, uninterrupted</li><li>Still amazing on screen, but now the S-pen has more power off Screen Remotely control different applications and use the S pen to capture shots from far away, scroll, and play music</li><li>At 64&quot;, the Note9 has the largest screen of any Galaxy phone Perfect for gaming and streaming, our super AMOLED display is bigger than ever before</li></ul>','samsung galaxy note 9'),(5,2,2,'2019-04-21 08:51:30','Apple iPhone X -256GB','71k0cry-ceL._SL1500_.jpg','61X90NAyXBL._SL1500_.jpg','61OANBWZfIL._SL1500_.jpg',720,'<ul><li>Fully unlocked for both GSM carriers (like AT&amp;T and T-Mobile) and CDMA carriers (like Sprint and Verizon).</li><li>An all-new 5.8-inch SuperRetina screen with all-screen OLED Multi-Touch display</li><li>12MP wide-angle and telephoto cameras with Dual optical image stabilization</li><li>Wireless Qi charging</li></ul><p>&nbsp;</p>','Apple iPhone X '),(6,3,3,'2019-04-21 09:00:47','Acer Aspire E 15, 15.6\" Full HD, 8th Gen Intel Core i3','71MII6oCTgL._SL1500_.jpg','618oANL1phL._SL1500_.jpg','61lw138pHqL._SL1500_.jpg',320,'Acer Aspire E 15, 15.6\" Full HD, 8th Gen Intel Core i3-8130U, 6GB RAM Memory, 1TB HDD, 8X DVD, E5-576-392H\r\n\r\n<ul><li>8th Generation Intel Core i3-8130U Processor (Up to 3.4GHz)</li><li>15.6&quot; Full HD (1920 x 1080) widescreen LED-lit Display</li><li>6GB Dual Channel Memory, 1TB HDD &amp; 8x DVD</li><li>Up to 13.5-Hours of battery life</li><li>Windows 10 Home</li></ul>','acer laptop i3'),(7,3,4,'2019-04-21 08:59:30','ASUS VivoBook S Ultra Thin and Portable Laptop, Intel Core i7','91xIg-EZ0TL._SL1500_.jpg','91p163ZeCfL._SL1500_.jpg','91LHJtpDwrL._SL1500_.jpg',750,'<p><strong>ASUS VivoBook S Ultra Thin and Portable Laptop, Intel Core i7-8550U Processor, 8GB DDR4 RAM, 128GB SSD+1TB HDD, 15.6&rdquo; FHD WideView Display, ASUS NanoEdge Bezel, S510UA-DS71</strong></p><p>&nbsp;</p><ul><li>15.6&rdquo; FHD (1920 x 1080) WideView color-rich display;Webcam : VGA Camera</li><li>High performance 128GB SSD + 1TB HDD storage combo; 8GB DDR4 RAM</li><li>Slim 14.2&rdquo; wide, 0.7&rdquo; thin; 0.3&rdquo; ASUS NanoEdge bezel with 80% screen-to-body ratio</li><li>Ergonomic backlit keyboard with fingerprint sensor; Aluminum cover. Graphics: Intel HD</li><li>Comprehensive connections including USB 3.1 Type-C (Gen 1), USB 3.0, USB 2.0, and HDMI; Dual band 802.11ac Wi-Fi</li><li>Max Memory: 16 GB</li></ul>','ASUS VivoBook'),(8,4,7,'2019-04-21 09:05:38','Beats Studio3 Wireless Over-Ear Headphones - Matte Black','51eqYelivhL._SL1500_.jpg','51xViTHCV2L._SL1500_.jpg','51jHg2I2EnL._SL1500_.jpg',350,'<ul><li>Pure adaptive noise canceling (pure ANC) actively blocks external noise</li><li>Real-time Audio calibration preserves a Premium listening experience</li><li>Up to 22 hours of battery life enables full-featured all-day wireless playback</li><li>Apple W1 chip for class 1 wireless Bluetooth connectivity &amp; battery efficiency</li><li>With fast Fuel, a 10-minute charge gives 3 hours of play when battery is low. Rechargeable lithium ion battery</li></ul>','headphone'),(9,5,7,'2019-04-21 09:08:57','Gigabyte GeForce GTX 1060','81QhY1WOYJL._SL1500_.jpg','61u5SqcQyLL._SL1500_.jpg','61WxH9EcJPL._SL1500_.jpg',200,'<ul><li>WINDFORCE 2x with Blade fan design</li><li>Support up to 8K Display @60Hz</li><li>Built with 4+1 power phases. Recommended PSU: 400W</li><li>Boost: 1797Mhz/ base: 1582Mhz in OC mode</li><li>Boost: 1771Mhz/ base: 1556Mhz in gaming mode</li><li>Form Factor: ATX</li></ul>','Gigabyte GeForce graphic card'),(11,2,9,'2019-07-01 06:45:04','Xiaomi redmi Note 7 128GB','efefef.jpg','safaas.jpg','fwfefw.jpg',200,'<p>Xiaomi Redmi Note 7 Pro 128GB Brief Description</p><p>Xiaomi Redmi Note 7 Pro 128GB was launched in February 2019 &amp; runs on Android 9.0 OS. The Smartphone is available in three color options i.e. Neptune Blue, Nebula Red, Space Black &amp; has a built in fingerprint sensor as the primary security feature, along with the host of connectivity options in terms of 3G, 4G, GPS, Wifi Bluetooth capabilities. The phone is available with 128GB of internal storage.</p><p>The Smartphone is powered by 2.0 GHz Octa core Qualcomm SDM675 Snapdragon 675 (11 nm) Processor. A 6GB of RAM &amp; Adreno 612 graphics processor ensures phone runs smoothly even the most memory intensive applications &amp; still shows no signs of lag. 128GB of internal storage can be expanded to 256 GB via a microSD card.</p><p>The Phone comes with a large 4000 mAh battery to support it&#39;s 6.3 inch screen with FHD Plus display having a resolution of 1080 X 2340 at 409 ppi. The screen is also protected by a durable Scratch Resistant glass</p>','Xiaomi redmi Note 7 128GB'),(12,2,9,'2019-07-06 17:27:55','Xiaomi PocoPhone F1','xiaomi-pocophone-f1-6gb-64gb-dual-sim-mobile.jpg','poco-blue-1.png','Snapdragon-845-Octa-Core-6-18-2246_6.jpg',280,'<p>iaomi Pocophone F1 was launched in August 2018 &amp; runs on Android 8.1 OS. The Smartphone is available in three color options i.e. Red, Graphite Black, Steel Blue &amp; has a built in fingerprint sensor as the primary security feature, along with the host of connectivity options in terms of 3G, 4G, GPS, Wifi Bluetooth capabilities. Priced at Rs. 17999 the phone is available with 64 GB of internal storage.</p><p>The Smartphone is powered by 2.8 GHz Octa core Qualcomm Snapdragon 845 Processor. A 6 GB of RAM &amp; Adreno 630 graphics processor ensures phone runs smoothly even the most memory intensive applications &amp; still shows no signs of lag. 64 GB of internal storage can be expanded to 256 GB via a microSD card.</p><p>The Phone comes with a large 4000 mAh battery to support it&#39;s 6.18 inch screen with FHD display having a resolution of 1080 x 2160 at 403 ppi. The screen is also protected by a Corning Gorilla Glass.</p><p>Xiaomi Pocophone F1 boasts of dual primary camera of 12MP + 5MP megapixel and 20MP megapixel front Camera. It also supports Face Detection and high dynamic range(HDR) imaging.</p>','Xiaomi PocoPhone F1'),(13,2,8,'2019-07-01 06:50:54','Huawei P30 Lite 128gb','03-500x500.jpg','wf wf w.jpg','wf f ww wf w.jpg',254,'<p>Huawei P30 Lite 128GB was launched in April 2019 &amp; runs on Android 9.0 OS. The Smartphone is available in three color options i.e. White, Black, Blue &amp; has a built in fingerprint sensor as the primary security feature, along with the host of connectivity options in terms of 3G, 4G, GPS, Wifi, NFC Bluetooth capabilities. Priced at Rs. 19990 the phone is available with 128GB of internal storage.</p><p>The Smartphone is powered by 2.2 GHz Octa core Hisilicon Kirin 710 (12 nm) Processor. A 4GB of RAM &amp; Mali-G51 MP4 graphics processor ensures phone runs smoothly even the most memory intensive applications &amp; still shows no signs of lag. 128GB of internal storage can be expanded to 512GB via a microSD card.</p><p>The Phone comes with a large 3340 mAh battery to support it&#39;s 6.15 inch screen with IPS LCD display having a resolution of 1080 X 2312 at 415 ppi.</p><p>Huawei P30 Lite 128GB boasts of dual primary camera of 24 + 8 + 2 megapixel and 32 megapixel front Camera. The Smartphone has a low camera aperture of f/1.6. It also supports Face Detection and high dynamic range(HDR) imaging.</p>','Huawei P30 Lite'),(14,4,8,'2019-07-05 00:55:36','Huawei Power bank 5000Mah','01-500x500 (1).jpg','01-500x500 (1).jpg','01-500x500 (1).jpg',18,'<p>Huawei 5000 mAh Power Bank AP006L</p><p>Ultra Slim And Lightweight</p><p>Easy To Carry</p><p>Fast Two-Way 2A Charging And Durable</p><p>3.5 hrs For A Full Charge</p><p>Lithium Polymer Battery</p><p>Input: DC 5V / 2A</p><p>Output: DC 5V / 2A</p><p>Multi Safety Protection - Temperature Protection</p><p>Multi Safety Protection - Short Circuit Protection</p><p>Multi Safety Protection - Input Over-Voltage Protection</p><p>Multi Safety Protection - Input Current Backflow</p><p>Multi Safety Protection - Output Over-Voltage Protection</p><p>Multi Safety Protection - Output Overcurrent Protection</p><p>Multi Safety Protection - Protection Against Over-Charging And Over-Discharging</p><p>Multi Safety Protection - Drop And Shock Test</p><p>Multi Safety Protection - Low / High Temperatures And Alternating Damp And Hot Tests</p><p>Dimensions (LxWxH): 120 x 71 x 9.3 mm</p><p>Weight: 113g</p>','Huawei Powerbank 5000Mah'),(15,2,8,'2019-07-01 06:36:16','Huawei Y9 2019','02-500x500 (1).jpg','01-500x500 (2).jpg','02-500x500 (1).jpg',200,'<p>Brief Description</p><p>Huawei Y9 Prime 2019 is announced to be launched in July 2019 &amp; will run on Android 9 OS. The Smartphone will be available in three color options i.e. Midnight Black, Emerald Green, and Sapphire Blue &amp; will also have a built in fingerprint sensor as the primary security feature, along with the host of connectivity options in terms of 3G, 4G, GPS, Wifi Bluetooth capabilities. The phone will come with 64 GB of internal storage.</p><p>The Smartphone will be powered by Octa core Midnight Black, Emerald Green, and Sapphire Blue Processor. A 4GB of RAM will ensure phone runs smoothly even the most memory intensive applications &amp; show no signs of lag. 64 GB of internal storage will be open for expansion via a microSD card.</p><p>The Phone will come with a large 4000 mAh battery to support it&#39;s 6.59 inch screen with an IPS display having a resolution of 1080 X 2340.</p><p>Huawei Y9 Prime 2019 will boasts of dual primary camera of 16 + 8 megapixel and 16 megapixel front Camera. It will support Face Detection and high dynamic range(HDR) imaging as well.</p>','Huawei Y9 2019'),(16,1,8,'2019-07-01 06:39:57','Huawei MediaPad T3 10 9.3 inches (16GB)','01-500x500.jpg','04-500x500.jpg','02-500x500.jpg',200,'<p>Manufacturer</p><p>Huawei</p><p>Model</p><p>Huawei MediaPad T3 10</p><p>launch date (global)</p><p>12-10-2017</p><p>operating system</p><p>Android</p><p>os version</p><p>7.0</p><p>Type</p><p>Tablet</p><p>os</p><p>Android</p><p>DISPLAY</p><p>display resolution (in pixels)</p><p>1200 x 800</p><p>display technology</p><p>TFT</p><p>screen size (in inches)</p><p>9.6</p><p>display features</p><p>IPS HD Touchscreen</p><p>CAMERA</p><p>front camera mp</p><p>5</p><p>rear camera mp</p><p>2</p><p>BATTERY</p><p>battery rating (in mah)</p><p>4800</p><p>CONNECTIVITY</p><p>wireless connectivity</p><p>Yes</p><p>charging port (proprietary, mini/microusb)</p><p>Yes</p><p>headphone connector</p><p>Yes</p><p>TECHNICAL SPECIFICATIONS</p><p>storage expandability (in gb)</p><p>Yes</p><p>RAM</p><p>2 GB</p><p>Processor</p><p>Snapdragon 425</p><p>processor cores</p><p>Quad</p><p>processor speed</p><p>1.4 GHz</p><p>internal storage</p><p>16 GB</p><p>bluetooth version</p><p>4.1</p><p>STORAGE</p><p>removable storage (yes or no)</p><p>Yes</p><p>removable storage (maximum)</p><p>128 GB</p><p>DIMENSIONS &amp;AMP; WEIGHT</p><p>dimensions (in mm)</p><p>229.80 x 159.80 x 7.90</p><p>weight (in grams)</p><p>460</p>','Huawei MediaPad T3 10 9.3 inches (16GB)'),(17,4,7,'2019-07-01 06:53:47','JBL Go 2 BT speaker','fwefwewf.jpg','ewfwewew.jpg','71e1RpL-35L._SL1500_.jpg',20,'<p>JBL Go 2 BT speaker</p>','JBL Go 2 BT speaker'),(18,4,7,'2019-07-01 06:56:00',' JBL FLIP 4 Flip4 Bluetooth Speaker','617XqXBD22L._SL1000_.jpg','61EyWxnANpL._SL1000_.jpg','51SpGx4gwcL._SL1000_.jpg',60,'<ul><li>Wirelessly connect up to 2 smartphones or tablets to the speaker and take turns playing impressive stereo sound</li><li>Built-in 3000mAh rechargeable li-ion battery Supports up to 12 hours of playtime</li><li>Ipx7 waterproof means no more worrying about rain or spills; you can even submerge flip 4 in water</li><li>JBL connect+ allows you to Link more than 100 JBL connect+ enabled speakers together to amplify the party</li><li>Dual external passive radiators demonstrate just how powerful your speaker is</li></ul>',' JBL FLIP 4 Flip4 Bluetooth Speaker'),(19,4,9,'2019-07-05 00:55:37','Xiaomi Pocket Power bank 10000mAh','201703140145120165jp9fl.jpg','1544391306678322751.jpg','201703140145120165jp9fl.jpg',20,'<p>â—<strong>High density battery chip, body volume decreased 21.4 percent:</strong><br />Introduced the latest battery technology, adopting the original custom batteries with high density from panasonic / LG and other international first-class suppliers, energy density up to 735 wh / L. It can be used to charge the XiaoMi Note device which owns the top version for 2.1 times.<br /><br />â—<strong>9S circuit protection, ensure the safety use</strong><br />Adopt the world&#39;s leading high performance charge and discharge chip. Not only providing 9S circuit protection, ensuring the safety using status. Still can improve the efficiency of charging and discharging.<br /><br />â—<strong>5.1V 2.1A USB output, quick charging</strong><br />2.1A current output, ensuring the emergency charging needs for its fast charging feature.<br /><br />â—<strong>Up to 93 percent conversion rate</strong><br />Adopting the world&#39;s top chip not only for safety, it also can effectively improve the charge conversion, providing stable discharge voltage. Meanwhile, achieving high precision resistance capacity of the device. Much better than ordinary mobile power charger, durable in daily use.<br /><br />â—<strong>Consistent the surface technology with MacBook Pro</strong><br />Precision CNC cutting technology, forming an integrated metal shell. The structure of high strength, resistance to collision. Its surface can prevent sweat corrosion resistance, suitable for carrying anywhere.<br /><br />â—<strong>Automatically adjust the output power, meeting the tablets&#39; charging needs</strong><br />XiaoMi mobile power supply according to the charged devices, achieving automatical output power adjustment. Fully compatible with XiaoMi, Apple, Samsung, HTC, blackberry and other mobile phones as well as Google tablets. Meanwhile, it can charge the battery for part of the digital cameras and handheld game consoles.</p>','Original Xiaomi Pocket Powerbank 10000mAh'),(20,3,9,'2019-07-01 07:06:09','Xiaomi Mi Gaming Laptop 15.6 inch','Xiaomi-Mi-Gaming-Notebook-15-6-inch-16GB-256GB-SSD-1TB-Quad-Core-Intel-Core-i7.jpg','Original-Xiaomi-Mi-Game-Laptop-15-6-inch-GTX-1050Ti-Notebook-8th-Enhance-SSD-256G-1TB-4.jpg','asasascascac.jpg',1300,'<p><strong>Xiaomi Mi Gaming Laptop</strong><br />The powerful&nbsp;<strong>Windows 10 OS</strong>&nbsp;makes it easy to check E-mail and manage digital files. Equipped with a&nbsp;<strong>15.6 inch IPS display</strong>, powered by&nbsp;<strong>Intel Core i5-8300H processor</strong>, designed with&nbsp;<strong>HDMI output</strong>, featuring&nbsp;<strong>NVIDIA GeForce GTX1060 4GB dedicated graphics</strong>, all of these give gamers a full suite for gaming dominance and offer gamers a truly seamless gaming experience.&nbsp;<strong>Dual band 2.4GHz / 5.0GHz WiFi</strong>&nbsp;supported, ensures you high-speed surfing.<br /><br /><strong>Main Features:</strong><br />â—<strong>Microsoft Windows 10 OS</strong><br />Offers more powerful performance, brings you more smooth and wonderful user experience<br />â—<strong>15.6 inch FHD IPS Screen with 1920 x 1080 Resolution</strong><br />Offers good experience for watching videos and browsing the Web&nbsp;<br />â—<strong>Intel Core i5-8300H Quad Core 2.3GHz, up to 4.0GHz</strong><br />Ultra-low-voltage platform and quad-core processing provide maximum high-efficiency power<br />â—<strong>NVIDIA GeForce GTX1050 Ti GDDR5 4G Dedicated Graphics</strong><br />Better and faster in playing games and watching videos<br />â—<strong>8GB DDR4 2666MHz RAM for Advanced Multitasking, up to 32GB</strong><br />Substantial high-bandwidth RAM to smoothly run your games, photos and video-editing applications<br />â—<strong>256GB SSD + 1TB HDD Storage Capacity</strong><br />Provides room to store pictures, videos, music and more<br />â—<strong>Front Camera for Photos and Face-to-face Chat</strong><br />1.0MP front camera allows you to capture memorable moments or chat with friends<br />â—<strong>Dual Band 2.4GHz / 5.0GHz WiFi</strong><br />Allows you to connect to the Web while within range of an available wireless network<br />â—<strong>HDMI Output</strong><br />You can connect the device to high-definition monitor or projector<br />â—<strong>&nbsp;Bluetooth 4.1 Interface Syncs with Compatible Devices</strong><br />Wirelessly transfer photos, music and other media between the computer and your Bluetooth-enabled cell phone or MP3 player, or connect Bluetooth wireless accessories</p>','Xiaomi Mi Gaming Laptop 15.6 inch'),(21,2,1,'2019-07-01 07:10:53','Samsung Galaxy M20 (64GB)','dvweew.jpg','ewvww.jpg','vvwwevwevewvwvwv.jpg',200,'<p>(6.3&quot;) FHD+ Infinity V Display<br />The Galaxy M20 comes with a stunning 16cm (6.3&quot;) infinity V display. Its near bezel-less edge to edge FHD+ screen gives you an immersive viewing experience. The new Exynos 7904, 1.8 GHz Octa Core Processor,<br />Fast is in its DNA. The Galaxy M20 can multitask with gaming, videos and social media without breaking a sweat. Ultra-Wide Dual Rear Camera<br />Now shoot from one extreme to the other without FOMO. Set #SquadGoals by clicking group photos from the Ultra Wide Dual Rear Camera. Widevine L1 Certification and Dolby ATMOS<br />The Galaxy M20 is an entertainment powerhouse with Widevine L1 Certification to stream HD content and Dolby ATMOS 360&deg; surround sound that will get you hooked on to your videos and music Fast Face Unlock and Fingerprint Sensor<br />The Galaxy M20 features biometric authentication which lets you easily unlock your phone with just your face or fingerprint.</p>','Samsung Galaxy M20 (64GB)'),(22,1,1,'2019-07-01 07:17:23','Samsung Galaxy Tab S2 9.7','es-galaxy-tab-s2-9-7-t819-sm-t819nzkephe-000000001-front-black.jpg','samsung_sm_t813nzkexar_32gb_galaxy_tab_s2_1245715.jpg','es-galaxy-tab-s2-9-7-t819-sm-t819nzkephe-000000001-front-black.jpg',340,'<p>Samsung Galaxy Tab S2 9.7 Android tablet. Announced Jul 2015. Features 9.7&Prime; Super AMOLED display, Exynos 5433 chipset, 8 MP primary camera, 2.1 MP front camera, 5870 mAh battery, 64 GB storage, 3 GB RAM.</p>','Samsung Galaxy Tab S2 9.7'),(23,5,7,'2019-07-01 07:22:20','RUNMUS Gaming Headset','61lnzTv2a0L._SL1000_.jpg','61tT9QqP98L._SL1500_.jpg','712OdLFBI4L._SL1500_.jpg',22,'<ul><li>50MM DRIVER DELIVERS SURROUND SOUND. Whether you&#39;re immersed in God of War or want to hear your enemies motion in Fortnite, PUBG or CS:GO, wearing a professional gaming headset does matters. With a 50mm driver, RUNMUS PS4 headset offers an incredibly surround sound for both games and music.</li><li>ERGONOMIC DESIGN &amp; PREMIUM MATERIAL. Gamers usually play games for many hours, so the comfort is also a key factor when choosing a Xbox one headset. We have tested our headsets for many years on hundreds of different heads, the retractable band and breathable ear pad make sure every player could enjoy the optimal wearing comfort.</li><li>MULTIPLE PLATFORM COMPATIBILITY. This gaming headset with a 3.5mm audio jack is compatible with PC, PS4 controller, Xbox One controller(Please note: newer models have a headphone jack, older ones require an adapter.), Nintendo Switch (audio), Nintendo New 3DS LL/3DS (audio), Nintendo 3DS LL/3DS (audio).</li><li>NOISE CANCELING MICROPHONE. This PS4 headset provides high-end noise cancellation to enable you to chat to your fellow players with crystal clarity. If you wanna enjoy your valuable me-time without communicating with other players, you could turn off the mic by flipping the switch.</li><li>100% QUALITY GUARANTEED &amp; 12 MONTHS WARRANTY. Every RUNMUS gaming headset will go trough a strict quality test process before sending out. We promised to bring the best quality gaming headset to our customer. From the day of purchase of RUNMUS gaming headset, we offer 12 months warranty to our customer. Every customer&#39;s right is fully guaranteed during the warranty period.</li></ul>','RUNMUS Gaming Headset'),(24,5,7,'2019-07-01 07:24:29','CHONCHOW Led RGB Gaming Keyboard Mouse Combo','71-SRSVFsPL._SL1500_.jpg','71FGv7ArkDL._SL1500_.jpg','71dQNyqlEGL._SL1500_.jpg',20,'<ul><li>â˜…Ertra stable gaming keyboardâ˜…19keys non-conflict/Mechanical feeling/Led backlit,likes almost of other keyboards,it defined as one gaming keyboard.With metal pannel,you can feel more stable when u play game.</li><li>â˜…6 Button mouse with 2 side-buttonâ˜…7 color breathing backlight,1200-1600-2400-3200DPI adjustable,about 1.4M cable.Can be used in game,office work,home.</li><li>â˜…10 million click-life keyboard---Stable and durable keyboard,can go through from one game to another game with you.</li><li>â˜…Reasonable layout and some strengthened keys---104 keys and strengthened space key/enter key,you can enjoy the cozy and interesting typing.Space key and enter key can give u different feeling.</li><li>â˜…Easy to use,convenient multimedia keys and fast service after-sale.Receive the fast reply whenever you meet the problem of quality and mail us.Plug and play,it can suit to you.</li></ul>','CHONCHOW Led RGB Gaming Keyboard Mouse Combo');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (13,'slide 1','slide 1.jpg'),(14,'slide 2','Untitled-1.jpg'),(15,'slide 3','slide 3.jpg');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database '3091031_ichoice'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-01 11:38:50
