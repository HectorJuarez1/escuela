use control_escolar;
select * from actividad;
select * from alumnos;
select * from aulas;
select * from calificaciones;
select * from estatus;
select * from grados; 
select * from materias;
select * from notas;
select * from periodos;
select * from profesor;
select * from users;
select  * from pagos;
select * from concepto;
select * from horas;
select * from alumnos_profesor;
select * from profesor_materia;
select * from vw_detalle_alumnos;
select * from vw_detalle_maestros;
select * from vw_detalle_profesormateria where proceso_id='11' where No_profesor='PR11013021';
select * from vw_detalle_alumnosasignados where proceso_id='11';
select * from vw_detalle_pagos;


SELECT actividad_id,titulo,descripcion,id_materia,estatus_actividad_id FROM  actividad WHERE id_materia ='65'













select proceso_id,nombre_materia from ; where No_profesor='PR11013021';


select proceso_id,No_Alumno,NombreAlumno from vw_detalle_alumnosasignados where proceso_id='11';


create view vw_detalle_materias as
select ma.materia_id,ma.nombre_materia,ma.dia_semana,
DATE_FORMAT(hri.Detalle, "%H:%i %p")as HoraInicio
,DATE_FORMAT(hrf.Detalle, "%H:%i %p")as HoraFin,
TIMESTAMPDIFF(HOUR, hri.Detalle, hrf.Detalle) AS Horas,
ma.estatus_materias_id,est.Descripcion as Estatus,ma.grados_grado_id,gra.nombre_grado as Grado
from materias as ma 
inner join horas  as hri on hri.id_horas=ma.hora_inicia
inner join horas  as hrf on hrf.id_horas=ma.hora_fin
inner join grados  as gra on gra.grado_id=ma.grados_grado_id
inner join estatus  as est on est.idEstatus=ma.estatus_materias_id; 


create view vw_detalle_pagos as
select pa.id_pagos,pa.No_alumno,pa.Nombre_Alumno,pa.Pago,pa.Detalle_mes,
con.Descripcion as Concepto,
pa.estatus_id_pago,est.Descripcion as estatus,pa.Fecha_registro
from pagos as pa 
inner join concepto as con on con.id_concepto=pa.concepto_id_pago
inner join estatus  as est on est.idEstatus=pa.estatus_id_pago; 


create view vw_detalle_alumnosasignados as
select al.proceso_id,vpm.No_profesor,vpm.Nombre_Profesor,vda.No_Alumno,vda.Nombre_Completo as NombreAlumno,
vpm.nombre_grado,vpm.nombre_aula,vpm.nombre_materia,vpm.nombre_periodo,vpm.dia_semana,vpm.Hora_Inicio,vpm.Hora_Fin,
vpm.Horas,al.estatus_id,est.Descripcion
from alumnos_profesor as al 
inner join vw_detalle_profesormateria as vpm on vpm.proceso_id=al.proceso_id 
inner join vw_detalle_alumnos as vda on vda.alumno_id=al.alumnos_id 
inner join estatus  as est on est.idEstatus=al.estatus_id; where al.proceso_id='11'; 





create view vw_detalle_profesormateria as
select gr.proceso_id,pro.No_profesor,pro.Nombre_Completo as Nombre_Profesor,es.grado_id,es.nombre_grado,au.nombre_aula,
mat.materia_id,mat.nombre_materia,DATE_FORMAT(hr.Detalle, "%H:%i %p") as Hora_Inicio,DATE_FORMAT(hrf.Detalle, "%H:%i %p")as Hora_Fin,
TIMESTAMPDIFF(HOUR,hr.Detalle ,hrf.Detalle) AS Horas,mat.dia_semana,
per.nombre_periodo,est.Descripcion as Estatus
from profesor_materia as gr 
inner join grados as es on gr.grado_id=es.grado_id  
inner join aulas as au on gr.aula_id=au.aula_id 
inner join vw_detalle_maestros  as pro on gr.profesor_id=pro.profesor_id 
inner join materias  as mat on gr.materias_id=mat.materia_id 
inner join periodos  as per on gr.periodos_id=per.periodo_id 
inner join horas  as hr on mat.hora_inicia=hr.id_horas 
inner join horas  as hrf on mat.hora_fin=hrf.id_horas 
inner join estatus  as est on gr.estatus_procesoprofesor_id=est.idEstatus
;

