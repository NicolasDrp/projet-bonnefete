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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaire`
--

LOCK TABLES `commentaire` WRITE;
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
INSERT INTO `commentaire` VALUES (76,'Les montagnes sont tellement inspirantes ! J\'espère pouvoir y aller un jour.',21,55,NULL,'2023-07-06 18:39:19'),(77,'J\'étais également à ce concert, et je suis d\'accord, c\'était incroyable ! L\'artiste a une voix exceptionnelle.',22,56,NULL,'2023-07-06 18:45:36'),(78,'Nous devrions assister à un concert ensemble la prochaine fois !',22,56,77,'2023-07-06 18:47:13'),(79,'J\'ai ajouté ce livre à ma liste de lecture. Merci pour la recommandation !',20,57,NULL,'2023-07-06 18:48:07'),(80,'J\'ai adoré ce livre aussi. L\'auteur sait vraiment captiver son public !',21,57,79,'2023-07-06 18:49:33'),(81,'Avec plaisir !',21,56,77,'2023-07-06 19:01:15');
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
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jaime`
--

LOCK TABLES `jaime` WRITE;
/*!40000 ALTER TABLE `jaime` DISABLE KEYS */;
INSERT INTO `jaime` VALUES (163,21,55,NULL),(164,22,56,NULL),(165,20,57,NULL);
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
  `action` varchar(100) DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL,
  `id_post` int DEFAULT NULL,
  `date_log` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (71,'Un utilisateur vient de s\'inscrire',NULL,NULL,'2023-07-06 18:21:01'),(72,'Vient de vérifier son compte',20,NULL,'2023-07-06 18:21:45'),(73,'Vient de se connecter',20,NULL,'2023-07-06 18:22:05'),(74,'Vient de mettre son profil à jour',20,NULL,'2023-07-06 18:26:44'),(75,'Viens de publier un post',20,NULL,'2023-07-06 18:27:14'),(76,'Un utilisateur vient de s\'inscrire',NULL,NULL,'2023-07-06 18:32:57'),(77,'Vient de vérifier son compte',21,NULL,'2023-07-06 18:33:25'),(78,'Vient de se connecter',21,NULL,'2023-07-06 18:33:36'),(79,'Vient de mettre son profil à jour',21,NULL,'2023-07-06 18:33:51'),(80,'Viens de publier un post',21,NULL,'2023-07-06 18:34:22'),(81,'Viens de publier un post',21,NULL,'2023-07-06 18:36:10'),(82,'Viens de publier un post',21,NULL,'2023-07-06 18:36:53'),(83,'Viens de publier un post',21,NULL,'2023-07-06 18:37:52'),(84,'Viens de publier un post',21,NULL,'2023-07-06 18:38:28'),(85,'Viens de poster un commentaire sous le post',21,55,'2023-07-06 18:39:19'),(86,'Viens d\'aimer le post',21,55,'2023-07-06 18:39:27'),(87,'Viens de retirer son j\'aime sur le post',21,55,'2023-07-06 18:39:29'),(88,'Viens d\'aimer le post',21,55,'2023-07-06 18:39:31'),(89,'Un utilisateur vient de s\'inscrire',NULL,NULL,'2023-07-06 18:40:29'),(90,'Vient de vérifier son compte',22,NULL,'2023-07-06 18:42:22'),(91,'Vient de se connecter',22,NULL,'2023-07-06 18:42:34'),(92,'Viens de publier un post',22,NULL,'2023-07-06 18:44:44'),(93,'Vient de mettre son profil à jour',22,NULL,'2023-07-06 18:45:06'),(94,'Viens d\'aimer le post',22,56,'2023-07-06 18:45:27'),(95,'Viens de poster un commentaire sous le post',22,56,'2023-07-06 18:45:36'),(96,'Viens de mettre à jour un commentaire sous le post',22,77,'2023-07-06 18:47:05'),(97,'Viens de répondre à un commentaire sous le post',22,56,'2023-07-06 18:47:13'),(98,'Vient de se connecter',20,NULL,'2023-07-06 18:47:49'),(99,'Viens d\'aimer le post',20,57,'2023-07-06 18:48:04'),(100,'Viens de poster un commentaire sous le post',20,57,'2023-07-06 18:48:07'),(101,'Vient de se connecter',21,NULL,'2023-07-06 18:49:14'),(102,'Viens de répondre à un commentaire sous le post',21,57,'2023-07-06 18:49:33'),(103,'Viens de mettre à jour un post',21,56,'2023-07-06 18:56:43'),(104,'Vient de mettre son profil à jour',21,NULL,'2023-07-06 19:00:05'),(105,'Viens de répondre à un commentaire sous le post',21,56,'2023-07-06 19:01:15'),(106,'Vient de se connecter',18,NULL,'2023-07-06 19:16:54'),(107,'Un utilisateur vient de s\'inscrire',NULL,NULL,'2023-07-06 19:20:49'),(108,'Vient de vérifier son compte',23,NULL,'2023-07-06 19:21:20'),(109,'Vient de se connecter',23,NULL,'2023-07-06 19:21:38'),(110,'Vient de mettre son profil à jour',23,NULL,'2023-07-06 19:21:50'),(111,'Vient de mettre son profil à jour',23,NULL,'2023-07-06 19:22:07'),(112,'Vient de vérifier son compte',23,NULL,'2023-07-06 19:23:17'),(113,'Vient de vérifier son compte',23,NULL,'2023-07-06 19:23:51'),(114,'Vient de se connecter',23,NULL,'2023-07-06 19:24:12'),(115,'Vient de se connecter',18,NULL,'2023-07-06 19:27:57');
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (55,'Quelle magnifique journée passée à explorer les montagnes ! Les paysages étaient à couper le souffle.','2023-07-06 18:27:14',20,'64a6eb62e18bf.jpg'),(56,'Assisté à un concert incroyable hier soir. L\'artiste a enflammé la scène avec son talent exceptionnel !','2023-07-06 18:38:28',21,'64a6ee041e3a1.jpg'),(57,'J\'ai ajouté ce livre à ma liste de lecture. Merci pour la recommandation !','2023-07-06 18:44:44',22,'64a6ef7c0eaf5.jpg');
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
  `est_verifie` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email_utilisateur_UNIQUE` (`email_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (18,'admin@bonnefete.com','$2y$10$7vh982VwLAS.g8MGz43gtePtZEpK2rxM3tTvYOxT1bw2Ij2mXvSeC','BONNEFETE','ADMIN',' ',1,1,1),(20,'soxat35692@kameili.com','$2y$10$7vh982VwLAS.g8MGz43gtePtZEpK2rxM3tTvYOxT1bw2Ij2mXvSeC','DUPONT','ALICE','Amoureuse des voyages et de la nature. Partageons ensemble nos aventures !',0,0,1),(21,'pihab22563@lukaat.com','$2y$10$/BeJc0bN/8MYg53obPWV7uMeinl0ZpcT.P2WeEHfP2snBQ5gjE9E2','FRANCOIS','MARTIN','Passionné de musique et de gastronomie. Toujours à la recherche de nouvelles découvertes !',0,0,1),(22,'kefakix156@lukaat.com','$2y$10$LDUrrqdXNzq0F0qdJHlo2eaPY9xgVtACJMuNwOPhs47znJSUOktRC','LEROY','SOPHIE','Je viens de terminer un livre captivant. L\'histoire était si intense que j\'ai du mal à m\'en remettre.',0,0,1),(23,'gefiva5213@mahmul.com','$2y$10$iLC5pAXvAsO3r5QmznC0Ee.FLAtBFYZCFf6wMn7MHR33PNu0fyDJS','SOPHIE','TREMBLAY','Amoureuse des animaux et de la nature. Toujours à la recherche de nouvelles aventures !',1,0,1);
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

-- Dump completed on 2023-07-06 19:30:17
