CREATE DATABASE  IF NOT EXISTS `redbelt` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `redbelt`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: redbelt
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `favorite_quotes`
--

DROP TABLE IF EXISTS `favorite_quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorite_quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_favorite_quotes_users1_idx` (`user_id`),
  KEY `fk_favorite_quotes_quotes1_idx` (`quote_id`),
  CONSTRAINT `fk_favorite_quotes_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_favorite_quotes_quotes1` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorite_quotes`
--

LOCK TABLES `favorite_quotes` WRITE;
/*!40000 ALTER TABLE `favorite_quotes` DISABLE KEYS */;
INSERT INTO `favorite_quotes` VALUES (1,2,1,'2014-12-12 15:57:17','2014-12-12 15:57:17'),(2,3,3,'2014-12-12 16:06:19','2014-12-12 16:06:19');
/*!40000 ALTER TABLE `favorite_quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `quoted_by` varchar(45) DEFAULT NULL,
  `quote` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_quotes_users_idx` (`user_id`),
  CONSTRAINT `fk_quotes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` VALUES (1,1,'Abraham Lincon','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fermentum sit amet enim quis fermentum. Sed vitae magna leo. ','2014-12-12 15:54:29','2014-12-12 15:54:29'),(2,1,'George W. Bush','Nam id sem sit amet urna blandit laoreet quis vel ex. In vehicula dolor vel euismod molestie. Maecenas et orci laoreet nibh ultricies fermentum sed aliquam eros.','2014-12-12 15:55:12','2014-12-12 15:55:12'),(3,1,'Robert Frost','Donec mattis, velit et cursus varius, sem lectus finibus lorem, scelerisque lacinia elit nulla imperdiet eros. ','2014-12-12 15:55:43','2014-12-12 15:55:43'),(4,2,'Albert Einstine','In velit ante, viverra ac odio sit amet, pulvinar sodales quam.','2014-12-12 15:57:06','2014-12-12 15:57:06');
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Peter','Parker','spiderman','peter@spidey.com','e8KCCf/1Bb28M','1900-01-01','2014-12-12 15:54:07','2014-12-12 15:54:07'),(2,'Bruce','Wayne','batman','bruce@wayne.com','b2ih9SI9yfLu2','1900-01-01','2014-12-12 15:56:26','2014-12-12 15:56:26'),(3,'Katrina','Sanbford','smileykat','kat@example.com','72.ZrD9knIKjE','1984-12-17','2014-12-12 16:02:33','2014-12-12 16:02:33'),(4,'Oliver','McQueen','arrow','oliver@mcqueen.com','46ZZysFHAkeeQ','1984-10-31','2014-12-12 16:11:49','2014-12-12 16:11:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'redbelt'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-12 16:23:41
