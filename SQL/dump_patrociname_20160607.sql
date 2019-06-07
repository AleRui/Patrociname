-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: patrociname
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB-0ubuntu0.18.04.2

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `mailAdmin` varchar(120) NOT NULL,
  `passAdmin` varchar(80) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin@patrociname.com','81dc9bdb52d04dc20036dbd8313ed055');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rols`
--

DROP TABLE IF EXISTS `rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rols` (
  `idRol` int(11) NOT NULL,
  `namRol` varchar(40) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rols`
--

LOCK TABLES `rols` WRITE;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
INSERT INTO `rols` VALUES (1,'searcher'),(2,'sponsor'),(3,'admin');
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `searcher`
--

DROP TABLE IF EXISTS `searcher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `searcher` (
  `idSearcher` int(11) NOT NULL,
  `mailSearcher` varchar(80) NOT NULL,
  `passSearcher` varchar(33) NOT NULL,
  PRIMARY KEY (`idSearcher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `searcher`
--

LOCK TABLES `searcher` WRITE;
/*!40000 ALTER TABLE `searcher` DISABLE KEYS */;
INSERT INTO `searcher` VALUES (1,'buscador1@buscador.com','202cb962ac59075b964b07152d234b70'),(2,'buscador2@bucados.com','202cb962ac59075b964b07152d234b70'),(3,'nuevo@nueva.com','202cb962ac59075b964b07152d234b70'),(4,'nuevo@nuevooo.com','202cb962ac59075b964b07152d234b70'),(5,'nuevo2@nuevo.com','202cb962ac59075b964b07152d234b70'),(51,'kgillebert0@craigslist.org','202cb962ac59075b964b07152d234b70'),(52,'olacey1@pbs.org','202cb962ac59075b964b07152d234b70'),(53,'pbrindley2@desdev.cn','202cb962ac59075b964b07152d234b70'),(54,'dbehne3@mapquest.com','202cb962ac59075b964b07152d234b70'),(55,'wcrosher4@sciencedirect.com','202cb962ac59075b964b07152d234b70'),(56,'jsprott5@mozilla.com','202cb962ac59075b964b07152d234b70'),(57,'ufolcarelli6@weibo.com','202cb962ac59075b964b07152d234b70'),(58,'ahastings7@google.it','202cb962ac59075b964b07152d234b70'),(59,'raveray8@hibu.com','202cb962ac59075b964b07152d234b70'),(60,'bnares9@sciencedirect.com','202cb962ac59075b964b07152d234b70'),(61,'wmuehlera@ycombinator.com','202cb962ac59075b964b07152d234b70'),(62,'fwinchesterb@t-online.de','202cb962ac59075b964b07152d234b70'),(63,'kyardc@ed.gov','202cb962ac59075b964b07152d234b70'),(64,'cbarlthropd@cyberchimps.com','202cb962ac59075b964b07152d234b70'),(65,'mhitchame@biblegateway.com','202cb962ac59075b964b07152d234b70'),(66,'fbruggerf@com.com','202cb962ac59075b964b07152d234b70'),(67,'tgiottoig@list-manage.com','202cb962ac59075b964b07152d234b70'),(68,'vblondellh@51.la','202cb962ac59075b964b07152d234b70'),(69,'mchestlei@chronoengine.com','202cb962ac59075b964b07152d234b70'),(70,'kallsoppj@github.io','202cb962ac59075b964b07152d234b70'),(123,'prueba@prueba.com','202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `searcher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor` (
  `idSponsor` int(11) NOT NULL,
  `mailSponsor` varchar(80) NOT NULL,
  `passSponsor` varchar(33) NOT NULL,
  PRIMARY KEY (`idSponsor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor`
--

LOCK TABLES `sponsor` WRITE;
/*!40000 ALTER TABLE `sponsor` DISABLE KEYS */;
INSERT INTO `sponsor` VALUES (1,'nuevo@nuevo.com','202cb962ac59075b964b07152d234b70'),(2,'nuevo2@nuevo.com','202cb962ac59075b964b07152d234b70'),(51,'dworrill0@51.la','202cb962ac59075b964b07152d234b70'),(52,'gjelks1@wp.com','202cb962ac59075b964b07152d234b70'),(53,'wjosum2@blogspot.com','202cb962ac59075b964b07152d234b70'),(54,'scastelow3@ehow.com','202cb962ac59075b964b07152d234b70'),(55,'adunkley4@wired.com','202cb962ac59075b964b07152d234b70'),(56,'cwhaplington5@posterous.com','202cb962ac59075b964b07152d234b70'),(57,'ppelerin6@nydailynews.com','202cb962ac59075b964b07152d234b70'),(58,'agillies7@skype.com','202cb962ac59075b964b07152d234b70'),(59,'mbraitling8@narod.ru','202cb962ac59075b964b07152d234b70'),(60,'sfairrie9@cmu.edu','202cb962ac59075b964b07152d234b70'),(61,'arichingsa@instagram.com','202cb962ac59075b964b07152d234b70'),(62,'lparffreyb@yellowbook.com','202cb962ac59075b964b07152d234b70'),(63,'hmcimmiec@europa.eu','202cb962ac59075b964b07152d234b70'),(64,'aiacovaccid@wordpress.com','202cb962ac59075b964b07152d234b70'),(65,'bkoomare@illinois.edu','202cb962ac59075b964b07152d234b70'),(66,'gheinonenf@thetimes.co.uk','202cb962ac59075b964b07152d234b70'),(67,'kwinchurchg@multiply.com','202cb962ac59075b964b07152d234b70'),(68,'aeudallh@dion.ne.jp','202cb962ac59075b964b07152d234b70'),(69,'friedeli@foxnews.com','202cb962ac59075b964b07152d234b70'),(70,'cbolinj@ovh.net','202cb962ac59075b964b07152d234b70'),(123,'sponsor1@sponsor.com','202cb962ac59075b964b07152d234b70'),(124,'sponsor2@sponsor.com','550a141f12de6341fba65b0ad0433500'),(125,'prueba@prueba.com','202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `sponsor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsorbundle`
--

DROP TABLE IF EXISTS `sponsorbundle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsorbundle` (
  `idSponsorBundle` int(11) NOT NULL,
  `idSearcher` int(11) NOT NULL,
  `sponsorWay` varchar(255) NOT NULL,
  `sponsoringCost` decimal(10,2) NOT NULL,
  `sponsorIma` varchar(255) DEFAULT NULL,
  `sponsorDateCreated` datetime NOT NULL,
  `sponsorDuration` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSponsorBundle`,`idSearcher`),
  KEY `setIdSearcher` (`idSearcher`),
  CONSTRAINT `setIdSearcher` FOREIGN KEY (`idSearcher`) REFERENCES `searcher` (`idSearcher`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsorbundle`
--

LOCK TABLES `sponsorbundle` WRITE;
/*!40000 ALTER TABLE `sponsorbundle` DISABLE KEYS */;
INSERT INTO `sponsorbundle` VALUES (1,123,'Publicidad en camiseta del Club al año',450.00,'assets/sponsorImas/t-shirt_one.png','2019-05-06 17:33:20',3),(2,123,'Publicidad Sudaddera con duracion',234.00,'assets/sponsorImas/saudadera.jpg','2019-05-30 11:25:57',13),(3,123,'Publicidad en Gorras',200.00,'assets/sponsorImas/cap.jpg','2019-01-07 19:35:41',8),(4,123,'Publicidad en Sudadera',2500.00,'assets/sponsorImas/saudadera.jpg','2019-05-30 10:44:05',24),(5,123,'nueva publicidad',435.00,'','2019-05-30 16:41:02',4),(6,123,'nueva publicidad gorra',234.00,'assets/sponsorImas/cap.jpg','2019-06-01 14:25:05',6),(7,5,'valla',4500.00,'assets/sponsorImas/vallas_publicitarias.jpg','2019-06-01 18:33:35',7),(8,1,'la publicidad',1234.00,'assets/sponsorImas/vallas_publicitarias.jpg','2019-04-22 22:26:38',18),(9,5,'Una gorra muy chula',456.00,'assets/sponsorImas/cap.jpg','2019-06-01 18:34:14',7),(51,62,'polo',291.85,'assets/sponsorImas/pancarta.jpg','2019-06-01 15:12:01',10),(52,70,'valla',965.45,'assets/sponsorImas/gorra.jpg','2019-04-09 01:29:44',20),(53,64,'gorra',1724.02,'assets/sponsorImas/rollaps.jpg','2019-04-05 17:36:50',7),(54,56,'polo',1142.25,'assets/sponsorImas/camiseta.jpg','2019-05-05 14:07:32',23),(55,60,'polo',155.54,'assets/sponsorImas/mochila.jpg','2019-03-23 21:47:47',32),(56,69,'polo',891.92,'assets/sponsorImas/ropa.jpg','2019-05-14 03:54:35',29),(57,51,'vinilo',1415.46,'assets/sponsorImas/gorra.jpg','2019-04-19 07:30:56',12),(58,53,'vinilo',1454.36,'assets/sponsorImas/rollaps.jpg','2019-05-30 06:57:31',3),(59,68,'ropa',1018.00,'assets/sponsorImas/valla.jpg','2019-03-30 19:41:59',27),(60,69,'rollaps',806.55,'assets/sponsorImas/mochila.jpg','2019-04-16 19:17:00',29),(61,53,'balon',509.83,'assets/sponsorImas/balon.jpg','2019-05-12 07:21:46',17),(62,60,'pancarta',1867.36,'assets/sponsorImas/pancarta.jpg','2019-05-17 11:18:31',28),(63,53,'rollaps',1254.10,'assets/sponsorImas/rollaps.jpg','2019-03-24 20:26:08',21),(64,67,'mochila',1470.04,'assets/sponsorImas/valla.jpg','2019-06-02 03:41:41',3),(65,68,'camiseta',1673.57,'assets/sponsorImas/valla.jpg','2019-05-16 02:22:37',12),(66,60,'rollaps',523.63,'assets/sponsorImas/pancarta.jpg','2019-04-25 01:20:13',29),(67,51,'gorra',251.07,'assets/sponsorImas/mochila.jpg','2019-05-17 02:05:12',29),(68,62,'mochila',1338.95,'assets/sponsorImas/rollaps.jpg','2019-04-04 04:59:03',26),(69,55,'camiseta',1010.84,'assets/sponsorImas/gorra.jpg','2019-05-18 04:12:27',6),(70,69,'balon',836.82,'assets/sponsorImas/rollaps.jpg','2019-06-01 13:12:49',24),(71,64,'pancarta',154.41,'assets/sponsorImas/polo.jpg','2019-05-27 16:57:19',6),(72,64,'ropa',1582.66,'assets/sponsorImas/pancarta.jpg','2019-05-17 11:07:51',35),(73,56,'gorra',515.29,'assets/sponsorImas/pancarta.jpg','2019-05-07 09:17:21',18),(74,63,'vinilo',131.91,'assets/sponsorImas/polo.jpg','2019-05-31 20:06:14',3),(75,51,'valla',708.92,'assets/sponsorImas/rollaps.jpg','2019-03-23 15:00:59',18),(76,67,'valla',133.75,'assets/sponsorImas/pancarta.jpg','2019-05-06 22:59:59',16),(77,65,'polo',1143.67,'assets/sponsorImas/camiseta.jpg','2019-06-03 21:42:43',18),(78,52,'mochila',806.59,'assets/sponsorImas/vinilo.jpg','2019-05-20 08:13:41',28),(79,60,'pancarta',1195.93,'assets/sponsorImas/ropa.jpg','2019-04-19 00:04:06',12),(80,56,'mochila',1436.48,'assets/sponsorImas/gorra.jpg','2019-04-18 15:27:27',21),(81,68,'mochila',720.58,'assets/sponsorImas/rollaps.jpg','2019-05-03 07:42:05',23),(82,62,'polo',1983.11,'assets/sponsorImas/polo.jpg','2019-05-04 08:35:50',9),(83,54,'valla',385.76,'assets/sponsorImas/rollaps.jpg','2019-05-24 17:10:25',34),(84,66,'gorra',520.60,'assets/sponsorImas/rollaps.jpg','2019-03-23 09:30:34',31),(85,65,'balon',17.25,'assets/sponsorImas/polo.jpg','2019-06-03 10:51:00',3),(86,55,'ropa',1646.64,'assets/sponsorImas/pancarta.jpg','2019-04-26 22:53:49',4),(87,67,'mochila',438.22,'assets/sponsorImas/balon.jpg','2019-04-01 08:51:10',2),(88,62,'mochila',339.36,'assets/sponsorImas/vinilo.jpg','2019-05-17 03:16:33',9),(89,56,'vinilo',472.11,'assets/sponsorImas/mochila.jpg','2019-06-03 21:18:06',2),(90,65,'balon',781.06,'assets/sponsorImas/pancarta.jpg','2019-05-11 18:16:06',2),(91,52,'mochila',1382.33,'assets/sponsorImas/polo.jpg','2019-04-03 17:55:40',18),(92,61,'ropa',1692.04,'assets/sponsorImas/pancarta.jpg','2019-06-03 14:33:26',18),(93,66,'valla',446.96,'assets/sponsorImas/gorra.jpg','2019-05-21 14:19:02',27),(94,55,'pancarta',623.87,'assets/sponsorImas/balon.jpg','2019-04-01 10:13:33',7),(95,66,'ropa',1551.88,'assets/sponsorImas/polo.jpg','2019-05-06 05:55:54',22),(96,56,'pancarta',944.76,'assets/sponsorImas/rollaps.jpg','2019-03-27 14:45:23',19),(97,56,'vinilo',1132.67,'assets/sponsorImas/polo.jpg','2019-04-15 21:12:43',13),(98,64,'rollaps',968.33,'assets/sponsorImas/pancarta.jpg','2019-04-19 14:12:49',2),(99,60,'vinilo',1542.22,'assets/sponsorImas/vinilo.jpg','2019-05-29 10:29:36',14),(100,54,'pancarta',1246.55,'assets/sponsorImas/gorra.jpg','2019-05-26 21:02:31',5),(101,67,'valla',618.83,'assets/sponsorImas/polo.jpg','2019-04-23 17:10:13',1),(102,53,'gorra',1760.31,'assets/sponsorImas/vinilo.jpg','2019-03-23 12:36:24',3),(103,56,'polo',1772.46,'assets/sponsorImas/balon.jpg','2019-04-12 09:55:49',16),(104,65,'ropa',386.19,'assets/sponsorImas/pancarta.jpg','2019-05-22 15:49:38',33),(105,62,'polo',776.39,'assets/sponsorImas/vinilo.jpg','2019-05-09 18:00:30',5),(106,55,'gorra',252.22,'assets/sponsorImas/mochila.jpg','2019-04-29 23:22:32',7),(107,70,'vinilo',1032.86,'assets/sponsorImas/valla.jpg','2019-03-27 06:58:35',9),(108,63,'polo',76.77,'assets/sponsorImas/pancarta.jpg','2019-03-21 00:06:24',3),(109,60,'rollaps',476.62,'assets/sponsorImas/balon.jpg','2019-05-24 13:42:43',20),(110,54,'ropa',42.08,'assets/sponsorImas/gorra.jpg','2019-04-28 07:09:57',22),(111,57,'pancarta',1736.85,'assets/sponsorImas/rollaps.jpg','2019-06-03 15:48:25',16),(112,67,'valla',1944.46,'assets/sponsorImas/ropa.jpg','2019-04-20 07:31:20',9),(113,55,'gorra',845.40,'assets/sponsorImas/mochila.jpg','2019-05-27 19:35:20',5),(114,65,'valla',1761.57,'assets/sponsorImas/valla.jpg','2019-04-26 09:12:18',18),(115,55,'rollaps',15.35,'assets/sponsorImas/mochila.jpg','2019-05-03 00:20:05',16),(116,52,'pancarta',1816.56,'assets/sponsorImas/gorra.jpg','2019-05-23 14:29:26',11),(117,67,'balon',1722.67,'assets/sponsorImas/vinilo.jpg','2019-04-25 09:21:13',16),(118,63,'mochila',659.41,'assets/sponsorImas/camiseta.jpg','2019-03-22 01:14:10',18),(119,59,'vinilo',966.20,'assets/sponsorImas/balon.jpg','2019-03-25 03:00:15',22),(120,57,'pancarta',1300.32,'assets/sponsorImas/polo.jpg','2019-03-25 05:47:14',27),(121,69,'gorra',1886.15,'assets/sponsorImas/rollaps.jpg','2019-04-15 16:27:08',24),(122,61,'gorra',1040.28,'assets/sponsorImas/ropa.jpg','2019-03-19 05:05:10',16),(123,53,'mochila',295.33,'assets/sponsorImas/pancarta.jpg','2019-03-21 18:17:45',7),(124,69,'vinilo',30.35,'assets/sponsorImas/valla.jpg','2019-04-11 22:57:53',28),(125,68,'vinilo',836.20,'assets/sponsorImas/gorra.jpg','2019-04-07 23:41:20',27),(126,66,'camiseta',1248.88,'assets/sponsorImas/balon.jpg','2019-04-02 12:58:39',36),(127,61,'camiseta',1427.50,'assets/sponsorImas/gorra.jpg','2019-05-08 06:56:19',34),(128,53,'polo',162.28,'assets/sponsorImas/mochila.jpg','2019-05-10 11:56:09',29),(129,54,'vinilo',1266.91,'assets/sponsorImas/polo.jpg','2019-05-27 11:06:52',30),(130,64,'mochila',953.63,'assets/sponsorImas/balon.jpg','2019-03-30 13:41:48',34),(131,57,'rollaps',1946.38,'assets/sponsorImas/gorra.jpg','2019-04-01 08:20:38',13),(132,60,'gorra',178.90,'assets/sponsorImas/balon.jpg','2019-04-28 22:41:25',12),(133,70,'valla',786.76,'assets/sponsorImas/balon.jpg','2019-04-30 22:26:09',23),(134,58,'rollaps',611.46,'assets/sponsorImas/pancarta.jpg','2019-05-26 00:20:35',4),(135,57,'pancarta',772.28,'assets/sponsorImas/polo.jpg','2019-05-03 21:54:46',35),(136,57,'camiseta',907.21,'assets/sponsorImas/balon.jpg','2019-03-29 12:41:06',33),(137,62,'mochila',263.00,'assets/sponsorImas/vinilo.jpg','2019-04-09 12:25:14',16),(138,60,'polo',1399.94,'assets/sponsorImas/valla.jpg','2019-06-01 01:59:09',12),(139,69,'pancarta',364.47,'assets/sponsorImas/mochila.jpg','2019-04-13 17:16:49',6),(140,56,'camiseta',1536.22,'assets/sponsorImas/rollaps.jpg','2019-05-20 22:19:52',2),(141,61,'camiseta',1924.93,'assets/sponsorImas/balon.jpg','2019-04-13 00:59:30',4),(142,61,'camiseta',916.55,'assets/sponsorImas/camiseta.jpg','2019-05-01 14:29:57',23),(143,66,'gorra',476.80,'assets/sponsorImas/valla.jpg','2019-05-14 18:43:04',6),(144,59,'gorra',1949.89,'assets/sponsorImas/rollaps.jpg','2019-04-21 05:53:40',21),(145,53,'mochila',1272.20,'assets/sponsorImas/polo.jpg','2019-05-27 05:55:52',33),(146,68,'polo',1641.09,'assets/sponsorImas/polo.jpg','2019-04-27 01:54:06',14),(147,68,'gorra',1694.94,'assets/sponsorImas/valla.jpg','2019-05-01 12:54:39',31),(148,70,'ropa',1424.84,'assets/sponsorImas/camiseta.jpg','2019-04-12 09:23:00',20),(149,51,'balon',487.44,'assets/sponsorImas/mochila.jpg','2019-05-12 06:45:50',5),(150,62,'ropa',1844.03,'assets/sponsorImas/balon.jpg','2019-03-20 13:36:47',33);
/*!40000 ALTER TABLE `sponsorbundle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsorbuysponsoring`
--

DROP TABLE IF EXISTS `sponsorbuysponsoring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsorbuysponsoring` (
  `idSponsorBundle` int(11) NOT NULL,
  `idSponsor` int(11) NOT NULL,
  `buyDateSponsorBundle` datetime NOT NULL,
  PRIMARY KEY (`idSponsorBundle`,`idSponsor`),
  KEY `setFKidSposnor` (`idSponsor`),
  CONSTRAINT `setFKidSponsorBundle` FOREIGN KEY (`idSponsorBundle`) REFERENCES `sponsorbundle` (`idSponsorBundle`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `setFKidSposnor` FOREIGN KEY (`idSponsor`) REFERENCES `sponsor` (`idSponsor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsorbuysponsoring`
--

LOCK TABLES `sponsorbuysponsoring` WRITE;
/*!40000 ALTER TABLE `sponsorbuysponsoring` DISABLE KEYS */;
INSERT INTO `sponsorbuysponsoring` VALUES (6,125,'2019-05-29 18:35:27'),(7,123,'2019-06-01 18:35:09'),(8,125,'2019-05-10 15:23:32'),(102,64,'2019-04-18 15:46:12'),(102,67,'2019-05-31 10:12:02'),(105,70,'2019-05-21 11:15:47'),(106,65,'2019-05-23 14:53:49'),(109,53,'2019-05-28 16:00:33'),(109,60,'2019-05-01 04:11:50'),(116,62,'2019-04-15 20:01:48'),(117,51,'2019-05-14 19:11:07'),(118,60,'2019-04-03 00:23:22'),(122,63,'2019-05-07 00:29:23'),(126,55,'2019-04-03 00:34:52'),(126,69,'2019-05-04 17:48:33'),(126,70,'2019-05-29 05:44:04'),(128,62,'2019-04-06 04:35:14'),(129,69,'2019-05-09 05:15:01'),(130,60,'2019-04-09 04:07:51'),(131,64,'2019-06-01 08:23:12'),(133,68,'2019-05-25 20:18:06'),(136,65,'2019-05-11 14:06:24'),(138,51,'2019-04-04 15:05:08'),(139,63,'2019-04-19 21:57:16'),(140,58,'2019-05-29 02:37:30'),(140,67,'2019-04-05 13:12:28'),(142,56,'2019-04-10 15:38:40'),(143,58,'2019-04-30 14:34:34'),(144,55,'2019-03-26 03:52:34'),(145,69,'2019-03-29 16:47:15'),(146,55,'2019-04-29 15:24:38'),(146,69,'2019-05-21 10:24:08'),(148,56,'2019-04-10 01:40:31'),(148,57,'2019-05-26 17:19:46'),(148,61,'2019-04-22 22:14:36'),(149,58,'2019-04-04 20:59:50'),(150,51,'2019-04-03 15:46:36'),(150,56,'2019-05-17 01:58:38'),(150,61,'2019-05-20 05:34:03');
/*!40000 ALTER TABLE `sponsorbuysponsoring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `idUsr` int(11) NOT NULL,
  `emaUsr` varchar(254) NOT NULL,
  `pswUsr` varchar(128) NOT NULL,
  `rolUsr` int(11) NOT NULL,
  `fnamUsr` varchar(80) DEFAULT NULL,
  `lnamUsr` varchar(80) DEFAULT NULL,
  `tlfUsr` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idUsr`),
  KEY `putRolInUser` (`rolUsr`),
  CONSTRAINT `putRolInUser` FOREIGN KEY (`rolUsr`) REFERENCES `rols` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (123,'prueba','202cb962ac59075b964b07152d234b70',1,'PruebaNombre','PruebaApellido','611622633');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-07 11:49:47
