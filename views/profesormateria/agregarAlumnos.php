<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Alumnos</title>
</head>
<body>
    <?php require 'views/template/header.php'; ?>
    <?php $this->showMessages(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">ASIGNAR ALUMNOS</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="row p-3" action="<?php echo constant('URL'); ?>profesormateria/saveAlumnoProfesor" method="POST">
                <div class="row">
                <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>ID PROCESO</label>
                                <input type="text" class="form-control" name="txt_idproceso" value="<?php echo $this->varTodas->vw_pm_proceso_id; ?>" readonly>
                            </div>
                        </div>
                <div class="col-md-4 mb-4">
                <h6>NOMBRE ALUMNOS</h6>
            <select class="form-select" name="com_alumnos" id="inputGroupSelect01">
                <option selected>Elegir alumnos</option>
                <?php foreach ($this->Comboalumnos as $row) {
                    $alumnos = new varTodas();
                    $alumnos = $row; ?>
                    <option value="<?php echo $alumnos->vw_a_alumno_id; ?>">
                        <?php echo $alumnos->vw_a_Nombre_Completo; ?></option>
                <?php } ?>
                </select></div>
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