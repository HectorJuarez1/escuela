CREATE DATABASE  IF NOT EXISTS `control_escolar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `control_escolar`;
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
  `estatus_actividad_id` int NOT NULL,
  PRIMARY KEY (`actividad_id`),
  KEY `fk_actividad_estatus1_idx` (`estatus_actividad_id`),
  CONSTRAINT `fk_actividad_estatus1` FOREIGN KEY (`estatus_actividad_id`) REFERENCES `estatus` (`idEstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
INSERT INTO `actividad` VALUES (1,'Evaluación 1',100),(2,'Evaluación 2',100),(3,'Evaluación 4',103);
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_profesor`
--

DROP TABLE IF EXISTS `alumno_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno_profesor` (
  `procesoa_id` int NOT NULL AUTO_INCREMENT,
  `alumno_id` int NOT NULL,
  `proceso_id` int NOT NULL,
  `estatus_procesaalumno_id` int NOT NULL,
  PRIMARY KEY (`procesoa_id`),
  KEY `alumno_id` (`alumno_id`),
  KEY `proceso_id` (`proceso_id`),
  KEY `fk_procesoalumno_estatus1_idx` (`estatus_procesaalumno_id`),
  CONSTRAINT `fk_procesoalumno_estatus1` FOREIGN KEY (`estatus_procesaalumno_id`) REFERENCES `estatus` (`idEstatus`),
  CONSTRAINT `procesoalumno_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `procesoalumno_ibfk_2` FOREIGN KEY (`proceso_id`) REFERENCES `profesor_materia` (`proceso_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_profesor`
--

LOCK TABLES `alumno_profesor` WRITE;
/*!40000 ALTER TABLE `alumno_profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno_profesor` ENABLE KEYS */;
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
  `Fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_Estatus` int NOT NULL,
  PRIMARY KEY (`alumno_id`),
  KEY `fk_alumnos_estatus1_idx` (`id_Estatus`),
  CONSTRAINT `fk_alumnos_estatus1` FOREIGN KEY (`id_Estatus`) REFERENCES `estatus` (`idEstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (2,'Hector','Coyotl','Juarez','Maculino','2012-09-10','FODF910819HMSLZR07','1.png','2022-11-03 06:16:26',100),(3,'Galilea','González','Reyes','Femenino','2015-03-06','FABM770222MMSJNR00','4.png','2022-11-03 06:15:55',100),(4,'Juan','Cabrera','Garcia','Maculino','2015-01-10','CAGS620415HVZBRT22','8.png','2022-11-04 09:08:32',102),(5,'Karen Odette','Domínguez','Velázquez','Femenino','2015-06-05','CATC650228MMCMRR03','7.png','2022-11-03 06:16:26',100),(6,'Lizbeth Soledad','Falcón','Duarte','Femenino','2016-05-01','CAVA550828HGRNLG04','6.png','2022-11-03 06:16:26',100),(7,'Oscar','Carranco','Mandujado','Maculino','2014-03-06','CAMJ680624MGRRRN00','9.png','2022-11-03 06:16:26',101);
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
  `estatus_aulas_id` int NOT NULL,
  PRIMARY KEY (`aula_id`),
  KEY `fk_aulas_estatus1_idx` (`estatus_aulas_id`),
  CONSTRAINT `fk_aulas_estatus1` FOREIGN KEY (`estatus_aulas_id`) REFERENCES `estatus` (`idEstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'501',100),(2,'A-2',100),(3,'202',100),(9,'C-1',100);
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
INSERT INTO `estatus` VALUES (100,'Activo'),(101,'Baja'),(102,'Baja Temporal'),(103,'Inactivo');
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
  `estatus_grados_id` int NOT NULL,
  PRIMARY KEY (`grado_id`),
  KEY `fk_grados_estatus1_idx` (`estatus_grados_id`),
  CONSTRAINT `fk_grados_estatus1` FOREIGN KEY (`estatus_grados_id`) REFERENCES `estatus` (`idEstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grados`
--

LOCK TABLES `grados` WRITE;
/*!40000 ALTER TABLE `grados` DISABLE KEYS */;
INSERT INTO `grados` VALUES (7,'Primero',100),(8,'Segundo',100),(9,'Tercero',103),(10,'Cuarto',100),(11,'Quinto',100),(12,'Sexto',100);
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
  `estatus_materias_id` int NOT NULL,
  PRIMARY KEY (`materia_id`),
  KEY `fk_materias_estatus1_idx` (`estatus_materias_id`),
  CONSTRAINT `fk_materias_estatus1` FOREIGN KEY (`estatus_materias_id`) REFERENCES `estatus` (`idEstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES (5,'Matemáticas',100),(6,'Español',100),(7,'Ciencias de la Naturaleza',100),(8,'Segunda lengua extranjera',100),(9,'Educación física',100),(10,'Educación Artística',103),(11,'Geografía',100),(12,'Formación Cívica y Ética',100),(13,'Primera lengua extranjera',100),(14,'Lengua castellana y literatura',100),(15,'Historia',100);
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
  `estatus_periodos_id` int NOT NULL,
  PRIMARY KEY (`periodo_id`),
  KEY `fk_periodos_estatus1_idx` (`estatus_periodos_id`),
  CONSTRAINT `fk_periodos_estatus1` FOREIGN KEY (`estatus_periodos_id`) REFERENCES `estatus` (`idEstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos`
--

LOCK TABLES `periodos` WRITE;
/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
INSERT INTO `periodos` VALUES (1,'Enero-Agosto 2022',100),(2,'Agosto-Diciembre 2021',100);
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;
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
  `estatus_maestro_id` int NOT NULL,
  PRIMARY KEY (`profesor_id`),
  KEY `fk_profesor_estatus1_idx` (`estatus_maestro_id`),
  CONSTRAINT `fk_profesor_estatus1` FOREIGN KEY (`estatus_maestro_id`) REFERENCES `estatus` (`idEstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (4,'213443f3','Juan Carlos','Acosta','Acosta','Calle Azucenas Puebla Puebla','2215628900','Maculino','2000-06-01','2022-11-11 04:23:07',100),(5,'213443f3a','Gustavo','Valdez','Valdez','Calle Venustiano Carranza Puebla .Puebla','2232413215','Maculino','1989-05-01','2022-11-11 04:25:19',100),(6,'D54S2V65','Verónica','Hernández','Gil','Calle 16 De Septiembre Puebla.Pue','2211342354','Femenino','1990-01-09','2022-11-11 04:20:03',100),(7,'776ub543','Adriana','León','León','Calle Coronel Jesús González Arratia Puebla.Pue','2276543211','Femenino','1990-03-01','2022-11-11 04:21:22',100),(8,'bg5423i1a','Rene','Fuentes','Fuentes','Calle Mariano Abasolo Puebla.Pue','2232982364','Maculino','1983-09-17','2022-11-11 04:25:28',101);
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor_materia`
--

DROP TABLE IF EXISTS `profesor_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesor_materia` (
  `proceso_id` int NOT NULL AUTO_INCREMENT,
  `grado_id` int NOT NULL,
  `aula_id` int NOT NULL,
  `profesor_id` int NOT NULL,
  `materias_id` int NOT NULL,
  `periodos_id` int NOT NULL,
  `estatus_procesoprofesor_id` int NOT NULL,
  PRIMARY KEY (`proceso_id`),
  KEY `grado_id` (`grado_id`),
  KEY `aula_id` (`aula_id`),
  KEY `profesor_id` (`profesor_id`),
  KEY `fk_procesoprofesor_estatus1_idx` (`estatus_procesoprofesor_id`),
  KEY `fk_profesor_materia_materias1_idx` (`materias_id`),
  KEY `fk_profesor_materia_periodos1_idx` (`periodos_id`),
  CONSTRAINT `fk_procesoprofesor_estatus1` FOREIGN KEY (`estatus_procesoprofesor_id`) REFERENCES `estatus` (`idEstatus`),
  CONSTRAINT `fk_profesor_materia_materias1` FOREIGN KEY (`materias_id`) REFERENCES `materias` (`materia_id`),
  CONSTRAINT `fk_profesor_materia_periodos1` FOREIGN KEY (`periodos_id`) REFERENCES `periodos` (`periodo_id`),
  CONSTRAINT `procesoprofesor_ibfk_1` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`aula_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `procesoprofesor_ibfk_2` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`grado_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `procesoprofesor_ibfk_3` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`profesor_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor_materia`
--

LOCK TABLES `profesor_materia` WRITE;
/*!40000 ALTER TABLE `profesor_materia` DISABLE KEYS */;
INSERT INTO `profesor_materia` VALUES (6,8,3,4,12,1,100),(7,12,1,5,15,2,100),(8,12,3,6,6,2,100);
/*!40000 ALTER TABLE `profesor_materia` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'hector.coyotl','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','admin','Hector Juarez','2022-10-19 09:19:52'),(2,'laura.romero','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','user','Laura Romero','2022-10-19 09:19:52'),(3,'david.hernandez','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','profesor','David Hernandez','2022-10-19 09:20:45');
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
-- Temporary view structure for view `vw_detalle_maestros`
--

DROP TABLE IF EXISTS `vw_detalle_maestros`;
/*!50001 DROP VIEW IF EXISTS `vw_detalle_maestros`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_detalle_maestros` AS SELECT 
 1 AS `profesor_id`,
 1 AS `Cedula`,
 1 AS `Nombre_Completo`,
 1 AS `Nombre`,
 1 AS `Apellido_Paterno`,
 1 AS `Apellido_Materno`,
 1 AS `Direccion`,
 1 AS `Telefono`,
 1 AS `Sexo`,
 1 AS `Fecha_nacimiento`,
 1 AS `Edad`,
 1 AS `estatus_maestro_id`,
 1 AS `Estatus_Detalle`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_detalle_profesormateria`
--

DROP TABLE IF EXISTS `vw_detalle_profesormateria`;
/*!50001 DROP VIEW IF EXISTS `vw_detalle_profesormateria`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_detalle_profesormateria` AS SELECT 
 1 AS `proceso_id`,
 1 AS `nombre_grado`,
 1 AS `nombre_aula`,
 1 AS `Nombre_Profesor`,
 1 AS `nombre_materia`,
 1 AS `nombre_periodo`,
 1 AS `Estatus`*/;
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

--
-- Final view structure for view `vw_detalle_maestros`
--

/*!50001 DROP VIEW IF EXISTS `vw_detalle_maestros`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_detalle_maestros` AS select `a`.`profesor_id` AS `profesor_id`,`a`.`Cedula` AS `Cedula`,concat_ws(' ',`a`.`Nombre`,`a`.`Apellido_paterno`,`a`.`Apellido_Materno`) AS `Nombre_Completo`,`a`.`Nombre` AS `Nombre`,`a`.`Apellido_paterno` AS `Apellido_Paterno`,`a`.`Apellido_Materno` AS `Apellido_Materno`,`a`.`Direccion` AS `Direccion`,`a`.`Telefono` AS `Telefono`,`a`.`Sexo` AS `Sexo`,`a`.`Fecha_nacimiento` AS `Fecha_nacimiento`,timestampdiff(YEAR,`a`.`Fecha_nacimiento`,curdate()) AS `Edad`,`a`.`estatus_maestro_id` AS `estatus_maestro_id`,`es`.`Descripcion` AS `Estatus_Detalle` from (`profesor` `a` join `estatus` `es` on((`a`.`estatus_maestro_id` = `es`.`idEstatus`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_detalle_profesormateria`
--

/*!50001 DROP VIEW IF EXISTS `vw_detalle_profesormateria`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_detalle_profesormateria` AS select `gr`.`proceso_id` AS `proceso_id`,`es`.`nombre_grado` AS `nombre_grado`,`au`.`nombre_aula` AS `nombre_aula`,`pro`.`Nombre_Completo` AS `Nombre_Profesor`,`mat`.`nombre_materia` AS `nombre_materia`,`per`.`nombre_periodo` AS `nombre_periodo`,`est`.`Descripcion` AS `Estatus` from ((((((`profesor_materia` `gr` join `grados` `es` on((`gr`.`grado_id` = `es`.`grado_id`))) join `aulas` `au` on((`gr`.`aula_id` = `au`.`aula_id`))) join `vw_detalle_maestros` `pro` on((`gr`.`profesor_id` = `pro`.`profesor_id`))) join `materias` `mat` on((`gr`.`materias_id` = `mat`.`materia_id`))) join `periodos` `per` on((`gr`.`periodos_id` = `per`.`periodo_id`))) join `estatus` `est` on((`gr`.`estatus_procesoprofesor_id` = `est`.`idEstatus`))) */;
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

-- Dump completed on 2022-11-10 22:50:54
