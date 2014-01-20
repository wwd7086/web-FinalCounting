-- MySQL dump 10.13  Distrib 5.6.14, for osx10.9 (x86_64)
--
-- Host: localhost    Database: FoodCounting
-- ------------------------------------------------------
-- Server version	5.6.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Food`
--

DROP TABLE IF EXISTS `Food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Food` (
  `FID` char(36) NOT NULL DEFAULT '',
  `name` varchar(20) DEFAULT NULL,
  `place` varchar(20) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Food`
--

LOCK TABLES `Food` WRITE;
/*!40000 ALTER TABLE `Food` DISABLE KEYS */;
INSERT INTO `Food` VALUES ('00001','water','real',1.000),('00002','egg','real',1.890),('00003','egg','aldi',0.990),('00004','rice','real',3.300),('00005','schewine','real',2.290),('00006','rinder','real',5.590),('00007','hanchen','real',2.990),('00008','salat','aldi',1.990),('00009','tomato','aldi',0.330),('00010','ginger','real',0.990);
/*!40000 ALTER TABLE `Food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `People`
--

DROP TABLE IF EXISTS `People`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `People` (
  `PID` char(36) NOT NULL DEFAULT '',
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `People`
--

LOCK TABLES `People` WRITE;
/*!40000 ALTER TABLE `People` DISABLE KEYS */;
INSERT INTO `People` VALUES ('0001','wang'),('0002','wu'),('0003','zhou'),('0004','xu'),('0005','li');
/*!40000 ALTER TABLE `People` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Purchase`
--

DROP TABLE IF EXISTS `Purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Purchase` (
  `FID` char(36) NOT NULL DEFAULT '',
  `PID` char(36) NOT NULL DEFAULT '',
  `date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`FID`,`PID`),
  KEY `PID` (`PID`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`FID`) REFERENCES `Food` (`FID`),
  CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `People` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Purchase`
--

LOCK TABLES `Purchase` WRITE;
/*!40000 ALTER TABLE `Purchase` DISABLE KEYS */;
INSERT INTO `Purchase` VALUES ('00001','0001','2013-11-12',3),('00001','0005','2013-11-29',1),('00002','0001','2013-11-21',3),('00002','0003','2013-11-19',4),('00002','0005','2013-11-05',1),('00003','0002','2013-11-01',1),('00003','0004','2013-11-24',1),('00004','0001','2013-11-02',2),('00004','0003','2013-11-12',2),('00005','0002','2013-11-01',3),('00006','0002','2013-11-25',3),('00006','0004','2013-11-14',2),('00007','0001','2013-11-13',1),('00007','0003','2013-11-22',4),('00008','0001','2013-11-06',5),('00008','0002','2013-11-09',5),('00008','0003','2013-11-05',2),('00009','0002','2013-11-16',3),('00009','0004','2013-11-06',3),('00010','0002','2013-11-06',2),('00010','0005','2013-11-20',3);
/*!40000 ALTER TABLE `Purchase` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-26 16:14:47
