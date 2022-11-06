<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Padre/Tutor</title>
</head>

<body>
  <?php require 'views/template/header.php'; ?>

  <?php $this->showMessages(); ?>

  <a href="<?php echo constant('URL'); ?>tutor/new" class="btn btn-success rounded-pill">Nuevo</a><br><br>
  <div class="card">
    <div class="card-header">
      PADRE / TUTOR
    </div>
    <div class="card-body">
      <table class="table table-striped text-center" id="table1">
        <thead>
          <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Celular</th>
            <th class="text-center">Correo</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->varTodas as $row) {
            $tutor = new varTodas();
            $tutor = $row;
          ?>
            <tr>
              <td><?php echo $tutor->Nombre_Completo; ?></td>
              <td><?php echo $tutor->Direccion; ?></td>
              <td><?php echo $tutor->Telefono_Celular; ?></td>
              <td><?php echo $tutor->Correo; ?></td>
              <td>
                <a href="<?php echo constant('URL') . 'tutor/verDetalle/' . $tutor->id_Tutorr ?>" class="btn icon btn-warning "> <i data-feather="edit-3"></i></a>
                <a href="<?php echo constant('URL') . 'tutor/eliminarTur/' . $tutor->id_Tutorr ?>" class="btn icon btn-danger "><i data-feather="delete"></i></a>
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