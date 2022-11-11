<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asignar Maestros</title>
</head>

<body>
  <?php require 'views/template/header.php'; ?>

  <?php $this->showMessages(); ?>

  <a href="<?php echo constant('URL'); ?>profesormateria/new" class="btn btn-success rounded-pill">Nuevo</a><br><br>
  <div class="card">
    <div class="card-header">
    ASIGNAR MAESTROS
    </div>
    <div class="card-body">
      <table class="table table-striped text-center" id="table1">
        <thead>
          <tr>
            <th class="text-center">Profesor</th>
            <th class="text-center">Materia</th>
            <th class="text-center">Grado</th>
            <th class="text-center">Periodo</th>
            <th class="text-center">Estatus</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->varTodas as $row) {
            $DprofesroM = new varTodas();
            $DprofesroM = $row;
          ?>
            <tr>
              <td><?php echo $DprofesroM->vw_pm_Nombre_Profesor; ?></td>
              <td><?php echo $DprofesroM->vw_pm_nombre_materia; ?></td>
              <td><?php echo $DprofesroM->vw_pm_nombre_grado; ?></td>
              <td><?php echo $DprofesroM->vw_pm_nombre_periodo; ?></td>
              <td><?php echo $DprofesroM->vw_pm_Estatus; ?></td>
              <td class="text-center">
                <a href="<?php echo constant('URL') . 'DprofesroM/verDetalle/' . $DprofesroM->vw_a_alumno_id ?>" class="btn icon btn-warning"> <i data-feather="edit-3"></i></a>
                <a href="<?php echo constant('URL') . 'DprofesroM/eliminarAl/' . $DprofesroM->vw_a_alumno_id ?>" class="btn icon btn-danger"><i data-feather="delete"></i></a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>



  <?php require 'views/template/footer.php'; ?>
</body>

</html>