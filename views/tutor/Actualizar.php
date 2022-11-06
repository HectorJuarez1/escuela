<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act Padre/Tutor</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>

        <?php $this->showMessages(); ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 mb-0 text-gray-800">ACTUALIZAR DATOS PADRE / TUTOR</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form class="row p-3" action="<?php echo constant('URL'); ?>tutor/ActualizarT" method="POST" enctype="multipart/form-data" accept=".png, .jpg, .jpeg, .webp" autocomplete="off">
                    <div class="row">
                    <input type="hidden" class="form-control" name="id_Tutor" value="<?php echo $this->varTodas->id_Tutorr; ?>" readonly>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="txt_nombre"  value="<?php echo $this->varTodas->Tur_Nombres; ?>"required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="city-column">Apellido Paterno</label>
                                <input type="text" class="form-control" name="txt_ApPaterno"  value="<?php echo $this->varTodas->Tur_Apellido_Paterno; ?>"required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" class="form-control" name="txt_ApMaterno"  value="<?php echo $this->varTodas->Tur_Apellido_Materno; ?>"required>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="text" class="form-control" name="txt_Direccion"  value="<?php echo $this->varTodas->Tur_Direccion; ?>"required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Telefono Casa</label>
                                <input type="number" class="form-control" name="txt_tel_casa"  value="<?php echo $this->varTodas->Tur_Telefono_Casa; ?>"required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Telefono Celular</label>
                                <input type="number" class="form-control" name="txt_celular"  value="<?php echo $this->varTodas->Tur_Telefono_Celular; ?>"required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" class="form-control" name="txt_correo" value="<?php echo $this->varTodas->Tur_Correo; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                        <div class="form-group">
                                <label>Sexo</label>
                                <select class="form-select" name="txt_sexo">
                                    <option> <?php echo $this->varTodas->Tur_Sexo; ?></option>
                                    <?php
                                    if ($this->varTodas->Tur_Sexo == 'Femenino') {
                                        echo "<option>Maculino</option>";
                                    } else {
                                        echo "<option>Femenino</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-warning me-1 mb-1">Actualizar</button>
                        </div>
                        </div>
                </form>
            </div>
        </div>
    <?php require 'views/template/footer.php'; ?>
</body>
</html>