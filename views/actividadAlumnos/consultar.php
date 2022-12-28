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
      $Actividad = $row; ?>
      <div class="card">
        <div class="card-body">
          <a href="<?php echo constant('URL') . 'actividadAlumnos/Detalle/' . $Actividad->vw_act_actividad_id ?>" class="link-primary">
            <h3 class="card-title text-primary"><?php echo $Actividad->vw_act_nombre_actividad; ?></h3><br>
            <h3 class="card-title text-primary"><?php echo $Actividad->vw_act_titulo; ?></h3><br>
          </a>
          <p class="card-text">Descripcion :<?php echo " " . $Actividad->vw_act_descripcion; ?></p>
          <p class="card-text">Horas : <?php echo $Actividad->vw_act_DiasEntrega . " Hrs"; ?></p>
          <p class="card-text">Fecha Limite : <?php echo $Actividad->vw_act_fecha_fin ?></p>
        </div>
      </div>
    <?php } ?>
  </div>
  <?php require 'views/template/footerAlumnos.php'; ?>
</body>

</html>