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
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`created_by`),
  KEY `fk_logs_users1_idx` (`created_by`),
  CONSTRAINT `fk_logs_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'admin admin successfully logged out',1,'2022-11-24 14:15:27'),(2,'admin admin successfully logged in',1,'2022-11-24 14:16:42'),(3,'admin admin successfully add  to user',1,'2022-11-24 14:21:12'),(4,'admin admin successfully add WILARD MATIASto user',1,'2022-11-24 14:22:09'),(5,'admin admin successfully modified details of WILARDs MATIASsto user',1,'2022-11-24 14:22:48'),(6,'admin admin successfully deleted 3to user',1,'2022-11-24 14:22:52'),(7,'admin admin successfully deleted 2to user',1,'2022-11-24 14:22:55'),(8,'admin admin failed to add WILARD MATIAS to user',1,'2022-11-24 14:27:09'),(9,'admin admin successfully add WILARD MATIAS to user',1,'2022-11-24 14:27:14'),(10,'admin admin attempt to check in the guest30',1,'2022-11-24 14:30:14'),(11,'admin admin attempt to check in the guest 30',1,'2022-11-24 14:30:42'),(12,'admin admin failed to add room ',1,'2022-11-24 14:42:34'),(13,'admin admin successfully delete the room with id 13',1,'2022-11-24 14:44:07'),(14,'admin admin attempt to check in the guest 30',1,'2022-11-24 14:44:46'),(15,'admin admin check in the guest 30',1,'2022-11-24 14:44:49'),(16,'admin admin check out the guest 44',1,'2022-11-24 15:10:25'),(17,'admin admin check out the guest 21',1,'2022-11-24 15:10:36'),(18,'admin admin check out the guest 26',1,'2022-11-24 15:15:40'),(19,'admin admin check out the guest 26',1,'2022-11-24 15:20:22'),(20,'admin admin check out the guest 44',1,'2022-11-24 15:20:31'),(21,'admin admin check out the guest 44',1,'2022-11-24 15:20:38'),(22,'admin admin check out the guest 44',1,'2022-11-24 15:23:23'),(23,'admin admin check out the guest 44',1,'2022-11-24 15:24:42'),(24,'admin admin check out the guest 44',1,'2022-11-24 15:26:14'),(25,'admin admin check out the guest 44',1,'2022-11-24 15:43:06'),(26,'admin admin check out the guest 44',1,'2022-11-24 15:46:09'),(27,'admin admin attempt to check in the guest 53',1,'2022-11-24 15:48:20'),(28,'admin admin attempt to check in the guest 51',1,'2022-11-24 15:48:27'),(29,'admin admin check in the guest 51',1,'2022-11-24 15:48:43'),(30,'admin admin check out the guest 44',1,'2022-11-24 15:49:23'),(31,'admin admin check out the guest 51',1,'2022-11-24 15:54:37'),(32,'admin admin check out the guest 51',1,'2022-11-24 15:58:23'),(33,'admin admin check out the guest 51',1,'2022-11-24 15:59:07'),(34,'admin admin check out the guest 51',1,'2022-11-24 16:01:38'),(35,'admin admin check out the guest 51',1,'2022-11-24 16:03:24'),(36,'admin admin attempt to check in the guest 52',1,'2022-11-24 16:03:38'),(37,'admin admin check in the guest 52',1,'2022-11-24 16:03:44'),(38,'admin admin check out the guest 21',1,'2022-11-24 16:04:26'),(39,'admin admin attempt to check in the guest 53',1,'2022-11-24 16:04:47'),(40,'admin admin attempt to check in the guest 47',1,'2022-11-24 16:05:36'),(41,'admin admin check in the guest 47',1,'2022-11-24 16:05:45'),(42,'admin admin check out the guest 21',1,'2022-11-24 16:06:27'),(43,'admin admin check out the guest 47',1,'2022-11-24 16:06:44'),(44,'admin admin check out the guest 47',1,'2022-11-24 16:07:25'),(45,'admin admin check out the guest 21',1,'2022-11-24 16:14:39'),(46,'admin admin check out the guest 47',1,'2022-11-24 16:14:56'),(47,'admin admin check out the guest 47',1,'2022-11-24 16:15:05'),(48,'admin admin check out the guest 47',1,'2022-11-24 16:19:41'),(49,'admin admin check out the guest 47',1,'2022-11-24 16:22:23'),(50,'admin admin check out the guest 47',1,'2022-11-24 16:22:30'),(51,'admin admin check out the guest 47',1,'2022-11-24 16:23:22'),(52,'admin admin check out the guest 47',1,'2022-11-24 16:27:43'),(53,'admin admin check out the guest 47',1,'2022-11-24 16:27:47'),(54,'admin admin check out the guest 47',1,'2022-11-24 16:29:02'),(55,'admin admin check out the guest 44',1,'2022-11-24 16:30:35'),(56,'admin admin check out the guest 44',1,'2022-11-24 16:30:47'),(57,'admin admin check out the guest 44',1,'2022-11-24 16:32:10'),(58,'admin admin check out the guest 44',1,'2022-11-24 16:32:58'),(59,'admin admin check out the guest 44',1,'2022-11-24 16:33:17'),(60,'admin admin check out the guest 44',1,'2022-11-24 16:33:48'),(61,'admin admin check out the guest 44',1,'2022-11-24 16:33:56'),(62,'admin admin check out the guest 44',1,'2022-11-24 16:36:56'),(63,'admin admin update check in details of 44',1,'2022-11-24 16:41:39'),(64,'admin admin check out the guest 44',1,'2022-11-24 16:41:53'),(65,'admin admin failed to modified due lower than original value 44',1,'2022-11-24 16:42:03'),(66,'admin admin check out the guest 44',1,'2022-11-24 16:42:03'),(67,'admin admin update check in details of 44',1,'2022-11-24 16:42:03'),(68,'admin admin check out the guest 44',1,'2022-11-24 16:42:24'),(69,'admin admin failed to modified due lower than original value 44',1,'2022-11-24 16:42:29'),(70,'admin admin check out the guest 44',1,'2022-11-24 16:42:29'),(71,'admin admin check out the guest 44',1,'2022-11-24 16:44:39'),(72,'admin admin check out the guest 44',1,'2022-11-24 17:45:55'),(73,'admin admin failed to modified check In details due lower than value of original data 44',1,'2022-11-24 17:54:45'),(74,'admin admin check out the guest 44',1,'2022-11-24 17:54:45'),(75,'admin admin successfully logged in',1,'2022-11-24 20:31:47'),(76,'admin admin check out the guest 47',1,'2022-11-24 20:31:53'),(77,'admin admin checkin details success 47',1,'2022-11-24 20:32:04'),(78,'admin admin check out the guest 47',1,'2022-11-24 20:32:12'),(79,'admin admin checkin details success 47',1,'2022-11-24 20:32:17'),(80,'admin admin check out the guest 47',1,'2022-11-24 20:32:54'),(81,'admin admin check out the guest 47',1,'2022-11-24 20:34:01'),(82,'admin admin checkin details success 47',1,'2022-11-24 20:34:29'),(83,'admin admin check out the guest 47',1,'2022-11-24 20:34:34'),(84,'admin admin checkin details success 47',1,'2022-11-24 20:34:47'),(85,'admin admin check out the guest 47',1,'2022-11-24 20:34:52'),(86,'admin admin failed to modified check In details due to lower value than the original data 47',1,'2022-11-24 20:35:02'),(87,'admin admin check out the guest 47',1,'2022-11-24 20:35:02'),(88,'admin admin failed to modified check In details due to lower value than the original data 47',1,'2022-11-24 20:37:32'),(89,'admin admin check out the guest 47',1,'2022-11-24 20:37:32'),(90,'admin admin checkin details success 47',1,'2022-11-24 20:37:41'),(91,'admin admin check out the guest 47',1,'2022-11-24 20:37:49'),(92,'admin admin check out the guest 47',1,'2022-11-24 20:38:46'),(93,'admin admin checkin details success 47',1,'2022-11-24 20:38:56'),(94,'admin admin check out the guest 47',1,'2022-11-24 20:38:59'),(95,'admin admin check out the guest 44',1,'2022-11-24 21:25:00'),(96,'admin admin check out the guest 47',1,'2022-11-24 21:25:06'),(97,'admin admin check out the guest 25',1,'2022-11-24 21:25:09'),(98,'admin admin check out the guest 26',1,'2022-11-24 21:25:15'),(99,'admin admin check out the guest 51',1,'2022-11-24 21:25:20'),(100,'admin admin check out the guest 36',1,'2022-11-24 21:25:24'),(101,'admin admin check out the guest 39',1,'2022-11-24 21:25:29'),(102,'admin admin check out the guest 21',1,'2022-11-24 21:25:33'),(103,'admin admin check out the guest 31',1,'2022-11-24 21:25:36'),(104,'admin admin check out the guest 32',1,'2022-11-24 21:25:42'),(105,'admin admin check out the guest 34',1,'2022-11-24 21:25:47'),(106,'admin admin check out the guest 27',1,'2022-11-24 21:25:50'),(107,'admin admin check out the guest 24',1,'2022-11-24 21:25:53'),(108,'admin admin check out the guest 52',1,'2022-11-24 21:25:56'),(109,'admin admin check out the guest 30',1,'2022-11-24 21:26:00'),(110,'admin admin successfully logged out',1,'2022-11-25 00:02:31'),(111,'admin admin successfully logged in',1,'2022-11-25 00:02:42'),(112,'admin admin successfully modified details of WILARD MATIAS to user',1,'2022-11-25 00:02:52'),(113,'admin admin successfully logged out',1,'2022-11-25 00:03:01'),(114,'WILARD MATIAS successfully logged in',4,'2022-11-25 00:03:08'),(115,'WILARD MATIAS successfully logged out',4,'2022-11-25 00:06:03'),(116,'admin admin successfully logged in',1,'2022-11-25 00:06:16'),(117,'admin admin successfully logged out',1,'2022-11-25 00:06:24'),(118,'WILARD MATIAS successfully logged in',4,'2022-11-25 00:06:30'),(119,'WILARD MATIAS successfully logged out',4,'2022-11-25 00:08:38'),(120,'admin admin successfully logged in',1,'2022-11-25 00:08:52'),(121,'admin admin successfully logged out',1,'2022-11-25 00:09:34'),(122,'WILARD MATIAS successfully logged in',4,'2022-11-25 00:09:45'),(123,'WILARD MATIAS successfully logged out',4,'2022-11-25 00:18:04'),(124,'admin admin successfully logged in',1,'2022-11-25 00:18:23'),(125,'admin admin successfully logged out',1,'2022-11-25 00:18:27');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-25  8:17:14
