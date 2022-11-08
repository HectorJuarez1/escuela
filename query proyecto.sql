use ctrol_escolar;
select * from alumnos;
select * from estatus;
select * from tutor;
select * from asistencias;
select * from aulas;
select * from carrera;
select * from profesor;
select * from materias;
select * from grados;
select * from users;















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

INSERT INTO `users` VALUES (1,'hector.coyotl','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','admin','Hector Juarez','2022-10-19 04:19:52'),(2,'laura.romero','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','user','Laura Romero','2022-10-19 04:19:52'),(3,'david.hernandez','$2y$12$ukq79N4jUBBN14rFbHI1k.amcHUtDxunMRrJUI35OuKAykRKMnDt6','profesor','David Hernandez','2022-10-19 04:20:45');
INSERT INTO `alumnos` VALUES (2,'Hector','Coyotl','Juarez','Maculino','2012-09-10','FODF910819HMSLZR07','1.png','2022-11-03 00:16:26',100),(3,'Galilea','González','Reyes','Femenino','2015-03-06','FABM770222MMSJNR00','4.png','2022-11-03 00:15:55',100),(4,'Juan','Cabrera','Garcia','Maculino','2015-01-10','CAGS620415HVZBRT22','8.png','2022-11-04 03:08:32',102),(5,'Karen Odette','Domínguez','Velázquez','Femenino','2015-06-05','CATC650228MMCMRR03','7.png','2022-11-03 00:16:26',100),(6,'Lizbeth Soledad','Falcón','Duarte','Femenino','2016-05-01','CAVA550828HGRNLG04','6.png','2022-11-03 00:16:26',100),(7,'Oscar','Carranco','Mandujado','Maculino','2014-03-06','CAMJ680624MGRRRN00','9.png','2022-11-03 00:16:26',101);
INSERT INTO `estatus` VALUES (100,'Activo'),(101,'Baja'),(102,'Baja Temporal');


