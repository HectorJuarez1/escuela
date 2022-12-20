<?php $profesor = $this->d['profesor'];?>
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
  <?php require 'views/template/headerMaestro.php'; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <?php $this->showMessages(); ?>

      <?php foreach ($this->varTodas as $row) {
        $NMaterias = new varTodas();
        $NMaterias = $row;
        //var_dump($NMaterias);
      ?>
          <div class="card">
      <h5 class="card-header"></h5>
      <div class="card-body">
        <h3 class="card-title"><?php echo $NMaterias->vw_dfm_nombre_materia; ?></h3>
        <p class="card-text">Grado: <?php echo $NMaterias->vw_dfm_nombre_grado; ?> Aula :<?php echo $NMaterias->vw_dfm_nombre_aula; ?></p>
        <p class="card-text">Actividades : Sin calificar 10</p>
        <div class="col-12 d-flex justify-content-end mt-4">
        <a href="<?php echo constant('URL') . 'actividad/verDetalle/' . $NMaterias->vw_dfm_id_materia ?>" class="btn btn-success me-1">Crear</a>
        <a href="<?php echo constant('URL') . 'actividad/Consultar/' . $NMaterias->vw_dfm_id_materia ?>" class="btn btn-warning">Revisar</a>  
      </div>
      </div>
    </div>

      <?php } ?>


    <?php require 'views/template/footerMaestro.php'; ?>
</body>

</html>