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
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <?php $this->showMessages(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Periodos</h1>
    </div>
    <div class="card">
      <div class="card-header">
        <h4><b>Nuevo</b></h4>
        <form class="row p-4" action="<?php echo constant('URL'); ?>periodos/savePeridos" method="POST" autocomplete="off">
          <div class="col-md-5">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="txt_NomPeriodo" required>
          </div>
          <div class="col-md-3 d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-1">Registrar</button>
            <button type="reset" class="btn btn-light">Limpiar</button>
          </div>
        </form>
      </div>
    </div>


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