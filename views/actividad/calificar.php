<?php $profesor = $this->d['profesor']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calificar</title>
</head>

<body>
  <?php require 'views/template/headerMaestro.php'; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <?php $this->showMessages(); ?>

    <div class="card">
      <div class="card-header">
        ACTIVIDADES PENDIENTES POR CALIFICAR
      </div>
      <div class="card-body">
        <table class='table table-striped' id="table1">
          <thead>
            <tr>
              <th class="text-center">Alumno</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Materia</th>
              <th class="text-center">Comentario</th>
              <th class="text-center">Archivo</th>
              <th class="text-center">Estatus</th>
              <th class="text-center">Calificar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $NumerodPedido = "Descarga_" . date("mdHi");
            ?>

            <?php foreach ($this->varTodas as $row) {
              $Calificar_act = new varTodas();
              $Calificar_act = $row;
            ?>
              <tr class="text-center">
                <td><?php echo $Calificar_act->vw_ca_Nombre_Completo; ?></td>
                <td><?php echo $Calificar_act->vw_ca_nombre_actividad; ?></td>
                <td><?php echo $Calificar_act->vw_ca_nombre_materia; ?></td>
                <td><?php echo $Calificar_act->vw_ca_actividad_realizada; ?></td>
                <td><a href="<?php echo constant('URL') . "actividades/" . $Calificar_act->vw_ca_ruta_archivo; ?>" download="<?php echo $NumerodPedido ?>" class="btn icon btn-success">
                    <i data-feather="download"></i></a>
                </td>
                <td><?php
                    if ($Calificar_act->vw_ca_id_estatus == 111) {
                      echo '  <span class="badge bg-info">Enviada</span>';
                    }
                    ?></td>
                <td class="text-center">
                  <a href="<?php echo constant('URL') . 'actividad/ver/' . $Calificar_act->vw_ca_calificacion_id;  ?>" class="btn icon btn-warning"><i data-feather="check"></i></a>
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