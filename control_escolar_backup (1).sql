-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: control_escolar
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividad` (
  `actividad_id` int NOT NULL AUTO_INCREMENT,
  `nombre_actividad` varchar(100) NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`actividad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `alumno_id` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(50) NOT NULL,
  `Apellido_Paterno` varchar(45) NOT NULL,
  `Apellido_Materno` varchar(45) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Curp` varchar(45) NOT NULL,
  `Foto_alumno` varchar(45) NOT NULL,
  `id_Estatus` int NOT NULL,
  `Fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`alumno_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (2,'Hector','Coyotl','Juarez','Maculino','2012-09-10','FODF910819HMSLZR07','1.png',101,'2022-11-08 02:51:05'),(3,'Galilea','González','Reyes','Femenino','2015-03-06','FABM770222MMSJNR00','4.png',100,'2022-11-08 02:49:57'),(4,'Juan','Cabrera','Garcia','Maculino','2015-01-10','CAGS620415HVZBRT22','8.png',100,'2022-11-08 02:49:57'),(5,'Karen Odette','Domínguez','Velázquez','Femenino','2015-06-05','CATC650228MMCMRR03','7.png',100,'2022-11-08 02:49:57'),(6,'Lizbeth Soledad','Falcón','Duarte','Femenino','2016-05-01','CAVA550828HGRNLG04','6.png',102,'2022-11-08 02:50:18'),(7,'Oscar','Carranco','Mandujado','Maculino','2014-03-06','CAMJ680624MGRRRN00','9.png',101,'2022-11-08 02:49:57'),(8,'111','11','111','Femenino','1111-12-12','11111','para tarea.png',100,'2022-11-08 03:09:13'),(9,'213','213','213','Femenino','2021-01-01','wqewq','HECTOR_COYOTL.gif',101,'2022-11-08 03:07:39'),(10,'2313adsada','213asdsad','213asdsad','Maculino','2021-01-01','213213213','HECTOR_COYOTL.gif',100,'2022-11-08 03:11:05');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aulas` (
  `aula_id` int NOT NULL AUTO_INCREMENT,
  `nombre_aula` varchar(100) NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`aula_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calificaciones` (
  `calificacion_id` int NOT NULL AUTO_INCREMENT,
  `alumno_id` int NOT NULL,
  `materia_id` int NOT NULL,
  `periodo_id` int NOT NULL,
  PRIMARY KEY (`calificacion_id`),
  KEY `alumno_id` (`alumno_id`),
  KEY `materia_id` (`materia_id`),
  KEY `periodo_id` (`periodo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificaciones`
--

LOCK TABLES `calificaciones` WRITE;
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `calificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus`
--

DROP TABLE IF EXISTS `estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estatus` (
  `idEstatus` int NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus`
--

LOCK TABLES `estatus` WRITE;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` VALUES (100,'Activo'),(101,'Baja'),(102,'Baja Temporal');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grados`
--

DROP TABLE IF EXISTS `grados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grados` (
  `grado_id` int NOT NULL AUTO_INCREMENT,
  `nombre_grado` varchar(100) NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`grado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grados`
--

LOCK TABLES `grados` WRITE;
/*!40000 ALTER TABLE `grados` DISABLE KEYS */;
/*!40000 ALTER TABLE `grados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materias` (
  `materia_id` int NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`materia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notas` (
  `nota_id` int NOT NULL AUTO_INCREMENT,
  `materia_id` int NOT NULL,
  `alumno_id` int NOT NULL,
  `actividad_id` int NOT NULL,
  `valor_nota` int NOT NULL,
  `periodo_id` int NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nota_id`),
  KEY `materia_id` (`materia_id`),
  KEY `alumno_id` (`alumno_id`),
  KEY `actividad_id` (`actividad_id`),
  KEY `periodo_id` (`periodo_id`),
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`materia_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notas_ibfk_3` FOREIGN KEY (`actividad_id`) REFERENCES `actividad` (`actividad_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notas_ibfk_4` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`periodo_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos`
--

DROP TABLE IF EXISTS `periodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periodos` (
  `periodo_id` int NOT NULL AUTO_INCREMENT,
  `nombre_periodo` varchar(100) NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`periodo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos`
--

LOCK TABLES `periodos` WRITE;
/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procesoalumno`
--

DROP TABLE IF EXISTS `procesoalumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procesoalumno` (
  `procesoa_id` int NOT NULL AUTO_INCREMENT,
  `alumno_id` int NOT NULL,
  `proceso_id` int NOT NULL,
  `estadop` int NOT NULL,
  PRIMARY KEY (`procesoa_id`),
  KEY `alumno_id` (`alumno_id`),
  KEY `proceso_id` (`proceso_id`),
  CONSTRAINT `procesoalumno_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `procesoalumno_ibfk_2` FOREIGN KEY (`proceso_id`) REFERENCES `procesoprofesor` (`proceso_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procesoalumno`
--

LOCK TABLES `procesoalumno` WRITE;
/*!40000 ALTER TABLE `procesoalumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `procesoalumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procesoprofesor`
--

DROP TABLE IF EXISTS `procesoprofesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procesoprofesor` (
  `proceso_id` int NOT NULL AUTO_INCREMENT,
  `grado_id` int NOT NULL,
  `aula_id` int NOT NULL,
  `profesor_id` int NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`proceso_id`),
  KEY `grado_id` (`grado_id`),
  KEY `aula_id` (`aula_id`),
  KEY `profesor_id` (`profesor_id`),
  CONSTRAINT `procesoprofesor_ibfk_1` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`aula_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `procesoprofesor_ibfk_2` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`grado_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `procesoprofesor_ibfk_3` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`profesor_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procesoprofesor`
--

LOCK TABLES `procesoprofesor` WRITE;
/*!40000 ALTER TABLE `procesoprofesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `procesoprofesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesor` (
  `profesor_id` int NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido_paterno` varchar(45) NOT NULL,
  `Apellido_Materno` varchar(45) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`profesor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
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
  `role` enum('user','admin','profesor') NOT NULL,
  `name` varchar(100) NOT NULL,
  `Fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'hector.coyotl','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','admin','Hector Juarez','2022-10-19 09:19:52'),(2,'laura.romero','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','user','Laura Romero','2022-10-19 09:19:52'),(3,'david.hernandez','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','profesor','David Hernandez','2022-10-19 09:20:45'),(4,'jose.perez','$2y$10$xDcPpocBO.zu58MfNNF.T.IoH0zNO4kU3iuyx.xtbi29ReDrthgIa','admin','Jose Perez Leon','2022-11-08 03:18:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_detalle_alumnos`
--

DROP TABLE IF EXISTS `vw_detalle_alumnos`;
/*!50001 DROP VIEW IF EXISTS `vw_detalle_alumnos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_detalle_alumnos` AS SELECT 
 1 AS `alumno_id`,
 1 AS `Nombre_Completo`,
 1 AS `Nombres`,
 1 AS `Apellido_Paterno`,
 1 AS `Apellido_Materno`,
 1 AS `Sexo`,
 1 AS `Fecha_nacimiento`,
 1 AS `Curp`,
 1 AS `Edad`,
 1 AS `Foto_alumno`,
 1 AS `id_Estatus`,
 1 AS `Estatus_Detalle`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'control_escolar'
--

--
-- Dumping routines for database 'control_escolar'
--

--
-- Final view structure for view `vw_detalle_alumnos`
--

/*!50001 DROP VIEW IF EXISTS `vw_detalle_alumnos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_detalle_alumnos` AS select `a`.`alumno_id` AS `alumno_id`,concat_ws(' ',`a`.`Nombres`,`a`.`Apellido_Paterno`,`a`.`Apellido_Materno`) AS `Nombre_Completo`,`a`.`Nombres` AS `Nombres`,`a`.`Apellido_Paterno` AS `Apellido_Paterno`,`a`.`Apellido_Materno` AS `Apellido_Materno`,`a`.`Sexo` AS `Sexo`,`a`.`Fecha_nacimiento` AS `Fecha_nacimiento`,`a`.`Curp` AS `Curp`,timestampdiff(YEAR,`a`.`Fecha_nacimiento`,curdate()) AS `Edad`,`a`.`Foto_alumno` AS `Foto_alumno`,`a`.`id_Estatus` AS `id_Estatus`,`es`.`Descripcion` AS `Estatus_Detalle` from (`alumnos` `a` join `estatus` `es` on((`a`.`id_Estatus` = `es`.`idEstatus`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-07 21:58:46
