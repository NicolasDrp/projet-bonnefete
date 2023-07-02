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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaire`
--

LOCK TABLES `commentaire` WRITE;
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
INSERT INTO `commentaire` VALUES (37,'fezez',5,21,NULL,'2023-06-29 13:54:04'),(38,'J\'adore\r\n',5,21,NULL,'2023-06-29 14:01:52');
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jaime`
--

LOCK TABLES `jaime` WRITE;
/*!40000 ALTER TABLE `jaime` DISABLE KEYS */;
INSERT INTO `jaime` VALUES (18,1,21,NULL),(19,2,21,NULL),(20,3,21,NULL),(21,5,25,NULL);
/*!40000 ALTER TABLE `jaime` ENABLE KEYS */;
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
  PRIMARY KEY (`id_post`),
  KEY `id_utilisateur_idx` (`id_utilisateur`),
  CONSTRAINT `id_utilisateur_post` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (21,'uytuy','2023-06-27 13:36:06',2),(25,'test voir si ca marche\r\n','2023-06-28 13:48:47',5);
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
  `is_super_admin` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email_utilisateur_UNIQUE` (`email_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'ihceue@gmail.com','chreheroiuhfre','gigiig','jujuju','binejnhjzcnkjze',NULL,NULL),(2,'menfou@gmail.com','$2y$10$XTadq5JCcqycwZ0Kf6ZpfOrU/rj.AGsj3LqFxyniR7s2hLWRXFeRq','trop','menfou','Bonjour , je m’appelle Bernard , j’aime voyager et quand j’ai un peu de temps , je voyage',1,NULL),(3,'menfou2@gmail.com','','encore','mefou','$2y$10$0RQ6H3yUDHfeNWmiudkIPOMBQyaPo0C4NqmZMBRtofoTmSfDf7dsW',0,NULL),(5,'menfouo@gmail.com','$2y$10$GzJkZbvN4weSuKiVyc4KduGf.BPeKJ2SfoFNPU9uwdqgTHQTOML7.','Nom','Prenom','',0,NULL);
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

-- Dump completed on 2023-06-29 15:07:09
