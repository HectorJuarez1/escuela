<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alumnos</title>
</head>

<body>
  
  <?php require 'views/template/header.php'; ?>
  <?php $this->showMessages(); ?>

  <a href="<?php echo constant('URL'); ?>alumnos/new" class="btn btn-success rounded-pill">Nuevo</a><br><br>
  <div class="card">
    <div class="card-header">
      ALUMNOS
    </div>
    <div class="card-body">
      <table class="table table-striped text-center" id="table1">
        <thead>
          <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Curp</th>
            <th class="text-center">Edad</th>
            <th class="text-center">Sexo</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Estatus</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->varTodas as $row) {
            $alumnos = new varTodas();
            $alumnos = $row;
            $ruta = "public/assets/images/Alumnos/" . $alumnos->vw_a_Foto_alumno;
          ?>
            <tr>
              <td><?php echo $alumnos->vw_a_Nombre_Completo; ?></td>
              <td><?php echo $alumnos->vw_a_Curp; ?></td>
              <td><?php echo $alumnos->vw_a_Edad; ?></td>
              <td><?php echo $alumnos->vw_a_Sexo; ?></td>
              <td class="text-center"><img src="<?php echo $ruta; ?>" height="50px" width="50px"></td>
              <td><?php
                  if ($alumnos->vw_a_id_Estatus == 100) {
                    echo '  <span class="badge bg-success">Activo</span>';
                  } elseif ($alumnos->vw_a_id_Estatus == 101) {
                    echo '<span class="badge bg-danger">Baja</span>';
                  }
                  elseif ($alumnos->vw_a_id_Estatus == 102) {
                    echo '<span class="badge bg-warning">Baja Temporal</span>';
                  }
                  ?></td>
              <td class="text-center">
                <a href="<?php echo constant('URL') . 'alumnos/verDetalle/' . $alumnos->vw_a_alumno_id ?>" class="btn icon btn-warning"> <i data-feather="edit-3"></i></a>
                <a href="<?php echo constant('URL') . 'alumnos/eliminarAl/' . $alumnos->vw_a_alumno_id ?>" class="btn icon btn-danger"><i data-feather="delete"></i></a>
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