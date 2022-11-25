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
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_expense` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`reservation_id`),
  KEY `fk_inventory_reservations1_idx` (`reservation_id`),
  CONSTRAINT `fk_inventory_reservations1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,36,'Hygene Kit',1,NULL,'2022-11-11 18:03:15','2022-11-11 18:03:15'),(2,22,'Hygene Kit',1,NULL,'2022-11-11 18:03:44','2022-11-11 18:03:44'),(3,31,'Hygene Kit',1,NULL,'2022-11-11 18:04:20','2022-11-11 18:04:20'),(4,32,'Hygene Kit',1,NULL,'2022-11-12 11:34:36','2022-11-12 11:34:36'),(5,34,'Hygene Kit',2,NULL,'2022-11-13 10:42:36','2022-11-13 10:42:36'),(6,25,'Hygene Kit',4,NULL,'2022-11-13 10:50:02','2022-11-13 10:50:02'),(7,25,'Hygene Kit',4,NULL,'2022-11-13 10:51:57','2022-11-13 10:51:57'),(8,26,'Hygene Kit',5,NULL,'2022-11-13 11:12:58','2022-11-13 11:12:58'),(9,27,'Hygene Kit',2,'400','2022-11-13 12:46:30','2022-11-13 12:46:30'),(10,44,'Hygene Kit',2,'400','2022-11-24 13:21:10','2022-11-24 13:21:10'),(11,30,'Hygene Kit',1,'200','2022-11-24 14:44:49','2022-11-24 14:44:49'),(12,51,'Hygene Kit',1,'200','2022-11-24 15:48:43','2022-11-24 15:48:43'),(13,52,'Hygene Kit',1,'200','2022-11-24 16:03:44','2022-11-24 16:03:44'),(14,47,'Hygene Kit',2,'400','2022-11-24 16:05:44','2022-11-24 16:05:44');
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
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