select * from vw_detalle_alumnos;
create view vw_detalle_alumnos as
select a.alumno_id,a.No_Alumno,concat_ws(' ',a.Nombres,a.Apellido_Paterno ,a.Apellido_Materno)as Nombre_Completo,
LOWER(concat_ws('',vw_n.PrimerNombre,'.',vw_n.Apellido_Paterno))as username,a.Nombres,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Fecha_nacimiento,a.Curp,
TIMESTAMPDIFF(YEAR,a.Fecha_nacimiento,CURDATE()) AS Edad, a.Foto_alumno,a.id_Estatus,Es.Descripcion as Estatus_Detalle
from alumnos as a 
inner join estatus as Es on a.id_Estatus=Es.idEstatus
inner join vw_nombres vw_n  on a.alumno_id=vw_n.alumno_id;

select * from vw_detalle_maestros;
create view vw_detalle_maestros as
select a.profesor_id,a.No_profesor,a.Cedula,concat_ws(' ',a.Nombre,a.Apellido_Paterno ,a.Apellido_Materno)as Nombre_Completo,
LOWER(concat_ws('',vw_m.PrimerNombre,'.',vw_m.Apellido_paterno))as username,
a.Nombre,a.Apellido_Paterno ,a.Apellido_Materno,a.Direccion,
a.Telefono,a.Sexo,a.Fecha_nacimiento,TIMESTAMPDIFF(YEAR,a.Fecha_nacimiento,CURDATE()) AS Edad ,a.estatus_maestro_id,Es.Descripcion as Estatus_Detalle
from profesor as a 
inner join estatus as Es on a.estatus_maestro_id=Es.idEstatus
inner join vw_nombres_maestros vw_m  on a.No_profesor=vw_m.No_profesor;



create view vw_nombres_alumnos as
select a.alumno_id,a.No_Alumno,
 SUBSTRING_INDEX(a.Nombres, " ", 1) AS "PrimerNombre",
    SUBSTR(a.Nombres, LENGTH( SUBSTRING_INDEX(a.Nombres, " ", 1) ) + 1 ) AS "SegundoNombre",
  a.Apellido_Paterno,a.Apellido_Materno
from alumnos as a ;

create view vw_nombres_maestros as
select a.profesor_id,a.No_profesor,
 SUBSTRING_INDEX(a.Nombre, " ", 1) AS "PrimerNombre",
    SUBSTR(a.Nombre, LENGTH( SUBSTRING_INDEX(a.Nombre, " ", 1) ) + 1 ) AS "SegundoNombre",
  a.Apellido_paterno,a.Apellido_Materno
from profesor as a ;







