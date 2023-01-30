-- MariaDB dump 10.19  Distrib 10.5.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: admin_files
-- ------------------------------------------------------
-- Server version	10.5.18-MariaDB-0+deb11u1

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
-- Table structure for table `af_shares`
--

DROP TABLE IF EXISTS `af_shares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `af_shares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `type_share` set('r','rw') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `af_shares`
--

LOCK TABLES `af_shares` WRITE;
/*!40000 ALTER TABLE `af_shares` DISABLE KEYS */;
INSERT INTO `af_shares` VALUES (7,3,4,'r'),(8,3,12,'rw');
/*!40000 ALTER TABLE `af_shares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `af_usuarios`
--

DROP TABLE IF EXISTS `af_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `af_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(74) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) NOT NULL,
  `state` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `af_usuarios`
--

LOCK TABLES `af_usuarios` WRITE;
/*!40000 ALTER TABLE `af_usuarios` DISABLE KEYS */;
INSERT INTO `af_usuarios` VALUES (1,'Administrador','root_mecon','$2y$10$az/ZAA2qKaT/m8UcuXywKu4/b5ehJ5A1OzCepGgp5ViKtBvR6rkcK','root@mecon.gov.ar',1),(2,'Augusto Maza','aumaza_mecon','$2y$10$dof3eYJo.WWcrhgTngMGKuzD6o8uHToSwk0H0YdMK.I8HGbEpTRv6','aumaza@mecon.gov.ar',1),(3,'Sonia Boiarov','sboiarov_mecon','$2y$10$9s9iY0BzduR/wGqwnWLqlOgn9U72FZm7QHFgRA8nLj0pogdfMkjr6','sboiarov@mecon.gov.ar',1);
/*!40000 ALTER TABLE `af_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `af_works`
--

DROP TABLE IF EXISTS `af_works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `af_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(500) NOT NULL,
  `date_create` date NOT NULL,
  `document` longtext NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `share` int(1) DEFAULT 0,
  `owner` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `af_works`
--

LOCK TABLES `af_works` WRITE;
/*!40000 ALTER TABLE `af_works` DISABLE KEYS */;
INSERT INTO `af_works` VALUES (4,2,'hola','2023-01-24','<p>hola</p>\r\n',NULL,NULL,1,1),(5,2,'saludos','2023-01-24','<p><span style=\"color:#8e44ad\">buen dia!</span></p>\r\n',NULL,NULL,0,1),(6,2,'greetings','2023-01-24','<p><span style=\"color:#8e44ad\">buen dia!</span></p>\r\n',NULL,NULL,0,1),(11,2,'mi_nombre','2023-01-24','<p>me llamo <strong>Jos&eacute;</strong></p>\r\n',NULL,NULL,0,1),(12,2,'prueba_1','2023-01-24','<p>El sol est&aacute; muy rojo</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n',NULL,NULL,1,1),(13,2,'vacaciones','2023-01-24','<p><span style=\"font-size:26px\">vamos&nbsp; a la playa</span></p>\r\n',NULL,NULL,0,1);
/*!40000 ALTER TABLE `af_works` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-30 15:28:21
