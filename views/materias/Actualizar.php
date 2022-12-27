<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>

    <div class="card">
        <div class="card-header">
            <h4><b>ACTUALIZAR DATOS</b></h4>
            <form class="row p-3" action="<?php echo constant('URL'); ?>materias/ActMaterias" method="POST" autocomplete="off">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="txt_IdMaterias" value="<?php echo $this->varTodas->materia_id; ?>" readonly>
                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="txt_NomMaterias" value="<?php echo $this->varTodas->nombre_materia; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Dia semana</label>
                            <input type="text" class="form-control" name="txt_diasemana" value="" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label  class="form-label">Hora Inicio</label>
                            <select class="form-select" name="com_horainicio" required>
                                <option selected>Eligir hora</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label  class="form-label">Hora Fin</label>
                            <select class="form-select" name="com_horafin" required>
                                <option selected>Eligir hora</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Grado</label>
                            <select class="form-select" name="com_grado" required>
                                <option selected>Eligir el grado</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="form-label">Estatus</label>
                            <select class="form-select" name="com_estatus" required>
                                <?php if ($this->varTodas->estatus_materias_id == 100) { ?>
                                    <option value="100">Activo</option>
                                    <option value="103">Inactivo</option>
                                <?php } elseif ($this->varTodas->estatus_materias_id == 103) {
                                    echo '
                                <option value="103">Inactivo</option>
                                <option value="100">Activo</option>
                                ';
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