INSERT INTO `estatus` VALUES (100,'Activo'),(101,'Baja'),(102,'Baja Temporal'),('103', 'Inactivo'),('108', 'Registrado'),('109', 'Cancelado');
INSERT INTO `users` VALUES ('1','admin','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','admin','Hector Juarez','2022-11-22 02:47:46'),('AL08011212','hector.coyotl','$2y$10$c6q30gHbbfSZh2abT08HCek9ZMTR.o7yW1te2lBiZ9nkobPVXy9Vq','user','Hector Coyotl Juarez','2022-11-22 02:50:09'),('AL09152233','galilea.gonzalez','$2y$10$7./q3idrIQ1UbB5YRJDnqOmesvS8tPnDzCDD5qOi.pz7MDcfp1MLm','user','Galilea Gonzalez Reyes','2022-11-22 02:50:20'),('AL07151256','juan.cabrera','$2y$10$dDnLGL/a/7LqT.2Ccdirku8MUoLrW7EwrNvGc2QPIjPuy8rVZ/2yW','user','Juan Cabrera Garcia','2022-11-22 02:51:26'),('AL01152232','karen.dominguez','$2y$10$qRl4ZW3ncTps8aC9XiO7VuJzPCGXwu3NVehlD4HdNoIOJ.lHM7V52','user','Karen Odette Dominguez Velazquez','2022-11-22 02:51:35'),('AL05152209','lizbeth.falcon','$2y$10$weEQfs5ZMUim4imCzMPGcenaqnq/kA6ek9G.QNuRIFeo8rocf4BKe','user','Lizbeth Soledad Falcon Duarte','2022-11-22 02:51:44'),('AL03153212','oscar.carranco','$2y$10$QdOhTCkwD.fva89Ikcsv9OI0036/qmbl/gBkgmdmMDkBb0Dqy0yg6','user','Oscar Carranco Mandujado','2022-11-22 02:51:53');
INSERT INTO `alumnos` VALUES (2,'Hector','Coyotl','Juarez','Maculino','2012-09-10','FODF910819HMSLZR07','1.png','2022-11-22 02:46:03','AL08011212',100),(3,'Galilea','Gonzalez','Reyes','Femenino','2015-03-06','FABM770222MMSJNR00','4.png','2022-11-16 05:32:47','AL09152233',100),(4,'Juan','Cabrera','Garcia','Maculino','2015-01-10','CAGS620415HVZBRT22','8.png','2022-11-22 02:46:03','AL07151256',102),(5,'Karen Odette','Dominguez','Velazquez','Femenino','2015-06-05','CATC650228MMCMRR03','7.png','2022-11-22 02:46:03','AL01152232',100),(6,'Lizbeth Soledad','Falcon','Duarte','Femenino','2016-05-01','CAVA550828HGRNLG04','6.png','2022-11-22 02:46:03','AL05152209',100),(7,'Oscar','Carranco','Mandujado','Maculino','2014-03-06','CAMJ680624MGRRRN00','9.png','2022-11-23 04:43:03','AL03153212',101),(17,'sad','sad','sad','Femenino','2222-01-01','sadsadsad','HECTOR_COYOTL.gif','2022-11-23 05:13:45','AL11222313',100),(18,'ewq','wqe','wqe','Femenino','2222-02-01','wqe','HECTOR_COYOTL.gif','2022-11-23 05:14:19','AL11222314',100);
INSERT INTO `actividad` VALUES (1,'Evaluación 1',100),(2,'Evaluación 2',100),(3,'Evaluación 4',103);
INSERT INTO `aulas` VALUES (1,'Primero A',103),(2,'Segundo B',103),(3,'Sexto C',103),(6,'B-4',100),(10,'503',100),(11,'A-6',100),(13,'202',100),(14,'403',100);
INSERT INTO `grados` VALUES (7,'Primero',100),(8,'Segundo',100),(9,'Tercero',103),(10,'Cuarto',100),(11,'Quinto',100),(12,'Sexto',100);
INSERT INTO `materias` VALUES (5,'Matemáticas','Lunes','08:00','09:00','2022-11-26 04:09:57',100,7),(6,'Español','Martes','11:00','12:00','2022-11-26 04:09:57',100,8),(7,'Ciencias de la Naturaleza','Miercoles','10:00','11:00','2022-11-26 04:15:29',100,11),(8,'Segunda lengua extranjera','Jueves','12:00','13:00','2022-11-26 04:15:29',100,10),(9,'Educación física','Viernes','08:00','12:00','2022-11-26 04:15:29',100,7),(10,'Educación Artística','Lunes','07:00','09:00','2022-11-26 04:15:29',100,12),(11,'Geografía','Martes','11:00','13:00','2022-11-26 04:15:29',100,9),(12,'Formación Cívica y Ética','Miercoles','01:00','02:00','2022-11-26 04:15:29',100,8),(13,'Primera lengua extranjera','Jueves','11:00','12:00','2022-11-26 04:15:29',100,12),(14,'Lengua castellana y literatura','Viernes','07:00','08:00 ','2022-11-26 04:15:29',100,11),(15,'Historia','Lunes','09:00','10:00','2022-11-26 04:15:29',100,10);
INSERT INTO `periodos` VALUES (1,'Enero-Agosto 2022',100),(2,'Agosto-Diciembre 2021',100);
INSERT INTO `profesor` VALUES (4,'213443f3','Juan Carlos','Acosta','Acosta','Calle Azucenas Puebla Puebla','2215628900','Maculino','2000-06-01','2022-11-11 10:23:07',100),(5,'213443f3a','Gustavo','Valdez','Valdez','Calle Venustiano Carranza Puebla .Puebla','2232413215','Maculino','1989-05-01','2022-11-11 10:25:19',100),(6,'D54S2V65','Verónica','Hernández','Gil','Calle 16 De Septiembre Puebla.Pue','2211342354','Femenino','1990-01-09','2022-11-11 10:20:03',100),(7,'776ub543','Adriana','León','León','Calle Coronel Jesús González Arratia Puebla.Pue','2276543211','Femenino','1990-03-01','2022-11-11 10:21:22',100),(8,'bg5423i1a','Rene','Fuentes','Fuentes','Calle Mariano Abasolo Puebla.Pue','2232982364','Maculino','1983-09-17','2022-11-11 10:25:28',101);
INSERT INTO `profesor_materia` VALUES (11,7,6,4,5,1,100),(14,7,6,4,6,1,100),(15,7,6,4,12,1,100),(16,7,6,4,9,1,100),(17,8,13,5,13,1,100),(18,12,11,7,15,1,100);
INSERT INTO `alumnos_profesor` VALUES (24,11,2,100),(25,14,2,100),(26,15,2,100),(27,16,2,100),(28,17,3,100),(29,18,6,100);
INSERT INTO `concepto` VALUES (1,'Inscripcion'),(2,'Reinscripcion'),(3,'Colegiatura');



DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','profesor') NOT NULL,
  `name` varchar(100) NOT NULL,
  `Fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('1','admin','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','admin','Hector Juarez','2022-11-22 08:47:46'),('AL09152233','galilea.gonzalez','$2y$10$7./q3idrIQ1UbB5YRJDnqOmesvS8tPnDzCDD5qOi.pz7MDcfp1MLm','user','Galilea Gonzalez Reyes','2022-11-22 08:50:20'),('AL07151256','juan.cabrera','$2y$10$dDnLGL/a/7LqT.2Ccdirku8MUoLrW7EwrNvGc2QPIjPuy8rVZ/2yW','user','Juan Cabrera Garcia','2022-11-22 08:51:26'),('AL01152232','karen.dominguez','$2y$10$qRl4ZW3ncTps8aC9XiO7VuJzPCGXwu3NVehlD4HdNoIOJ.lHM7V52','user','Karen Odette Dominguez Velazquez','2022-11-22 08:51:35'),('AL05152209','lizbeth.falcon','$2y$10$weEQfs5ZMUim4imCzMPGcenaqnq/kA6ek9G.QNuRIFeo8rocf4BKe','user','Lizbeth Soledad Falcon Duarte','2022-11-22 08:51:44'),('AL08011212','hector.coyotl','$2y$10$mcLYnzwmZ/Q1tEaijnoa5uVocqe7afLhJDyzsVnXBpEZHtrihGaDW','user','Hector Coyotl Juarez','2022-12-11 05:22:49'),('PR11013021','juan.acosta','$2y$10$Z6.CoG7.g/EB9ah6Npfnm.q/aRluR4hJHluOdTJJ0NKlaZDbcAoeq','profesor','Juan Carlos Acosta Acosta','2022-12-11 17:58:15'),('PR13022112','gustavo.valdez','$2y$10$YG1wKPBjrJ5/Lk.MGkwjPuTRZjrQWd3UXtaLDZlHPjBXe17xAnKvW','profesor','Gustavo Valdez Valdez','2022-12-11 17:58:24'),('PR15030112','adriana.león','$2y$10$bvQTCMPvF3gfXJFnTkYFi.GGK5TaX5M4Fke4exI8fnozVVPR1RF4u','profesor','Adriana León León','2022-12-11 17:58:44'),('PR14091052','verónica.hernández','$2y$10$DTUoQ9.1.AcnZhlJ1nltHOprw7eLyI6GBdLMiXrB/khPvaHZlaVSO','profesor','Verónica Hernández Gil','2022-12-11 18:52:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



