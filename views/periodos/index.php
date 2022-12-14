<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Periodos</title>
</head>

<body>
  <?php require 'views/template/header.php'; ?>

  <?php $this->showMessages(); ?>
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h2 mb-0 text-gray-800">Periodos</h1>
  </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary round" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Nuevo Periodo
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Periodo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form class="row p-4" action="<?php echo constant('URL'); ?>periodos/savePeridos" method="POST" autocomplete="off">
            <div class="col-md-12">
              <label class="form-label">Nombre del periodo</label>
              <input type="text" class="form-control" name="txt_NomPeriodo" required>
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

  <div class="card">
    <div class="card-header">
      DETALLES
    </div>
    <div class="card-body">
      <table class="table table-striped text-center" id="table1">
        <thead>
          <tr>
            <th class="text-center">Periodos</th>
            <th class="text-center">Estatus</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->varTodas as $row) {
            $periodos = new varTodas();
            $periodos = $row;
          ?>
            <tr>
              <td><?php echo $periodos->nombre_periodo; ?></td>
              <td><?php
                  if ($periodos->estatus_periodos_id == 100) {
                    echo '  <span class="badge bg-success">Activo</span>';
                  } elseif ($periodos->estatus_periodos_id == 103) {
                    echo '<span class="badge bg-danger">Inactivo</span>';
                  }
                  ?></td>
              <td class="text-center">
                <a href="<?php echo constant('URL') . 'periodos/verDetalle/' . $periodos->periodo_id ?>" class="btn icon btn-warning"> <i data-feather="edit-3"></i></a>
                <a href="<?php echo constant('URL') . 'periodos/eliminarPer/' . $periodos->periodo_id ?>" class="btn icon btn-danger"><i data-feather="delete"></i></a>
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