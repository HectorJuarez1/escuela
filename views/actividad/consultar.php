<?php $profesor = $this->d['profesor']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultar</title>
</head>

<body>
  <?php require 'views/template/headerMaestro.php'; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <?php $this->showMessages(); ?>

    <div class="card">
      <div class="card-header">
        ACTIVIDADES CREADAS
      </div>
      <div class="card-body">
        <table class='table table-striped' id="table1">
          <thead>
            <tr>
              <th class="text-center">Nombre</th>
              <th class="text-center">Tema</th>
              <th class="text-center">Descripcion</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->varTodas as $row) {
              $Actividad = new varTodas();
              $Actividad = $row;
            ?>
              <tr class="text-center">
                <td><?php echo $Actividad->nombre_actividad; ?></td>
                <td><?php echo $Actividad->titulo; ?></td>
                <td><?php echo $Actividad->descripcion; ?></td>
                <td class="text-center">
                  <a href="<?php echo constant('URL') . 'actividad/Detalle/' . $Actividad->actividad_id ?>" class="btn icon btn-warning"> <i data-feather="edit-3"></i></a>
                  <a href="<?php echo constant('URL') . 'actividad/elimAct/' . $Actividad->actividad_id  ?>" class="btn icon btn-danger"><i data-feather="x"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php require 'views/template/footerMaestro.php'; ?>
</body>

</html>