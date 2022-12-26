<?php $user = $this->d['user']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actividad</title>
</head>

<body>
  <?php require 'views/template/headerAlumnos.php'; ?>

  <div class="container-fluid">
    <?php $this->showMessages(); ?>

    <?php foreach ($this->varTodas as $row) {
      $NMaterias_Alm_Alm = new varTodas();
      $NMaterias_Alm = $row;
      //var_dump($NMaterias_Alm);
    ?>
      <div class="card">
        <h5 class="card-header"></h5>
        <div class="card-body">
          <h3 class="card-title"><?php echo $NMaterias_Alm->vw_daa_nombre_materia; ?></h3>
          <p class="card-text">Actividades a realizar</p>
          <div class="col-12 d-flex justify-content-end mt-4">
            <a href="<?php echo constant('URL') . 'actividadAlumnos/verDetalle/' . $NMaterias_Alm->vw_daa_materia_id ?>" class="btn btn-primary">Realizar</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <?php require 'views/template/footerAlumnos.php'; ?>
</body>

</html>