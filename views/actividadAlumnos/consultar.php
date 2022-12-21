<?php $user = $this->d['user']; ?>
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
  <?php require 'views/template/headerAlumnos.php'; ?>

  <div class="container-fluid">
    <?php $this->showMessages(); ?>

    <?php foreach ($this->varTodas as $row) {
      $Actividad = new varTodas();
      $Actividad = $row;
      //var_dump($NMaterias_Alm);
    ?>
      <div class="card">
        <h5 class="card-header"></h5>
        <div class="card-body">
          <h3 class="card-title"><?php echo $Actividad->vw_act_titulo; ?></h3><br>
          <p class="card-text">Descripcion :<?php echo " " . $Actividad->vw_act_descripcion; ?></p>
          <p class="card-text">Horas : <?php echo $Actividad->vw_act_DiasEntrega . " Hrs"; ?></p>
          <p class="card-text">Fecha Limite : <?php echo $Actividad->vw_act_fecha_fin ?></p>
          <p class="card-text">Estatus :
            <?php
            if ($Actividad->vw_act_estatus_actividad_id == 110) {
              echo '  <span class="badge bg-success">Nueva</span>';
            } elseif ($Actividad->vw_act_estatus_actividad_id == 111) {
              echo '<span class="badge bg-danger">Enviada</span>';
            } elseif ($Actividad->vw_act_estatus_actividad_id == 112) {
              echo '<span class="badge bg-warning">Calidicada</span>';
            }
            ?>
          </p>
          <div class="col-12 d-flex justify-content-end mt-4">
            <a href="<?php echo constant('URL') . 'actividadAlumnos/Detalle/' . $Actividad->vw_act_actividad_id ?>" class="btn btn-warning">Iniciar</a>
          </div>
        </div>
      </div>

    <?php } ?>

  </div>



  <?php require 'views/template/footerAlumnos.php'; ?>
</body>

</html>