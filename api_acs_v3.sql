-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: api_acs_v3
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `action_actions`
--

DROP TABLE IF EXISTS `action_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_actions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_action1` bigint(20) unsigned NOT NULL,
  `id_action2` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `action_actions_id_action1_foreign` (`id_action1`),
  KEY `action_actions_id_action2_foreign` (`id_action2`),
  CONSTRAINT `action_actions_id_action1_foreign` FOREIGN KEY (`id_action1`) REFERENCES `actions` (`id`),
  CONSTRAINT `action_actions_id_action2_foreign` FOREIGN KEY (`id_action2`) REFERENCES `actions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_actions`
--

LOCK TABLES `action_actions` WRITE;
/*!40000 ALTER TABLE `action_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `action_etats`
--

DROP TABLE IF EXISTS `action_etats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_etats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'badge-danger',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_etats`
--

LOCK TABLES `action_etats` WRITE;
/*!40000 ALTER TABLE `action_etats` DISABLE KEYS */;
INSERT INTO `action_etats` VALUES (1,'A faire','badge-danger',NULL,NULL),(2,'En progresse','badge-info',NULL,NULL),(3,'Términé','badge-success',NULL,NULL),(4,'Retours','badge-dark',NULL,NULL);
/*!40000 ALTER TABLE `action_etats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `action_status`
--

DROP TABLE IF EXISTS `action_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_status`
--

LOCK TABLES `action_status` WRITE;
/*!40000 ALTER TABLE `action_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `action_types`
--

DROP TABLE IF EXISTS `action_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_types`
--

LOCK TABLES `action_types` WRITE;
/*!40000 ALTER TABLE `action_types` DISABLE KEYS */;
INSERT INTO `action_types` VALUES (1,'Tache',NULL,NULL),(2,'Evenement',NULL,NULL),(3,'Rappel',NULL,NULL),(4,'Intervention',NULL,NULL);
/*!40000 ALTER TABLE `action_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dd` date DEFAULT NULL,
  `df` date DEFAULT NULL,
  `rapporteur` bigint(20) unsigned NOT NULL,
  `responsable` bigint(20) unsigned NOT NULL,
  `id_action_type` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_action_etat` bigint(20) unsigned DEFAULT 1,
  `id_action_etat_type` bigint(20) unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'badge-danger',
  PRIMARY KEY (`id`),
  KEY `actions_rapporteur_foreign` (`rapporteur`),
  KEY `actions_responsable_foreign` (`responsable`),
  CONSTRAINT `actions_rapporteur_foreign` FOREIGN KEY (`rapporteur`) REFERENCES `users` (`id`),
  CONSTRAINT `actions_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,'Tarificateur ACS Extension','2021-02-08','2021-02-09',2,2,1,'2021-02-11 12:35:54','2021-02-12 12:53:57',4,NULL,NULL,'badge-danger'),(2,'Virements','2021-02-08','2021-02-09',1,6,1,'2021-02-11 12:35:54','2021-02-19 09:51:48',2,NULL,NULL,'badge-danger'),(3,'Faire une gestions des taches','2021-02-08','2021-02-09',2,2,1,'2021-02-11 12:35:54','2021-02-13 07:52:59',3,NULL,NULL,'badge-danger'),(4,'Serveur Appelle VOIP','2021-02-10','2021-02-10',1,3,1,'2021-02-10 13:52:40','2021-02-17 14:43:27',1,NULL,NULL,'badge-danger'),(5,'Appel Operateur Manifone','2021-02-10','2021-02-10',1,3,1,'2021-02-10 13:54:41','2021-02-17 14:43:29',2,NULL,NULL,'badge-danger'),(6,'Dossier Client Carcassonne','2021-02-10','2021-02-10',1,6,1,'2021-02-10 13:55:06','2021-02-13 09:32:38',1,NULL,NULL,'badge-danger'),(7,'Installation Serveur VOIP','2021-02-11','2021-02-11',1,1,1,'2021-02-11 13:39:49','2021-02-13 09:32:39',1,NULL,NULL,'badge-danger'),(8,'elhaddad','2021-02-12','2021-02-12',2,3,1,'2021-02-12 08:12:34','2021-02-12 08:12:34',1,NULL,NULL,'badge-danger'),(9,'Tableau de Gestions Contrats','2021-02-12','2021-02-12',1,2,1,'2021-02-12 08:18:53','2021-02-13 09:17:52',2,NULL,'Urgent Créer un tableau de Gestion.','badge-danger'),(10,'Tableau de Gestions Contrats','2021-02-12','2021-02-12',1,1,1,'2021-02-12 08:40:22','2021-02-13 09:36:53',2,NULL,'Créer un Tableau de Gestions Contrats','badge-danger'),(11,'Client X a vérifier','2021-02-12','2021-02-12',1,6,1,'2021-02-12 08:40:50','2021-02-13 09:16:41',3,NULL,'Client X a vérifier Contrat','badge-danger'),(12,'Formatage PC','2021-02-12','2021-02-12',1,1,4,'2021-02-12 08:53:05','2021-02-13 09:36:56',2,NULL,'PC 1 a formater','badge-danger'),(13,'achahboune kamal','2021-02-12','2021-02-12',2,6,1,'2021-02-12 09:23:00','2021-02-12 13:27:42',1,NULL,'appeler eca pour l\'attestation mrh','badge-danger'),(14,'elhaddad','2021-02-12','2021-02-12',2,6,1,'2021-02-12 12:36:07','2021-02-12 12:36:07',1,NULL,'appeler eca pour le devis sinistre si il ont traité','badge-danger'),(15,'drissika','2021-02-12','2021-02-12',2,6,1,'2021-02-12 13:43:13','2021-02-12 13:43:13',1,NULL,'je t\'ai  envoyé la facture de réparation du pare brise de ma mercedes le contrat chez apivia il faut déclarer le sinistre et envoyé la facture','badge-danger'),(16,'drissika','2021-02-12','2021-02-12',2,2,1,'2021-02-12 13:43:16','2021-02-12 13:51:14',1,NULL,'je t\'ai  envoyé la facture de réparation du pare brise de ma mercedes le contrat chez apivia il faut déclarer le sinistre et envoyé la facture','badge-danger'),(17,'drissika','2021-02-12','2021-02-12',2,2,1,'2021-02-12 13:43:17','2021-02-12 13:51:11',1,NULL,'je t\'ai  envoyé la facture de réparation du pare brise de ma mercedes le contrat chez apivia il faut déclarer le sinistre et envoyé la facture','badge-danger'),(18,'test','2021-02-12','2021-02-12',2,5,1,'2021-02-12 13:44:13','2021-02-12 13:51:07',1,NULL,'ccccccc','badge-danger');
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assurances`
--

DROP TABLE IF EXISTS `assurances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assurances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `assurance` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` char(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assurances`
--

LOCK TABLES `assurances` WRITE;
/*!40000 ALTER TABLE `assurances` DISABLE KEYS */;
/*!40000 ALTER TABLE `assurances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `civilite` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activite_id` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitfam_id` int(11) NOT NULL,
  `cp` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dn` date NOT NULL,
  `ville` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portable` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixe` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicatif` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` char(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomvoie` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typevoie` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rue` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sante_date_contrat` date DEFAULT NULL,
  `sante_sc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sante_sc_clef` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sante_distance` tinyint(1) DEFAULT NULL,
  `regime_id` bigint(20) unsigned DEFAULT NULL,
  `sante_assureur` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,1,'0','benomar','f','1',1,'ff','1998-05-01','f','faltusovaz@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault','f','Boulvard','1',NULL,'2020-12-28 13:50:18',NULL,NULL,NULL,NULL,NULL,NULL),(2,1,'0','benomar','youssef','1',1,'11000','2018-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault',NULL,NULL,NULL,NULL,'2020-11-05 08:58:00',NULL,NULL,NULL,NULL,NULL,NULL),(3,1,'0','benomar','Omar','1',1,'11000','2018-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault',NULL,NULL,NULL,NULL,'2020-11-05 08:58:27',NULL,NULL,NULL,NULL,NULL,NULL),(4,1,'','benomar','adam',NULL,0,'11000','1988-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault','Ommertr sarrault','Boulvard','Rue',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,'','benomar','abdou',NULL,0,'11000','2018-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,'','benomar','iad',NULL,0,'11000','2018-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,1,'','benomar','Mohammed',NULL,0,'11000','2018-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,1,'','benomar','youssef',NULL,0,'11000','2018-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,'','benomar','Omar',NULL,0,'11000','2018-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,1,'1','BENOMAR','adam','2',3,'11000','1988-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault','Nom voie','Boulvard','Rue',NULL,'2020-11-03 12:01:17',NULL,NULL,NULL,NULL,NULL,NULL),(11,1,'','benomar','abdou',NULL,0,'11000','2018-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,1,'','benomar','iad',NULL,0,'11000','2018-10-21','CARCASSONNE','keyprogs@gmail.com','0749593779','0535605825','+33','25 B Omert Sarrault',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:24:53','2020-11-03 12:24:53',NULL,NULL,NULL,NULL,NULL,NULL),(14,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:25:01','2020-11-03 12:25:01',NULL,NULL,NULL,NULL,NULL,NULL),(15,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:25:15','2020-11-03 12:25:15',NULL,NULL,NULL,NULL,NULL,NULL),(16,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:26:00','2020-11-03 12:26:00',NULL,NULL,NULL,NULL,NULL,NULL),(17,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:26:38','2020-11-03 12:26:38',NULL,NULL,NULL,NULL,NULL,NULL),(18,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:26:57','2020-11-03 12:26:57',NULL,NULL,NULL,NULL,NULL,NULL),(19,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:27:16','2020-11-03 12:27:16',NULL,NULL,NULL,NULL,NULL,NULL),(20,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:28:43','2020-11-03 12:28:43',NULL,NULL,NULL,NULL,NULL,NULL),(21,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:30:24','2020-11-03 12:30:24',NULL,NULL,NULL,NULL,NULL,NULL),(22,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:30:31','2020-11-03 12:30:31',NULL,NULL,NULL,NULL,NULL,NULL),(23,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:30:39','2020-11-03 12:30:39',NULL,NULL,NULL,NULL,NULL,NULL),(24,1,'2','BENOMAR','Leila','2',1,'30000','2019-04-06','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z','Zouu','2020-11-03 12:30:43','2020-11-03 12:30:43',NULL,NULL,NULL,NULL,NULL,NULL),(25,1,'2','BENOMAR','Leilaa3333','2',5,'11000','1988-10-21','CARCASSONNE','benomarml@keyprogs.com','0608103200','0535605825','+33','25Omert sarault','Ommert sarault','Boulvard','1','2020-11-03 12:31:08','2021-02-02 13:36:13','2021-03-01','1881070151111','34',1,3,1),(26,1,'0','BENOMAR','Zou','1',1,'30000','2010-10-21','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou',NULL,NULL,'2020-11-03 14:08:56','2020-11-03 14:08:56',NULL,NULL,NULL,NULL,NULL,NULL),(27,1,'0','BENOMAR','Zou','1',1,'30000','2010-10-21','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou',NULL,NULL,'2020-11-03 14:09:03','2020-11-03 14:09:03',NULL,NULL,NULL,NULL,NULL,NULL),(28,1,'0','BENOMAR','Zou','1',1,'30000','2010-10-21','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou',NULL,NULL,'2020-11-03 14:12:32','2020-11-03 14:12:32',NULL,NULL,NULL,NULL,NULL,NULL),(29,1,'0','BENOMAR','Zoueee','1',1,'30000','2010-10-21','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou',NULL,NULL,'2020-11-03 14:14:45','2020-11-03 14:15:11',NULL,NULL,NULL,NULL,NULL,NULL),(30,1,'0','BENOMAR','ADAMI','1',1,'30000','2022-10-21','Fes','benomarml@keyprogs.com','0608103200','0535605825','+33','zzz','Zou','Z',NULL,'2020-11-03 14:19:06','2020-11-03 14:19:22',NULL,NULL,NULL,NULL,NULL,NULL),(31,1,'0','TEST','TEST','1',1,'30000','1995-10-21','Fes','benomarml@keyprogs.com','0749493779','0535605825','+33','TEST','Zou',NULL,'25','2020-11-03 14:34:14','2020-11-03 14:34:27',NULL,NULL,NULL,NULL,NULL,NULL),(32,1,'0','f','f','1',1,'ff','2020-11-05','f','faltusovaz@gmail.com','f',NULL,'f','f','f','ff','f','2020-11-05 09:09:17','2020-11-05 09:09:17',NULL,NULL,NULL,NULL,NULL,NULL),(33,1,'0','f','f','1',1,'ff','2020-11-05','f','faltusovaz@gmail.com','f',NULL,'f','f','f','ff','f','2020-11-05 09:09:46','2020-11-05 09:09:46',NULL,NULL,NULL,NULL,NULL,NULL),(34,1,'0','SH','ss','1',1,'s','2020-11-05','s','simojoker1@gmail.com','s',NULL,'s','s','s','s','s','2020-11-05 09:10:42','2020-11-05 09:10:42',NULL,NULL,NULL,NULL,NULL,NULL),(35,1,'0','z','z','1',1,'z','2000-11-07','z','simojoker1@gmail.com','0633012085','0608103200','+33','z','z','z','z','2020-11-05 09:13:20','2020-11-05 10:08:41',NULL,NULL,NULL,NULL,NULL,NULL),(36,1,'0','DRISSIKA','Youssef','1',1,'11000','1980-07-15','CARCASSONE','D.youssef@acsgroupe.com','0608103200','0535605825','+33','25 Ommert sarault','Ommert','Boulvard','25','2020-11-05 13:01:49','2020-11-05 13:44:08',NULL,NULL,NULL,NULL,NULL,NULL),(37,1,'0','ssss','ssss','1',1,'s','1988-10-21','s','simojoker1@gmail.com','0608103200','0535605825','+33','s','s','Boulvard','25','2020-11-05 15:51:20','2020-11-05 15:51:20',NULL,NULL,NULL,NULL,NULL,NULL),(38,2,'2','drissika.','yousef','1',3,'11000','1984-07-15','carcassonne','acs.carca@gmail.com','777842191','0404040404','0033','12','omer sarraut','boulevard','25','2020-11-05 16:16:58','2020-11-21 13:09:59',NULL,NULL,NULL,NULL,NULL,NULL),(39,3,'1','Sire','Michel','6',1,'11000','1959-10-05','carcassonne','NONMAIL@GMAIL.COM','0686314209',NULL,'33','37 RUE DES RAMES 2EME ETAGE','des rames','rue','37','2020-11-26 09:29:06','2020-11-26 09:29:06',NULL,NULL,NULL,NULL,NULL,NULL),(40,2,'0','andy','beas','1',1,'11100','1990-07-17','narbonne','nomail@gmail.com','777842191',NULL,'0033','route de lune','lune','rue','14','2020-12-16 09:16:29','2020-12-16 09:16:29',NULL,NULL,NULL,NULL,NULL,NULL),(41,2,'0','achali','bouthayna','1',1,'84000','1994-05-18','avignon','nomail@gmail.com','666666666',NULL,'0033','171 rue corelli','correli','rue','171','2020-12-18 15:45:38','2020-12-18 15:45:38',NULL,NULL,NULL,NULL,NULL,NULL),(42,1,'0','sarault','Ommert','1',1,'11000','1988-10-21','CARCASSONNE','benomar.mohammed@yahoo.fr','0608103200','0535605825','+33',NULL,'Ommert sarault','Boulvard','25','2020-12-28 13:03:49','2020-12-28 13:03:49',NULL,NULL,NULL,NULL,NULL,NULL),(43,1,'0','sarault','Ommert','1',1,'11000','1988-10-21','CARCASSONNE','benomar.mohammed@yahoo.fr','0608103200','0535605825','+33',NULL,'Ommert sarault','Boulvard','25','2020-12-28 13:05:54','2020-12-28 13:05:54',NULL,NULL,NULL,NULL,NULL,NULL),(44,2,'0','faksi','ayoub','1',1,'11000','1994-07-04','carcassonne','acs.carca@gmail.com','0635967297','0404040404','0033',NULL,'niccolo pâganini','rue','11','2020-12-28 13:13:47','2020-12-28 13:13:47',NULL,NULL,NULL,NULL,NULL,NULL),(45,1,'0','sarault','Ommert','1',1,'11000','1998-01-05','CARCASSONNE','benomar.mohammed@yahoo.fr','0608103200','0535605825','+33',NULL,'Ommert sarault','Boulvard','25','2020-12-28 14:10:17','2020-12-28 14:10:17',NULL,NULL,NULL,NULL,NULL,NULL),(46,1,'0','2021-04-04','dddddddddddddddddddddddddd','2',3,'11000','2021-04-30','douai','douai.assurance@gmail.com','0608103200','0535605825','+33',NULL,'bounouar fettah','ff',NULL,'2021-04-30 14:40:28','2021-04-30 14:40:28',NULL,NULL,NULL,NULL,NULL,NULL),(47,1,'0','2021-04-04','dddddddddddddddddddddddddd','2',3,'11000','2021-04-30','douai','douai.assurance@gmail.com','0608103200','0535605825','+33',NULL,'bounouar fettah','ff',NULL,'2021-04-30 14:40:53','2021-04-30 14:40:53',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infractions`
--

DROP TABLE IF EXISTS `infractions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infractions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `infraction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infractions`
--

LOCK TABLES `infractions` WRITE;
/*!40000 ALTER TABLE `infractions` DISABLE KEYS */;
INSERT INTO `infractions` VALUES (1,'Autre',NULL,'2021-01-21 16:49:41',NULL),(2,'Usage destupéfiant',NULL,'2021-01-21 16:49:41',NULL),(3,'Infraction alcoolémie',NULL,'2021-01-21 16:49:41',NULL),(4,'Refus d’obtempérer',NULL,'2021-01-21 16:49:41',NULL),(5,'Défaut d’assurance',NULL,'2021-01-21 16:49:41',NULL),(6,'Délit de fuite',NULL,'2021-01-21 16:49:41',NULL),(7,'Conduite sans permis',NULL,'2021-01-21 16:49:41',NULL),(8,'Perte de points',NULL,'2021-01-21 16:49:41',NULL);
/*!40000 ALTER TABLE `infractions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (28,'2014_10_12_000000_create_users_table',1),(29,'2014_10_12_100000_create_password_resets_table',1),(30,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(31,'2019_08_19_000000_create_failed_jobs_table',1),(32,'2019_12_14_000001_create_personal_access_tokens_table',1),(33,'2020_05_21_100000_create_teams_table',1),(34,'2020_05_21_200000_create_team_user_table',1),(35,'2020_10_31_151143_create_sessions_table',1),(36,'2020_10_31_152335_create_assurances_table',1),(37,'2020_10_31_172227_create_clients_table',1),(38,'2020_11_01_133821_add_cols_client_table',2),(43,'2020_11_01_202525_add_civilite__client_table',4),(44,'2020_11_01_203045_add__usage_c_l_n__clients_table',5),(45,'2020_11_01_224527_add_etat_assurance_voiture_table',6),(53,'2020_11_01_181737_create_voitures_table',7),(54,'2020_11_02_113100_add__cols__voitures',7),(55,'2020_11_03_102041_create_sinistres_table',7),(56,'2020_11_05_145059_add__coll__user_id__client__table',8),(58,'2020_11_05_152849_add_bonus_malus__voitures',9),(59,'2020_11_18_140920_add__col_usage_id',10),(60,'2020_11_23_171222_add_cl_responsable',11),(62,'2020_11_25_133044_add_cl__resiliation_date',12),(63,'2021_01_19_164524_sanction__table_create*canceled',13),(64,'2021_01_21_144554_infractions_create*canceled',13),(65,'2021_01_21_144655_sanction_infractions_create*canceled',14),(66,'2021_01_19_164524_sanction__table_create',15),(67,'2021_01_21_144554_infractions_create',15),(68,'2021_01_21_144655_sanction_infractions_create',15),(69,'*2021_01_27_162543_add_sant_coln',16),(70,'2021_01_27_162543_add_sant_coln',17),(71,'*2021_01_29_162326_add_sante_cols_client_table',18),(72,'*2021_01_29_162326_add_sante_cols_client_table',19),(76,'2021_01_29_162326_add_sante_cols_client_table',20),(77,'2021_02_02_110157_voiture_add_cols_assureur',21),(78,'2021_02_03_085819_sanctions-add__soft_delete',22),(79,'2021_02_10_105233_create__taches_tables',23),(82,'2021_02_10_110113_create__action_types_tables',24),(83,'2021_02_10_110114_create__actions_tables',25),(84,'2021_02_10_111138_create_action_actions',26),(85,'2021_02_10_125903_create_action_status_table',27),(87,'2021_02_10_130050_create_action_etats_table',28),(91,'2021_02_10_130331_action_etat_add_cols',29),(92,'2021_02_12_091341_actions__add_coll__desc',30),(93,'2021_02_13_100203_action_etats__add__color',31);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanction_infractions`
--

DROP TABLE IF EXISTS `sanction_infractions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sanction_infractions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `infraction_id` bigint(20) unsigned NOT NULL,
  `sanction_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sanction_infractions_infraction_id_foreign` (`infraction_id`),
  KEY `sanction_infractions_sanction_id_foreign` (`sanction_id`),
  CONSTRAINT `sanction_infractions_infraction_id_foreign` FOREIGN KEY (`infraction_id`) REFERENCES `infractions` (`id`),
  CONSTRAINT `sanction_infractions_sanction_id_foreign` FOREIGN KEY (`sanction_id`) REFERENCES `sanctions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanction_infractions`
--

LOCK TABLES `sanction_infractions` WRITE;
/*!40000 ALTER TABLE `sanction_infractions` DISABLE KEYS */;
INSERT INTO `sanction_infractions` VALUES (1,1,1,'2021-01-21 16:49:41',NULL),(2,2,1,'2021-01-21 16:49:41',NULL),(3,3,1,'2021-01-21 16:49:41',NULL),(4,2,2,'2021-01-21 16:49:41',NULL),(5,3,2,'2021-01-21 16:49:41',NULL),(6,3,3,'2021-01-21 16:49:41',NULL);
/*!40000 ALTER TABLE `sanction_infractions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanctions`
--

DROP TABLE IF EXISTS `sanctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sanctions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sinistre_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `date` date DEFAULT NULL,
  `sanction_date_d` date DEFAULT NULL,
  `sanction_date_f` date DEFAULT NULL,
  `circonstance_pro` tinyint(1) DEFAULT NULL,
  `ethylotest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sangtest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sanctions_sinistre_id_foreign` (`sinistre_id`),
  KEY `sanctions_client_id_foreign` (`client_id`),
  CONSTRAINT `sanctions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `sanctions_sinistre_id_foreign` FOREIGN KEY (`sinistre_id`) REFERENCES `sinistres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanctions`
--

LOCK TABLES `sanctions` WRITE;
/*!40000 ALTER TABLE `sanctions` DISABLE KEYS */;
INSERT INTO `sanctions` VALUES (1,NULL,25,'2021-01-21','2021-01-21','2021-01-31',1,'1.5','0','2021-01-21 16:49:41',NULL,NULL),(2,NULL,25,'2021-01-22','2020-01-04','2021-03-06',1,'2.5','2.5','2021-01-21 16:49:41',NULL,NULL),(3,NULL,25,'2021-01-23','2021-01-10','2021-02-27',1,'3.5','3.5','2021-01-21 16:49:41','2021-02-03 07:59:36','2021-02-03 07:59:36');
/*!40000 ALTER TABLE `sanctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('5MENpMLkYvEH23iBonfvg8QHEIGfJl7GR2dhPHyb',NULL,'162.142.125.37','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3pzc2J0RVA5OHNyTHVLOG1QWEwxdmhxcGxMSHdPSTY4STR0dTFqbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly85MS4xNzEuNzMuMTgxOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1619900223),('aN01ZNHvOKXsAzVxryxnA2EMTmXja6d9oMPdbltg',1,'192.168.1.92','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiY1ByTzBaT0pWaFVwRmwxRE9wdUZENURyNjRCdnFBQURnczNUSlRsMiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGV1TFJUMXVxVEJSbDNxSHAyei83US43bzVtbXoyTUlJNkQvZThKOTNVV2IuT1l5MlZpYUhxIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovLzE5Mi4xNjguMS45Mjo4MDAwL2NsaWVudC9hZGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YToxOntpOjA7czo3OiJzdWNjZXNzIjt9czozOiJuZXciO2E6MDp7fX1zOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRldUxSVDF1cVRCUmwzcUhwMnovN1EuN281bW16Mk1JSTZEL2U4SjkzVVdiLk9ZeTJWaWFIcSI7czo3OiJzdWNjZXNzIjtzOjMzOiJDbGllbnQgbWlzZSDDoCBqb3VyIGF2ZWMgc3VjY2Vzcy4iO30=',1619800853),('dACquBBdzvhtqb0zfI5GYctFj3jm2CGUsXp8tY1V',NULL,'2.224.166.199','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGxrU01ndEh3UTdFYVlQUzlSa3dLMnphTFNnMHpxRXI1UFZLOXl1aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly85MS4xNzEuNzMuMTgxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1620026569),('Fuolj6H0AsTubOyuqahFLyvo6C0AGB7kNhs7HCLy',NULL,'78.188.113.171','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFhxRDl4VW1pQXBVUWVrcWczZ0s4QXBkTENEMkpEU2ZraEpDNHY4NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly85MS4xNzEuNzMuMTgxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1619848883),('g3iRKZCrkRFr0cKYPVicZQuuFzl5PTkOUanzoD3u',1,'127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTmYxS3JwUTFod3dzTXI3bXhDQWhHQlBXeEtIdlFzN05qR01kOXZLQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbGllbnRzbGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRldUxSVDF1cVRCUmwzcUhwMnovN1EuN281bW16Mk1JSTZEL2U4SjkzVVdiLk9ZeTJWaWFIcSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkZXVMUlQxdXFUQlJsM3FIcDJ6LzdRLjdvNW1tejJNSUk2RC9lOEo5M1VXYi5PWXkyVmlhSHEiO30=',1620222241),('kOWX8lgk5YNdDWAU1VpzacwKxrECBBydvrTTnEEV',NULL,'192.168.1.92','AVG Antivirus','YTozOntzOjY6Il90b2tlbiI7czo0MDoibjFwbGhNTGdEUm92b2szYlJ1Z1phejdQN0pkWW82bDNOTUt0RXkxdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xOTIuMTY4LjEuOTI6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1619809120),('kzQBZ1UD7LxFooJxwx8hk1uuz3oG2jHk13UNOzXT',NULL,'184.152.58.70','Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)','YTozOntzOjY6Il90b2tlbiI7czo0MDoic29aWjN1cERJb1REUzJtcnZpNzZsaktPTllFSHF4b1ZuYWpoT0hQUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly85MS4xNzEuNzMuMTgxOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1620207205),('rpCXbL22sDzh367y50AcHRBsWLiarRWxbl2H3TNK',NULL,'192.168.1.92','AVG Antivirus','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTRrV2FybjFxWGg2cFJLVVhzeHdCRXAzWmVyMWV5Y2tsYW13eG1veiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xOTIuMTY4LjEuOTI6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1619998710),('SOtFlHGQCuEYlbDwsn0S8fvgakp3yrAzDKLZq5oZ',NULL,'167.248.133.37','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGhrbTRuZllYQVN5VjVwVU5lazJ3TTBqZmlvTVNDUGdpZGFycUNPUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly85MS4xNzEuNzMuMTgxOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1620019557),('Xp7Da1g10Qycve0ZRXOvw0g87TA956ZTcPVDyOcU',NULL,'162.142.125.37','Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjZIMjNERGw2Zjl2R1J0dExnbEVncDRLeDZRTFNZeDdkQkhDRVRMbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly85MS4xNzEuNzMuMTgxOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1619900224),('zwLVc8pBfteNeHhFY9pziZ8oKvtnxgfLUJzkzVrY',NULL,'192.168.1.92','AVG Antivirus','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFBxanRHWndDdXpLekpmTVpZWnJGb0RRaHhhcENGMTVyWExKdXROMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xOTIuMTY4LjEuOTI6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1619900219);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sinistres`
--

DROP TABLE IF EXISTS `sinistres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sinistres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `voiture_id` bigint(20) unsigned NOT NULL,
  `sinistre_id` int(11) DEFAULT NULL,
  `responsable` int(11) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `sinistre_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sinistres_voiture_id_foreign` (`voiture_id`),
  CONSTRAINT `sinistres_voiture_id_foreign` FOREIGN KEY (`voiture_id`) REFERENCES `voitures` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sinistres`
--

LOCK TABLES `sinistres` WRITE;
/*!40000 ALTER TABLE `sinistres` DISABLE KEYS */;
INSERT INTO `sinistres` VALUES (6,2,6,NULL,NULL,'2020-11-04','2020-11-04 10:17:04','2020-11-04 10:17:04'),(7,2,7,NULL,NULL,'2020-11-04','2020-11-04 14:26:52','2020-11-04 14:26:52'),(8,2,7,NULL,NULL,'2020-11-05','2020-11-05 08:05:18','2020-11-05 08:05:18'),(10,2,7,NULL,NULL,'2020-11-05','2020-11-05 08:05:59','2020-11-05 08:05:59'),(12,27,7,NULL,NULL,'2020-11-05','2020-11-05 08:17:13','2020-11-05 08:17:13'),(13,27,1,NULL,NULL,'2020-11-05','2020-11-05 08:22:00','2020-11-05 08:22:00'),(16,33,7,NULL,NULL,'2020-11-05','2020-11-05 09:13:31','2020-11-05 09:13:31'),(17,33,5,NULL,NULL,'2020-11-05','2020-11-05 09:13:43','2020-11-05 09:13:43'),(18,33,1,NULL,NULL,'2020-11-05','2020-11-05 09:19:10','2020-11-05 09:19:10'),(19,33,1,NULL,NULL,'2020-11-05','2020-11-05 09:25:27','2020-11-05 09:25:27'),(21,36,1,NULL,NULL,'2018-10-10','2020-11-05 16:17:21','2020-11-05 16:17:21'),(23,13,3,0,NULL,'2018-09-23','2020-11-23 17:20:52','2020-11-23 17:20:52'),(26,13,1,100,NULL,'2018-01-24','2020-11-24 16:06:25','2020-11-24 16:06:25'),(28,37,1,100,NULL,'2020-10-03','2020-11-26 14:34:06','2020-11-26 14:34:06'),(30,34,3,0,NULL,'2020-12-08','2020-12-08 12:39:45','2020-12-08 12:39:45'),(33,38,1,100,NULL,'2020-01-16','2020-12-16 09:24:20','2020-12-16 09:24:20'),(34,38,1,100,NULL,'2020-02-16','2020-12-16 09:36:33','2020-12-16 09:36:33'),(35,38,3,0,NULL,'2020-12-16','2020-12-16 09:37:22','2020-12-16 09:37:22'),(36,34,4,50,NULL,'2020-12-18','2020-12-18 14:22:50','2020-12-18 14:22:50'),(37,34,9,0,NULL,'2020-12-18','2020-12-18 14:24:07','2020-12-18 14:24:07'),(38,39,1,100,NULL,'2020-12-18','2020-12-18 15:46:08','2020-12-18 15:46:08'),(39,39,1,100,NULL,'2019-11-25','2020-12-18 15:46:56','2020-12-18 15:46:56'),(40,34,8,50,NULL,'2020-12-18','2020-12-18 15:53:00','2020-12-18 15:53:00'),(42,36,1,100,NULL,'2019-12-29','2020-12-29 08:06:01','2020-12-29 08:06:01'),(43,36,2,0,NULL,'2020-02-29','2020-12-29 08:48:59','2020-12-29 08:48:59'),(44,41,2,0,NULL,'2020-12-29','2020-12-29 13:30:47','2020-12-29 13:30:47');
/*!40000 ALTER TABLE `sinistres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taches`
--

DROP TABLE IF EXISTS `taches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taches` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taches`
--

LOCK TABLES `taches` WRITE;
/*!40000 ALTER TABLE `taches` DISABLE KEYS */;
/*!40000 ALTER TABLE `taches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_user`
--

LOCK TABLES `team_user` WRITE;
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,1,'Benomar\'s Team',1,'2020-11-05 13:54:59','2020-11-05 13:54:59'),(2,2,'youssef\'s Team',1,'2020-11-05 16:04:20','2020-11-05 16:04:20'),(3,3,'Friyed\'s Team',1,'2020-11-25 15:09:41','2020-11-25 15:09:41'),(4,4,'EL\'s Team',1,'2020-12-28 13:17:13','2020-12-28 13:17:13'),(5,6,'acs\'s Team',1,'2021-02-10 13:03:05','2021-02-10 13:03:05');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Benomar Mohammed','keyprogs@gmail.com',NULL,'$2y$10$euLRT1uqTBRl3qHp2z/7Q.7o5mmz2MII6D/e8J93UWb.OYy2ViaHq','eyJpdiI6IlFRN01NN0k4NHRtaEJVM2NQMFNFVVE9PSIsInZhbHVlIjoiMGU5UW1PS0hFQmpPZlFQOGJxUE5KOWlSWDI1SFZ2R2dYN01EWVpqQ0hpUT0iLCJtYWMiOiIxYWFkY2ViMDYzMmMwNmFmOGU2Mjk5MTAyYjIxYTkwY2YwYmRhYTVlYmU0MmVmNThiNjg4MTIyOTBhMzZhYTU0In0=','eyJpdiI6IkdIV3F6QlVxaWVOc2FLOVdMMUYyZ3c9PSIsInZhbHVlIjoidTBjZlpvQk5mSUl5M3hhYUVZNGM0YmtWYXB3V2xvb0oyK2cyc2EvcDJUUjMyVEpMamlURWRZcXBkdCtMcVBOKzd2TkRLVW03V2VWbGIvSlp0M01lSWNJdTN0dVNQSTRnaXBUZVE1K0t5UW85UUp2SUlxUmpmekNvY2tRZ1Npb2tva0JzMDJjdldkdVRsaEpZMDRJeW96UGV3amZrQ05qcGpWM05XbTVjd3ZJWDY5Q2RpSC9lR254d0FGZnB2VUNIaWdxcmNSZVdIVG8xNGxHb2djbUhIbmlGcDAzWTUrTmRZZTlqNWdRVzBIaDVsR2F5dnBLMnJLekVpQWJkKzZKRm9Ma1RVQVRydTQzRER4MDhMby84Q2c9PSIsIm1hYyI6ImYwYjMwMjNmNjI1MWM2OTUxNWRlOGZlOTM3YTk2MTFjMmFjN2ZmZmYxMjViMDU2M2VjNzk1MzdjNzliYTgxNzMifQ==','LkoroDarpou8SmJE1hPtE4oJk2XcrTf4tj3pGVgcZV6BG9ZGjhnZI7an6X3J',1,NULL,'2020-11-05 13:54:59','2020-12-07 15:45:00'),(2,'youssef Drissika','directeur.acs@gmail.com',NULL,'$2y$10$fVncqOpEZIBQ6dcn.656OOvi2hUNFSdymbKRWmRo9K5GIqrWTv3DS',NULL,NULL,NULL,NULL,NULL,'2020-11-05 16:04:20','2020-11-05 16:04:20'),(3,'Friyed Youssra','acsassur.gestion@gmail.com',NULL,'$2y$10$DobMxpwDKxIJEQtE7TV2ue2HvUxtFv3Vf09aD0Ep9sqovMZAReK1K',NULL,NULL,NULL,NULL,NULL,'2020-11-25 15:09:41','2020-11-25 15:09:41'),(4,'EL YAAGOUBI Nora','acsmuret.gestion@gmail.com',NULL,'$2y$10$ATSQCleHPTEgZnG0lX2ygOmUhg4EnO9amcuAwjtECeYZ0mRVhCj0e',NULL,NULL,NULL,NULL,NULL,'2020-12-28 13:17:13','2020-12-28 13:17:13'),(5,'test','test@gmail.com',NULL,'$2y$10$ATSQCleHPTEgZnG0lX2ygOmUhg4EnO9amcuAwjtECeYZ0mRVhCj0e',NULL,NULL,NULL,NULL,NULL,'2020-12-28 13:17:13','2020-12-28 13:17:13'),(6,'acs carca','acs.carca@gmail.com',NULL,'$2y$10$C..qLo7EJLsyt8hRllUMWunpLmcK5UnjSh5I1gGlqZKwvOyGUsDf.',NULL,NULL,NULL,NULL,NULL,'2021-02-10 13:03:05','2021-02-10 13:03:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voitures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulairecartegrise` smallint(6) DEFAULT NULL,
  `client_id` smallint(6) DEFAULT NULL,
  `typepermis` smallint(6) DEFAULT NULL,
  `sitfam_id` smallint(6) DEFAULT NULL,
  `financement_id` smallint(6) DEFAULT NULL,
  `km_range` int(11) DEFAULT NULL,
  `dop` date DEFAULT NULL,
  `matricule` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage_id` int(11) DEFAULT NULL,
  `bonus_malus` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_contrat` date DEFAULT NULL,
  `date_acqui` date DEFAULT NULL,
  `etat_assurance` int(11) DEFAULT NULL,
  `resiliation_date` date DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL,
  `last3y_assure` smallint(6) DEFAULT NULL,
  `last3y_interruption` smallint(6) DEFAULT NULL,
  `assureur_resiliation` int(11) DEFAULT NULL,
  `station_cp_n` char(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_ville_n` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_cp_j` char(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_ville_j` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `assureur` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voitures`
--

LOCK TABLES `voitures` WRITE;
/*!40000 ALTER TABLE `voitures` DISABLE KEYS */;
INSERT INTO `voitures` VALUES (1,3,9,3,3,3,50000,'2008-11-08','AB-274-AC',NULL,NULL,'2021-01-01','2020-10-21',-1,NULL,3,12,NULL,3,'11000','CARCASSONNE','11000','CARCASSONNE',NULL,'2020-11-04 09:39:45',NULL),(2,3,10,3,3,3,50000,'2008-10-08','AB-274-MQ',NULL,NULL,'2021-01-01','2020-10-21',-1,NULL,3,NULL,3,3,'11000','CARCASSONNE','11000','CARCASSONNE',NULL,NULL,NULL),(3,3,10,3,3,3,50000,'2008-10-08','AB-274-MQ',NULL,NULL,'2021-01-01','2020-10-21',-1,NULL,3,NULL,3,3,'11000','CARCASSONNE','11000','CARCASSONNE',NULL,NULL,NULL),(4,3,10,3,3,3,50000,'2008-10-08','AB-274-MQ',NULL,NULL,'2021-01-01','2020-10-21',-1,NULL,3,NULL,3,3,'11000','CARCASSONNE','11000','CARCASSONNE',NULL,NULL,NULL),(5,1,NULL,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-03 12:26:38','2020-11-03 12:26:38',NULL),(6,1,NULL,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-03 12:26:57','2020-11-03 12:26:57',NULL),(7,1,NULL,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-03 12:27:16','2020-11-03 12:27:16',NULL),(8,1,20,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-03 12:28:43','2020-11-03 12:28:43',NULL),(9,1,21,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-03 12:30:24','2020-11-03 12:30:24',NULL),(10,1,22,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-03 12:30:31','2020-11-03 12:30:31',NULL),(11,1,23,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-03 12:30:39','2020-11-03 12:30:39',NULL),(12,1,24,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-03 12:30:43','2020-11-03 12:30:43',NULL),(13,1,25,1,5,1,50000,'2008-10-08','AB-274-MQ',1,'1.06','2021-03-12','2020-11-01',-1,'2020-11-25',1,24,-13,2,'11000','CARCASSONNE','11000','CARCASSONNE','2020-11-03 12:31:09','2021-02-02 13:52:41','ALLIANZ'),(14,1,27,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:09:03','2020-11-03 14:09:03',NULL),(15,1,28,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:12:32','2020-11-03 14:12:32',NULL),(16,1,29,1,1,1,NULL,NULL,'AB-274-MQ',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:14:45','2020-11-03 14:14:45',NULL),(17,1,30,1,1,1,NULL,NULL,'ADAM CARS',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:19:06','2020-11-03 14:19:43',NULL),(18,1,NULL,1,1,1,NULL,NULL,'AB',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:27:26','2020-11-03 14:27:26',NULL),(19,1,NULL,1,1,1,NULL,NULL,'AB',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:28:03','2020-11-03 14:28:03',NULL),(20,1,NULL,1,1,1,NULL,NULL,'AB',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:28:25','2020-11-03 14:28:25',NULL),(21,1,NULL,1,1,1,NULL,NULL,'ABB',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:28:39','2020-11-03 14:28:39',NULL),(22,1,13,1,1,1,NULL,NULL,'ABCDEF.',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:29:21','2020-11-03 14:32:15',NULL),(26,1,31,1,1,1,NULL,NULL,'TEST',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-03 14:34:14','2020-11-03 14:34:14',NULL),(27,1,1,1,1,1,NULL,'2018-01-01','ab',1,'0.5+2','2020-12-29','2018-01-01',-1,NULL,2,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-05 08:13:49','2020-12-28 13:50:18',NULL),(28,1,2,3,1,1,NULL,NULL,'aa',1,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-05 08:58:00','2020-12-29 15:26:42',NULL),(29,1,3,1,1,1,NULL,NULL,'AB-274-AC',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-05 08:58:27','2020-11-05 08:58:27',NULL),(30,1,32,1,1,1,NULL,NULL,'f',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-05 09:09:17','2020-11-05 09:09:17',NULL),(31,1,33,1,1,1,NULL,NULL,'f',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-05 09:09:46','2020-11-05 09:09:46',NULL),(32,1,34,1,1,1,NULL,NULL,'s',NULL,NULL,NULL,NULL,-1,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2020-11-05 09:10:42','2020-11-05 09:10:42',NULL),(33,1,35,1,1,1,NULL,NULL,'z',NULL,NULL,'2020-11-05','2020-11-04',-1,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-05 09:13:20','2020-11-05 10:06:59',NULL),(34,1,36,1,1,1,50000,'2000-01-01','AB-274-AC',1,'1.01','2020-11-05','2018-01-01',0,NULL,1,30,-1,1,'11000','CARCASSONNE','11000','CARCASSONNE','2020-11-05 13:01:49','2020-12-16 10:00:48',NULL),(35,1,37,1,1,1,NULL,'2010-11-05','f',NULL,'0.64','2020-11-05','2020-11-01',0,NULL,1,0,-1,1,NULL,NULL,NULL,NULL,'2020-11-05 15:51:20','2020-11-05 15:51:20',NULL),(36,1,38,1,3,1,NULL,'2004-02-02','aa123hj',1,'0.67','2020-11-19','2020-11-05',1,NULL,1,12,-13,1,'11000','carcassonne','11000','carcassonne','2020-11-05 16:16:58','2020-12-29 08:21:27',NULL),(37,1,39,1,1,1,16000,'1981-10-19','939APN31',1,'0.95','2021-01-01','2020-02-11',-1,NULL,3,36,-1,1,'11000','carcassonne','11000','carcassonne','2020-11-26 09:29:06','2020-11-26 14:36:11',NULL),(38,1,40,1,1,1,20000,'2008-10-25','bv625ts',1,'0.61','2020-12-16','2020-12-16',0,'2020-12-15',3,36,-1,1,'11000','carcassonne','11000','carcassonne','2020-12-16 09:16:29','2020-12-16 09:24:01',NULL),(39,1,41,1,1,1,NULL,'2016-12-15','EG705qk',1,'1.56','2019-12-18','2020-11-29',0,NULL,3,24,-1,1,'84000','avignon','84000','avignon','2020-12-18 15:45:38','2020-12-18 15:45:38',NULL),(40,1,42,1,1,1,1,'2018-10-21','AB-274-AC',1,'1.06','2020-12-29','2020-12-01',0,NULL,1,0,-1,1,'11000','CARCASSONNE','11000','CARCASSONNE','2020-12-28 13:03:49','2020-12-28 13:03:49',NULL),(41,1,43,1,1,1,1,'2018-10-21','AB-274-AC',1,'1.06','2020-12-29','2020-12-01',0,NULL,1,0,-1,1,'11000','CARCASSONNE','11000','CARCASSONNE','2020-12-28 13:05:54','2020-12-28 13:05:54',NULL),(42,1,44,1,1,1,NULL,'2014-01-15','aa753lz',1,'0.9','2020-12-28','2020-12-24',0,'2019-09-26',1,20,-1,1,'11000','carcassonne','11000','carcassonne','2020-12-28 13:13:47','2020-12-28 13:13:47',NULL),(43,1,45,1,1,1,NULL,'2020-12-28','AB-274-MQ',1,'0.5+2','2020-12-28','2020-12-28',0,NULL,1,17,-7,1,'11000','CARCASSONNE','11000','CARCASSONNE','2020-12-28 14:10:17','2020-12-28 14:10:17',NULL),(44,1,47,1,3,1,NULL,NULL,'z',1,NULL,NULL,NULL,0,NULL,1,0,NULL,1,NULL,NULL,NULL,NULL,'2021-04-30 14:40:53','2021-04-30 14:40:53',NULL);
/*!40000 ALTER TABLE `voitures` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-05 17:51:27
