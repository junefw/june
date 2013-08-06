-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema phuongthao
--

CREATE DATABASE IF NOT EXISTS phuongthao;
USE phuongthao;

--
-- Definition of table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `idadmin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hoten` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `level` int(10) unsigned DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`idadmin`,`hoten`,`email`,`dienthoai`,`username`,`password`,`level`,`ngaycapnhat`,`active`) VALUES 
 (1,'le duc tho','12110515@yahoo.com','0982606099','hspq07','21232f297a57a5a743894a0e4a801fc3',1,NULL,1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


--
-- Definition of table `chitiethoadon`
--

DROP TABLE IF EXISTS `chitiethoadon`;
CREATE TABLE `chitiethoadon` (
  `idchitiethoadon` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(100) DEFAULT NULL,
  `hinh` varchar(100) DEFAULT NULL,
  `gia` decimal(19,0) DEFAULT NULL,
  `soluong` int(10) unsigned DEFAULT NULL,
  `idsanpham` int(10) unsigned DEFAULT NULL,
  `idhoadon` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idchitiethoadon`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiethoadon`
--

/*!40000 ALTER TABLE `chitiethoadon` DISABLE KEYS */;
INSERT INTO `chitiethoadon` (`idchitiethoadon`,`tieude`,`hinh`,`gia`,`soluong`,`idsanpham`,`idhoadon`) VALUES 
 (1,'Nha go thien nhien','inverse-logic---IL.jpg','2000000',1,30,1),
 (2,'Nha go thien nhien','33785-m.jpg','2000000000',2,28,1),
 (3,'',NULL,'0',0,28,NULL),
 (4,'Nha go thien nhien',NULL,'2000000000',12,28,1),
 (5,'KhÃ¡ch sáº¡n kiá»ƒu Viá»‡t','nhago.jpg','2000000000',12,1,1),
 (6,'Nha go thien nhien','logo_tm.jpg','999000000',1,29,2),
 (7,'Nha go thien nhien','33785-m.jpg','2000000000',1,28,2),
 (8,'Nha hang kieu Nhat','horizontal_repeat_sprite.png','2000000000',2,26,2);
/*!40000 ALTER TABLE `chitiethoadon` ENABLE KEYS */;


--
-- Definition of table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE `donhang` (
  `iddonhang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test` int(11) DEFAULT NULL,
  `hoten` varchar(100) DEFAULT NULL,
  `diachi` varchar(254) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT '0',
  `idsanpham` int(10) unsigned DEFAULT NULL,
  `noidung` text,
  PRIMARY KEY (`iddonhang`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `donhang`
--

/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
INSERT INTO `donhang` (`iddonhang`,`test`,`hoten`,`diachi`,`email`,`dienthoai`,`fax`,`ngaycapnhat`,`active`,`idsanpham`,`noidung`) VALUES 
 (1,NULL,'le duc tho','PhÃƒÂº QuÃƒÂ½','1211@yahoo.com','123456','1234567','1988-12-11 00:00:00',0,1,'noi dun'),
 (2,NULL,'le duc tho','phu quÃƒÂ½','12110515@yahoo.com','12345','12345678',NULL,0,2,NULL),
 (3,NULL,'le duc tho','phu quÃƒÂ½','','12345','','0000-00-00 00:00:00',0,2,'asds'),
 (4,NULL,'le duc tho','phu quÃƒÂ½','12110515@yahoo.com','12345','12345678','0000-00-00 00:00:00',0,3,'nÃ¡Â»â„¢i dung Ã„â€˜Ã¡ÂºÂ·t hÃƒÂ ng'),
 (5,NULL,'le duc tho','phu quÃƒÂ½','12110515@yahoo.com','12345','12345678','0000-00-00 00:00:00',0,6,'nÃ¡Â»â„¢i dung Ã„â€˜Ã¡ÂºÂ·t hÃƒÂ ng nÃƒÂ¨'),
 (6,NULL,'le duc tho','phu quÃƒÂ½','12110515@yahoo.com','12345','12345678','0000-00-00 00:00:00',0,6,'nÃ¡Â»â„¢i dung Ã„â€˜Ã¡ÂºÂ·t hÃƒÂ ng nÃƒÂ¨'),
 (7,NULL,'le duc tho','phu quÃƒÂ½','12110515@yahoo.com','12345','12345678','0000-00-00 00:00:00',0,6,'nÃ¡Â»â„¢i dung Ã„â€˜Ã¡ÂºÂ·t hÃƒÂ ng nÃƒÂ¨'),
 (8,NULL,'le duc tho','phu quÃƒÂ½','12110515@yahoo.com','12345','12345678','0000-00-00 00:00:00',0,6,'nÃ¡Â»â„¢i dung Ã„â€˜Ã¡ÂºÂ·t hÃƒÂ ng nÃƒÂ¨'),
 (9,NULL,'le duc tho','phu quÃƒÂ½','12110515@yahoo.com','12345','12345678','0000-00-00 00:00:00',0,6,'nÃ¡Â»â„¢i dung Ã„â€˜Ã¡ÂºÂ·t hÃƒÂ ng nÃƒÂ¨'),
 (10,NULL,'le duc tho','phu quÃƒÂ½','12110515@yahoo.com','12345','12345678','0000-00-00 00:00:00',0,6,'nÃ¡Â»â„¢i dung Ã„â€˜Ã¡ÂºÂ·t hÃƒÂ ng nÃƒÂ¨'),
 (11,NULL,'le duc tho','phu quÃƒÂ½','12110515@yahoo.com','12345','12345678','0000-00-00 00:00:00',0,6,'nÃ¡Â»â„¢i dung Ã„â€˜Ã¡ÂºÂ·t hÃƒÂ ng nÃƒÂ¨'),
 (12,NULL,'le duc tho','phu quÃƒÂ½','','12345','12345678','0000-00-00 00:00:00',0,1,' sdfasdfsaf'),
 (13,NULL,'ke bit mat','phÃƒÂº quÃƒÂ½','kebitmat@yahoo.com','12345789','123456789','0000-00-00 00:00:00',0,3,'nÃ¡Â»â„¢i dung 1111111111199999999999999999999'),
 (14,NULL,'ke bit mat','phÃƒÂº quÃƒÂ½','kebitmat@yahoo.com','12345789','123456789','0000-00-00 00:00:00',0,3,'nÃ¡Â»â„¢i dung 1111111111199999999999999999999'),
 (15,NULL,'ke bit mat','phÃƒÂº quÃƒÂ½','kebitmat@yahoo.com','12345789','123456789','2011-09-14 17:02:57',0,3,'nÃ¡Â»â„¢i dung 1111111111199999999999999999999');
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;


--
-- Definition of table `donvitinh`
--

DROP TABLE IF EXISTS `donvitinh`;
CREATE TABLE `donvitinh` (
  `iddonvitinh` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(45) DEFAULT NULL,
  `ghichu` varchar(254) DEFAULT NULL,
  `sapxep` int(10) unsigned DEFAULT '0',
  `active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`iddonvitinh`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donvitinh`
--

/*!40000 ALTER TABLE `donvitinh` DISABLE KEYS */;
INSERT INTO `donvitinh` (`iddonvitinh`,`tieude`,`ghichu`,`sapxep`,`active`) VALUES 
 (1,'cÃ¡i','TÃ­nh theo cÃ¡i',1,1),
 (2,'lit','1 lit',2,1),
 (3,'','',0,0),
 (4,'kg','tÃ­nh theo kg',3,1);
/*!40000 ALTER TABLE `donvitinh` ENABLE KEYS */;


--
-- Definition of table `gioithieu`
--

DROP TABLE IF EXISTS `gioithieu`;
CREATE TABLE `gioithieu` (
  `idgioithieu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noidung` text,
  `active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`idgioithieu`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gioithieu`
--

/*!40000 ALTER TABLE `gioithieu` DISABLE KEYS */;
INSERT INTO `gioithieu` (`idgioithieu`,`noidung`,`active`) VALUES 
 (1,'\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size: 16pt; font-weight: bold; \">CÃN Bá»˜ Cáº¤P CAO Tá»ˆNH QUáº¢NG TRá»Š THÄ‚M\r\n		<o:p></o:p></span></p>\r\n\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size: 16pt; font-weight: bold; \">NHÃ€ MÃY SXCB Gá»– GH&Eacute;P THANH \r\n		<o:p></o:p></span></p>\r\n\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size: 16pt; font-weight: bold; \">CÃ”NG TY TNHH PHÆ¯Æ NG THáº¢O\r\n		<o:p></o:p></span></p>\r\n\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size: 16pt; font-weight: bold; \">\r\n		<o:p>&nbsp;</o:p></span></p>\r\n\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-indent:.5in;line-height:150%\">CÃ´ng\r\nty ráº¥t vinh dá»± khi Ä‘Æ°á»£c sá»± quan tÃ¢m cá»§a Ban lÃ£nh Ä‘áº¡o tá»‰nh NhÃ . Sá»± cÃ³ máº·t cá»§a Chá»§\r\ntá»‹ch Tá»‰nh vÃ  BÃ­ thÆ° tá»‰nh Quáº£ng Trá»‹ Ä‘Ã£ Ä‘áº¿n thÄƒm cÃ´ng ty â€“ NhÃ  mÃ¡y lÃ  niá»m Ä‘á»™ng\r\nviÃªn cho Ban lÃ£nh Ä‘áº¡o CÃ´ng ty vÃ  táº¥t cáº£ cÃ¡n bá»™ CÃ´ng nhÃ¢n viÃªn cá»§a NhÃ  mÃ¡y, CÃ¡c Ä‘á»“ng\r\nchÃ­ Ä‘Ã£ chá»‰ Ä‘áº¡o, gÃ³p thÃªm Ã½ kiáº¿n quÃ½ bÃ¡u nháº±m thÃºc Ä‘áº©y quÃ¡ trÃ¬nh sáº£n xuáº¥t, kinh\r\ndoanh cá»§a CÃ´ng ty. VÃ  váº¡ch ra phÆ°Æ¡ng hÆ°á»›ng sáº£n xuáº¥t cho cÃ¡c nÄƒm tá»›i.</p>\r\n\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-indent:.5in;line-height:150%\">&nbsp;\r\n	<!--\r\n	[if gte vml 1]><v:shapetype id=\"_x0000_t75\"\r\n coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\" path=\"m@4@5l@4@11@9@11@9@5xe\"\r\n filled=\"f\" stroked=\"f\">\r\n <v:stroke joinstyle=\"miter\"/>\r\n <v:formulas>\r\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\"/>\r\n  <v:f eqn=\"sum @0 1 0\"/>\r\n  <v:f eqn=\"sum 0 0 @1\"/>\r\n  <v:f eqn=\"prod @2 1 2\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelWidth\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @0 0 1\"/>\r\n  <v:f eqn=\"prod @6 1 2\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelWidth\"/>\r\n  <v:f eqn=\"sum @8 21600 0\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @10 21600 0\"/>\r\n </v:formulas>\r\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"t\"/>\r\n</v:shapetype><v:shape id=\"_x0000_i1025\" type=\"#_x0000_t75\" style=\'width:6in;\r\n height:324pt\'>\r\n <v:imagedata src=\"file:///C:\\Users\\ADMIN\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_image001.jpg\"\r\n  o:title=\"IMG_1386\"/>\r\n</v:shape><![endif]\r\n	-->\r\n	\r\n	<!--\r\n	[if !vml]\r\n	-->\r\n	\r\n	<img width=\"576\" height=\"432\" src=\"file:///C:/Users/ADMIN/AppData/Local/Temp/msohtmlclip1/01/clip_image002.jpg\" v:shapes=\"_x0000_i1025\" />\r\n	<!--\r\n	[endif]\r\n	-->\r\n	</p>\r\n\r\n\r\n<p class=\"MsoNormal\">\r\n	<o:p>&nbsp;</o:p></p>\r\n\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center;tab-stops:170.25pt\">Ban\r\ngiÃ¡m Ä‘á»‘c CÃ´ng ty TNHH PhÆ°Æ¡ng Tháº£o giá»›i thiá»‡u vá»›i CBCC Tá»‰nh vá» sáº£n pháº©m mÃ  NhÃ \r\nmÃ¡y SXCB gá»— gh&eacute;p thanh sáº£n xuáº¥t.</p>\r\n\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center;text-indent:.5in; line-height:150%\">\r\n	<!--\r\n	[if gte vml 1]><v:shape id=\"_x0000_i1026\" type=\"#_x0000_t75\"\r\n style=\'width:6in;height:324pt\'>\r\n <v:imagedata src=\"file:///C:\\Users\\ADMIN\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_image003.jpg\"\r\n  o:title=\"IMG_1387\"/>\r\n</v:shape><![endif]\r\n	-->\r\n	\r\n	<!--\r\n	[if !vml]\r\n	-->\r\n	\r\n	<img width=\"576\" height=\"432\" src=\"file:///C:/Users/ADMIN/AppData/Local/Temp/msohtmlclip1/01/clip_image004.jpg\" v:shapes=\"_x0000_i1026\" />\r\n	<!--\r\n	[endif]\r\n	-->\r\n	</p>\r\n\r\n\r\n<p class=\"MsoNormal\">\r\n	<o:p>&nbsp;</o:p></p>\r\n\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center;tab-stops:170.25pt\">Ban\r\ngiÃ¡m Ä‘á»‘c CÃ´ng ty TNHH PhÆ°Æ¡ng Tháº£o giá»›i thiá»‡u vá»›i CBCC Tá»‰nh vá» cÆ¡ sá» váº­t cháº¥t\r\nNhÃ  mÃ¡y SXCB gá»— gh&eacute;p thanh.</p>\r\n\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center;tab-stops:243.75pt\">\r\n	<o:p>&nbsp;</o:p></p>\r\n\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center;text-indent:.5in; line-height:150%\">\r\n	<!--\r\n	[if gte vml 1]><v:shape id=\"_x0000_i1027\" type=\"#_x0000_t75\"\r\n style=\'width:6in;height:324pt\'>\r\n <v:imagedata src=\"file:///C:\\Users\\ADMIN\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_image005.jpg\"\r\n  o:title=\"IMG_1380\"/>\r\n</v:shape><![endif]\r\n	-->\r\n	\r\n	<!--\r\n	[if !vml]\r\n	-->\r\n	\r\n	<img width=\"576\" height=\"432\" src=\"file:///C:/Users/ADMIN/AppData/Local/Temp/msohtmlclip1/01/clip_image006.jpg\" v:shapes=\"_x0000_i1027\" />\r\n	<!--\r\n	[endif]\r\n	-->\r\n	</p>\r\n\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-indent:.5in;line-height:150%\">\r\n	<!--\r\n	[if gte vml 1]><v:shape\r\n id=\"_x0000_i1028\" type=\"#_x0000_t75\" style=\'width:6in;height:324pt\'>\r\n <v:imagedata src=\"file:///C:\\Users\\ADMIN\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_image007.jpg\"\r\n  o:title=\"IMG_1379\"/>\r\n</v:shape><![endif]\r\n	-->\r\n	\r\n	<!--\r\n	[if !vml]\r\n	-->\r\n	\r\n	<img width=\"576\" height=\"432\" src=\"file:///C:/Users/ADMIN/AppData/Local/Temp/msohtmlclip1/01/clip_image008.jpg\" v:shapes=\"_x0000_i1028\" />\r\n	<!--\r\n	[endif]\r\n	-->\r\n	</p>\r\n\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\">TrÃ¢n trá»ng cáº£m Æ¡n\r\ncÃ¡c Ä‘á»“ng chÃ­!</p>',1);
/*!40000 ALTER TABLE `gioithieu` ENABLE KEYS */;


--
-- Definition of table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE `hoadon` (
  `idhoadon` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ngaycapnhat` datetime DEFAULT NULL,
  `hoten` varchar(45) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `soluong` int(10) unsigned DEFAULT NULL,
  `tongcong` double DEFAULT NULL,
  `ykienkhachhang` varchar(254) DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT NULL,
  `idthanhvien` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idhoadon`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
INSERT INTO `hoadon` (`idhoadon`,`ngaycapnhat`,`hoten`,`diachi`,`email`,`dienthoai`,`fax`,`soluong`,`tongcong`,`ykienkhachhang`,`active`,`idthanhvien`) VALUES 
 (1,'2011-11-12 00:00:00','LÃª Äá»©c Thá»','458/76 LÃ½ ThÃ¡i Tá»• P.10, Q.10 HCM','12110515@yahoo.com','01675584174','098723456 1',3,9000000000,'aaaaaaaaaaaa',1,2),
 (2,NULL,'le duc tho','458/76 LÃ½ ThÃ¡i Tá»• P.10, Q.10 HCM','test@yaho.com','01675584174','098723456 1',4,6999000000,'aaaaaaaaaaaaaaaaa',NULL,4);
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;


--
-- Definition of table `lienhe`
--

DROP TABLE IF EXISTS `lienhe`;
CREATE TABLE `lienhe` (
  `idlienhe` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noidung` text,
  `active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`idlienhe`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lienhe`
--

/*!40000 ALTER TABLE `lienhe` DISABLE KEYS */;
INSERT INTO `lienhe` (`idlienhe`,`noidung`,`active`) VALUES 
 (1,'lien há»‡',1);
/*!40000 ALTER TABLE `lienhe` ENABLE KEYS */;


--
-- Definition of table `menu_horizontal`
--

DROP TABLE IF EXISTS `menu_horizontal`;
CREATE TABLE `menu_horizontal` (
  `idmenu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT '1',
  `vitri` int(10) unsigned DEFAULT '0',
  `sapxep` int(10) unsigned DEFAULT '0',
  `loaitintuc` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`idmenu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_horizontal`
--

/*!40000 ALTER TABLE `menu_horizontal` DISABLE KEYS */;
INSERT INTO `menu_horizontal` (`idmenu`,`tieude`,`url`,`active`,`vitri`,`sapxep`,`loaitintuc`) VALUES 
 (1,'Trang chá»§','index.php',1,1,1,NULL),
 (2,'Giá»›i thiá»‡u','',1,1,2,1),
 (3,'Tin tá»©c & Sá»± kiá»‡n','',1,1,3,1),
 (4,'Khuyáº¿n mÃ£i','index.php?mod=theloaitin&idTLT=4',1,1,4,1),
 (5,'Tuyá»ƒn dá»¥ng','index.php?mod=theloaitin&idTLT=5',1,1,5,1),
 (6,'Trang chá»§','index.php',1,4,1,0),
 (7,'Giá»›i thiá»‡u','index.php?mod=gioithieu',1,4,2,NULL),
 (8,'LiÃªn há»‡','index.php?mod=lienhe',1,4,3,NULL),
 (9,'test','index.php?mod=theloaitin&idTLT=4',0,1,0,0),
 (10,'test1','',0,1,1,0),
 (11,'','',0,0,0,0),
 (12,'2','2',0,1,0,0),
 (13,'1','1',0,0,0,0),
 (14,'a','index.php?mod=theloaitin&idTLT=4',0,1,1,0),
 (15,'ÄÄƒng kÃ­','index.php?mod=dangkithanhvien',0,1,6,0),
 (16,'test aaaa','index.php?mod=theloaitin&idTLT=4',0,1,0,0);
/*!40000 ALTER TABLE `menu_horizontal` ENABLE KEYS */;


--
-- Definition of table `nhasanxuat`
--

DROP TABLE IF EXISTS `nhasanxuat`;
CREATE TABLE `nhasanxuat` (
  `idnhasanxuat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tennhasanxuat` varchar(200) DEFAULT NULL,
  `hinh` varchar(100) DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT '1',
  `sapxep` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`idnhasanxuat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nhasanxuat`
--

/*!40000 ALTER TABLE `nhasanxuat` DISABLE KEYS */;
INSERT INTO `nhasanxuat` (`idnhasanxuat`,`tennhasanxuat`,`hinh`,`active`,`sapxep`) VALUES 
 (1,'Poloha','allstockmusic---ASM.jpg',1,1),
 (2,'Vika','website-promotion---wdl.jpg',1,2);
/*!40000 ALTER TABLE `nhasanxuat` ENABLE KEYS */;


--
-- Definition of table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham` (
  `idsanpham` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(200) DEFAULT NULL,
  `hinh` varchar(200) DEFAULT NULL,
  `gia` int(20) unsigned DEFAULT NULL,
  `idnhasanxuat` int(10) DEFAULT NULL,
  `soluong` int(10) DEFAULT '0',
  `trichdan` varchar(254) DEFAULT NULL,
  `noidung` text,
  `ngaycapnhat` datetime DEFAULT NULL,
  `idtheloai` int(10) unsigned DEFAULT NULL,
  `idtheloaicon` int(10) unsigned DEFAULT NULL,
  `conoibat` tinyint(3) unsigned DEFAULT '0',
  `conew` tinyint(3) unsigned DEFAULT '0',
  `active` tinyint(3) unsigned DEFAULT '1',
  `iddonvitinh` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idsanpham`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` (`idsanpham`,`tensanpham`,`hinh`,`gia`,`idnhasanxuat`,`soluong`,`trichdan`,`noidung`,`ngaycapnhat`,`idtheloai`,`idtheloaicon`,`conoibat`,`conew`,`active`,`iddonvitinh`) VALUES 
 (1,'KhÃ¡ch sáº¡n kiá»ƒu Viá»‡t','nhago.jpg',2000000000,0,99,'ÄÃ¢y lÃ  ná»™i dung trÃ­ch dáº«n sáº£n pháº©m \"khÃ¡ch sáº¡n kiá»ƒu Viá»‡t\"\"','ÄÃ¢y lÃ  ná»™i dung  sáº£n pháº©m \"khÃ¡ch sáº¡n kiá»ƒu Viá»‡t\"\"','2011-09-26 00:00:00',3,1,0,0,1,NULL),
 (16,'Nha go thien nhien','header.jpg',2000000000,0,99,'aaaaaaaaaa','<span style=\"color: rgb(70, 130, 180);\">sasdfs <br />\r\n	\r\n	<br />\r\n	\r\n	dfs<br style=\"background-color: rgb(50, 205, 50);\" />\r\n	\r\n	<span style=\"background-color: rgb(50, 205, 50);\">sdf</span><br style=\"background-color: rgb(50, 205, 50);\" />\r\n	\r\n	<span style=\"background-color: rgb(50, 205, 50);\">s</span><br style=\"background-color: rgb(50, 205, 50);\" />\r\n	\r\n	<span style=\"background-color: rgb(50, 205, 50);\">fsdf</span><br />\r\n	\r\n	</span>','2011-09-26 00:00:00',2,0,1,1,1,1),
 (17,'NEW KINGSTON SET','image011.jpg',4875000,0,10000,'Giao hÃ ng miá»…n phÃ­ trong khu vá»±c ná»™t thÃ nh Quy NhÆ¡n.\r\nNÄƒng lá»±c giao hÃ ng cÃ³ thá»ƒ giao 100 sáº£n pháº©m trong vÃ²ng 03 ngÃ y sau khi Ä‘Æ¡n hÃ ng Ä‘Æ°á»£c cháº¥p nháº­n.','<span style=\"color: rgb(255, 165, 0); \" class=\"Apple-style-span\">Trá»ng lÆ°á»£ng (Kg):    \r\n+ BÃ n: 12\r\n+ Gháº¿: 54\r\n- KTSP (mm):     \r\n+ BÃ n: 480 x 600 x 910\r\n+ Gháº¿: 1500 x 1500 x 720\r\nSá»‘ lÆ°á»£ng sp/ Bao bÃ¬    \r\n+ BÃ n: 1pcs / Ctn\r\n+ Gháº¿: 1pcs / Ctn\r\nSá»‘ lÆ°á»£ng sp / 40â€™    \r\n+ BÃ n: 240\r\n+ Gháº¿: 820\r\nGiao hÃ ng miá»…n phÃ­ trong khu vá»±c ná»™t thÃ nh Quy NhÆ¡n.\r\nNÄƒng lá»±c giao hÃ ng cÃ³ thá»ƒ giao 100 sáº£n pháº©m trong vÃ²ng 03 ngÃ y sau khi Ä‘Æ¡n hÃ ng Ä‘Æ°á»£c cháº¥p nháº­n. \r\nGiao hÃ ng miá»…n phÃ­ trong khu vá»±c ná»™t thÃ nh Quy NhÆ¡n.\r\nCam káº¿t giÃ¡ tá»‘t nháº¥t     Theo yÃªu cáº§u cá»§a khÃ¡ch hÃ ng</span>','2011-01-01 11:11:11',2,0,1,0,1,1),
 (19,'KhÃ¡ch sáº¡n kiá»ƒu Viá»‡t NEW','33498-m.jpg',2000000000,0,124,'trÃ­ch dáº«n','Ná»™i dung','2012-10-09 22:49:03',2,0,0,0,1,NULL),
 (20,'Nha go thien nhien','33662-m.jpg',999000000,1,0,'55555','Nha go thien nhien','0000-00-00 00:00:00',0,2,0,0,1,1),
 (21,'Nha hang kieu Nhat','inverse-logic---IL.jpg',999000000,1,12000,'Nha hang kieu Nhat','Nha hang kieu Nhat','0000-00-00 00:00:00',2,0,0,0,1,1),
 (22,'nha go','33753-m.jpg',999000000,1,55555,',$iddonvitinh',',$iddonvitinh','0000-00-00 00:00:00',2,0,0,0,1,1),
 (23,'KhÃ¡ch sáº¡n kiá»ƒu Viá»‡t NEW','33498-m.jpg',999000000,1,99,'trich dan','noi dung','2011-10-10 01:27:16',2,2,0,0,1,1),
 (24,'nha gá»— 12','33785-m.jpg',2000000000,1,12000,'trich dan','noi dung','2011-10-10 01:32:36',10,0,0,1,2,0),
 (25,'KhÃ¡ch sáº¡n kiá»ƒu Viá»‡t','logo_tm_text.png',2000000000,1,12000,'trich dan','noi dung','2011-10-10 01:34:27',2,0,0,0,1,1),
 (26,'Nha hang kieu Nhat','horizontal_repeat_sprite.png',2000000000,1,55555,'df','gd','2011-10-10 01:37:27',4,0,0,0,1,1),
 (27,'KhÃ¡ch sáº¡n kiá»ƒu Viá»‡t NEW','logo_tm_text.png',999000000,0,3333,'eeeeee','egegrg','2011-10-10 11:40:32',2,0,0,1,1,1),
 (28,'Nha go thien nhien','33785-m.jpg',2000000000,0,0,'','','2011-10-10 00:19:49',2,0,1,1,1,1),
 (29,'Nha go thien nhien','logo_tm.jpg',999000000,1,345,'erfsd','dsdfsd','2011-10-10 02:26:14',2,0,1,1,1,1),
 (30,'Nha go thien nhien','inverse-logic---IL.jpg',2000000000,2,45,'dfgdf','dfgdf','2011-10-10 02:27:14',2,2,1,1,1,4);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;


--
-- Definition of table `submenu_horizontal`
--

DROP TABLE IF EXISTS `submenu_horizontal`;
CREATE TABLE `submenu_horizontal` (
  `idsubmenu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `vitri` int(10) unsigned DEFAULT '0',
  `sapxep` int(10) unsigned DEFAULT '0',
  `active` tinyint(3) unsigned DEFAULT '1',
  `idmenu` int(10) unsigned DEFAULT NULL,
  `loaitintuc` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`idsubmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submenu_horizontal`
--

/*!40000 ALTER TABLE `submenu_horizontal` DISABLE KEYS */;
INSERT INTO `submenu_horizontal` (`idsubmenu`,`tieude`,`url`,`vitri`,`sapxep`,`active`,`idmenu`,`loaitintuc`) VALUES 
 (1,'HÃ¬nh áº£nh','index.php?mod=hinhanh',1,1,0,2,0),
 (2,'Hoáº¡t Ä‘á»™ng','index.php?mod=theloaitin&idTLT=2&idTLTC=2',1,2,0,2,1),
 (3,'Báº±ng khen','index.php?mod=theloaitin&idTLT=2&idTLTC=3',1,3,0,2,1),
 (4,'ThÆ° viá»‡n áº£nh','index.php?mod=thuvienanh',1,4,0,2,0),
 (5,'Tin tá»©c','index.php?mod=theloaitin&idTLT=3&idTLTC=5',1,1,1,3,1),
 (6,'Tin hoáº¡t Ä‘á»™ng','index.php?mod=theloaitin&idTLT=3&idTLTC=6',1,2,1,3,1),
 (7,'Sá»± kiá»‡n','index.php?mod=theloaitin&idTLT=3&idTLTC=7',1,3,1,3,1),
 (8,'test11 2','index.php?mod=theloaitin&idTLT=4',1,1,0,1,1),
 (9,'test danh muc con 1','index.php?mod=theloaitin&idTLT=6',3,0,0,1,1),
 (10,'test','index.php?mod=theloaitin&idTLT=4',1,2,0,1,1);
/*!40000 ALTER TABLE `submenu_horizontal` ENABLE KEYS */;


--
-- Definition of table `thanhvien`
--

DROP TABLE IF EXISTS `thanhvien`;
CREATE TABLE `thanhvien` (
  `idthanhvien` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hoten` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `diachi` varchar(200) DEFAULT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `level` int(10) unsigned DEFAULT '1',
  `ngaycapnhat` datetime DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`idthanhvien`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhvien`
--

/*!40000 ALTER TABLE `thanhvien` DISABLE KEYS */;
INSERT INTO `thanhvien` (`idthanhvien`,`hoten`,`email`,`diachi`,`dienthoai`,`username`,`password`,`level`,`ngaycapnhat`,`active`) VALUES 
 (2,'LÃª Äá»©c Thá»','12110515@yahoo.com',NULL,NULL,'kebitmat','21232f297a57a5a743894a0e4a801fc3',1,'2011-10-06 18:09:42',1),
 (3,'le duc tho','12110515@yahoo.com','Phu Quy','01675584174','tony','c4ca4238a0b923820dcc509a6f75849b',1,'2011-10-06 18:11:48',1),
 (4,'le duc tho','test@yaho.com','','','test','098f6bcd4621d373cade4e832627b4f6',1,'2011-10-07 18:27:59',1),
 (5,'le duc tho','12110515@yahoo.com','','','aaa','47bce5c74f589f4867dbd57e9ca9f808',1,'2011-10-08 17:26:41',1),
 (6,'bbb','hspq07@gmail.com','','','bbb','08f8e0260c64418510cefb2b06eee5cd',1,'2011-10-08 17:30:28',1),
 (7,'ccc','12110515@yahoo.com','','','ccc','9df62e693988eb4e1e1444ece0578579',1,'2011-10-08 17:32:20',1),
 (8,'a','a','','','s','0cc175b9c0f1b6a831c399e269772661',1,'2011-10-15 15:41:35',1);
/*!40000 ALTER TABLE `thanhvien` ENABLE KEYS */;


--
-- Definition of table `theloai`
--

DROP TABLE IF EXISTS `theloai`;
CREATE TABLE `theloai` (
  `idtheloai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT '1',
  `sapxep` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`idtheloai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theloai`
--

/*!40000 ALTER TABLE `theloai` DISABLE KEYS */;
INSERT INTO `theloai` (`idtheloai`,`tieude`,`url`,`active`,`sapxep`) VALUES 
 (9,'vvv','',0,0),
 (2,'Gá»— vÃ¡n ghÃ©p thanh ','',1,2),
 (3,'Gá»— vÃ¡n sÃ n 1','asd',1,3),
 (4,'Má»™c má»¹ nghá»‡','',1,4),
 (10,'thá»ƒ loáº¡i má»›i nÃ¨','url',1,1);
/*!40000 ALTER TABLE `theloai` ENABLE KEYS */;


--
-- Definition of table `theloaicon`
--

DROP TABLE IF EXISTS `theloaicon`;
CREATE TABLE `theloaicon` (
  `idtheloaicon` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT '1',
  `idtheloai` int(10) unsigned DEFAULT NULL,
  `sapxep` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`idtheloaicon`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `theloaicon`
--

/*!40000 ALTER TABLE `theloaicon` DISABLE KEYS */;
INSERT INTO `theloaicon` (`idtheloaicon`,`tieude`,`url`,`active`,`idtheloai`,`sapxep`) VALUES 
 (1,'Lim, tráº¯c, huÃª,cáº©m xe, gá»— Ä‘á», ...','',0,0,1),
 (2,'Gá»— trÃ m 1','2',1,2,23),
 (3,'Gá»— lim, gá»— Ä‘á»...','',1,2,2),
 (4,'Gá»— trÃ m','',1,3,1),
 (5,'Gá»— lim, gá»— Ä‘á»...','',1,3,2),
 (6,'BÃ n, gháº¿, tá»§...','',1,4,1),
 (7,'a','',0,4,0);
/*!40000 ALTER TABLE `theloaicon` ENABLE KEYS */;


--
-- Definition of table `thuvienanh`
--

DROP TABLE IF EXISTS `thuvienanh`;
CREATE TABLE `thuvienanh` (
  `idthuvienanh` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(200) DEFAULT NULL,
  `trichdan` varchar(254) DEFAULT NULL,
  `hinh` varchar(100) DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`idthuvienanh`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuvienanh`
--

/*!40000 ALTER TABLE `thuvienanh` DISABLE KEYS */;
INSERT INTO `thuvienanh` (`idthuvienanh`,`tieude`,`trichdan`,`hinh`,`ngaycapnhat`,`active`) VALUES 
 (1,'test thu vien anh nÃ¨ aaa','trich dan thu vien anh 1','thuvien1.jpg','2011-09-12 00:00:00',1),
 (2,'Tieu de thu vien hinh anh 2','trich dan thu vien anh 2 trich dan thu vien anh 2 trich dan thu vien anh 2 trich dan thu vien anh 2 trich dan thu vien anh 2 trich dan thu vien anh 2 trich dan thu vien anh 2 ','thuvien2.jpg','2011-09-12 00:00:00',1),
 (3,'TiÃªu Ä‘á» thÆ° viá»‡n áº£nh thá»© 3','TrÃ­ch dáº«n thÆ° viá»‡n áº£nh thá»© 3','ho boi copy.jpg','2011-09-12 00:00:11',1),
 (4,'Tieu de thu vien 4','trich dan tieu de thu vien 4','thuvien4.jpg','2011-10-11 00:00:00',1),
 (5,'Tieu de thu vien 5','Trich dan tieu de thu vien hinh cua phuong thao go 5','thuvien5.jpg','2011-10-03 15:03:03',1),
 (6,'ThÆ° viá»‡n áº£nh Ä‘áº§u tiÃªn','trÃ­ch dáº«n thÆ° viá»‡n áº£nh Ä‘áº§u tiÃªn','website-promotion---wdl.jpg','2011-10-12 04:00:38',0),
 (7,'ThÆ° viá»‡n áº£nh thá»© 2','ná»™i dung thÆ° viá»‡n áº£nh thá»© 2','cart.png','2011-10-12 04:05:32',1),
 (8,'ThÆ° viá»‡n áº£nh thá»© 4','sea foods','goi_du_du_thailan2.jpg','2011-10-12 06:13:01',1),
 (9,'test folder create','test ','Logo-01.jpg','2011-10-12 10:28:20',1),
 (10,'test random thu vien hinh ok','aaaaaaa','338735bar copy.jpg','2011-10-12 12:08:23',1),
 (11,'','','316023bar copy.jpg','2011-10-12 12:10:39',1),
 (12,'thÃªm thÆ° viÃªn final','','160874bar copy.jpg','2011-10-12 12:39:08',1),
 (13,'ThÃªm thÆ° viÃªn áº£nh final','TrÃ­ch dáº«n vá» thÆ° viá»‡n final nÃ y','990367hotieutaynguyen.jpg','2011-10-12 13:19:39',1);
/*!40000 ALTER TABLE `thuvienanh` ENABLE KEYS */;


--
-- Definition of table `thuvienanhchitiet`
--

DROP TABLE IF EXISTS `thuvienanhchitiet`;
CREATE TABLE `thuvienanhchitiet` (
  `idthuvienanhchitiet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(200) DEFAULT NULL,
  `hinh` varchar(100) DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `idthuvienanh` int(10) unsigned DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`idthuvienanhchitiet`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `thuvienanhchitiet`
--

/*!40000 ALTER TABLE `thuvienanhchitiet` DISABLE KEYS */;
INSERT INTO `thuvienanhchitiet` (`idthuvienanhchitiet`,`tieude`,`hinh`,`ngaycapnhat`,`idthuvienanh`,`active`) VALUES 
 (1,'anh chi tiet 1','thuvienchitiet1.jpg',NULL,5,1),
 (2,'anh chi tiet 2','thuvienchitiet2.jpg',NULL,5,1),
 (3,'aaaaa','email.png','2011-10-12 05:07:09',1,1),
 (4,'Gá»— trÃ m','bg_banner_bottom.png','2011-10-12 05:09:04',1,1),
 (5,'thÆ° viá»‡n áº£nh chi tiáº¿t 1','cayco.jpg','2011-10-12 05:19:38',3,1),
 (6,'thÆ° viá»‡n áº£nh chi tiáº¿t 12','cart.png','2011-10-12 05:21:00',3,1),
 (7,'thÆ° viá»‡n áº£nh chi tiáº¿t 123','files.png','2011-10-12 05:38:32',3,1),
 (8,'thÆ° viá»‡n áº£nh chi tiáº¿t 1234','giay.jpg','0000-00-00 00:00:00',3,0),
 (9,'thÆ° viá»‡n áº£nh chi tiáº¿t 12345','giay1.jpg','0000-00-00 00:00:00',3,0),
 (10,'thÆ° viá»‡n áº£nh chi tiáº¿t 123456','818297cayco.jpg','2011-10-12 05:46:03',3,1),
 (11,'thÆ° viá»‡n áº£nh chi tiáº¿t 1234567','dauan - Copy.jpg','0000-00-00 00:00:00',3,0),
 (12,'thu vien anh chi tiet 9','hatdieu.jpg','2011-10-12 10:29:48',9,1),
 (13,'test thÆ° viá»‡n áº£nh chi tiáº¿t sá»‘ 8','8655009D H4.jpg','2011-10-12 10:42:49',8,1),
 (14,'test thÆ° viá»‡n áº£nh chi tiáº¿t sá»‘ 8 láº§n 2','8953142Chai1-01.jpg','2011-10-12 10:43:13',8,1),
 (15,'test them hinh chi tiet vÃ  random khi tá»“n táº¡i hÃ¬nh','88cayco.jpg','2011-10-12 11:42:44',8,1),
 (16,'aaaaa','854425cayco.jpg','2011-10-12 13:03:28',3,1),
 (17,'aaaaa 123','3155935cayco.jpg','2011-10-12 13:09:55',3,1),
 (18,'ThÃªm thÆ° viá»‡n áº£nh chi tiáº¿t 13','13525377cayco.jpg','2011-10-12 13:20:41',13,1),
 (19,'aaaaa','13441568cayco.jpg','2011-10-12 13:21:17',13,1),
 (20,'asadasd','10436843logo_tm.jpg','2011-10-12 14:55:53',10,1);
/*!40000 ALTER TABLE `thuvienanhchitiet` ENABLE KEYS */;


--
-- Definition of table `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE `tintuc` (
  `idtintuc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(254) DEFAULT NULL,
  `hinh` varchar(100) DEFAULT NULL,
  `trichdan` varchar(254) DEFAULT NULL,
  `noidung` text,
  `ngaycapnhat` datetime DEFAULT NULL,
  `idtheloaitin` int(10) unsigned DEFAULT NULL,
  `idtheloaitincon` int(10) unsigned DEFAULT NULL,
  `active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`idtintuc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tintuc`
--

/*!40000 ALTER TABLE `tintuc` DISABLE KEYS */;
INSERT INTO `tintuc` (`idtintuc`,`tieude`,`hinh`,`trichdan`,`noidung`,`ngaycapnhat`,`idtheloaitin`,`idtheloaitincon`,`active`) VALUES 
 (1,'tieu de tin tuc','tintuc1.jpg','noi dung trich dan tint uc','noi dung tin tuc','2011-09-26 00:00:00',4,2,1),
 (2,'Tieu de tin tuc 2','tintuc2.jpg','Noi dung trich dan tin tuc 2 dayyyyyyyyyyyyyyyyy','Noi dung tin tuc 2','2011-09-01 00:00:00',3,5,1),
 (3,'Tin PhÃº QuÃ½ hoat Ä‘á»™ng','1298889066_171594344_1-Hinh-anh-ca--Ban-go-sua-ca-lang-dang-mong.jpg','trÃ­ch dáº«n tin PhÃº QuÃ½','<span style=\"color: rgb(255, 0, 0); \" class=\"Apple-style-span\">\r\n	\r\n	\r\n	\r\n	<img src=\"/phuongthao/upload/picture/bg.jpg\" alt=\"\" align=\"\" border=\"0px\" />Ná»™i dung tin PhÃº QuÃ½</span>','2011-10-06 01:40:23',3,6,1),
 (4,'Tuyá»ƒn dá»¥ng nhÃ¢n sá»±','website-promotion---wdl.jpg','TrÃ­ch dáº«n tuyá»ƒn dá»¥ng nhÃ¢n sá»±','Ná»™i dung thÃ´ng tin tuyá»ƒn dá»¥ng nhÃ¢n sá»±<span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>','2011-10-07 21:09:16',5,0,1);
/*!40000 ALTER TABLE `tintuc` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
