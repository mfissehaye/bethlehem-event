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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exhibitors`
--

LOCK TABLES `exhibitors` WRITE;
/*!40000 ALTER TABLE `exhibitors` DISABLE KEYS */;
INSERT INTO `exhibitors` VALUES (1,'Manning Knapp Trading','Isaiah','Combs','Alvarado and Sargent Traders','M','hefa@hotmail.com','Fritz Butler','580','26-Jan-1985','12-Jan-2017','Laborum Eaque incidunt molestiae sunt','21-Sep-1971','Quisquam commodo hic aliquip cumque sed sint ut','Ea aut et ea odio pariatur Ea facilis in perspiciatis iste et eveniet','+873-62-2146005'),(2,'Kim and Fox Co','Alfonso','Thompson','Callahan and Moran Plc','M','jibycuj@hotmail.com','Robin Travis','459','1970-11-05','1975-06-09','Ducimus nisi nostrud omnis temporibus possimus atque corporis quasi nostrud enim corrupti iusto explicabo Voluptas eos qui autem','1994-05-05','Aute quam quia excepturi fugiat voluptatibus pariatur Et incididunt id omnis quasi voluptatem temporibus quis minim veritatis dolor nostrum','Culpa cumque facilis quibusdam culpa quos dolorem','+397-15-2709076'),(3,'Grant Thompson Plc','Ezekiel','Stevenson','Williamson and Jackson Co','M','tedavohuke@hotmail.com','Leo Taylor','174','2009-08-05','1983-11-07','Ipsam aut consequatur Ipsam a aspernatur officia quia commodi','1997-12-02','Omnis labore voluptas consectetur non voluptas quidem et voluptatem recusandae Est ea sit veniam explicabo Et mollitia delectus nostrum qui','Delectus rerum quisquam et at eiusmod consequuntur lorem magni at vel quia sequi soluta ullam qui incididunt','+954-31-5666443'),(4,'Parsons and Justice Co','Hilel','Clayton','Stafford and Vaughan LLC','F','rusowy@yahoo.com','Cathleen Salazar','317','1985-08-18','1984-11-02','Id explicabo Non quis harum lorem placeat culpa quidem animi officiis ut cupidatat fugiat','1980-11-09','Et esse molestiae a voluptatibus et vitae fugit quia sit eveniet','Corporis laboriosam veritatis similique sed irure non repudiandae debitis non nulla','+393-35-8020314'),(5,'Leblanc and Baker Trading','Jennifer','Briggs','Estrada Mcclain Trading','M','pusomo@hotmail.com','Walker Hess','906','2016-01-17','2015-12-15','Reprehenderit ipsum deserunt placeat pariatur Fugiat similique ut','2013-01-15','Enim laborum quidem ipsum sunt minus officiis perferendis iure eum iusto in quisquam incidunt et earum omnis','Suscipit autem aliquam neque est ut ullam vitae ut non','+639-85-8557488'),(6,'Blake Mathews Plc','Jade','Gamble','Terrell and Odonnell LLC','M','zuvakywiq@hotmail.com','Sybill Brewer','729','1994-07-26','1979-01-21','Quis sint qui aut quia ullam aut ratione aliquip neque vel nobis cupidatat officia non','2003-03-01','Ea in reprehenderit nostrud ea ipsum culpa','Reiciendis similique ea aperiam lorem esse dolor ut aut aut optio non alias','+838-35-3430281'),(7,'Holcomb Wilkinson Trading','Sawyer','Shelton','Reyes Cannon Traders','F','vyhycajaja@gmail.com','Germaine Crawford','224','1984-03-15','1982-07-28','Cupiditate ipsum qui quidem facere aut ut veritatis proident ut enim et neque dolorem','1973-07-07','Sed fugiat dolor eum cupidatat elit','Reiciendis quam quia consequatur Voluptatum illo ad est repudiandae aut consequatur Qui voluptatibus sit ut ad','+114-87-8616952'),(8,'Valdez Morin Co','Phoebe','Frazier','Barrett Weaver Plc','M','quraxi@gmail.com','Francesca Bryan','177','2006-09-24','1989-12-05','Eu deserunt ipsam ea illo facilis sed hic praesentium quae maxime omnis vero iusto ut tenetur consequuntur','2010-02-27','Rerum eligendi quis ipsum ut laboris autem quibusdam autem eos beatae nobis ullam id optio tempore','Ut in aliquam in quibusdam error vel officia illum qui laboris libero non ullamco qui minima odit','+348-21-4019667'),(9,'Odonnell Douglas Trading','Lee','Brooks','Carson Warren Associates','F','kudywemot@hotmail.com','Orli Rogers','788','2006-08-09','1990-12-26','Ex et et qui commodo cum dolorem maiores omnis tempora reiciendis fuga Facere eum cupidatat quas veniam','1997-07-06','Nostrum quia voluptate autem dolor reprehenderit proident sequi dolores ut dolor eos tempore totam odit omnis','Tempore deserunt et labore et','+951-27-6711692'),(10,'Allen and Schneider Plc','Pandora','Hood','William and Sexton Inc','M','lefu@hotmail.com','Alea Stein','869','1972-01-20','1994-08-21','Doloremque ipsum dolor fugiat tempora quaerat id nostrum','1971-11-10','Nisi nostrud natus nisi amet autem perferendis ullamco error dolorum eos dolores et id modi cupiditate','Odio non soluta repudiandae qui ex eu omnis eum ullam pariatur Unde qui irure laboris vitae','+421-17-5077690'),(11,'Villarreal Reid Co','Brenda','Rollins','Sweeney Sanchez Plc','M','pulet@hotmail.com','September Woods','782','1981-01-28','1975-11-21','Necessitatibus elit lorem quisquam sit dolor ad omnis incididunt ex ullam deserunt quisquam alias est ipsam voluptate repellendus Ipsa','2006-05-26','In qui quibusdam et sint atque molestias est perspiciatis labore fugiat sunt in','Aliqua Odio perspiciatis ad possimus deserunt sed dicta reiciendis','+529-53-1287676'),(12,'Coffey and Mcneil Plc','Illana','Burt','Reeves and Hess Associates','F','qugebo@yahoo.com','Rajah Ayers','215','2001-12-13','1979-03-25','Sapiente voluptatibus dolor dolor veritatis','1979-11-12','Proident nemo provident dolore quisquam id aut nisi nobis exercitationem necessitatibus itaque similique itaque mollit ut veniam est recusandae','Ipsa sit exercitation velit dolor eum cupiditate veniam dolorum et asperiores cum eligendi odit','+928-99-1973684'),(13,'Zimmerman Jenkins Co','Illiana','Cole','Beasley Bush Traders','M','byneca@yahoo.com','Isabelle Stevens','786','1995-01-13','2001-09-23','Corporis cumque pariatur Similique enim in omnis eum fuga Minus incididunt consequatur Omnis quisquam nemo ea quis','2017-03-13','Nisi sed pariatur Voluptatibus sint dolore in eligendi voluptate voluptas enim','Ratione consequuntur duis quas repellendus','+811-95-9905252'),(14,'Frederick and Castaneda Trading','Aiko','Padilla','Vang and Little Trading','M','vyvol@yahoo.com','Yoko Ellis','996','2010-03-27','2008-02-07','Tempor do nobis exercitation et velit nobis est duis similique optio qui atque iusto inventore','2002-07-25','Fuga Quisquam perferendis sed voluptatem tenetur dignissimos sit facere incidunt modi pariatur Maiores voluptate','Cillum dolorem ab a aliquid tenetur','+431-33-3771663'),(15,'Calhoun and Knapp Associates','Angelica','Gibson','Parker Edwards Traders','F','rozy@hotmail.com','Tatiana Craft','919','1987-07-04','1972-10-22','Omnis qui adipisci obcaecati exercitationem praesentium asperiores dolore explicabo Eveniet consequuntur excepteur quia aliquip dolorem','1988-10-27','Quam enim anim fugiat ullamco neque dicta vitae debitis sed esse similique cupiditate sed mollitia harum','Consectetur qui dolore ut recusandae Aliquid alias eu sequi adipisci','+351-49-2903149'),(16,'Dunlap Cain Trading','Paki','Pruitt','Branch and Valencia Traders','M','muvop@yahoo.com','Xerxes Stuart','879','1993-03-26','1980-01-25','Eu numquam et odit sint neque alias nisi accusantium','2001-03-06','Officia minim laboriosam sed quaerat est aliquip in rerum omnis','Eu qui molestiae velit nulla sunt molestiae qui','+117-73-3297480'),(17,'Downs Neal Traders','Buckminster','Saunders','Garza and Pace Traders','M','mojagi@yahoo.com','Emery Russo','395','1993-07-01','1991-08-28','Numquam non commodi cum asperiores','1972-12-18','Architecto eos incidunt facilis voluptatem nemo aliquam illum atque voluptatibus culpa consequatur','Magna in est unde sunt voluptas iusto','+893-86-4892761'),(18,'Mckay and Aguirre Associates','Travis','Rojas','Mckenzie Elliott Trading','M','bugymov@hotmail.com','Nola Arnold','367','1992-06-18','1989-06-21','Nostrum eum ut iure rerum qui nulla est','2010-04-02','Qui nisi ad recusandae Labore cumque','Possimus non dolor reprehenderit natus qui','+663-92-6891292'),(19,'Delacruz Walters Co','Deborah','Davenport','Burt and Bell Plc','F','pudiroziq@gmail.com','Karina Spence','20','1978-08-02','1974-09-22','Vitae earum in sint qui porro sint voluptatem molestiae sequi nisi','1976-03-01','Praesentium vel dolor sunt aperiam tempore irure','Cumque deserunt alias ab mollitia cupiditate do amet dolorum voluptate ipsum mollitia natus ullam','+279-11-3752616'),(20,'Moore Myers Traders','Demetria','Crawford','Hartman Oneal Inc','M','zenuhaduvu@gmail.com','Lionel Bates','822','2008-10-15','1977-08-12','Consequatur voluptatem quos aut illo maxime aliquam facilis nesciunt inventore ullam','2004-03-09','Amet temporibus voluptatum recusandae Perferendis nostrum beatae maiores ipsam laborum Suscipit','Nostrud nostrum aut dolore et quo','+865-41-9585281'),(21,'Reese Koch Co','Farrah','Nash','Skinner and Beach Co','M','vevepiqyj@gmail.com','Julie Goff','570','2012-03-04','1985-11-22','Aute magnam itaque deserunt quisquam consequatur','1975-03-11','Adipisicing pariatur Consequatur cupidatat tempore est repellendus Dolores et nesciunt','Reprehenderit suscipit mollit quis repellendus Modi amet lorem sint cillum alias aut deserunt nulla qui impedit','+326-74-3917230');
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `spots_id_uindex` (`id`),
  KEY `spots_exhibitors_id_fk` (`exhibitor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spots`
--

LOCK TABLES `spots` WRITE;
/*!40000 ALTER TABLE `spots` DISABLE KEYS */;
INSERT INTO `spots` VALUES (51,0,NULL,0,0,30.00,231.00),(50,0,NULL,0,0,30.00,208.00),(49,0,NULL,0,0,30.00,186.00),(48,0,NULL,0,1,66.50,127.50),(47,0,NULL,0,1,81.50,112.00),(46,0,NULL,0,0,120.00,100.00),(45,0,NULL,0,0,143.00,100.00),(44,0,NULL,0,0,165.00,100.00),(43,0,NULL,0,0,240.00,100.00),(42,0,NULL,0,1,281.50,75.50),(41,0,NULL,0,1,295.50,91.50),(40,0,NULL,0,0,376.00,126.00),(39,0,NULL,0,0,404.00,126.00),(38,0,NULL,0,0,452.00,126.00),(37,0,NULL,0,0,495.00,195.00),(36,0,NULL,0,0,495.00,218.00),(35,0,NULL,0,0,452.00,156.00),(34,0,NULL,0,0,452.00,181.00),(33,0,NULL,0,0,429.00,156.00),(32,0,NULL,0,0,429.00,181.00),(31,0,NULL,0,0,397.00,155.00),(30,0,NULL,0,0,397.00,180.00),(29,0,NULL,0,0,374.00,155.00),(28,0,NULL,0,0,374.00,180.00),(27,0,21,0,0,346.00,144.00),(26,1,21,0,0,346.00,168.00),(25,0,NULL,0,0,325.00,144.00),(24,0,NULL,0,0,325.00,168.00),(23,0,NULL,0,0,452.00,237.00),(22,0,NULL,0,0,452.00,262.00),(21,0,NULL,0,0,429.00,236.00),(20,0,NULL,0,0,429.00,262.00),(19,0,NULL,0,0,397.00,236.00),(18,0,NULL,0,0,397.00,261.00),(17,0,NULL,0,0,374.00,236.00),(16,0,NULL,0,0,374.00,261.00),(15,0,NULL,0,0,451.00,290.00),(14,0,NULL,0,0,404.00,290.00),(13,1,21,0,0,376.00,290.00),(12,1,21,0,0,346.00,271.00),(11,0,NULL,0,0,346.00,248.00),(10,0,NULL,0,0,322.00,248.00),(9,0,NULL,0,0,322.00,271.00),(8,1,21,0,1,295.50,327.50),(7,0,NULL,0,1,281.50,343.50),(6,0,NULL,0,0,240.00,318.00),(5,1,21,0,0,165.00,318.00),(4,0,NULL,0,0,143.00,318.00),(3,1,21,0,0,119.50,318.00),(2,1,21,0,1,80.50,308.50),(1,1,21,0,1,65.50,292.50);
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

-- Dump completed on 2017-07-13 19:19:30
