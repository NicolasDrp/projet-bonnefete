-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: bonnefete
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentaire` (
  `id_commentaire` int NOT NULL AUTO_INCREMENT,
  `contenu_commentaire` varchar(200) NOT NULL,
  `id_utilisateur` int NOT NULL,
  `id_post` int DEFAULT NULL,
  `id_com` int DEFAULT NULL,
  `date_commentaire` datetime DEFAULT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `id_utilisateur_idx` (`id_utilisateur`),
  KEY `id_post_idx` (`id_post`),
  KEY `id_com_idx` (`id_com`),
  CONSTRAINT `id_com` FOREIGN KEY (`id_com`) REFERENCES `commentaire` (`id_commentaire`) ON DELETE CASCADE,
  CONSTRAINT `id_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE,
  CONSTRAINT `id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaire`
--

LOCK TABLES `commentaire` WRITE;
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
INSERT INTO `commentaire` VALUES (40,'commentaire',5,28,NULL,'2023-06-29 19:39:47'),(41,'sous commentaire',5,28,40,'2023-06-29 19:39:57'),(48,'Ceci est maintenant encore un vrai commentaire cijzioczjioczioqz\r\nczcze\r\n',5,21,NULL,'2023-06-30 11:15:54'),(50,'a moi',5,21,NULL,'2023-06-30 11:32:09'),(51,'tre',5,21,48,'2023-06-30 11:36:01'),(52,'commentaire tret',5,25,NULL,'2023-06-30 12:12:20'),(54,'encore',5,25,52,'2023-06-30 12:56:02'),(56,'test',5,21,NULL,'2023-06-30 20:35:15'),(58,'test',6,21,NULL,'2023-07-02 12:13:53'),(61,'trop bien',7,21,NULL,'2023-07-02 13:57:43'),(67,'com\r\n',9,21,NULL,'2023-07-03 08:56:15'),(70,'commentiare',3,42,NULL,'2023-07-04 10:52:10'),(71,'sous commnetriz',3,42,70,'2023-07-04 10:52:20'),(72,'Nouveau commentaire',3,42,NULL,'2023-07-04 10:52:28'),(73,'Nouveau sous commentaire',3,42,72,'2023-07-04 10:52:36');
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jaime`
--

DROP TABLE IF EXISTS `jaime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jaime` (
  `id_jaime` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int DEFAULT NULL,
  `id_post` int DEFAULT NULL,
  `id_commentaire` int DEFAULT NULL,
  PRIMARY KEY (`id_jaime`),
  KEY `id_utilisateur_idx` (`id_utilisateur`),
  KEY `id_post_idx` (`id_post`),
  KEY `id_commentaire_idx` (`id_commentaire`),
  CONSTRAINT `id_commentaire` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id_commentaire`) ON DELETE CASCADE,
  CONSTRAINT `id_du_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE,
  CONSTRAINT `id_user` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jaime`
--

