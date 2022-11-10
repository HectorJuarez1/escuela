
select gr.proceso_id,es.nombre_grado,au.nombre_aula,pro.Nombre_Completo as Nombre_Profesor,mat.nombre_materia,per.nombre_periodo,est.Descripcion as Estatus
from profesor_materia as gr 
inner join grados as es on gr.grado_id=es.grado_id  
inner join aulas as au on gr.aula_id=au.aula_id 
inner join vw_detalle_maestros  as pro on gr.profesor_id=pro.profesor_id 
inner join materias  as mat on gr.materias_id=mat.materia_id 
inner join periodos  as per on gr.periodos_id=per.periodo_id 
inner join estatus  as est on gr.estatus_procesoprofesor_id=est.idEstatus 