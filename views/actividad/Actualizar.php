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

    <div class="card">
        <div class="card-header">
            <h4><b>ACTUALIZAR DATOS</b></h4>
            <form class="row p-4" action="<?php echo constant('URL'); ?>actividad/Actactividad" method="POST" autocomplete="off">
                <div class="col-md-5">
                    <input type="hidden" class="form-control" name="txt_IdAct" value="<?php echo $this->varTodas->actividad_id; ?>" readonly>
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="txt_NomAct" value="<?php echo $this->varTodas->nombre_actividad; ?>" required>
                </div>
                <div class="col-md-2 col-12">
                    <div class="form-group">
                        <label class="form-label">Estatus</label>
                        <select class="form-select" name="com_estatus">
                            <?php if ($this->varTodas->estatus_actividad_id == 100) { ?>
                                <option value="100">Activo</option>
                                <option value="103">Inactivo</option>
                            <?php } elseif ($this->varTodas->estatus_actividad_id == 103) {
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
            </form>
        </div>
    </div>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>