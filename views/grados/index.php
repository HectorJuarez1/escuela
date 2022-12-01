<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grados</title>
</head>

<body>
  <?php require 'views/template/header.php'; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <?php $this->showMessages(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Grados</h1>
    </div>
    <div class="card">
      <div class="card-header">
        <h4><b>Nuevo</b></h4>
        <form class="row p-4" action="<?php echo constant('URL'); ?>grados/saveGrados" method="POST" autocomplete="off">
          <div class="col-md-5">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="txt_NomGrado" required>
          </div>
          <div class="col-md-3 d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-1">Registrar</button>
            <button type="reset" class="btn btn-light">Limpiar</button>
          </div>
        </form>
      </div>
    </div>


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Detalles</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($this->varTodas as $row) {
        $grados = new varTodas();
        $grados = $row;
      ?>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Grado</h5>
              <p class="card-text"><?php echo $grados->nombre_grado; ?></p>

              <?php
              if ($grados->estatus_grados_id == 100) {
                echo '  <span class="badge bg-success">Activo</span>';
              } elseif ($grados->estatus_grados_id == 103) {
                echo '<span class="badge bg-danger">Inactivo</span>';
              }
              ?>
              <a href="<?php echo constant('URL') . 'grados/verDetalle/' . $grados->grado_id ?>"><span class="badge bg-warning">Editar</span></a>
              <a href="<?php echo constant('URL') . 'grados/eliminarGra/' . $grados->grado_id ?>"><span class="badge bg-danger">Desactivar</span></a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>






    <?php require 'views/template/footer.php'; ?>
</body>

</html>