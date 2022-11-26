<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Materias</title>
</head>

<body>
  <?php require 'views/template/header.php'; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <?php $this->showMessages(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Materias</h1>
    </div>
    <div class="card">
      <div class="card-header">
        <h4><b>Nuevo</b></h4>
        <form class="row p-4" action="<?php echo constant('URL'); ?>materias/saveMaterias" method="POST" autocomplete="off">

          <div class="col-md-5 col-12">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" name="txt_NomMaterias" required>
            </div>
          </div>

          <div class="col-md-2 col-12">
            <div class="form-group">
              <label>Dia Semana</label>
              <select class="form-select" name="txt_DiaSemana" required>
                <option selected>Selección</option>
                <option>Lunes</option>
                <option>Martes</option>
                <option>Miercoles</option>
                <option>Jueves</option>
                <option>Viernes</option>
              </select>
            </div>
          </div>

          <div class="col-md-2 col-12">
            <div class="form-group">
              <label>Hora Inicio</label>
              <select class="form-select" name="txt_HoraInicio" required>
                <option selected>Selección</option>
                <option>07:00 AM</option>
                <option>08:00 AM</option>
                <option>09:00 AM</option>
                <option>10:00 AM</option>
                <option>11:00 AM</option>
                <option>12:00 PM</option>
                <option>13:00 PM</option>
                <option>14:00 PM</option>
              </select>
            </div>
          </div>


          <div class="col-md-2 col-12">
            <div class="form-group">
              <label>Hora Fin</label>
              <select class="form-select" name="txt_HoraFin" required>
                <option selected>Selección</option>
                <option>07:00 AM</option>
                <option>08:00 AM</option>
                <option>09:00 AM</option>
                <option>10:00 AM</option>
                <option>11:00 AM</option>
                <option>12:00 PM</option>
                <option>13:00 PM</option>
                <option>14:00 PM</option>
              </select>
            </div>
          </div>


          <div class="col-md-2 col-12">
            <div class="form-group">
              <label>Grado</label>
              <select class="form-select" name="txt_Grado" required>
                <option selected>Selección</option>
                <option></option>
                <option>08:00 AM</option>
                <option>09:00 AM</option>
                <option>10:00 AM</option>
                <option>11:00 AM</option>
                <option>12:00 PM</option>
                <option>13:00 PM</option>
                <option>14:00 PM</option>
              </select>
            </div>
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
              <th class="text-center">Materia</th>
              <th class="text-center">Estatus</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->varTodas as $row) {
              $materias = new varTodas();
              $materias = $row;
            ?>
              <tr>
                <td><?php echo $materias->nombre_materia; ?></td>
                <td><?php
                    if ($materias->estatus_materias_id == 100) {
                      echo '  <span class="badge bg-success">Activo</span>';
                    } elseif ($materias->estatus_materias_id == 103) {
                      echo '<span class="badge bg-danger">Inactivo</span>';
                    }
                    ?></td>
                <td class="text-center">
                  <a href="<?php echo constant('URL') . 'materias/verDetalle/' . $materias->materia_id ?>" class="btn icon btn-warning"> <i data-feather="edit-3"></i></a>
                  <a href="<?php echo constant('URL') . 'materias/eliminarMat/' . $materias->materia_id ?>" class="btn icon btn-danger"><i data-feather="delete"></i></a>
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