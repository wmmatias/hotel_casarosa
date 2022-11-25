-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: fmitr_casarosa
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `senior` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `package` varchar(255) DEFAULT NULL,
  `total_extras` varchar(255) DEFAULT NULL,
  `total_discount` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`reservation_id`,`room_id`),
  KEY `fk_sales_reservations1_idx` (`reservation_id`,`room_id`),
  CONSTRAINT `fk_sales_reservations1` FOREIGN KEY (`reservation_id`, `room_id`) REFERENCES `reservations` (`id`, `room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,34,11,0,0,NULL,'500','0','2290','2022-11-13 10:42:36','2022-11-13 10:42:36'),(2,25,5,0,0,'1800.00','670','0','2470','2022-11-13 10:51:57','2022-11-13 10:51:57'),(3,26,10,0,0,'1800.00','1340','0','3140','2022-11-13 11:12:58','2022-11-13 11:12:58'),(4,27,6,0,0,'1790.00','670','0','2460','2022-11-13 12:46:30','2022-11-13 12:46:30'),(5,44,1,0,0,'1000.00','500','0','1500','2022-11-24 13:21:10','2022-11-24 13:21:10'),(6,30,9,0,0,'1345.00','0','0','1345','2022-11-24 14:44:49','2022-11-24 14:44:49'),(7,51,1,1,1,'1000.00','0','100','900','2022-11-24 15:48:43','2022-11-24 15:48:43'),(8,52,1,1,1,'1000.00','0','100','900','2022-11-24 16:03:44','2022-11-24 16:03:44'),(9,47,11,2,2,'1790.00','1,040','358','2,472','2022-11-24 16:05:45','2022-11-24 20:38:56'),(10,44,1,0,1,'1000.00','500','50','1450','2022-11-24 16:41:39','2022-11-24 16:41:39'),(11,44,1,0,0,'1000.00','300','0','1300','2022-11-24 16:42:03','2022-11-24 16:42:03');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-25  8:17:13
