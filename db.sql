-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: attendance
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rollnumber` varchar(50) NOT NULL,
  `attendance_date` date NOT NULL,
  `present` enum('yes','no') NOT NULL,
  `leave_status` varchar(50) NOT NULL DEFAULT 'no',
  `class` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `attendance_chk_1` CHECK ((`leave_status` in (_utf8mb4'yes',_utf8mb4'no',_utf8mb4'pending',_utf8mb4'accepted'))),
  CONSTRAINT `attendance_chk_2` CHECK ((`leave_status` in (_utf8mb4'yes',_utf8mb4'no',_utf8mb4'pending',_utf8mb4'accepted')))
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,'7878','2024-06-23','no','no','14','math'),(2,'7878','2024-06-23','yes','no','14','math'),(3,'99999','2024-06-23','no','pending','10','math'),(4,'99999','2024-06-23','yes','pending','10','math'),(5,'99999','2024-06-23','no','pending','10','math'),(6,'99999','2024-06-23','no','pending','78','math'),(7,'1234','2024-06-24','no','pending','10','math'),(8,'0000','2024-06-26','no','accepted','semester 6','math'),(9,'1010','2024-06-23','yes','accepted','10','YourNewSubject'),(10,'7878','2024-06-30','yes','no',NULL,NULL),(11,'test','2024-06-30','yes','no',NULL,NULL),(12,'test','2024-06-30','yes','no',NULL,NULL),(13,'test','2024-06-30','yes','no',NULL,NULL),(14,'bsf6677','2024-06-30','yes','no',NULL,NULL),(15,'bsf6677','2024-06-30','yes','no',NULL,NULL),(16,'bsf6677','2024-06-30','no','no',NULL,NULL),(17,'bsf6677','2024-06-30','yes','no','10','Chemistry'),(18,'bsf6677','2024-06-30','yes','no','10','History'),(19,'bsf6677','2024-06-30','no','accepted','10','Urdu'),(20,'bsf0000','2024-06-30','yes','no',NULL,NULL),(21,'bsf0000','2024-06-30','yes','no','',''),(22,'7878','2024-06-30','yes','no','',''),(23,'test','2024-06-30','no','no','',''),(24,'bsf0000','2024-06-30','yes','no',NULL,NULL),(25,'bsf0000','2024-06-30','yes','no','9','Physics'),(26,'bsf0000','2024-06-30','yes','no','9','Economics'),(27,'7878','2024-06-30','yes','no','14','Computer Science'),(28,'test','2024-06-30','yes','no','14','Computer Science'),(29,'bsf0000','2024-06-30','yes','no','9','Political Science'),(30,'bsf11900','2024-07-31','yes','no','7','Chemistry'),(31,'bsf11900','2024-07-31','yes','no','7','Geography'),(32,'bsf11900','2024-08-07','no','accepted','semester 9','it');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `rollnumber` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Muhammad NADEEM BAIG','7','bsf11900'),(2,'Muhammad Touseef','14','7878'),(3,'touseef','14','test'),(4,'touseef','14','test'),(5,'touseef','14','test'),(6,'check','10','1900'),(7,'Gohar Ali','10','99999'),(8,'wahab','10','1010'),(9,'saim','10','bsf6677'),(10,'ali','9','bsf0000'),(11,'','88','');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('teacher','student','admin') NOT NULL,
  `class` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'t','t','teacher',NULL,NULL),(2,'admin','$2y$10$Af8VNbo6/kbX347dC0pdEuEDsbe6FHW81J6EovOkzVnqpeWAStSB.','teacher',NULL,NULL),(4,'test','$2y$10$.9W3DxJRmu0wnbLhjdD/i.blXqMIV87PUqe7x5pGO7CWpSHiCcRYK','teacher',NULL,NULL),(5,'testadmin','$2y$10$/eREWeQE1o7msIP3vE1oNO3CZjuED9OJ9DNNxt0YCXIKH8G4ugRFq','admin',NULL,NULL),(8,'adminn','$2y$10$wG11jwytujbHCn/mG2kMXO0.gAC7a6/9WWbpAoQzp023kSsh2FGVm','teacher',NULL,NULL),(9,'admin3','$2y$10$iacuxv.RXY7s3RMZtoMnVOX2Ud0jWHUs.pJdOynlJNYGlKWdqTO/.','teacher',NULL,NULL),(11,'admin123','$2y$10$bjrfYDwJDC496SSt.xRRVuKMnEypmGcdMPX5xMUmcaHmcWRpuLb7W','teacher','7',NULL),(12,'admin44','$2y$10$qPsda08bbGhk2I9dxcgxEuqNpPv4fWRo7.XqayJ9xX/sbxviwpWWu','admin',NULL,NULL),(13,'abc','$2y$10$mm2pOL8VFnfa248W8uac6uVEuwPouMPXmFR.BbiKbMC1lQcuQfFVO','student','10',NULL),(14,'a','$2y$10$uV583XUqEqoxvPGzQokCpe4kaw9q5WyyYJ5dsq4qiSaGTNWFu6PZ.','teacher','1000',NULL),(17,'z','$2y$10$Pnl81JM8.3dotP2Sqt8Fa.d0jdETlVFBHxKaQmo3Q3XKErNZEPZTW','teacher','14','z'),(18,'check','$2y$10$Ym0Hnr7.JrMyOhWq7lJs8Oo5JfB2qRYbsh1pE.SYhn.f/CUZtCAqi','student','10','YourNewSubject'),(23,'touseef','$2y$10$vrJOxy69o05szoqTy1xww.cIpLCAVAcv1/V0Lk68IK7TC3QkWurhu','admin','',''),(24,'saim','$2y$10$2Mx6vc2WahRbkAMCB4Clz.dfpsfHwP1XrASfKizGJnW95QqEoauQi','student','10',''),(25,'ali','$2y$10$Icpd3SvYBztvZBN91pjp3.a3Gkboboaslj/0LGQE26phYX4ekeSbq','student','9','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-07 18:09:21
