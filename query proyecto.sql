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
select * from pagos;
select * from concepto;
select * from alumnos_profesor;
select * from vw_detalle_alumnos;
select * from vw_detalle_maestros;
select * from vw_detalle_profesormateria where proceso_id = 6;
select * from vw_detalle_alumnosasignados;




INSERT INTO `control_escolar`.`pagos` (`No_alumno`, `Nombre_Alumno`, `Pago`, `Detalle_mes`, `concepto_id_concepto`)
 VALUES ('asda354', 'hector', '182', 'mayo','1');

select nombre_materia from vw_detalle_alumnosasignados where No_Alumno='AL08011212';



UPDATE `control_escolar`.`users` SET `username` = 'admin' WHERE (`id` = '1');
DELETE FROM `control_escolar`.`users` WHERE (`id` = 'AL11202151');


select * from vw_nombres;

select COUNT(*) No_Alumno from alumnos WHERE No_Alumno='AL11152233';




SELECT COUNT(profesor_id)as NumProfesores from vw_detalle_maestros where estatus_maestro_id=100 UNION
SELECT COUNT(alumno_id)as NumAlumnos from vw_detalle_alumnos where id_Estatus=100



create view vw_detalle_alumnosasignados as
select al.proceso_id,vpm.Nombre_Profesor,vda.No_Alumno,vda.Nombre_Completo as NombreAlumno,
vpm.nombre_grado,vpm.nombre_aula,vpm.nombre_materia,vpm.nombre_periodo,al.estatus_id,est.Descripcion
from alumnos_profesor as al 
inner join vw_detalle_profesormateria as vpm on vpm.proceso_id=al.proceso_id 
inner join vw_detalle_alumnos as vda on vda.alumno_id=al.alumnos_id 
inner join estatus  as est on est.idEstatus=al.estatus_id; 


create view vw_detalle_profesormateria as
select gr.proceso_id,es.nombre_grado,au.nombre_aula,pro.Nombre_Completo as Nombre_Profesor,mat.nombre_materia,per.nombre_periodo,est.Descripcion as Estatus
from profesor_materia as gr 
inner join grados as es on gr.grado_id=es.grado_id  
inner join aulas as au on gr.aula_id=au.aula_id 
inner join vw_detalle_maestros  as pro on gr.profesor_id=pro.profesor_id 
inner join materias  as mat on gr.materias_id=mat.materia_id 
inner join periodos  as per on gr.periodos_id=per.periodo_id 
inner join estatus  as est on gr.estatus_procesoprofesor_id=est.idEstatus;

select * from vw_detalle_alumnos;
create view vw_detalle_alumnos as
select a.alumno_id,a.No_Alumno,concat_ws(' ',a.Nombres,a.Apellido_Paterno ,a.Apellido_Materno)as Nombre_Completo,
LOWER(concat_ws('',vw_n.PrimerNombre,'.',vw_n.Apellido_Paterno))as username,a.Nombres,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Fecha_nacimiento,a.Curp,
TIMESTAMPDIFF(YEAR,a.Fecha_nacimiento,CURDATE()) AS Edad, a.Foto_alumno,a.id_Estatus,Es.Descripcion as Estatus_Detalle
from alumnos as a 
inner join estatus as Es on a.id_Estatus=Es.idEstatus
inner join vw_nombres vw_n  on a.alumno_id=vw_n.alumno_id;

select * from vw_nombres


select * from vw_detalle_maestros;
create view vw_detalle_maestros as
select a.profesor_id,a.Cedula,concat_ws(' ',a.Nombre,a.Apellido_Paterno ,a.Apellido_Materno)as Nombre_Completo,
a.Nombre,a.Apellido_Paterno ,a.Apellido_Materno,a.Direccion,
a.Telefono,a.Sexo,a.Fecha_nacimiento,TIMESTAMPDIFF(YEAR,a.Fecha_nacimiento,CURDATE()) AS Edad ,a.estatus_maestro_id,Es.Descripcion as Estatus_Detalle
from profesor as a inner join estatus as Es on a.estatus_maestro_id=Es.idEstatus;


create view vw_nombres as
select a.alumno_id,a.No_Alumno,
 SUBSTRING_INDEX(a.Nombres, " ", 1) AS "PrimerNombre",
    SUBSTR(a.Nombres, LENGTH( SUBSTRING_INDEX(a.Nombres, " ", 1) ) + 1 ) AS "SegundoNombre",
  a.Apellido_Paterno,a.Apellido_Materno
from alumnos as a 