LOCK TABLES `jaime` WRITE;
/*!40000 ALTER TABLE `jaime` DISABLE KEYS */;
INSERT INTO `jaime` VALUES (18,1,21,NULL),(19,2,21,NULL),(21,5,25,NULL),(110,5,25,52),(115,3,21,52),(119,5,21,NULL),(121,5,21,50),(122,5,21,56),(124,6,21,48),(125,6,21,50),(126,6,21,NULL),(127,5,21,48),(128,6,21,56),(130,6,21,58),(132,2,21,58),(134,2,21,48),(136,2,21,50),(138,2,21,51),(140,2,21,56),(141,7,21,56),(143,7,21,61),(144,7,21,51),(145,7,21,48),(147,7,21,NULL),(152,11,21,NULL),(153,11,21,51),(155,11,21,56),(156,11,21,67),(157,6,21,51),(158,6,21,67);
/*!40000 ALTER TABLE `jaime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `action` varchar(50) DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL,
  `id_post` int DEFAULT NULL,
  `date_log` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'Viens de se connecter',2,NULL,'2023-07-04 00:00:00'),(2,'Viens de se connecter',7,NULL,'2023-07-04 15:24:02'),(3,'Viens de se connecter',16,NULL,'2023-07-04 15:26:31'),(4,'Viens de se connecter',7,NULL,'2023-07-04 15:31:46'),(5,'Viens de se connecter',7,NULL,'2023-07-04 15:50:24'),(6,'Viens de se connecter',16,NULL,'2023-07-04 15:50:36'),(7,'Viens de publier un post',16,21,'2023-07-04 15:55:02'),(8,'Viens de mettre à jour un post',16,NULL,'2023-07-04 15:56:27'),(10,'Viens de publier un post',16,NULL,'2023-07-04 16:01:31'),(13,'Viens de publier un post',16,NULL,'2023-07-04 16:04:04'),(14,'Viens de supprimer un post',16,NULL,'2023-07-04 16:04:07'),(15,'Viens de publier un post',16,NULL,'2023-07-04 16:04:47'),(16,'Viens de supprimer un post',16,51,'2023-07-04 16:04:55');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `contenu_post` varchar(200) NOT NULL,
  `date_post` datetime NOT NULL,
  `id_utilisateur` int NOT NULL,
  `id_image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_utilisateur_idx` (`id_utilisateur`),
  CONSTRAINT `id_utilisateur_post` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (21,'uytuy','2023-06-27 13:36:06',2,NULL),(25,'test voir si ca marche','2023-06-28 13:48:47',5,NULL),(28,'test bdd\r\n','2023-06-29 19:39:38',5,NULL),(37,'tre','2023-07-03 11:14:36',7,NULL),(38,' ','2023-07-03 13:25:17',11,NULL),(39,'jjjjniujlkjiujhkjnui','2023-07-03 13:25:36',11,NULL),(42,'Salut c moi','2023-07-04 09:24:53',3,'64a3c9459a144.jpg'),(43,'opiyt','2023-07-04 11:20:12',3,NULL),(44,'veverz','2023-07-04 11:20:18',3,NULL),(45,'Facile','2023-07-04 11:20:32',3,'64a3e4609a0e4.jpg'),(46,'MEssage de thomas','2023-07-04 13:35:15',15,NULL),(51,'bvtrvtr','2023-07-04 16:04:47',16,NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `email_utilisateur` varchar(100) NOT NULL,
  `password_utilisateur` varchar(250) NOT NULL,
  `nom_utilisateur` varchar(45) NOT NULL,
  `prenom_utilisateur` varchar(45) DEFAULT NULL,
  `bio_utilisateur` varchar(150) DEFAULT NULL,
  `est_moderateur` tinyint DEFAULT NULL,
  `est_super_admin` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email_utilisateur_UNIQUE` (`email_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'ihceue@gmail.com','chreheroiuhfre','gigiig','jujuju','binejnhjzcnkjze',0,0),(2,'menfou@gmail.com','$2y$10$XTadq5JCcqycwZ0Kf6ZpfOrU/rj.AGsj3LqFxyniR7s2hLWRXFeRq','trop','menfou','Bonjour , je m’appelle Bernard , j’aime voyager et quand j’ai un peu de temps , je voyage',1,0),(3,'menfou2@gmail.com','$2y$10$9.hDMoHU6IUYGzXtA2GYpO2pVfVhhslPEdYGdMFNoC74FL8IS97sC','MEFOU','ENCORE','ceci est ma bio',0,0),(5,'menfouo@gmail.com','$2y$10$GzJkZbvN4weSuKiVyc4KduGf.BPeKJ2SfoFNPU9uwdqgTHQTOML7.','Nom','Prenom','Ceci est un bio blablabalabal',1,0),(6,'aaa@aaa',' ','NICOLAS','DRAPIER','',0,1),(7,'n@n','$2y$10$.gkB3/3sRv3huY2Zgs3i/O1Vti62zxjSkVIwgqoXwmbGA6ftarb/C','Compte','Nouveau','',0,1),(9,'a@a','$2y$10$iIvmmEVV4n7Qq/3M/vXHIe4eCUnzjZNbtVdDnXtHUgiZ9m9LkT1ta','a','a','Bonjout jai une bnio',0,0),(11,'m@m','$2y$10$6AuRGQyXOiAnP2M8FY3ly.cG5rp6r1QrdQ2RPq3GsJqGa8lDEL7om','UN PRENOM','UN NOM','test',0,0),(12,'admin@zcpojvzjv.csz','$2y$10$DY4dlhb5MBbW67rojbHMfOht55cSgUp9IzLZ4sjkS36ru/eRUL4L.','fzfeezfez','fzfzf','',0,0),(13,'fezf@fez.ez','$2y$10$4QFhNXhJU87AQNIg1P0DI.tDrELIHhYebxh9n8xxvPNhfBRYPhxd6','eqrbeq','gerbrqe','',0,0),(14,'admin@a.a','$2y$10$bl/zaqzt50kREl8CkWk9ouwfC1cen4hcjNZuqEHP0H3uvFxx0v3DW','TRBRTERTBTE','VFSVSREZBRTB','',0,0),(15,'t@t.t','$2y$10$QhRM4aqqw5gYpfhxsXBq3eL.kjdOiQGIfQkMB32MKYrWRf2iFh11i','BAUDRIN','THOMAS','Bonjour je suis thoams',1,0),(16,'zzz@zzz','$2y$10$J0Br/djdy5o1YFwOhnZVZuWQ.JgJAo19sKURtuulDs6FWeCj6X1k.','CLAUDE','JEAN','',0,0);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-04 16:09:24
