-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: exhibition
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `exhibitors`
--

DROP TABLE IF EXISTS `exhibitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exhibitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_first_name` varchar(255) NOT NULL,
  `company_last_name` varchar(255) NOT NULL,
  `company_median_name` varchar(255) NOT NULL,
  `company_sex` enum('F','M') NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_passport_number` varchar(255) NOT NULL,
  `contact_person_passport_given_date` varchar(255) NOT NULL,
  `contact_person_passport_expiry_date` varchar(255) NOT NULL,
  `contact_person_nationality` varchar(255) NOT NULL,
  `contact_person_staying_date` varchar(255) NOT NULL,
  `contact_person_address_in_addis` varchar(255) NOT NULL,
  `contact_person_hotel` varchar(255) NOT NULL,
  `contact_person_telephone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `exhibitors_company_email_uindex` (`company_email`),
  UNIQUE KEY `exhibitors_company_name_uindex` (`company_name`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exhibitors`
--

LOCK TABLES `exhibitors` WRITE;
/*!40000 ALTER TABLE `exhibitors` DISABLE KEYS */;
INSERT INTO `exhibitors` VALUES (26,'Morrow Madden Associates','Tiger','Barton','Baird and Salas LLC','M','tywojyh@yahoo.com','Avye Gomez','69','1990-10-12','1976-11-27','Repudiandae omnis porro eaque adipisci cupiditate temporibus at facilis est quo amet voluptates expedita','2006-03-01','Ab consequat Repudiandae minim tempora et','Quisquam quo animi labore in est doloremque expedita culpa irure at nobis harum eligendi vel eveniet ipsum eum et','+365-71-5507280'),(25,'Arnold and Barker LLC','Veronica','Mcfarland','Atkinson and Benjamin Trading','F','jibibuh@hotmail.com','Howard Osborn','290','1976-06-14','1971-04-18','Obcaecati impedit sunt qui velit ut','1986-10-09','Doloribus occaecat lorem qui minim consectetur anim id necessitatibus fugiat reprehenderit sapiente voluptatem pariatur','Incidunt sint est quis est','+298-37-1858811'),(24,'Goff Macdonald Traders','Addison','Russo','Todd and Bennett Traders','F','lebylyhaki@gmail.com','Irene Phillips','646','1989-04-23','1972-06-19','Quas quia obcaecati pariatur Ad nostrum obcaecati ea sed ipsa provident dolores aute similique qui unde','2014-08-25','Elit veniam amet aperiam nemo voluptate non odio eveniet distinctio','Laudantium sunt consequat Tempore ex ex minim laborum Cupiditate dolor qui molestiae consequuntur ut sunt aut sit et et voluptate','+131-23-8590344'),(23,'Clarke and Gross Traders','Avram','Long','Day Casey Traders','M','zyzirozem@yahoo.com','Howard Williamson','614','1986-05-05','1996-07-27','Natus aspernatur est mollitia dolorem duis aut velit praesentium consequatur maxime laborum in accusamus corporis repellendus Nemo est consectetur pariatur','2000-09-15','Sunt deleniti minima cillum eum ipsam aut','Voluptate nihil qui ut culpa explicabo Aperiam tenetur cum proident odit optio amet dolore ut Nam','+985-40-3625565');
/*!40000 ALTER TABLE `exhibitors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spots`
--

DROP TABLE IF EXISTS `spots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spots` (
  `id` int(11) NOT NULL,
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  `exhibitor_id` int(11) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `rotated` tinyint(1) NOT NULL DEFAULT '0',
  `coordinate_x` decimal(5,2) NOT NULL,
  `coordinate_y` decimal(5,2) NOT NULL,
  `token` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `spots_id_uindex` (`id`),
  UNIQUE KEY `spots_token_uindex` (`token`),
  KEY `spots_exhibitors_id_fk` (`exhibitor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spots`
--

LOCK TABLES `spots` WRITE;
/*!40000 ALTER TABLE `spots` DISABLE KEYS */;
INSERT INTO `spots` VALUES (51,0,NULL,0,0,30.00,231.00,NULL),(50,0,NULL,0,0,30.00,208.00,NULL),(49,0,NULL,0,0,30.00,186.00,NULL),(48,0,NULL,0,1,66.50,127.50,NULL),(47,0,NULL,0,1,81.50,112.00,NULL),(46,0,NULL,0,0,120.00,100.00,NULL),(45,0,NULL,0,0,143.00,100.00,NULL),(44,0,NULL,0,0,165.00,100.00,NULL),(43,1,26,0,0,240.00,100.00,'qvWSbtRviqx49V^ugMKkvTX$*FNU&J'),(42,0,NULL,0,1,281.50,75.50,NULL),(41,0,NULL,0,1,295.50,91.50,NULL),(40,0,NULL,0,0,376.00,126.00,NULL),(39,0,NULL,0,0,404.00,126.00,NULL),(38,0,NULL,0,0,452.00,126.00,NULL),(37,0,NULL,0,0,495.00,195.00,NULL),(36,0,NULL,0,0,495.00,218.00,NULL),(35,0,NULL,0,0,452.00,156.00,NULL),(34,0,NULL,0,0,452.00,181.00,NULL),(33,0,NULL,0,0,429.00,156.00,NULL),(32,0,NULL,0,0,429.00,181.00,NULL),(31,0,NULL,0,0,397.00,155.00,NULL),(30,0,NULL,0,0,397.00,180.00,NULL),(29,0,NULL,0,0,374.00,155.00,NULL),(28,0,NULL,0,0,374.00,180.00,NULL),(27,0,NULL,0,0,346.00,144.00,NULL),(26,0,NULL,0,0,346.00,168.00,NULL),(25,0,NULL,0,0,325.00,144.00,NULL),(24,0,NULL,0,0,325.00,168.00,NULL),(23,0,NULL,0,0,452.00,237.00,NULL),(22,0,NULL,0,0,452.00,262.00,NULL),(21,0,NULL,0,0,429.00,236.00,NULL),(20,0,NULL,0,0,429.00,262.00,NULL),(19,0,NULL,0,0,397.00,236.00,NULL),(18,0,NULL,0,0,397.00,261.00,NULL),(17,0,NULL,0,0,374.00,236.00,NULL),(16,0,NULL,0,0,374.00,261.00,NULL),(15,0,NULL,0,0,451.00,290.00,NULL),(14,0,NULL,0,0,404.00,290.00,NULL),(13,0,NULL,0,0,376.00,290.00,NULL),(12,0,NULL,0,0,346.00,271.00,NULL),(11,0,NULL,0,0,346.00,248.00,NULL),(10,0,NULL,0,0,322.00,248.00,NULL),(9,0,NULL,0,0,322.00,271.00,NULL),(8,0,NULL,0,1,295.50,327.50,NULL),(7,0,NULL,0,1,281.50,343.50,NULL),(6,0,NULL,0,0,240.00,318.00,NULL),(5,0,NULL,0,0,165.00,318.00,NULL),(4,0,NULL,0,0,143.00,318.00,NULL),(3,0,NULL,0,0,119.50,318.00,NULL),(2,0,NULL,0,1,80.50,308.50,NULL),(1,1,21,0,1,65.50,292.50,'0PeKK4xRVnpHe5y5dd48H^jvU$ICG&F');
/*!40000 ALTER TABLE `spots` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-14  8:29:03
