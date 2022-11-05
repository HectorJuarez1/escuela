<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php $this->showMessages(); ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 mb-0 text-gray-800">ACTUALIZAR DATOS</h1>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <form class="form" action="<?php echo constant('URL'); ?>alumnos/ActualizarR" method="POST">
                    <div class="row">
                        <input type="hidden" class="form-control" name="txt_IdAlumno" value="<?php echo $this->varTodas->id_alumno; ?>" readonly>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="txt_nombre" value="<?php echo $this->varTodas->Nombres; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="city-column">Apellido Paterno</label>
                                <input type="text" class="form-control" name="txt_ApPaterno" value="<?php echo $this->varTodas->Apellido_Paterno; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" class="form-control" name="txt_ApMaterno" value="<?php echo $this->varTodas->Apellido_Materno; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label>Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="txt_FeNacimiento" value="<?php echo $this->varTodas->Fecha_nacimiento; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label>Sexo</label>
                                <select class="form-select" name="txt_sexo" required>
                                    <option><?php echo $this->varTodas->Sexo; ?></option>
                                    <option>Femenino</option>
                                    <option>Maculino</option>
                                    <option>Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7 col-12">
                            <div class="form-group">
                                <label>Curp</label>
                                <input type="text" class="form-control" name="txt_curp" value="<?php echo $this->varTodas->Curp; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <?php $ruta = "public/images/Alumnos/" . $this->varTodas->Foto_Alumno; ?>
                            <img src="<?php echo constant('URL') . $ruta; ?>" height="90px" width="90px">
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group"><br>
                                <label>Subir Foto Nueva</label>
                                <input type="file" class="form-control" name="filename" value="<?php echo $this->varTodas->Foto_Alumno; ?>" required>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-warning me-1 mb-1">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>