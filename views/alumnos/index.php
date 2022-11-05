<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alumnos</title>
</head>

<body>
  <?php require 'views/template/header.php'; ?>
  <div class="container-fluid">
    <?php $this->showMessages(); ?>
    <div class="page-heading">
      <h3>Alumnos</h3>
    </div>
    <a href="<?php echo constant('URL'); ?>alumnos/new" class="btn btn-success rounded-pill">Nuevo</a>
    <div class="card mt-3">
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
              $ruta = "public/assets/images/Alumnos/" . $alumnos->vw_Foto_alumno;
            ?>
              <tr>
                <td><?php echo $alumnos->vw_Nombre_Completo; ?></td>
                <td><?php echo $alumnos->vw_Curp; ?></td>
                <td><?php echo $alumnos->vw_Edad; ?></td>
                <td><?php echo $alumnos->vw_Sexo; ?></td>
                <td class="text-center"><img src="<?php echo $ruta; ?>" height="50px" width="50px"></td>
                <td><?php
                    if ($alumnos->vw_id_Estatus == 100) {
                      echo '  <span class="badge bg-success">Activo</span>';
                    } elseif ($alumnos->vw_id_Estatus == 101) {
                      echo '<span class="badge bg-danger">Baja</span>';
                    }
                    ?></td>
                <td class="text-center">
                  <a href="<?php echo constant('URL') . 'alumnos/verDetalle/' . $alumnos->vw_id_alumno ?>" class="btn icon btn-warning"> <i data-feather="edit-3"></i></a>
                  <a href="<?php echo constant('URL') . 'alumnos/eliminarAl/' . $alumnos->vw_id_alumno ?>" class="btn icon btn-danger"><i data-feather="delete"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require 'views/template/footer.php'; ?>
</body>

</html>