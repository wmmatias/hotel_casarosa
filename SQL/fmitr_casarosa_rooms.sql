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
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `room_type` int(11) DEFAULT NULL,
  `room_rate` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`room_number`,`user_id`),
  KEY `fk_rooms_users_idx` (`user_id`),
  CONSTRAINT `fk_rooms_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,101,'Junior First Level',1,'1000.00',1,'2022-11-09 02:36:40','2022-11-12 11:57:17'),(4,201,'Standard First Level',2,'1000.00',1,'2022-11-09 03:02:45','2022-11-09 03:02:45'),(5,301,'Intermediate First Level',3,'1800.00',1,'2022-11-09 03:03:56','2022-11-13 10:48:48'),(6,401,'Twin First Level',4,'1790.00',1,'2022-11-09 03:04:12','2022-11-13 12:45:42'),(7,501,'Family First Level',5,'1780.00',1,'2022-11-09 03:04:28','2022-11-09 03:04:28'),(8,102,'Junior First Level',1,'1500.00',1,'2022-11-09 07:36:19','2022-11-09 07:36:19'),(9,202,'Standard First Level',2,'1345.00',1,'2022-11-09 07:36:28','2022-11-09 07:36:28'),(10,302,'Intermediate First Level',3,'1800.00',1,'2022-11-09 07:36:38','2022-11-09 07:36:38'),(11,402,'Twin First Level',4,'1790.00',1,'2022-11-09 07:36:51','2022-11-09 07:36:51'),(12,502,'Family First Level',5,'1670.00',1,'2022-11-09 07:37:38','2022-11-09 07:37:38');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
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
