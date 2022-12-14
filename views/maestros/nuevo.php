<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maestros</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>

    <?php $this->showMessages();
    $NumerodPedido = "PR" . date("mdHi");
    ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">NUEVO MAESTRO</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="row p-3" action="saveMaestro" method="POST">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>No_Profesor</label>
                            <input type="text" class="form-control" name="txt_No_Profesor" value="<?php echo $NumerodPedido; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Cedula</label>
                            <input type="text" class="form-control" name="txt_cedula" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="txt_nombre" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label for="city-column">Apellido Paterno</label>
                            <input type="text" class="form-control" name="txt_ApPaterno" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="txt_ApMaterno" required>
                        </div>
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="form-group">
                            <label>Direccion</label>
                            <input type="text" class="form-control" name="txt_direccion" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="number" class="form-control" name="txt_telefono" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="txt_FeNacimiento" required>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label>Sexo</label>
                            <select class="form-select" name="txt_sexo" required>
                                <option selected>Selecci??n</option>
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