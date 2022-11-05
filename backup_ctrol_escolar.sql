CREATE DATABASE  IF NOT EXISTS `ctrol_escolar` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ctrol_escolar`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ctrol_escolar
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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Apellido_paterno` varchar(45) NOT NULL,
  `Apellido_materno` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Sexo` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Foto_admin` varchar(45) DEFAULT NULL,
  `Fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `id_alumno` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(50) NOT NULL,
  `Apellido_Paterno` varchar(45) NOT NULL,
  `Apellido_Materno` varchar(45) NOT NULL,
  `Sexo` varchar(45) NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Curp` varchar(45) NOT NULL,
  `Foto_alumno` varchar(45) DEFAULT NULL,
  `Fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_Estatus` int NOT NULL,
  `id_Tutor` int NOT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `fk_alumnos_Estatus1_idx` (`id_Estatus`),
  KEY `fk_alumnos_Tutor1_idx` (`id_Tutor`),
  CONSTRAINT `fk_alumnos_Estatus1` FOREIGN KEY (`id_Estatus`) REFERENCES `estatus` (`idEstatus`),
  CONSTRAINT `fk_alumnos_Tutor1` FOREIGN KEY (`id_Tutor`) REFERENCES `tutor` (`id_Tutor`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (2,'Hector','Coyotl','Juarez','Maculino','2012-09-10','FODF910819HMSLZR07','1.png','2022-11-03 00:16:26',100,10000),(3,'Galilea','González','Reyes','Femenino','2015-03-06','FABM770222MMSJNR00','4.png','2022-11-03 00:15:55',100,10001),(4,'Juan','Cabrera','Garcia','Maculino','2015-01-10','CAGS620415HVZBRT22','8.png','2022-11-04 03:08:32',101,10002),(5,'Karen Odette','Domínguez','Velázquez','Femenino','2015-06-05','CATC650228MMCMRR03','7.png','2022-11-03 00:16:26',100,10003),(6,'Lizbeth Soledad','Falcón','Duarte','Femenino','2016-05-01','CAVA550828HGRNLG04','6.png','2022-11-03 00:16:26',100,10004),(7,'Oscar','Carranco','Mandujado','Maculino','2014-03-06','CAMJ680624MGRRRN00','9.png','2022-11-03 00:16:26',100,10005);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencias`
--

DROP TABLE IF EXISTS `asistencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistencias` (
  `id_asistencias` int NOT NULL AUTO_INCREMENT,
  `id_estatus` int NOT NULL,
  `Fecha_Hora_Registro` datetime NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `id_alumno` int NOT NULL,
  `id_estatuss` int NOT NULL,
  PRIMARY KEY (`id_asistencias`),
  KEY `fk_Asistencias_alumnos1_idx` (`id_alumno`),
  KEY `fk_Asistencias_Estatus1_idx` (`id_estatuss`),
  CONSTRAINT `fk_Asistencias_alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  CONSTRAINT `fk_Asistencias_Estatus1` FOREIGN KEY (`id_estatuss`) REFERENCES `estatus` (`idEstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencias`
--

LOCK TABLES `asistencias` WRITE;
/*!40000 ALTER TABLE `asistencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aulas` (
  `id_aula` int NOT NULL AUTO_INCREMENT,
  `Piso` int NOT NULL,
  `Nombre_aula` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `grupo_id_grupo` int NOT NULL,
  PRIMARY KEY (`id_aula`),
  KEY `fk_aulas_grupo_idx` (`grupo_id_grupo`),
  CONSTRAINT `fk_aulas_grupo` FOREIGN KEY (`grupo_id_grupo`) REFERENCES `grupo` (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calificacion` (
  `id_calificacion` int NOT NULL AUTO_INCREMENT,
  `calificacion` int NOT NULL,
  `materias_id_materias` int NOT NULL,
  PRIMARY KEY (`id_calificacion`),
  KEY `fk_calificacion_materias1_idx` (`materias_id_materias`),
  CONSTRAINT `fk_calificacion_materias1` FOREIGN KEY (`materias_id_materias`) REFERENCES `materias` (`id_materias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;
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
INSERT INTO `estatus` VALUES (100,'Activo'),(101,'Baja'),(102,'Baja Temporal'),(103,'Asistencia'),(104,'Falta'),(105,'Permiso');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo` (
  `id_grupo` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Capacidad` int NOT NULL,
  `Turno` varchar(45) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario_alumno`
--

DROP TABLE IF EXISTS `horario_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horario_alumno` (
  `id_horario` int NOT NULL AUTO_INCREMENT,
  `id_materiaa` int NOT NULL,
  `id_alumno` int NOT NULL,
  `Dia` varchar(45) NOT NULL,
  `Horario_inicia` varchar(45) NOT NULL,
  `Hora_fin` varchar(45) NOT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `id_materia_idx` (`id_materiaa`),
  KEY `id_alumno_idx` (`id_alumno`),
  CONSTRAINT `id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  CONSTRAINT `id_materiaa` FOREIGN KEY (`id_materiaa`) REFERENCES `materias` (`id_materias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_alumno`
--

LOCK TABLES `horario_alumno` WRITE;
/*!40000 ALTER TABLE `horario_alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario_profesor`
--

DROP TABLE IF EXISTS `horario_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horario_profesor` (
  `id_profesor` int NOT NULL AUTO_INCREMENT,
  `Dia` varchar(45) NOT NULL,
  `Hora_inicio` time NOT NULL,
  `Hora_fin` time NOT NULL,
  `grupo_id_grupo` int NOT NULL,
  `id_materiass` int NOT NULL,
  KEY `fk_horario_profesor_grupo1_idx` (`grupo_id_grupo`),
  KEY `id_profesor_idx` (`id_profesor`),
  KEY `id_materias_idx` (`id_materiass`),
  CONSTRAINT `fk_horario_profesor_grupo1` FOREIGN KEY (`grupo_id_grupo`) REFERENCES `grupo` (`id_grupo`),
  CONSTRAINT `id_materiass` FOREIGN KEY (`id_materiass`) REFERENCES `materias` (`id_materias`),
  CONSTRAINT `id_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_profesor`
--

LOCK TABLES `horario_profesor` WRITE;
/*!40000 ALTER TABLE `horario_profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario_profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscripcion`
--

DROP TABLE IF EXISTS `inscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inscripcion` (
  `id_inscripcion` int NOT NULL AUTO_INCREMENT,
  `Fecha_inscripcion` datetime NOT NULL,
  `grupo_id_grupo` int NOT NULL,
  `alumno_id_alumno` int NOT NULL,
  `admin_id_admin` int NOT NULL,
  PRIMARY KEY (`id_inscripcion`),
  KEY `fk_inscripcion_grupo1_idx` (`grupo_id_grupo`),
  KEY `fk_inscripcion_alumno1_idx` (`alumno_id_alumno`),
  KEY `fk_inscripcion_admin1_idx` (`admin_id_admin`),
  CONSTRAINT `fk_inscripcion_admin1` FOREIGN KEY (`admin_id_admin`) REFERENCES `administrador` (`id_admin`),
  CONSTRAINT `fk_inscripcion_alumno1` FOREIGN KEY (`alumno_id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  CONSTRAINT `fk_inscripcion_grupo1` FOREIGN KEY (`grupo_id_grupo`) REFERENCES `grupo` (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripcion`
--

LOCK TABLES `inscripcion` WRITE;
/*!40000 ALTER TABLE `inscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materias` (
  `id_materias` int NOT NULL AUTO_INCREMENT,
  `Clave` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_materias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagos` (
  `id_pago` int NOT NULL AUTO_INCREMENT,
  `Concepto` varchar(45) NOT NULL,
  `Monto` double NOT NULL,
  `Fecha_pago` datetime NOT NULL,
  `alumno_id_alumno` int NOT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `fk_pagos_alumno1_idx` (`alumno_id_alumno`),
  CONSTRAINT `fk_pagos_alumno1` FOREIGN KEY (`alumno_id_alumno`) REFERENCES `alumnos` (`id_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesor` (
  `id_profesor` int NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido_paterno` varchar(45) NOT NULL,
  `Apellido_Materno` varchar(45) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Foto_profesor` varchar(45) DEFAULT NULL,
  `Fecha_nacimiento` datetime NOT NULL,
  `id_Estatus` int NOT NULL,
  `Fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_profesor`),
  KEY `id_estatus_idx` (`id_Estatus`),
  CONSTRAINT `id_estatus` FOREIGN KEY (`id_Estatus`) REFERENCES `estatus` (`idEstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor`
--

DROP TABLE IF EXISTS `tutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tutor` (
  `id_Tutor` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(45) NOT NULL,
  `Apellido_Paterno` varchar(45) NOT NULL,
  `Apellido_Materno` varchar(45) NOT NULL,
  `Direccion` varchar(70) NOT NULL,
  `Telefono_Casa` varchar(10) NOT NULL,
  `Telefono_Celular` varchar(10) NOT NULL,
  `Correo` varchar(60) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Tutor`)
) ENGINE=InnoDB AUTO_INCREMENT=10007 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor`
--

LOCK TABLES `tutor` WRITE;
/*!40000 ALTER TABLE `tutor` DISABLE KEYS */;
INSERT INTO `tutor` VALUES (10000,'Sara','Sánchez','León','Prolongación 2 Sur Puebla.Pue','2222178765','2211178654','Sara@hotmail.com','Femenino'),(10001,'Gabriela','Pino','Mendoza','Calle Ignacio Zaragoza Puebla.Pue','4823830298','3313118654','Gabriela@hotmail.com','Femenino'),(10002,'Gustavo','Gil','García','Calle 46 Poniente Puebla.Pue','9163850525','1916385055','Gustavo@hotmail.com','Masculino'),(10003,'Carolina','Nava','Hernández','Calle Aquiles Serdán Puebla.Pue','7480728290','1569884048','Carolina@gmail.com','Femenino'),(10004,'Graciela','Huerta','Velázquez','Avenida 5 De Mayo Puebla.Pue','3069884048','1106988448','Graciela@hotmail.com','Femenino'),(10005,'Jaciel','Ramos','Pérez','Cerrada De La Cruz De Piedra Puebla.Pue','7069384048','2206988447','Jaciel@hotmail.com','Masculino');
/*!40000 ALTER TABLE `tutor` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
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
-- Temporary view structure for view `vw_com_tutor`
--

DROP TABLE IF EXISTS `vw_com_tutor`;
/*!50001 DROP VIEW IF EXISTS `vw_com_tutor`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_com_tutor` AS SELECT 
 1 AS `id_Tutor`,
 1 AS `Nombre_Completo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_detalle_alumnos`
--

DROP TABLE IF EXISTS `vw_detalle_alumnos`;
/*!50001 DROP VIEW IF EXISTS `vw_detalle_alumnos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_detalle_alumnos` AS SELECT 
 1 AS `id_alumno`,
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
 1 AS `Estatus_Detalle`,
 1 AS `id_Tutor`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'ctrol_escolar'
--

--
-- Dumping routines for database 'ctrol_escolar'
--

--
-- Final view structure for view `vw_com_tutor`
--

/*!50001 DROP VIEW IF EXISTS `vw_com_tutor`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_com_tutor` AS select `tutor`.`id_Tutor` AS `id_Tutor`,concat_ws(' ',`tutor`.`Nombres`,`tutor`.`Apellido_Paterno`,`tutor`.`Apellido_Materno`) AS `Nombre_Completo` from `tutor` order by concat_ws(' ',`tutor`.`Nombres`,`tutor`.`Apellido_Paterno`,`tutor`.`Apellido_Materno`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

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
/*!50001 VIEW `vw_detalle_alumnos` AS select `a`.`id_alumno` AS `id_alumno`,concat_ws(' ',`a`.`Nombres`,`a`.`Apellido_Paterno`,`a`.`Apellido_Materno`) AS `Nombre_Completo`,`a`.`Nombres` AS `Nombres`,`a`.`Apellido_Paterno` AS `Apellido_Paterno`,`a`.`Apellido_Materno` AS `Apellido_Materno`,`a`.`Sexo` AS `Sexo`,`a`.`Fecha_nacimiento` AS `Fecha_nacimiento`,`a`.`Curp` AS `Curp`,timestampdiff(YEAR,`a`.`Fecha_nacimiento`,curdate()) AS `Edad`,`a`.`Foto_alumno` AS `Foto_alumno`,`a`.`id_Estatus` AS `id_Estatus`,`es`.`Descripcion` AS `Estatus_Detalle`,`a`.`id_Tutor` AS `id_Tutor` from (`alumnos` `a` join `estatus` `es` on((`a`.`id_Estatus` = `es`.`idEstatus`))) */;
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

-- Dump completed on 2022-11-03 21:11:29
