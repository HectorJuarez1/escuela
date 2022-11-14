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
select * from profesor_materia;
select * from users;
select * from alumnos_profesor;
select * from vw_detalle_alumnos;
select * from vw_detalle_maestros;
select * from vw_detalle_profesormateria where proceso_id = 6;
select * from vw_detalle_alumnosasignados;














create view vw_detalle_alumnosasignados as
select al.proceso_id,vpm.Nombre_Profesor,vda.Nombre_Completo as NombreAlumno,
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
select a.alumno_id,concat_ws(' ',a.Nombres,a.Apellido_Paterno ,a.Apellido_Materno)as Nombre_Completo,a.Nombres,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Fecha_nacimiento,a.Curp,
TIMESTAMPDIFF(YEAR,a.Fecha_nacimiento,CURDATE()) AS Edad, a.Foto_alumno,a.id_Estatus,Es.Descripcion as Estatus_Detalle
from alumnos as a inner join estatus as Es on a.id_Estatus=Es.idEstatus;

select * from vw_detalle_maestros;
create view vw_detalle_maestros as
select a.profesor_id,a.Cedula,concat_ws(' ',a.Nombre,a.Apellido_Paterno ,a.Apellido_Materno)as Nombre_Completo,
a.Nombre,a.Apellido_Paterno ,a.Apellido_Materno,a.Direccion,
a.Telefono,a.Sexo,a.Fecha_nacimiento,TIMESTAMPDIFF(YEAR,a.Fecha_nacimiento,CURDATE()) AS Edad ,a.estatus_maestro_id,Es.Descripcion as Estatus_Detalle
from profesor as a inner join estatus as Es on a.estatus_maestro_id=Es.idEstatus;

INSERT INTO `estatus` VALUES (100,'Activo'),(101,'Baja'),(102,'Baja Temporal'),('103', 'Inactivo');
INSERT INTO `users` VALUES (1,'hector.coyotl','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','admin','Hector Juarez','2022-10-19 04:19:52'),(2,'laura.romero','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','user','Laura Romero','2022-10-19 04:19:52'),(3,'david.hernandez','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','profesor','David Hernandez','2022-10-19 04:20:45');
INSERT INTO `alumnos` VALUES (2,'Hector','Coyotl','Juarez','Maculino','2012-09-10','FODF910819HMSLZR07','1.png','2022-11-03 00:16:26',100),(3,'Galilea','González','Reyes','Femenino','2015-03-06','FABM770222MMSJNR00','4.png','2022-11-03 00:15:55',100),(4,'Juan','Cabrera','Garcia','Maculino','2015-01-10','CAGS620415HVZBRT22','8.png','2022-11-04 03:08:32',102),(5,'Karen Odette','Domínguez','Velázquez','Femenino','2015-06-05','CATC650228MMCMRR03','7.png','2022-11-03 00:16:26',100),(6,'Lizbeth Soledad','Falcón','Duarte','Femenino','2016-05-01','CAVA550828HGRNLG04','6.png','2022-11-03 00:16:26',100),(7,'Oscar','Carranco','Mandujado','Maculino','2014-03-06','CAMJ680624MGRRRN00','9.png','2022-11-03 00:16:26',101);
INSERT INTO `actividad` VALUES (1,'Evaluación 1',100),(2,'Evaluación 2',100),(3,'Evaluación 4',103);
INSERT INTO `aulas` VALUES (1,'Primero A',100),(2,'Segundo B',100),(3,'Sexto C',100);
INSERT INTO `grados` VALUES (7,'Primero',100),(8,'Segundo',100),(9,'Tercero',103),(10,'Cuarto',100),(11,'Quinto',100),(12,'Sexto',100);
INSERT INTO `materias` VALUES (5,'Matemáticas',100),(6,'Español',100),(7,'Ciencias de la Naturaleza',100),(8,'Segunda lengua extranjera',100),(9,'Educación física',100),(10,'Educación Artística',103),(11,'Geografía',100),(12,'Formación Cívica y Ética',100),(13,'Primera lengua extranjera',100),(14,'Lengua castellana y literatura',100),(15,'Historia',100);
INSERT INTO `periodos` VALUES (1,'Enero-Agosto 2022',100),(2,'Agosto-Diciembre 2021',100);
INSERT INTO `profesor` VALUES (4,'213443f3','Juan Carlos','Acosta','Acosta','Calle Azucenas Puebla Puebla','2215628900','Maculino','2000-06-01','2022-11-11 04:23:07',100),(5,'213443f3a','Gustavo','Valdez','Valdez','Calle Venustiano Carranza Puebla .Puebla','2232413215','Maculino','1989-05-01','2022-11-11 04:25:19',100),(6,'D54S2V65','Verónica','Hernández','Gil','Calle 16 De Septiembre Puebla.Pue','2211342354','Femenino','1990-01-09','2022-11-11 04:20:03',100),(7,'776ub543','Adriana','León','León','Calle Coronel Jesús González Arratia Puebla.Pue','2276543211','Femenino','1990-03-01','2022-11-11 04:21:22',100),(8,'bg5423i1a','Rene','Fuentes','Fuentes','Calle Mariano Abasolo Puebla.Pue','2232982364','Maculino','1983-09-17','2022-11-11 04:25:28',101);
INSERT INTO `profesor_materia` VALUES (6,8,3,4,12,1,100),(7,12,1,5,15,2,100),(8,12,3,6,6,2,100);
