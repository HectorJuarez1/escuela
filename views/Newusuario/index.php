<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <title>NewUsuario</title>

</head>

<body>

    <?php require 'views/template/header.php'; ?>
    <?php $this->showMessages(); ?>

<a href="<?php echo constant('URL'); ?>Newusuario/new" class="btn btn-success rounded-pill">Nuevo</a><br><br>

    <div class="card">
        <div class="card-header">
            USUARIOS
        </div>
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Rol</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->varTodas as $row) {
                        $Nusuario = new varTodas();
                        $Nusuario = $row;
                    ?>
                        <tr class="text-center">
                            <td><?php echo $Nusuario->username; ?></td>
                            <td><?php echo $Nusuario->role; ?></td>
                            <td class="text-center">
                                <a href="<?php echo constant('URL') . 'Newusuario/verDetalle/' . $Nusuario->idUser ?>" class="btn icon btn-warning"> <i data-feather="edit-3"></i></a>
                                <a href="<?php echo constant('URL') . 'Newusuario/eliminarUser/' . $Nusuario->idUser ?>" class="btn icon btn-danger"><i data-feather="delete"></i></a>
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