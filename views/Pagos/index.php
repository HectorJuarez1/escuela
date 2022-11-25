<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar pagos</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>
    <?php $this->showMessages(); ?>
    <div class="card">
    <div class="card-header">
      DETALLE DE PAGOS REALIZADOS
    </div>
    <div class="card-body">
      <table class="table table-striped text-center" id="table1">
        <thead>
          <tr>
            <th class="text-center">No Alumno</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Pago</th>
            <th class="text-center">Mes</th>
            <th class="text-center">Concepto</th>
            <th class="text-center">Estatus</th>
            <th class="text-center">Fecha de Registro</th>
            <th class="text-center">Cancelar</th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->varPagos as $row) {
            $pagos = new varPagos();
            $pagos = $row;
          ?>
            <tr>
              <td><?php echo $pagos->vw_pg_No_alumno; ?></td>
              <td><?php echo $pagos->vw_pg_Nombre_Alumno; ?></td>
              <td><?php echo $pagos->vw_pg_Pago; ?></td>
              <td><?php echo $pagos->vw_pg_Detalle_mes; ?></td>
              <td><?php echo $pagos->vw_pg_Concepto; ?></td>
              <td><?php
                  if ($pagos->vw_pg_estatus_id_pago == 108) {
                    echo '  <span class="badge bg-success">Registrado</span>';
                  } elseif ($pagos->vw_pg_estatus_id_pago == 109) {
                    echo '<span class="badge bg-danger">Cancelado</span>';
                  }
                  ?></td>
              <td><?php echo $pagos->vw_pg_Fecha_creacion; ?></td>
              <td class="text-center">
                <a href="<?php echo constant('URL') . 'Pagos/CancelaP/' . $pagos->vw_pg_id_pagos ?>" class="btn icon btn-danger"><i data-feather="x-circle"></i></a>
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