-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: ceramic_tile
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `inventory` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Viglacera Q2500 wall tiles','white','Viglacera',11,86,'1699606026.jpg','2023-11-10 01:47:06','2023-11-10 01:47:06'),(2,'Viglacera GA403 tiles','brown','Viglacera',14,80,'1699606082.jpg','2023-11-10 01:48:02','2023-11-10 01:48:02'),(3,'Viglacera GA401 tiles','red','Viglacera',16,56,'1699606118.jpg','2023-11-10 01:48:38','2023-11-10 01:48:38'),(4,'Viglacera S 411 floor tiles','brown','Viglacera',17,78,'1699606166.jpg','2023-11-10 01:49:26','2023-11-10 01:49:26'),(5,'Viglacera RD432 tiles','red','Viglacera',16,76,'1699606230.png','2023-11-10 01:50:30','2023-11-10 01:50:30'),(6,'Chinese 60×60 tiles DBY66186','pink','Chinese Tiles',15,68,'1699606275.jpg','2023-11-10 01:51:15','2023-11-10 01:51:15'),(7,'Eurotile DAV D04 tiles','brown','Eurotile',15,79,'1699606305.jpg','2023-11-10 01:51:45','2023-11-10 01:51:45'),(8,'Platinum CB-P809 floor tiles','black','Viglacera',16,96,'1699606360.jpg','2023-11-10 01:52:40','2023-11-10 01:52:40'),(9,'Keraben Rough P6061 TRMK','pink','Bach Ma Tiles',18,67,'1699606394.jpg','2023-11-10 01:53:14','2023-11-10 01:53:14'),(10,'Eurotile HOD D01 ceramic tiles','white','Eurotile',15,34,'1699606439.jpg','2023-11-10 01:53:59','2023-11-10 01:53:59'),(11,'Chinese 60×60 tiles YLY66186','yellow','Chinese Tiles',15,76,'1699606501.jpg','2023-11-10 01:55:01','2023-11-10 01:55:01'),(12,'Keraben Rough P6060 TRMK','orange','Dong Tam Brick',18,56,'1699606556.jpg','2023-11-10 01:55:57','2023-11-10 01:55:57'),(13,'Eurotile HOD D01  tiles','yellow','Eurotile',15,76,'1699606605.jpg','2023-11-10 01:56:45','2023-11-10 01:56:45'),(14,'Chinese 60×60 tiles RDY66186','red','Chinese Tiles',15,50,'1699606661.jpg','2023-11-10 01:57:41','2023-11-10 01:57:41'),(15,'Viglacera SH-GP808 floor tiles','white','Viglacera',16,67,'1699606797.jpg','2023-11-10 01:59:57','2023-11-10 01:59:57'),(16,'Eurotile THD G04 tiles','brown','Eurotile',15,35,'1699606828.jpg','2023-11-10 02:00:28','2023-11-10 02:00:28'),(17,'Viglacera P2200 wall tiles','pink','Viglacera',11,76,'1699606870.jpg','2023-11-10 02:01:10','2023-11-10 02:01:10'),(18,'Homogeneous Matte Gloss HG4502','white','Bach Ma Tiles',18,68,'1699606901.jpg','2023-11-10 02:01:41','2023-11-10 02:01:41'),(19,'Keraben Rough RD061 TRMK','red','Bach Ma Tiles',18,35,'1699606939.jpg','2023-11-10 02:02:19','2023-11-10 02:02:19'),(20,'Chinese 60×60 tiles OR36186','orange','Chinese Tiles',16,67,'1699606984.jpg','2023-11-10 02:03:04','2023-11-10 02:03:04'),(21,'Viglacera B402 floor tiles','black','Viglacera',15,34,'1699607025.jpg','2023-11-10 02:03:45','2023-11-10 02:03:45'),(22,'Viglacera V2P660 tiles','black','Viglacera',16,87,'1699607059.jpg','2023-11-10 02:04:19','2023-11-10 02:04:19'),(23,'Viglacera B 418 floor tiles','black','Viglacera',13,68,'1699607090.jpg','2023-11-10 02:04:50','2023-11-10 02:04:50'),(24,'Viglacera Q2556 wall tiles','yellow','Viglacera',18,32,'1699607120.jpg','2023-11-10 02:05:20','2023-11-10 02:05:20'),(25,'Eurotile HOD OR01 ceramic tiles','orange','Eurotile',12,38,'1699607161.jpg','2023-11-10 02:06:01','2023-11-10 02:06:01'),(26,'Keraben Rough B6061 TRMK','black','Dong Tam Brick',13,67,'1699607205.jpg','2023-11-10 02:06:45','2023-11-10 02:06:45'),(27,'Platinum BR-P809 floor tiles','brown','Viglacera',16,61,'1699607266.jpg','2023-11-10 02:07:46','2023-11-10 02:07:46'),(28,'Eurotile BWD D01 ceramic tiles','brown','Eurotile',16,64,'1699607308.jpg','2023-11-10 02:08:28','2023-11-10 02:08:28'),(29,'Eurotile EAV D04 tiles','red','Eurotile',18,34,'1699607381.jpg','2023-11-10 02:09:41','2023-11-10 02:09:41'),(30,'Keraben Matte BR6062 CEBL','brown','Dong Tam Brick',15,64,'1699607420.jpg','2023-11-10 02:10:20','2023-11-10 02:10:20'),(31,'Eurotile PHD G04 tiles','pink','Eurotile',15,64,'1699607478.jpg','2023-11-10 02:11:18','2023-11-10 02:11:18'),(32,'Viglacera WH-GP808 floor tiles','white','Viglacera',15,64,'1699607516.jpg','2023-11-10 02:11:56','2023-11-10 02:11:56'),(33,'Viglacera ORA403 tiles','orange','Viglacera',15,34,'1699607566.jpg','2023-11-10 02:12:46','2023-11-10 02:12:46'),(34,'Viglacera OYF445 floor tiles','yellow','Viglacera',15,64,'1699607608.jpg','2023-11-10 02:13:28','2023-11-10 02:13:28'),(35,'Viglacera YL-GP802 floor tiles','yellow','Viglacera',16,34,'1699607644.jpg','2023-11-10 02:14:04','2023-11-10 02:14:04'),(36,'Eurotile NGC D04 tiles','yellow','Eurotile',13,16,'1699607667.jpg','2023-11-10 02:14:27','2023-11-10 02:14:27'),(37,'Homogeneous Matte Gloss YL4502','yellow','Bach Ma Tiles',16,64,'1699607696.jpg','2023-11-10 02:14:56','2023-11-10 02:14:56');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-10 16:16:55
