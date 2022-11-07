<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewAlumnos</title>
</head>
<body>
    <?php require 'views/template/header.php'; ?>

        <?php $this->showMessages(); ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 mb-0 text-gray-800">NUEVO USUARIO</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form class="row p-3" action="saveUs" method="POST">
                    <div class="row">
                    <div class="col-md-5 col-12">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" class="form-control" name="txt_usuario" required>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="Password" class="form-control" name="txt_passw" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label>Rol</label>
                                <select class="form-select" name="txt_rol" required>
                                    <option selected>Selección</option>
                                    <option>admin</option>
                                    <option>user</option>
                                    <option>profesor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Nombre Completo</label>
                                <input type="text" class="form-control" name="txt_Nom_Completo" required>
                            </div>
                        </div>
                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-success me-1">Registrar</button>
                                <button type="reset" class="btn btn-light">Limpiar</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>