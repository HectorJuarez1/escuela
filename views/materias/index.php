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

  <?php $this->showMessages(); ?>

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h2 mb-0 text-gray-800">Materias</h1>
  </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary round" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Nueva materia
  </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva Materia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row p-4" action="<?php echo constant('URL'); ?>materias/saveMaterias" method="POST" autocomplete="off">
            <div class="col-12">
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" name="txt_NomMaterias" required>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Dia Semana</label>
                <select class="form-select" name="com_DiaSemana" required>
                  <option selected>Selección</option>
                  <option value="Lunes">Lunes</option>
                  <option value="Martes">Martes</option>
                  <option value="Miercoles">Miercoles</option>
                  <option value="Jueves">Jueves</option>
                  <option value="Viernes">Viernes</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-12">
              <div class="form-group">
                <label>Hora Inicio</label>
                <select class="form-select" name="com_horainicio" id="inputGroupSelect01">
                  <option selected>Elegir Hora</option>
                  <?php foreach ($this->ComboHoras as $row) {
                    $horainicio = new varTodas();
                    $horainicio = $row; ?>
                    <option value="<?php echo $horainicio->id_horas; ?>">
                      <?php echo $horainicio->Horas; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-12">
              <div class="form-group">
                <label>Hora Fin</label>
                <select class="form-select" name="com_horafin" id="inputGroupSelect01">
                  <option selected>Elegir Hora</option>
                  <?php foreach ($this->ComboHoras as $row) {
                    $horafin = new varTodas();
                    $horafin = $row;
                  ?>
                    <option value="<?php echo $horafin->id_horas; ?>">
                      <?php echo $horafin->Horas; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Grados</label>
                <select class="form-select" name="com_grados" id="inputGroupSelect01">
                  <option selected>Elegir el Grado</option>
                  <?php foreach ($this->ComboGrados as $row) {
                    $grados = new varTodas();
                    $grados = $row; ?>
                    <option value="<?php echo $grados->grado_id; ?>">
                      <?php echo $grados->nombre_grado; ?></option>
                  <?php } ?>
                </select>
              </div>
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
            <th class="text-center">Materia</th>
            <th class="text-center">Dia</th>
            <th class="text-center">Inicia</th>
            <th class="text-center">Fin</th>
            <th class="text-center">Horas</th>
            <th class="text-center">Grado</th>
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
              <td><?php echo $materias->vw_mat_nombre_materia; ?></td>
              <td><?php echo $materias->vw_mat_dia_semana; ?></td>
              <td><?php echo $materias->vw_mat_HoraInicio; ?></td>
              <td><?php echo $materias->vw_mat_HoraFin; ?></td>
              <td><?php echo $materias->vw_mat_Horas; ?></td>
              <td><?php echo $materias->vw_mat_Grado; ?></td>
              <td><?php
                  if ($materias->vw_mat_estatus_materias_id == 100) {
                    echo '  <span class="badge bg-success">Activo</span>';
                  } elseif ($materias->vw_mat_estatus_materias_id == 103) {
                    echo '<span class="badge bg-danger">Inactivo</span>';
                  }
                  ?></td>
              <td class="text-center">
                <a href="<?php echo constant('URL') . 'materias/verDetalle/' . $materias->vw_mat_materia_id ?>" class="btn icon btn-warning"> <i data-feather="edit-3"></i></a>
                <a href="<?php echo constant('URL') . 'materias/eliminarMat/' . $materias->vw_mat_materia_id ?>" class="btn icon btn-danger"><i data-feather="x"></i></a>
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