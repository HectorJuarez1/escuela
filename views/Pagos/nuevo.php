<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo pagos</title>
</head>

<body>
  <?php require 'views/template/header.php'; ?>
  <?php $this->showMessages(); ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h2 mb-0 text-gray-800">NUEVO PAGO</h1>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="col-md-5 col-12">
        <form class="p-3 d-flex" action="verDetalle" method="POST">
          <input class="form-control me-2" type="text" name="txt_buscar" placeholder="No Alumno" required>
          <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
      </div>
      <?php
      $a = "";
      $c = "";
      if (isset($_POST['txt_buscar'])) {
        foreach ($this->DatosUsuario as $row) {
          $Dusuarios = new varTodas();
          $Dusuarios = $row;
          $a = $Dusuarios->vw_a_No_Alumno;
          $c = $Dusuarios->vw_a_Nombre_Completo;
        }
      }
      ?>
      <form class="row p-3" action="savePa" method="POST">
        <div class="row">
          <div class="col-md-3 col-12">
            <div class="form-group">
              <label>No Alumno</label>
              <input type="text" class="form-control" name="txt_no_usuario" value="<?php echo $a; ?>" readonly>
            </div>
          </div>
          <div class="col-md-7 col-12">
            <div class="form-group">
              <label>Nombre Completo</label>
              <input type="text" class="form-control" name="txt_Nom_Completo" value="<?php echo $c; ?>" readonly>
            </div>
          </div>
          <div class="col-md-2 col-12">
            <div class="form-group">
              <label>Pago</label>
              <input type="number" class="form-control" name="txt_Pago">
            </div>
          </div>
          <div class="col-md-3 col-12">
            <div class="form-group">
              <label>Concepto</label>
              <select class="form-select" name="com_concepto" required>
                <option selected>Selecci??n</option>
                <option value="1">Inscripcion</option>
                <option value="2">Reinscripcion</option>
                <option value="3">Colegiatura</option>
              </select>
            </div>
          </div>
          <div class="col-md-3 col-12">
            <div class="form-group">
              <label>MES</label>
              <select class="form-select" name="com_Mes">
                <option value="">Selecci??n</option>
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
              </select>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-1">Registrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php require 'views/template/footer.php'; ?>
</body>

</html>