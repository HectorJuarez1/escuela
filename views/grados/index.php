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

  <?php $this->showMessages(); ?>
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Grados</h1>
  </div>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary round" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Nuevo grado
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Grado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form class="row p-4" action="<?php echo constant('URL'); ?>grados/saveGrados" method="POST" autocomplete="off">
            <div class="col-md-12">
              <label class="form-label">Nombre del grado</label>
              <input type="text" class="form-control" name="txt_NomGrado" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
        </form>
      </div>
    </div>
  </div><br><br>


  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($this->varTodas as $row) {
      $grados = new varTodas();
      $grados = $row;
    ?>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?php echo $grados->nombre_grado; ?></h4>
            <p class="card-text">Grado</p>

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