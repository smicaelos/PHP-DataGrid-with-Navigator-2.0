-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: datagrid
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.10.1

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `title` varchar(15) NOT NULL,
  `text` varchar(75) NOT NULL,
  `price` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=big5;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'images/1.jpg','title 1','text text text text text text text text text text text text text text text','1.02'),(2,'images/2.jpg','title 2','text text text text text text text text text text text text text text text','1.03'),(3,'images/3.jpg','title 3','text text text text text text text text text text text text text text text','1.04'),(4,'images/4.jpg','title 4','text text text text text text text text text text text text text text text','2.01'),(5,'images/5.jpg','title 5','text text text text text text text text text text text text text text text','2.02'),(6,'images/6.jpg','title 6','text text text text text text text text text text text text text text text','2.03'),(7,'images/7.jpg','title 7','text text text text text text text text text text text text text text text','3.03'),(8,'images/8.jpg','title 8','text text text text text text text text text text text text text text text','3.04'),(9,'images/9.jpg','title 9','text text text text text text text text text text text text text text text','3.50'),(10,'images/10.jpg','title 10','text text text text text text text text text text text text text text text','4.56'),(11,'images/11.jpg','title 11','text text text text text text text text text text text text text text text','5.54'),(12,'images/12.jpg','title 12','text text text text text text text text text text text text text text text','2.32'),(13,'images/1.jpg','title 13','text text text text text text text text text text text text text text text','2.54'),(14,'images/2.jpg','title 14','text text text text text text text text text text text text text text text','7.32'),(15,'images/3.jpg','title 15','text text text text text text text text text text text text text text text','2.65'),(16,'images/4.jpg','title 16','text text text text text text text text text text text text text text text','8.32'),(17,'images/5.jpg','title 17','text text text text text text text text text text text text text text text','4.76'),(18,'images/6.jpg','title 18','text text text text text text text text text text text text text text text','34.05'),(19,'images/7.jpg','title 19','text text text text text text text text text text text text text text text','54.54'),(20,'images/8.jpg','title 20','text text text text text text text text text text text text text text text','23.56'),(21,'images/9.jpg','title 21','text text text text text text text text text text text text text text text','39.07'),(22,'images/10.jpg','title 22','text text text text text text text text text text text text text text text','34.75'),(23,'images/11.jpg','title 23','text text text text text text text text text text text text text text text','0.45'),(24,'images/12.jpg','title 24','text text text text text text text text text text text text text text text','0.46'),(25,'images/1.jpg','title 25','text text text text text text text text text text text text text text text','4.05'),(26,'images/2.jpg','title 26','text text text text text text text text text text text text text text text','9.00');
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

-- Dump completed on 2016-04-13 22:31:30
