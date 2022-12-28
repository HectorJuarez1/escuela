<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewPadre/Tutor</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>

    <?php $this->showMessages(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">NUEVO PADRE / TUTOR</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="row p-3" action="savetur" method="POST" enctype="multipart/form-data" accept=".png, .jpg, .jpeg, .webp" autocomplete="off">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="txt_nombre" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="city-column">Apellido Paterno</label>
                            <input type="text" class="form-control" name="txt_ApPaterno" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="txt_ApMaterno" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Direccion</label>
                            <input type="text" class="form-control" name="txt_Direccion" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Telefono Casa</label>
                            <input type="number" class="form-control" name="txt_tel_casa" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Telefono Celular</label>
                            <input type="number" class="form-control" name="txt_celular" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" class="form-control" name="txt_correo" required>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label>Sexo</label>
                            <select class="form-select" name="txt_sexo" required>
                                <option selected>Selección</option>
                                <option>Femenino</option>
                                <option>Maculino</option>
                            </select>
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