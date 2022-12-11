<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>maestros</title>
</head>

<body>
  <?php require 'views/template/header.php'; ?>

  <?php $this->showMessages(); ?>

  <a href="<?php echo constant('URL'); ?>maestros/new" class="btn btn-success rounded-pill">Nuevo</a><br><br>
  <div class="card">
    <div class="card-header">
      maestros
    </div>
    <div class="card-body">
      <table class="table table-striped text-center" id="table1">
        <thead>
          <tr>
          <th class="text-center">No Maestro</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">Sexo</th>
            <th class="text-center">Edad</th>
            <th class="text-center">Estatus</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->varTodas as $row) {
            $maestros = new varTodas();
            $maestros = $row;
          ?>
            <td><?php echo $maestros->vw_m_NumProfesores; ?></td>
              <td><?php echo $maestros->vw_m_Nombre_Completo; ?></td>
              <td><?php echo $maestros->vw_m_Telefono; ?></td>
              <td><?php echo $maestros->vw_m_Sexo; ?></td>
              <td><?php echo $maestros->vw_m_Edad; ?></td>
              <td><?php
                  if ($maestros->vw_m_estatus_maestro_id == 100) {
                    echo '  <span class="badge bg-success">Activo</span>';
                  } elseif ($maestros->vw_m_estatus_maestro_id == 101) {
                    echo '<span class="badge bg-danger">Baja</span>';
                  }
                  elseif ($maestros->vw_m_estatus_maestro_id == 102) {
                    echo '<span class="badge bg-warning">Baja Temporal</span>';
                  }
                  ?></td>
              <td class="text-center">
                <a href="<?php echo constant('URL') . 'maestros/verDetalle/' . $maestros->vw_m_profesor_id ?>" class="btn icon btn-warning"> <i data-feather="edit-3"></i></a>
                <a href="<?php echo constant('URL') . 'maestros/eliminarMa/' . $maestros->vw_m_profesor_id ?>" class="btn icon btn-danger"><i data-feather="x"></i></a>
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