INSERT INTO `estatus` VALUES (100,'Activo'),(101,'Baja'),(102,'Baja Temporal'),('103', 'Inactivo');
INSERT INTO `users` VALUES ('1','admin','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','admin','Hector Juarez','2022-11-22 02:47:46'),('AL08011212','hector.coyotl','$2y$10$c6q30gHbbfSZh2abT08HCek9ZMTR.o7yW1te2lBiZ9nkobPVXy9Vq','user','Hector Coyotl Juarez','2022-11-22 02:50:09'),('AL09152233','galilea.gonzalez','$2y$10$7./q3idrIQ1UbB5YRJDnqOmesvS8tPnDzCDD5qOi.pz7MDcfp1MLm','user','Galilea Gonzalez Reyes','2022-11-22 02:50:20'),('AL07151256','juan.cabrera','$2y$10$dDnLGL/a/7LqT.2Ccdirku8MUoLrW7EwrNvGc2QPIjPuy8rVZ/2yW','user','Juan Cabrera Garcia','2022-11-22 02:51:26'),('AL01152232','karen.dominguez','$2y$10$qRl4ZW3ncTps8aC9XiO7VuJzPCGXwu3NVehlD4HdNoIOJ.lHM7V52','user','Karen Odette Dominguez Velazquez','2022-11-22 02:51:35'),('AL05152209','lizbeth.falcon','$2y$10$weEQfs5ZMUim4imCzMPGcenaqnq/kA6ek9G.QNuRIFeo8rocf4BKe','user','Lizbeth Soledad Falcon Duarte','2022-11-22 02:51:44'),('AL03153212','oscar.carranco','$2y$10$QdOhTCkwD.fva89Ikcsv9OI0036/qmbl/gBkgmdmMDkBb0Dqy0yg6','user','Oscar Carranco Mandujado','2022-11-22 02:51:53');
INSERT INTO `alumnos` VALUES (2,'Hector','Coyotl','Juarez','Maculino','2012-09-10','FODF910819HMSLZR07','1.png','2022-11-22 02:46:03','AL08011212',100),(3,'Galilea','Gonzalez','Reyes','Femenino','2015-03-06','FABM770222MMSJNR00','4.png','2022-11-16 05:32:47','AL09152233',100),(4,'Juan','Cabrera','Garcia','Maculino','2015-01-10','CAGS620415HVZBRT22','8.png','2022-11-22 02:46:03','AL07151256',102),(5,'Karen Odette','Dominguez','Velazquez','Femenino','2015-06-05','CATC650228MMCMRR03','7.png','2022-11-22 02:46:03','AL01152232',100),(6,'Lizbeth Soledad','Falcon','Duarte','Femenino','2016-05-01','CAVA550828HGRNLG04','6.png','2022-11-22 02:46:03','AL05152209',100),(7,'Oscar','Carranco','Mandujado','Maculino','2014-03-06','CAMJ680624MGRRRN00','9.png','2022-11-23 04:43:03','AL03153212',101),(17,'sad','sad','sad','Femenino','2222-01-01','sadsadsad','HECTOR_COYOTL.gif','2022-11-23 05:13:45','AL11222313',100),(18,'ewq','wqe','wqe','Femenino','2222-02-01','wqe','HECTOR_COYOTL.gif','2022-11-23 05:14:19','AL11222314',100);




INSERT INTO `actividad` VALUES (1,'Evaluación 1',100),(2,'Evaluación 2',100),(3,'Evaluación 4',103);
INSERT INTO `aulas` VALUES (1,'Primero A',103),(2,'Segundo B',103),(3,'Sexto C',103),(6,'B-4',100),(10,'503',100),(11,'A-6',100),(13,'202',100),(14,'403',100);
INSERT INTO `grados` VALUES (7,'Primero',100),(8,'Segundo',100),(9,'Tercero',103),(10,'Cuarto',100),(11,'Quinto',100),(12,'Sexto',100);
INSERT INTO `materias` VALUES (5,'Matemáticas',100),(6,'Español',100),(7,'Ciencias de la Naturaleza',100),(8,'Segunda lengua extranjera',100),(9,'Educación física',100),(10,'Educación Artística',103),(11,'Geografía',100),(12,'Formación Cívica y Ética',100),(13,'Primera lengua extranjera',100),(14,'Lengua castellana y literatura',100),(15,'Historia',100);
INSERT INTO `periodos` VALUES (1,'Enero-Agosto 2022',100),(2,'Agosto-Diciembre 2021',100);
INSERT INTO `profesor` VALUES (4,'213443f3','Juan Carlos','Acosta','Acosta','Calle Azucenas Puebla Puebla','2215628900','Maculino','2000-06-01','2022-11-11 10:23:07',100),(5,'213443f3a','Gustavo','Valdez','Valdez','Calle Venustiano Carranza Puebla .Puebla','2232413215','Maculino','1989-05-01','2022-11-11 10:25:19',100),(6,'D54S2V65','Verónica','Hernández','Gil','Calle 16 De Septiembre Puebla.Pue','2211342354','Femenino','1990-01-09','2022-11-11 10:20:03',100),(7,'776ub543','Adriana','León','León','Calle Coronel Jesús González Arratia Puebla.Pue','2276543211','Femenino','1990-03-01','2022-11-11 10:21:22',100),(8,'bg5423i1a','Rene','Fuentes','Fuentes','Calle Mariano Abasolo Puebla.Pue','2232982364','Maculino','1983-09-17','2022-11-11 10:25:28',101);
INSERT INTO `profesor_materia` VALUES (11,7,6,4,5,1,100),(14,7,6,4,6,1,100),(15,7,6,4,12,1,100),(16,7,6,4,9,1,100),(17,8,13,5,13,1,100),(18,12,11,7,15,1,100);
INSERT INTO `alumnos_profesor` VALUES (24,11,2,100),(25,14,2,100),(26,15,2,100),(27,16,2,100),(28,17,3,100),(29,18,6,100);

